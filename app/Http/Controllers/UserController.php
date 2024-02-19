<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class UserController extends Controller
{

    // 社員一覧ページを表示
    public function index()
    {
        // 10件ごとにページネーションをつける
        $users = User::paginate(10);
        // 社員一覧を取得する処理
        return view('profile.users', compact('users'));
    }


    //社員情報の登録編集
    public function edit($id)
    {
        // 指定したIDのユーザーレコードを取得
        $user = User::find($id);

        // 編集画面に取得したユーザーレコードを渡す
        return view('profile.edit', compact('user'));
    }

    // 社員情報を編集処理
    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);
    
        // フォームから送信されたデータでユーザーレコードを更新
        $user->name = $request->input('name');
        $user->department = $request->input('department');
        $user->email = $request->input('email');
        $user->role = $request->input('role');
        $user->save();
    
        // 更新後のユーザーデータを再取得

            return redirect('/users');
    }

        // 社員削除の処理
    public function delete($id)
    {
        // 削除するユーザーを取得
        $user = User::find($id);

        // ユーザーが存在する場合は削除
        if ($user) {
            $user->delete();
            // 削除後のリダイレクト先やメッセージを設定
            return redirect()->back()->with('success', '削除が完了しました。');
            } else {
                // ユーザーが存在しない場合のリダイレクト先やメッセージを設定
                return redirect()->back()->with('error', '指定されたユーザーは存在しません。');
            } 
    }
        // if (!Auth::check()) {
        //     return redirect()->route('login');
        // }
        // $user = Auth::user();
        // if (!$user) {
        //     // ユーザーが存在しない場合の処理
        //     // エラーメッセージを表示してリダイレクト
        //     return redirect()->route('profile.edit')->with('error', 'ユーザーが存在しません');
        // }


        // $user = Auth::user();
        // $user->name = $request->input('name');
        // // 他のユーザー情報も同様に更新する処理を追加します
        // $user->save();
        // return redirect()->route('profile.edit')->with('success', 'ユーザー情報を更新しました');
}

