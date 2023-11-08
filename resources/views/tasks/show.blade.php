@extends("layouts.app")
@section("content")
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    詳細画面
                </div>
                <div class="card-body">
                    <table class="table">
                        <tbody>
                            <tr>
                                <th>タスクNo.</th>
                                <td>{{$todo->id}}</td>
                            </tr>
                            <tr>
                                <th>タスク名</th>
                                <td>{{$todo->title}}</td>
                            </tr>
                        </tbody>
                    </table>
                    <a href="{{ url('todos') }}" class="btn btn-info">戻る</a>
                </div>
            </div>
        </div>
    </div>
@endsection