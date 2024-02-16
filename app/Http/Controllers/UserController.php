<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class UserController extends Controller
{

        // ユーザー一覧ページを表示
        public function index()
    {
        $users = User::all(); 
        // ユーザー一覧を取得する処理
        return view('profile.users', compact('users'));
    }


        //ユーザー情報の登録編集
        public function edit()
    {
        $user = Auth::user();
        return view('profile.edit', compact('user'));
    }

    public function update(Request $request)
    {
        
        if (!Auth::check()) {
            return redirect()->route('login');
        }
        $user = Auth::user();
        if (!$user) {
            // ユーザーが存在しない場合の処理
            // エラーメッセージを表示してリダイレクト
            return redirect()->route('profile.edit')->with('error', 'ユーザーが存在しません');
        }


        $user = Auth::user();
        $user->name = $request->input('name');
        // 他のユーザー情報も同様に更新する処理を追加します
        $user->save();
        return redirect()->route('profile.edit')->with('success', 'ユーザー情報を更新しました');
    }
}
