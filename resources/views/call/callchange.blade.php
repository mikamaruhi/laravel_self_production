<!-- 受電詳細ページがはいる まだつくってない -->
@extends('adminlte::page')

@section('title', '受電詳細')

@section('content_header')
    <h1>受電詳細</h1>
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
                        <th scope="col" class="table-primary">ID</th>
                    </tr>
                    <tr>
                        <td class="text-center ">{{ $callHistory->property_id }}</td>
                    </tr>
                    <tr>
                        <th scope="col" class="table-primary">物件名</th>
                    </tr>
                    <tr>
                        <td class="text-center">{{ $callHistory->property_name }}</td>
                    </tr>
                    <tr>
                        <th scope="col" class="table-primary">フロント担当</th>
                    </tr>
                    <tr>
                        <td class="text-center">{{ receiver_assigned_to }}</td>
                    </tr>
                    <tr>
                        <th scope="col" class="table-primary">対応者</th>
                    </tr>
                    <tr>
                        <td class="text-center">{{ handler }}</td>
                    </tr>
                    <tr>
                        <th scope="col" class="table-primary">項目</th>
                    </tr>
                    <tr>
                        <td class="text-center">{{ item }}</td>
                    </tr>
                    <tr>
                        <th scope="col" class="table-primary">内容</th>
                    </tr>
                    <tr>
                        <td class="text-center">{{ content }}</td>
                    </tr>
                    <tr>
                    <th scope="col" class="table-primary">対応依頼</th>
                    </tr>
                    <tr>
                        <td class="text-center ">{{ request_method }}</td>
                    </tr>
                    <tr>
                    <th scope="col" class="table-primary">更新日</th>
                    </tr>
                    <tr>
                        <td class="text-center ">{{ updated_at }}</td>
                    </tr>


                </tbody>
            </table>
        <button type="button" id="go-back" class="btn btn-primary">戻る</button>
        </div>    
    </div>    



@stop

@section('css')
@stop

@section('js')
@stop
