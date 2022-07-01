@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">営業所</div>
                    <div class="panel-body">


                        <a href="{{ url('sales_office/create') }}" class="btn btn-success btn-sm my-2"
                            title="Add New sales_office">
                            新規追加
                        </a>

                        <form method="GET" action="{{ url('sales_office') }}" accept-charset="UTF-8"
                            class="navbar-form navbar-right" role="search">
                            <div class="input-group">
                                <input type="text" class="form-control" name="search" placeholder="Search...">
                                <span class="input-group-btn">
                                    <button class="btn btn-info" type="submit">
                                        <span>Search</span>
                                    </button>
                                </span>
                            </div>
                        </form>


                        <br />
                        <br />


                        <div class="table-responsive">
                            <table class="table table-borderless">
                                <thead>
                                    <tr>
                                        <th>id</th>
                                        <th>名前</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($sales_office as $item)
                                        <tr>

                                            <td>{{ $item->id }} </td>

                                            <td>{{ $item->name }} </td>



                                            {{-- <td><a href="{{ url("/sales_office/" . $item->id) }}" title="View sales_office"><button class="btn btn-info btn-xs">View</button></a></td> --}}
                                            <td>
                                                <a href="{{ url('/sales_office/' . $item->id . '/edit') }}"
                                                    title="Edit sales_office">
                                                    <button class="btn btn-primary btn-xs">編集</button></a>
                                            </td>
                                            <td>
                                                <form method="POST"
                                                    action="{{ route('sales_office.destroy', $item->id) }}"
                                                    class="form-horizontal" style="display:inline;">
                                                    {{ csrf_field() }}

                                                    {{ method_field('DELETE') }}
                                                    <button type="submit" class="btn btn-danger btn-xs" title="Delete User"
                                                        onclick="return confirm('削除していいですか')">
                                                        削除
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <div class="pagination-wrapper"> {!! $sales_office->appends(['search' => Request::get('search')])->render() !!} </div>
                        </div>


                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
