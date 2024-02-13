<!-- 物件一覧 -->
@extends('adminlte::page')

@section('title', '物件一覧')

@section('content_header')
    <h1>物件一覧</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">物件一覧</h3>
                    <div class="card-tools">
                        <div class="input-group input-group-sm">
                            <div class="input-group-append">
                                <a href="{{ url('items/propertyregister') }}" class="btn btn-default">物件登録</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-body table-responsive p-0">
                    <table class="table table-hover text-nowrap">
                        <thead>
                            <tr>
                                <th>物件ID</th>
                                <th>物件名</th>
                                <th>フロント担当</th>
                                <th>オペレーター担当</th>
                                <th>振替日</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach ($properties as $property)
                            <tr>
                                <td>{{ $property->property_id }}</td>
                                <td>{{ $property->property_name }}</td>
                                <td>{{ $property->responsible_id }}</td>
                                <td>{{ $property->responsible_name }}</td>
                                <td>{{ $property->accounting_person_name }}</td>
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
