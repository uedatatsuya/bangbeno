@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">協力会社</div>
                    <div class="panel-body">


                        <a href="{{ url('partner_company/create') }}" class="btn btn-success btn-sm my-2"
                            title="Add New partner_companie">
                            新規登録
                        </a>

                        <form method="GET" action="{{ url('partner_company') }}" accept-charset="UTF-8"
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
                                    @foreach ($partner_companie as $item)
                                        <tr>

                                            <td>{{ $item->id }} </td>

                                            <td>{{ $item->name }} </td>

                                            {{-- <td><a href="{{ url("/partner_company/" . $item->id) }}" title="View partner_companie"><button class="btn btn-info btn-xs">View</button></a></td> --}}
                                            <td>
                                                <a href="{{ url('/partner_company/' . $item->id . '/edit') }}"
                                                    title="Edit partner_companie"><button
                                                        class="btn btn-primary btn-xs">編集</button></a>
                                            </td>
                                            <td>
                                                <form method="POST"
                                                    action="{{ route('partner_company.destroy', $item->id) }}"
                                                    class="form-horizontal" style="display:inline;">
                                                    {{ csrf_field() }}

                                                    {{ method_field('DELETE') }}
                                                    <button type="submit" class="btn btn-danger btn-xs" title="Delete User"
                                                        onclick="return confirm('Confirm delete')">
                                                        削除
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <div class="pagination-wrapper"> {!! $partner_companie->appends(['search' => Request::get('search')])->render() !!} </div>
                        </div>


                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
