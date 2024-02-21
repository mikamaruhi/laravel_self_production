<!-- 物件一覧 -->
@extends('adminlte::page')

@section('title', '物件一覧')

@section('content_header')
    <h1>物件一覧</h1>
@stop

@php
use App\Models\User;
@endphp

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">物件一覧</h3>
                    <div class="card-tools">
                        {{-- 検索バー --}}
                        <form action="{{ route('property.search') }}" method="POST" class="mb-3">
                            @csrf
                            <div class="input-group">
                                <input type="text" name="keyword" class="form-control" placeholder="キーワードを入力してください">
                                <div class="input-group-append">
                                    <button type="submit" class="btn btn-secondary">検索</button>                                </div>
                            </div>
                        </form>
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
                                <td>{{ User::find($property->responsible_id)->name }}</td>
                                <td>{{ $property->responsible_name }}</td>
                                <td>{{ $property->accounting_person_name }}</td>
                                <td>
                                <!-- 詳細ページへ -->
                                <a href="{{ url('/items/detailproperty/'.$property->property_id)}}" class="button">>>詳細</a>
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
{{ $properties->links('pagination::bootstrap-4') }}


@stop

@section('css')
@stop

@section('js')
@stop
