@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">物件</div>
                    <div class="panel-body">


                        <a href="{{ url('property/create') }}" class="btn btn-success btn-sm my-2" title="Add New propertie">
                            新規登録
                        </a>

                        <form method="GET" action="{{ url('property') }}" accept-charset="UTF-8"
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
                                        <th>セールスフォースID</th>
                                        <th>物件名</th>
                                        {{-- <th>address</th>
                                        <th>completion_date</th>
                                        <th>unit</th>
                                        <th>agency</th>
                                        <th>visit_date</th>
                                        <th>client</th>
                                        <th> department_id</th>
                                        <th>user_id</th>
                                        <th>investigation_user_id</th>
                                        <th>investigation_partner_company_id</th>
                                        <th>estimate1_partner_company_id</th>
                                        <th>estimate2_partner_company_id</th>
                                        <th>estimate_date</th>
                                        <th>estimate_request_date</th>
                                        <th>estimate_submit_deadline_date</th>
                                        <th>estimate_money</th> --}}
                                        {{-- <th>aged_rank</th>
                                        <th>aged_rank_comment</th>
                                        <th> degradation_rank</th>
                                        <th>degradation_rank_comment</th>
                                        <th>improvement_rank</th>
                                        <th>improvement_rank_comment</th>
                                        <th>cost_reduction_rank</th>
                                        <th>cost_reduction_rank_comment</th> --}}
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($propertie as $item)
                                        <tr>

                                            <td>{{ $item->id }} </td>

                                            <td>{{ $item->sfa_id }} </td>

                                            <td>{{ $item->name }} </td>

                                            {{-- <td>{{ $item->address }} </td>

                                            <td>{{ $item->completion_date }} </td>

                                            <td>{{ $item->unit }} </td>

                                            <td>{{ $item->agency }} </td>

                                            <td>{{ $item->visit_date }} </td>

                                            <td>{{ $item->client }} </td>

                                            <td>{{ $item->department_id ?? '' }} </td>

                                            <td>{{ $item->user_id }} </td>

                                            <td>{{ $item->investigation_user_id }} </td>

                                            <td>{{ $item->investigation_partner_company_id }} </td>

                                            <td>{{ $item->estimate1_partner_company_id }} </td>

                                            <td>{{ $item->estimate2_partner_company_id }} </td>

                                            <td>{{ $item->estimate_date }} </td>

                                            <td>{{ $item->estimate_request_date }} </td>

                                            <td>{{ $item->estimate_submit_deadline_date }} </td>

                                            <td>{{ $item->estimate_money }} </td> --}}

                                            {{-- <td>{{ $item->aged_rank }} </td>

                                            <td>{{ $item->aged_rank_comment }} </td>

                                            <td>{{ $item->degradation_rank }} </td>

                                            <td>{{ $item->degradation_rank_comment }} </td>

                                            <td>{{ $item->improvement_rank }} </td>

                                            <td>{{ $item->improvement_rank_comment }} </td>

                                            <td>{{ $item->cost_reduction_rank }} </td>

                                            <td>{{ $item->cost_reduction_rank_comment }} </td> --}}

                                            {{-- <td><a href="{{ url('/property/' . $item->id) }}"
                                                    title="View propertie"><button
                                                        class="btn btn-info btn-xs">View</button></a></td> --}}
                                            <td>
                                                <a href="{{ url('/property/' . $item->id . '/edit') }}"
                                                    title="Edit propertie"><button
                                                        class="btn btn-primary btn-xs">編集</button>
                                                </a>
                                            </td>
                                            <td>
                                                <a href="{{ url('/investigation/' . $item->id . '/menu') }}"
                                                    title="Edit questionnaire_score">
                                                    <button class="btn btn-primary btn-xs">調査</button>
                                                </a>
                                                {{-- <a href="{{ url('/investigation/' . $item->id . '/edit') }}"
                                                    title="Edit questionnaire_score">
                                                    <button class="btn btn-primary btn-xs">調査</button>
                                                </a> --}}
                                            </td>
                                            <td>
                                                <form method="POST" action="{{ route('property.destroy', $item->id) }} "
                                                    class="form-horizontal" style="display:inline;">
                                                    {{ csrf_field() }}

                                                    {{ method_field('DELETE') }}
                                                    <button type="submit" class="btn btn-danger btn-xs" title="Delete User"
                                                        onclick="return confirm('削除しますか')">
                                                        削除
                                                    </button>
                                                </form>
                                            </td>


                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <div class="pagination-wrapper"> {!! $propertie->appends(['search' => Request::get('search')])->render() !!} </div>
                        </div>


                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- <div id="app">
        <example-component></example-component>
        <example-component2></example-component2>
    </div> --}}
@endsection
