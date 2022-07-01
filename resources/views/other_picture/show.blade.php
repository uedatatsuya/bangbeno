
        @extends("layouts.app")
        @section("content")
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="panel panel-default">
                            <div class="panel-heading">other_picture {{ $other_picture->id }}</div>
                            <div class="panel-body">

                                <a href="{{ url("other_picture") }}" title="Back"><button class="btn btn-warning btn-xs">Back</button></a>
                                <a href="{{ url("other_picture") ."/". $other_picture->id . "/edit" }}" title="Edit other_picture"><button class="btn btn-primary btn-xs">Edit</button></a>
                                <form method="POST" action="/other_picture/{{ $other_picture->id }}" class="form-horizontal" style="display:inline;">
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
										<tr><th>id</th><td>{{$other_picture->id}} </td></tr>
										<tr><th>distribution_board_id</th><td>{{$other_picture->distribution_board_id}} </td></tr>
										<tr><th>path</th><td>{{$other_picture->path}} </td></tr>
										<tr><th>memo</th><td>{{$other_picture->memo}} </td></tr>
										<tr><th>investigation_id</th><td>{{$other_picture->investigation_id}} </td></tr>
										<tr><th>category</th><td>{{$other_picture->category}} </td></tr>
										<tr><th>target_circuit</th><td>{{$other_picture->target_circuit}} </td></tr>
										<tr><th>supply_range</th><td>{{$other_picture->supply_range}} </td></tr>
										<tr><th>special_report</th><td>{{$other_picture->special_report}} </td></tr>
										<tr><th>carry_route_movie</th><td>{{$other_picture->carry_route_movie}} </td></tr>
										<tr><th>memo</th><td>{{$other_picture->memo}} </td></tr>
										<tr><th>is_update_proposal</th><td>{{$other_picture->is_update_proposal}} </td></tr>
										<tr><th>aged_rank_exterior_picture</th><td>{{$other_picture->aged_rank_exterior_picture}} </td></tr>
										<tr><th>aged_rank_exterior_picture_comment</th><td>{{$other_picture->aged_rank_exterior_picture_comment}} </td></tr>
										<tr><th>target_repair_picture</th><td>{{$other_picture->target_repair_picture}} </td></tr>
										<tr><th>installation_location</th><td>{{$other_picture->installation_location}} </td></tr>
										<tr><th>change_method</th><td>{{$other_picture->change_method}} </td></tr>
										<tr><th>power_outage_range</th><td>{{$other_picture->power_outage_range}} </td></tr>
										<tr><th>remark</th><td>{{$other_picture->remark}} </td></tr>

                                        </tbody>
                                    </table>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endsection
    