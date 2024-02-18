<?php

namespace App\Http\Controllers;

use App\Models\CallHistory;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\DB; // 追加
use App\Models\DeletedCallHistory;

class Callcontroller extends Controller
{
    // 受電履歴の検索結果一覧を表示
    public function indexsearch(Request $request)
    {
        $keyword = $request->input('search');
        $callHistories = CallHistory::where(function ($query) use ($keyword) {
            $query->where('property_name', 'like', "%$keyword%")
                ->orWhere('receiver_assigned_to', 'like', "%$keyword%")
                ->orWhere('handler', 'like', "%$keyword%")
                ->orWhere('item', 'like', "%$keyword%")
                ->orWhere('content', 'like', "%$keyword%")
                ->orWhere('request_method', 'like', "%$keyword%")
                ->orWhere('updated_at', 'like', "%$keyword%");
        })
        ->orderBy('updated_at', 'desc')
        ->get();
    
        return view('call.indexsearch', compact('callHistories'));
    }

    // 受電履歴一覧画面を表示
    public function index()
    {
        $callHistories = CallHistory::orderBy('updated_at', 'desc')->paginate(10);
        return view('call.callsheet', compact('callHistories'));
    }

    // 受電履歴の詳細画面に遷移
    public function callchange(Request $request,$id)
    {
    
        $callHistory = DB::table('call_histories')->where('property_id', $id)->first();
    
        return view('call.callchange', ['callHistory' => $callHistory]);
    }   


    // 受電履歴の詳細画面で削除ボタンを押した場合の処理
    public function destroy($id)
    {
    
    // $idを使用して該当の受電履歴を取得し、削除する処理を実装する
    $callHistory = CallHistory::find($id);

    // 削除されたデータを別のテーブルに保存する
    $deletedCallHistory = new DeletedCallHistory();
    $deletedCallHistory->call_history_id = $callHistory->id;
    // 必要なデータを保存する

    // 削除処理を実行する
    $callHistory->delete();

    return redirect('items/');
    }   

    
    // 受電履歴の登録画面に遷移
    public function register()
    {
        $properties = DB::table('properties')->pluck('property_name', 'property_id');
        return view('call.register', compact('properties'));
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
            'request_method' => 'required|string',
            'result' => 'required|string'
        ]);

        // バリデーションが通ったデータで登録
        CallHistory::create($validatedData);

        // 登録後、適切なリダイレクト先へ
        return redirect('items/');
    }


}
