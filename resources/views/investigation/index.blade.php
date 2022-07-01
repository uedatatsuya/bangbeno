@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">investigation</div>
                    <div class="panel-body">


                        <a href="{{ url('investigation/create') }}" class="btn btn-success btn-sm"
                            title="Add New investigation">
                            Add New
                        </a>

                        <form method="GET" action="{{ url('investigation') }}" accept-charset="UTF-8"
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
                                        <th>property_id</th>
                                        <th>name_plate</th>
                                        <th>electric_meter</th>
                                        <th>is_high_voltage_power_reception</th>
                                        <th>is_power_contract</th>
                                        <th>cost_reduction_1</th>
                                        <th>cost_reduction_picture_1</th>
                                        <th>cost_reduction_comment_1</th>
                                        <th>cost_reduction_2</th>
                                        <th>cost_reduction_picture_2</th>
                                        <th>cost_reduction_comment_2</th>
                                        <th>is_renewal_board</th>
                                        {{-- <th>sfa_id</th> --}}
                                        {{-- <th>name</th>
                                        <th>address</th>
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
                                        <th>estimate_money</th>
                                        <th>aged_rank</th>
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
                                    @foreach ($investigation as $item)
                                        <tr>

                                            <td>{{ $item->id }} </td>

                                            <td>{{ $item->property_id }} </td>

                                            <td>{{ $item->name_plate }} </td>

                                            <td>{{ $item->electric_meter }} </td>

                                            <td>{{ $item->is_high_voltage_power_reception }} </td>

                                            <td>{{ $item->is_power_contract }} </td>

                                            <td>{{ $item->cost_reduction_1 }} </td>

                                            <td>{{ $item->cost_reduction_picture_1 }} </td>

                                            <td>{{ $item->cost_reduction_comment_1 }} </td>

                                            <td>{{ $item->cost_reduction_2 }} </td>

                                            <td>{{ $item->cost_reduction_picture_2 }} </td>

                                            <td>{{ $item->cost_reduction_comment_2 }} </td>

                                            <td>{{ $item->is_renewal_board }} </td>

                                            {{-- <td>{{ $item->sfa_id}} </td> --}}

                                            {{-- <td>{{ $item->name }} </td>

                                            <td>{{ $item->address }} </td>

                                            <td>{{ $item->completion_date }} </td>

                                            <td>{{ $item->unit }} </td>

                                            <td>{{ $item->agency }} </td>

                                            <td>{{ $item->visit_date }} </td>

                                            <td>{{ $item->client }} </td>

                                            <td>{{ $item->department_id }} </td>

                                            <td>{{ $item->user_id }} </td>

                                            <td>{{ $item->investigation_user_id }} </td>

                                            <td>{{ $item->investigation_partner_company_id }} </td>

                                            <td>{{ $item->estimate1_partner_company_id }} </td>

                                            <td>{{ $item->estimate2_partner_company_id }} </td>

                                            <td>{{ $item->estimate_date }} </td>

                                            <td>{{ $item->estimate_request_date }} </td>

                                            <td>{{ $item->estimate_submit_deadline_date }} </td>

                                            <td>{{ $item->estimate_money }} </td>

                                            <td>{{ $item->aged_rank }} </td>

                                            <td>{{ $item->aged_rank_comment }} </td>

                                            <td>{{ $item->degradation_rank }} </td>

                                            <td>{{ $item->degradation_rank_comment }} </td>

                                            <td>{{ $item->improvement_rank }} </td>

                                            <td>{{ $item->improvement_rank_comment }} </td>

                                            <td>{{ $item->cost_reduction_rank }} </td>

                                            <td>{{ $item->cost_reduction_rank_comment }} </td> --}}

                                            <td><a href="{{ url('/investigation/' . $item->id) }}"
                                                    title="View investigation"><button
                                                        class="btn btn-info btn-xs">View</button></a></td>
                                            <td><a href="{{ url('/investigation/' . $item->id . '/edit') }}"
                                                    title="Edit investigation"><button
                                                        class="btn btn-primary btn-xs">Edit</button></a></td>
                                            <td>
                                                <form method="POST" action="/investigation/{{ $item->id }}"
                                                    class="form-horizontal" style="display:inline;">
                                                    {{ csrf_field() }}

                                                    {{ method_field('DELETE') }}
                                                    <button type="submit" class="btn btn-danger btn-xs" title="Delete User"
                                                        onclick="return confirm('Confirm delete')">
                                                        Delete
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <div class="pagination-wrapper"> {!! $investigation->appends(['search' => Request::get('search')])->render() !!} </div>
                        </div>


                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
