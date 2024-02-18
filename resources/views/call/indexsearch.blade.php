<!-- 受電履歴一覧 -->
@extends('adminlte::page')

@section('title', '受電履歴一覧')

@section('content_header')
    <h1>検索結果</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">受電履歴※検索結果※</h3>
                </div>
                <div class="card-body table-responsive p-0">
                    <table class="table table-hover text-nowrap">
                        <thead>
                            <tr>
                                <th>物件ID</th>
                                <th>物件名</th>
                                <th>受電指名先担当者</th>
                                <th>対応者</th>
                                <th>項目</th>
                                <th>内容</th>
                                <th>対応依頼</th>
                                <th>更新日</th>

                            </tr>
                        </thead>
                        <tbody>
                        @foreach ($callHistories as $callHistory)
                            <tr>
                                <td>{{ $callHistory->property_id }}</td>
                                <td>{{ $callHistory->property_name }}</td>
                                <td>{{ $callHistory->receiver_assigned_to }}</td>
                                <td>{{ $callHistory->handler }}</td>
                                <td>{{ $callHistory->item }}</td>
                                <td>{{ $callHistory->content }}</td>
                                <td>{{ $callHistory->request_method }}</td>
                                <td>{{ $callHistory->updated_at }}</td>
                                <td>
                                <!-- 編集ボタン -->
                                    <a href="{{ url('/items/callchange/'.$callHistory->property_id)}}" class="button">>>詳細</a>
                                </td>

                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@stop

@section('css')
@stop

@section('js')
@stop
