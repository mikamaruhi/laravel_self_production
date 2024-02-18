@extends('adminlte::page')

@section('title', '物件詳細')

@section('content_header')

@stop

@php
use App\Models\User;
@endphp

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">物件詳細</h3>
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
                        <td class="text-center">{{ $property->property_id }}</td>
                    </tr>
                    <tr>
                        <th scope="col" class="table-secondary">物件名</th>
                    </tr>
                    <tr>
                        <td class="text-center">{{ $property->property_name }}</td>
                    </tr>
                    <tr>
                        <th scope="col" class="table-secondary">フロント担当</th>
                    </tr>
                    <tr>
                        <td class="text-center">{{  User::find($property->responsible_id)->name  }}</td>
                    </tr>
                    <tr>
                        <th scope="col" class="table-secondary">オペレーター担当</th>
                    </tr>
                    <tr>
                        <td class="text-center">{{ $property->responsible_name }}</td>
                    </tr>
                    <tr>
                        <th scope="col" class="table-secondary">振替日</th>
                    </tr>
                    <tr>
                        <td class="text-center">{{ $property->accounting_person_name }}</td>
                    </tr>
                </tbody>
            </table>
            <button type="button" id="go-back" class="btn btn-secondary">戻る</button>
            <!-- 削除ボタン -->
            {{-- <form action="{{ route('call.destroy', $callHistory->id) }}" method="POST"> --}}
                @csrf
                @method('DELETE')
                <button type="submit">削除</button>
            </form>
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