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
                <form method="POST">
                    @csrf
                        <!-- <div class="card-body">
                            <div class="form-group">
                                <label for="property_id">物件ID</label>
                                <input type="number" class="form-control" id="property_id" name="property_id" placeholder="物件ID">
                            </div> -->
                            <div class="form-group">
                                <label for="property_id">物件ID</label>
                                <input type="number" class="form-control" id="property_id" name="property_id" placeholder="物件ID" onchange="getPropertyInfo()">
                            </div>
                            <div class="form-group">
                                <label for="property_name">物件名</label>
                                <input type="text" class="form-control" id="property_name" name="property_name" readonly>
                            </div>
                            <!-- 物件IDを入れると物件名が自動表示される機能 -->
                            <!-- <script>
                                function getPropertyInfo() {
                                    var propertyId = document.getElementById("property_id").value;
                                    
                                    // Ajaxリクエストを送信
                                    var xhr = new XMLHttpRequest();
                                    xhr.onreadystatechange = function() {
                                        if (xhr.readyState === XMLHttpRequest.DONE) {
                                            if (xhr.status === 200) {
                                                var propertyInfo = JSON.parse(xhr.responseText);
                                                var propertyName = propertyInfo.name;
                                                document.getElementById("property_name").value = propertyName;
                                            } else {
                                                console.error("リクエストが失敗しました");
                                            }
                                        }
                                    };
                                    
                                    xhr.open("GET", "get_property_info.php?id=" + propertyId, true);
                                    xhr.send();
                                }
                            </script> -->



                            <div class="form-group">
                                <label for="receiver_assigned_to">受電指名先担当者</label>
                                <input type="text" class="form-control" id="receiver_assigned_to" name="receiver_assigned_to" placeholder="受電指名先担当者">
                            </div>
                            <div class="form-group">
                                <label for="handler">対応者</label>
                                <input type="text" class="form-control" id="handler" name="handler" placeholder="対応者">
                            </div>
                            <div class="form-group">
                                <label for="item">項目種別</label>
                                <select class="form-control" id="item" name="item">
                                    <option value="option">こちらからお選びください</option>
                                    <option value="option1">組合役員等</option>
                                    <option value="option2">一般組合員</option>
                                    <option value="option3">業者等</option>
                                    <option value="option4">行政機関</option>
                                    <option value="option5">社内</option>
                                    <option value="option6">営業関連</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="content">内容</label>
                                <textarea class="form-control" id="content" name="content" placeholder="内容"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="request_method">対応依頼</label>
                                <select class="form-control" id="request_method" name="request_method">
                                    <option value="option">こちらからお選びください</option>
                                    <option value="option1">報告のみ</option>
                                    <option value="option2">折り返しTEL要</option>
                                    <option value="option3">緊急TEL要</option>
                                </select>
                            </div> 
                    <!-- <div class="card-footer">
                        <button type="submit" class="btn btn-primary">登録</button>
                    </div> -->
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
