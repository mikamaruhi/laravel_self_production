<!-- 物件登録画面 -->

@extends('adminlte::page')

@section('content_header')
    <h1>物件登録</h1>
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
            <form action="{{ url('items/propertyaddregister') }}" method="POST">
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
                    <label for="responsible_id">フロント担当者名</label>
                    <select class="form-control" id="responsible_id" name="responsible_id" required>
                        <option value="">選択してください</option>
                        @foreach($users as $user)
                            <option value="{{ $user->id }}">{{ $user->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="responsible_name">オペレーター担当</label>
                    <input type="text" class="form-control" id="responsible_name" name="responsible_name" placeholder="オペレーター担当" required>
                </div>
                <div class="form-group">
                    <label for="accounting_person_name">振替日</label>
                    <select class="form-control" id="accounting_person_name" name="accounting_person_name" required>
                        <option value="" disabled selected>こちらからお選びください</option>
                        <option value="当月請求27日振替">当月請求27日振替</option>
                        <option value="翌月請求27日振替">翌月請求27日振替</option>
                        <option value="6日振替">6日振替</option>
                    </select>
                </div>
                <div class="card-footer">
                    <div class="d-flex justify-content-between">
                        <button type="submit" class="btn btn-primary">登録</button>
                        <a href='/items/propertysheet' class="btn btn-default">物件一覧へ戻る</a>
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
