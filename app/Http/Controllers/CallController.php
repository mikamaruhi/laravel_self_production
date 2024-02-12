<?php

namespace App\Http\Controllers;

use App\Models\CallHistory;
use Illuminate\Http\Request;

class Callcontroller extends Controller
{

    // 受電履歴一覧画面を表示
    public function index()
    {
        $callHistories = CallHistory::all();
        return view('call.callsheet', compact('callHistories'));
    }

    // 受電履歴の詳細画面に遷移
    public function callsheet()
    {
        return view('call.callchang');
    }

    // 受電履歴の登録画面に遷移
    public function register()
    {
        return view('call.register');
    }

    // 受電履歴の登録
    public function callRegister(Request $request)
    {
        // バリデーションを追加
        $validatedData = $request->validate([
            'property_id' => 'required|integer',
            'property_name' => 'required|string|max:255',
            'receiver_assigned_to' => 'required|string|max:255',
            'handler' => 'required|string|max:255',
            'item' => 'required|string',
            'content' => 'required|string',
            'request_method' => 'required|string'
        ]);

        // バリデーションが通ったデータで登録
        CallHistory::create($validatedData);

        // 登録後、適切なリダイレクト先へ
        return redirect('items/');
    }
}
