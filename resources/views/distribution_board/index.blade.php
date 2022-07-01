@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">分電盤</div>
                    <div class="panel-body">

                        <a href="{{ route('distribution_board.create_investigation', $investigation_id) }}"
                            class="btn btn-success btn-sm my-2" title="Add New distribution_board">
                            新規追加
                        </a>

                        {{-- <form method="GET" action="{{ url('distribution_board') }}" accept-charset="UTF-8" class="navbar-form navbar-right" role="search">
                            <div class="input-group">
                                <input type="text" class="form-control" name="search" placeholder="Search...">
                                <span class="input-group-btn">
                                    <button class="btn btn-info" type="submit">
                                        <span>Search</span>
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
                                        <th>id</th>
                                        <!-- <th>investigation_id</th> -->
                                        <th>分電盤種類</th>
                                        {{-- <th>target_circuit</th>
                                        <th>supply_range</th>
                                        <th>special_report</th>
                                        <th>carry_route_movie</th>
                                        <th>memo</th>
                                        <th>is_update_proposal</th>
                                        <th>aged_rank_exterior_picture</th>
                                        <th>aged_rank_exterior_picture_comment</th>
                                        <th>target_repair_picture</th>
                                        <th>installation_location</th>
                                        <th>change_method</th>
                                        <th>power_outage_range</th>
                                        <th>remark</th>
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
                                        <th>is_renewal_board</th> --}}
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($distribution_board as $item)
                                        <tr>

                                            <td>{{ $item->id }} </td>
                                            <td>{{ config('const.categorys')[$item->category] ?? '' }} </td>

                                            {{-- <td>{{ $item->investigation_id }} </td>

                                    <td>{{ $item->target_circuit}} </td>

                                    <td>{{ $item->supply_range}} </td>

                                    <td>{{ $item->special_report}} </td>

                                    <td>{{ $item->carry_route_movie}} </td>

                                    <td>{{ $item->memo}} </td>

                                    <td>{{ $item->is_update_proposal}} </td>

                                    <td>{{ $item->aged_rank_exterior_picture}} </td>

                                    <td>{{ $item->aged_rank_exterior_picture_comment}} </td>

                                    <td>{{ $item->target_repair_picture}} </td>

                                    <td>{{ $item->installation_location}} </td>

                                    <td>{{ $item->change_method}} </td>

                                    <td>{{ $item->power_outage_range}} </td>

                                    <td>{{ $item->remark}} </td>

                                    <td>{{ $item->property_id}} </td>

                                    <td>{{ $item->name_plate}} </td>

                                    <td>{{ $item->electric_meter}} </td>

                                    <td>{{ $item->is_high_voltage_power_reception}} </td>

                                    <td>{{ $item->is_power_contract}} </td>

                                    <td>{{ $item->cost_reduction_1}} </td>

                                    <td>{{ $item->cost_reduction_picture_1}} </td>

                                    <td>{{ $item->cost_reduction_comment_1}} </td>

                                    <td>{{ $item->cost_reduction_2}} </td>

                                    <td>{{ $item->cost_reduction_picture_2}} </td>

                                    <td>{{ $item->cost_reduction_comment_2}} </td>

                                    <td>{{ $item->is_renewal_board}} </td>

                                    <td>{{ $item->property_id}} </td>

                                    <td>{{ $item->name_plate}} </td>

                                    <td>{{ $item->electric_meter}} </td>

                                    <td>{{ $item->is_high_voltage_power_reception}} </td>

                                    <td>{{ $item->is_power_contract}} </td>

                                    <td>{{ $item->cost_reduction_1}} </td>

                                    <td>{{ $item->cost_reduction_picture_1}} </td>

                                    <td>{{ $item->cost_reduction_comment_1}} </td>

                                    <td>{{ $item->cost_reduction_2}} </td>

                                    <td>{{ $item->cost_reduction_picture_2}} </td>

                                    <td>{{ $item->cost_reduction_comment_2}} </td>

                                    <td>{{ $item->is_renewal_board}} </td> --}}

                                            <td>
                                                <a href="{{ route('distribution_board.edit_investigation', $item->id) }}"
                                                    title="Edit distribution_board">
                                                    <button class="btn btn-primary btn-xs">編集</button>
                                                </a>
                                            </td>
                                            <td>
                                                <form method="POST" action="/distribution_board/{{ $item->id }}"
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
                            <div class="pagination-wrapper"> {!! $distribution_board->appends(['search' => Request::get('search')])->render() !!} </div>
                        </div>


                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
