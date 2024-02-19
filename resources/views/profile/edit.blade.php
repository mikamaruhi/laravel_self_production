@extends('adminlte::page')

@section('title', '社員詳細')

@section('content_header')

@stop

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">社員詳細</h3>
                </div>
            </div>
        </div>
    </div>
    <form method="POST" action="">
        @csrf
            <!-- エラーメッセージの表示 -->
            @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif
        <div class="d-flex justify-content-center"> 
            <div class="d-flex flex-column align-items-start">  
                <table class="table" style="width: 500px;">
                    <tbody >
                        <tr>
                            <th scope="col" class="table-secondary">ID</th>
                        </tr>
                        <tr>
                            <td class="text-center">{{ $user->id}}</td>
                        </tr>
                        <tr>
                            <th scope="col" class="table-secondary">名前</th>
                        </tr>
                        <tr>
                            <td class="text-center"><input type="text" name="name" value="{{ $user->name }}"></td>
                        </tr>
                        <tr>
                            <th scope="col" class="table-secondary">部署</th>
                        </tr>
                        <tr>
                            <td class="text-center">
                                <select name="department" id="">
                                    <option value="department1" @if( $user->department === 'department1' ) selected @endif>フロント</option>
                                    <option value="department2" @if( $user->department === 'department2' ) selected @endif>営業</option>
                                    <option value="department3" @if( $user->department === 'department3' ) selected @endif>組合会計</option>
                                    <option value="department4" @if( $user->department === 'department4' ) selected @endif>総務</option>
                            </td>
                        </tr>
                        <tr>
                            <th scope="col" class="table-secondary">メールアドレス</th>
                        </tr>
                        <tr>
                            <td class="text-center"><input type="email" name="email" value="{{ $user->email }}"></td>
                        </tr>
                        <tr>
                            <th scope="col" class="table-secondary">権限</th>
                        </tr>
                        <tr>
                            <td class="text-center">
                                <select name="role" id="">
                                    <option value="user" @if( $user->role === 'user' ) selected @endif>一般社員</option>
                                    <option value="admin" @if( $user->role === 'admin' ) selected @endif>管理者</option>
                                </select>
                            </td>
                        </tr>
                    </tbody>
                </table>
                <button type="submit">更新</button>
                <button type="button" id="go-back" class="btn btn-secondary">戻る</button>
                {{-- <form action="{{ route('users.destroy', ['id' => $user->id]) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit">削除</button>
                </form> --}}
            </div>    
        </div>   
    </form>

@stop

@section('css')
@stop

@section('js')
    <script>
        document.getElementById('go-back').addEventListener('click', function() {
            window.history.back();
        });
    </script>
@stop
