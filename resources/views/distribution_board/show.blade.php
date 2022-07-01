
        @extends("layouts.app")
        @section("content")
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="panel panel-default">
                            <div class="panel-heading">distribution_board {{ $distribution_board->id }}</div>
                            <div class="panel-body">

                                <a href="{{ url("distribution_board") }}" title="Back"><button class="btn btn-warning btn-xs">Back</button></a>
                                <a href="{{ url("distribution_board") ."/". $distribution_board->id . "/edit" }}" title="Edit distribution_board"><button class="btn btn-primary btn-xs">Edit</button></a>
                                <form method="POST" action="/distribution_board/{{ $distribution_board->id }}" class="form-horizontal" style="display:inline;">
                                        {{ csrf_field() }}
                                        {{ method_field("delete") }}
                                        <button type="submit" class="btn btn-danger btn-xs" title="Delete User" onclick="return confirm('Confirm delete')">
                                        Delete
                                        </button>    
                            </form>
                            <br/>
                            <br/>
                            <div class="table-responsive">
                                <table class="table table-borderless">
                                    <tbody>
										<tr><th>id</th><td>{{$distribution_board->id}} </td></tr>
										<tr><th>investigation_id</th><td>{{$distribution_board->investigation_id}} </td></tr>
										<tr><th>category</th><td>{{$distribution_board->category}} </td></tr>
										<tr><th>target_circuit</th><td>{{$distribution_board->target_circuit}} </td></tr>
										<tr><th>supply_range</th><td>{{$distribution_board->supply_range}} </td></tr>
										<tr><th>special_report</th><td>{{$distribution_board->special_report}} </td></tr>
										<tr><th>carry_route_movie</th><td>{{$distribution_board->carry_route_movie}} </td></tr>
										<tr><th>memo</th><td>{{$distribution_board->memo}} </td></tr>
										<tr><th>is_update_proposal</th><td>{{$distribution_board->is_update_proposal}} </td></tr>
										<tr><th>aged_rank_exterior_picture</th><td>{{$distribution_board->aged_rank_exterior_picture}} </td></tr>
										<tr><th>aged_rank_exterior_picture_comment</th><td>{{$distribution_board->aged_rank_exterior_picture_comment}} </td></tr>
										<tr><th>target_repair_picture</th><td>{{$distribution_board->target_repair_picture}} </td></tr>
										<tr><th>installation_location</th><td>{{$distribution_board->installation_location}} </td></tr>
										<tr><th>change_method</th><td>{{$distribution_board->change_method}} </td></tr>
										<tr><th>power_outage_range</th><td>{{$distribution_board->power_outage_range}} </td></tr>
										<tr><th>remark</th><td>{{$distribution_board->remark}} </td></tr>
										<tr><th>property_id</th><td>{{$distribution_board->property_id}} </td></tr>
										<tr><th>name_plate</th><td>{{$distribution_board->name_plate}} </td></tr>
										<tr><th>electric_meter</th><td>{{$distribution_board->electric_meter}} </td></tr>
										<tr><th>is_high_voltage_power_reception</th><td>{{$distribution_board->is_high_voltage_power_reception}} </td></tr>
										<tr><th>is_power_contract</th><td>{{$distribution_board->is_power_contract}} </td></tr>
										<tr><th>cost_reduction_1</th><td>{{$distribution_board->cost_reduction_1}} </td></tr>
										<tr><th>cost_reduction_picture_1</th><td>{{$distribution_board->cost_reduction_picture_1}} </td></tr>
										<tr><th>cost_reduction_comment_1</th><td>{{$distribution_board->cost_reduction_comment_1}} </td></tr>
										<tr><th>cost_reduction_2</th><td>{{$distribution_board->cost_reduction_2}} </td></tr>
										<tr><th>cost_reduction_picture_2</th><td>{{$distribution_board->cost_reduction_picture_2}} </td></tr>
										<tr><th>cost_reduction_comment_2</th><td>{{$distribution_board->cost_reduction_comment_2}} </td></tr>
										<tr><th>is_renewal_board</th><td>{{$distribution_board->is_renewal_board}} </td></tr>
										<tr><th>property_id</th><td>{{$distribution_board->property_id}} </td></tr>
										<tr><th>name_plate</th><td>{{$distribution_board->name_plate}} </td></tr>
										<tr><th>electric_meter</th><td>{{$distribution_board->electric_meter}} </td></tr>
										<tr><th>is_high_voltage_power_reception</th><td>{{$distribution_board->is_high_voltage_power_reception}} </td></tr>
										<tr><th>is_power_contract</th><td>{{$distribution_board->is_power_contract}} </td></tr>
										<tr><th>cost_reduction_1</th><td>{{$distribution_board->cost_reduction_1}} </td></tr>
										<tr><th>cost_reduction_picture_1</th><td>{{$distribution_board->cost_reduction_picture_1}} </td></tr>
										<tr><th>cost_reduction_comment_1</th><td>{{$distribution_board->cost_reduction_comment_1}} </td></tr>
										<tr><th>cost_reduction_2</th><td>{{$distribution_board->cost_reduction_2}} </td></tr>
										<tr><th>cost_reduction_picture_2</th><td>{{$distribution_board->cost_reduction_picture_2}} </td></tr>
										<tr><th>cost_reduction_comment_2</th><td>{{$distribution_board->cost_reduction_comment_2}} </td></tr>
										<tr><th>is_renewal_board</th><td>{{$distribution_board->is_renewal_board}} </td></tr>

                                        </tbody>
                                    </table>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endsection
    