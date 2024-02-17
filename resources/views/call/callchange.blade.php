@extends('adminlte::page')

@section('title', '受電詳細')

@section('content_header')

@stop

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">受電詳細</h3>
                </div>
            </div>
        </div>
    </div>

    <div class="d-flex justify-content-center"> 
        <div class="d-flex flex-column align-items-start">  
            <table class="table" style="width: 500px;">
                <tbody >
                    <tr>
                        <th scope="col" class="table-secondary">ID</th>
                    </tr>
                    <tr>
                        <td class="text-center">{{ $callHistory->property_id }}</td>
                    </tr>
                    <tr>
                        <th scope="col" class="table-secondary">物件名</th>
                    </tr>
                    <tr>
                        <td class="text-center">{{ $callHistory->property_name }}</td>
                    </tr>
                    <tr>
                        <th scope="col" class="table-secondary">フロント担当</th>
                    </tr>
                    <tr>
                        <td class="text-center">{{ $callHistory->receiver_assigned_to }}</td>
                    </tr>
                    <tr>
                        <th scope="col" class="table-secondary">対応者</th>
                    </tr>
                    <tr>
                        <td class="text-center">{{ $callHistory->handler }}</td>
                    </tr>
                    <tr>
                        <th scope="col" class="table-secondary">項目</th>
                    </tr>
                    <tr>
                        <td class="text-center">{{ $callHistory->item }}</td>
                    </tr>
                    <tr>
                        <th scope="col" class="table-secondary">内容</th>
                    </tr>
                    <tr>
                        <td class="text-center">{{ $callHistory->content }}</td>
                    </tr>
                    <tr>
                        <th scope="col" class="table-secondary">対応依頼</th>
                    </tr>
                    <tr>
                        <td class="text-center">{{ $callHistory->request_method }}</td>
                    </tr>
                    <tr>
                        <th scope="col" class="table-secondary">更新日</th>
                    </tr>
                    <tr>
                        <td class="text-center">{{ $callHistory->updated_at }}</td>
                    </tr>
                </tbody>
            </table>
            <button type="button" id="go-back" class="btn btn-secondary">戻る</button>
        </div>    
    </div>    
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