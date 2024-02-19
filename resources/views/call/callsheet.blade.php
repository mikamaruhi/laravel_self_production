<!-- 受電履歴一覧 -->
@extends('adminlte::page')

@section('title', '受電履歴一覧')

@section('content_header')
    <h1>受電履歴一覧</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">受電履歴一覧</h3>
                    <div class="card-tools">
                            {{-- 検索バー --}}
                            <form action="{{ route('items.indexsearch') }}" method="POST" class="mb-3">
                                @csrf
                                <div class="form-group">
                                    <label for="result">結果検索</label>
                                    <select class="form-control" id="result" name="result" required>
                                        <option value="" disabled selected>こちらからお選びください</option>
                                        <option value="完了">完了</option>
                                        <option value="継続中">継続中</option>
                                        <option value="未対応">未対応</option>
                                    </select>
                                </div>
                                <button type="submit" class="btn btn-secondary">検索</button>
                            </form>
                            <div class="input-group input-group-sm">
                            <div class="input-group-append">
                                <a href="{{ url('items/register') }}" class="btn btn-default">受電登録</a>
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
                                <th>受電指名先</th>
                                <th>対応者</th>
                                <th>項目</th>
                                <th>内容</th>
                                <th>対応依頼</th>
                                <th>結果</th>
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
                                <td style="white-space: nowrap; overflow: hidden; text-overflow: ellipsis; max-width: 200px;">{{ $callHistory->content }}</td>
                                <td>{{ $callHistory->request_method }}</td>
                                <td>{{ $callHistory->result }}</td>
                                <td>{{ $callHistory->updated_at }}</td>
                                <td>
                                <!-- 詳細ページへ -->
                                    <a href="{{ url('/items/callchange/'.$callHistory->id)}}" class="button">>>詳細/更新</a>
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
{{ $callHistories->links('pagination::bootstrap-4') }}
@stop

@section('css')
@stop

@section('js')
@stop
