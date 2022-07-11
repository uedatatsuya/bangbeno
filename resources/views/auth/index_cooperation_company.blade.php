@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">ユーザーマスタ</div>
                <div class="panel-body">


                    <a href="{{ route('register') }}" class="btn btn-success btn-sm" title="">
                        新規追加
                    </a>

                    {{-- <form method="GET" action="{{ url("auth.index") }}" accept-charset="UTF-8" class="navbar-form navbar-right" role="search">
                    <div class="input-group">
                        <input type="text" class="form-control" name="search" placeholder="Search...">
                        <span class="input-group-btn">
                            <button class="btn btn-info" type="submit">
                                <span>検索</span>
                            </button>
                        </span>
                    </div>
                    </form> --}}


                    <br />
                    <br />

                    <div class="table-responsive">
                        <table class="table table-borderless">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>ユーザーID</th>

                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($user as $item)
                                <tr>

                                    <td>{{ $item->id }} </td>

                                    <td>{{ $item->name }} </td>

                                    <td><a href="{{ route('register.edit', ['id' => $item->id]) }}" title="Edit user"><button class="btn btn-primary btn-xs">編集</button></a>
                                    </td>
                                    <td>
                                        <form method="POST" action="/Auth/{{ $item->id }}" class="form-horizontal" style="display:inline;">
                                            {{ csrf_field() }}

                                            {{ method_field('DELETE') }}
                                            <button type="submit" class="btn btn-danger btn-xs" title="Delete User" onclick="return confirm('Confirm delete')">
                                                削除
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <div class="pagination-wrapper"> {!! $user->appends(['search' => Request::get('search')])->render() !!} </div>
                    </div>


                </div>
            </div>
        </div>
    </div>
</div>
@endsection