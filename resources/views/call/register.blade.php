<!-- 受電登録画面 -->
@extends('adminlte::page')

@section('title', '受電登録')

@section('content_header')
    <h1>受電登録</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-md-10">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                       @foreach ($errors->all() as $error)
                          <li>{{ $error }}</li>
                       @endforeach
                    </ul>
                </div>
            @endif

            <div class="card card-primary">
            <form action="{{ url('items/callregister') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="property_id">物件ID</label>
                    <input type="number" class="form-control" id="property_id" name="property_id" placeholder="物件ID" required>
                </div>
                <div class="form-group">
                    <label for="property_name">物件名</label>
                    <input type="text" class="form-control" id="property_name" name="property_name" required>
                </div>
                <div class="form-group">
                    <label for="receiver_assigned_to">受電指名先担当者</label>
                    <input type="text" class="form-control" id="receiver_assigned_to" name="receiver_assigned_to" placeholder="受電指名先担当者" required>
                </div>
                <!-- <div class="form-group">
                    <label for="responsible_id">フロント担当者名</label>
                    <select class="form-control" id="responsible_id" name="responsible_id" required>
                        <option value="">選択してください</option>
                        @foreach($users as $user)
                            <option value="{{ $user->id }}">{{ $user->name }}</option>
                        @endforeach
                    </select>
                </div> -->

                <div class="form-group">
                    <label for="handler">対応者</label>
                    <input type="text" class="form-control" id="handler" name="handler" placeholder="対応者" required>
                </div>
                <div class="form-group">
                    <label for="item">項目種別</label>
                    <select class="form-control" id="item" name="item" required>
                        <option value="" disabled selected>こちらからお選びください</option>
                        <option value="組合役員等">組合役員等</option>
                        <option value="一般組合員">一般組合員</option>
                        <option value="業者等">業者等</option>
                        <option value="行政機関">行政機関</option>
                        <option value="社内">社内</option>
                        <option value="営業関連">営業関連</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="content">内容</label>
                    <textarea class="form-control" id="content" name="content" placeholder="内容" required></textarea>
                </div>
                <div class="form-group">
                    <label for="request_method">対応依頼</label>
                    <select class="form-control" id="request_method" name="request_method" required>
                        <option value="" disabled selected>こちらからお選びください</option>
                        <option value="報告のみ">報告のみ</option>
                        <option value="折り返しTEL要">折り返しTEL要</option>
                        <option value="緊急TEL要">緊急TEL要</option>
                    </select>
                </div>
                <div class="card-footer">
                    <div class="d-flex justify-content-between">
                        <button type="submit" class="btn btn-primary">登録</button>
                        <a href='/items' class="btn btn-default">受電履歴一覧へ戻る</a>
                    </div>
                </div>
            </form>
            </div>
        </div>
    </div>
@stop

@section('css')
@stop

@section('js')
@stop
