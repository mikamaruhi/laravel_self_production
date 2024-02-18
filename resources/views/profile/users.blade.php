<!-- 物件一覧 -->
@extends('adminlte::page')

@section('title', '社員一覧')

@section('content_header')
    <h1>社員一覧</h1>
@stop

@php
use App\Models\User;1

@endphp

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">社員一覧</h3>
                    <div class="card-tools">
                        <div class="input-group input-group-sm">
                            <div class="input-group-append">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-body table-responsive p-0">
                    <table class="table table-hover text-nowrap">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>名前</th>
                                <th>部署</th>
                                <th>e-mail</th>
                                <th>権限</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach ($users as $user)
                            <tr>
                                <td>{{ $user->id }}</td>
                                <td>{{ $user->name }}</td>
                                <td>
                                    @if($user->department === 'department1')
                                        フロント
                                    @elseif($user->department === 'department2')
                                        営業
                                    @elseif($user->department === 'department3')
                                        組合会計
                                    @elseif($user->department === 'department4')
                                        総務
                                    @endif
                                </td>
                                <td>{{ $user->email }}</td>
                                <td>
                                    @if($user->role === 'user')
                                        一般社員
                                    @elseif($user->role === 'admin')
                                        管理者
                                    @endif
                                </td>


                                <td>
                                    <!-- 詳細ページへ -->
                                        <a href="{{ url('/edit/'.$user->id)}}" class="button">>>詳細</a>
                                    </td>
    
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- ページネーションの表示 -->
    {{ $users->links('pagination::bootstrap-4') }}

@stop

@section('css')

@stop

@section('js')
@stop
