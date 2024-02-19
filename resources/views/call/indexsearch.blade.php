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
                                <th>結果</th>
                                <th>更新日</th>

                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($records as $record)
                            <tr>
                                <td>{{ $record->property_id }}</td>
                                <td>{{ $record->property_name }}</td>
                                <td>{{ $record->receiver_assigned_to }}</td>
                                <td>{{ $record->handler }}</td>
                                <td>{{ $record->item }}</td>
                                <td style="white-space: nowrap; overflow: hidden; text-overflow: ellipsis; max-width: 200px;">{{ $record->content }}</td>
                                <td>{{ $record->request_method }}</td>
                                <td>{{ $record->result }}</td>
                                <td>{{ $record->updated_at }}</td>
                                 <!-- 詳細ページへ -->
                                <td>
                                    <a href="{{ url('/items/callchange/'.$record->id)}}" class="button">>>詳細</a>
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
