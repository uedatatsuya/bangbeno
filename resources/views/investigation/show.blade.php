
        @extends("layouts.app")
        @section("content")
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="panel panel-default">
                            <div class="panel-heading">investigation {{ $investigation->id }}</div>
                            <div class="panel-body">

                                <a href="{{ url("investigation") }}" title="Back"><button class="btn btn-warning btn-xs">Back</button></a>
                                <a href="{{ url("investigation") ."/". $investigation->id . "/edit" }}" title="Edit investigation"><button class="btn btn-primary btn-xs">Edit</button></a>
                                <form method="POST" action="/investigation/{{ $investigation->id }}" class="form-horizontal" style="display:inline;">
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
										<tr><th>id</th><td>{{$investigation->id}} </td></tr>
										<tr><th>property_id</th><td>{{$investigation->property_id}} </td></tr>
										<tr><th>name_plate</th><td>{{$investigation->name_plate}} </td></tr>
										<tr><th>electric_meter</th><td>{{$investigation->electric_meter}} </td></tr>
										<tr><th>is_high_voltage_power_reception</th><td>{{$investigation->is_high_voltage_power_reception}} </td></tr>
										<tr><th>is_power_contract</th><td>{{$investigation->is_power_contract}} </td></tr>
										<tr><th>cost_reduction_1</th><td>{{$investigation->cost_reduction_1}} </td></tr>
										<tr><th>cost_reduction_picture_1</th><td>{{$investigation->cost_reduction_picture_1}} </td></tr>
										<tr><th>cost_reduction_comment_1</th><td>{{$investigation->cost_reduction_comment_1}} </td></tr>
										<tr><th>cost_reduction_2</th><td>{{$investigation->cost_reduction_2}} </td></tr>
										<tr><th>cost_reduction_picture_2</th><td>{{$investigation->cost_reduction_picture_2}} </td></tr>
										<tr><th>cost_reduction_comment_2</th><td>{{$investigation->cost_reduction_comment_2}} </td></tr>
										<tr><th>is_renewal_board</th><td>{{$investigation->is_renewal_board}} </td></tr>
										<tr><th>sfa_id</th><td>{{$investigation->sfa_id}} </td></tr>
										<tr><th>name</th><td>{{$investigation->name}} </td></tr>
										<tr><th>address</th><td>{{$investigation->address}} </td></tr>
										<tr><th>completion_date</th><td>{{$investigation->completion_date}} </td></tr>
										<tr><th>unit</th><td>{{$investigation->unit}} </td></tr>
										<tr><th>agency</th><td>{{$investigation->agency}} </td></tr>
										<tr><th>visit_date</th><td>{{$investigation->visit_date}} </td></tr>
										<tr><th>client</th><td>{{$investigation->client}} </td></tr>
										<tr><th> department_id</th><td>{{$investigation-> department_id}} </td></tr>
										<tr><th>user_id</th><td>{{$investigation->user_id}} </td></tr>
										<tr><th>investigation_user_id</th><td>{{$investigation->investigation_user_id}} </td></tr>
										<tr><th>investigation_partner_company_id</th><td>{{$investigation->investigation_partner_company_id}} </td></tr>
										<tr><th>estimate1_partner_company_id</th><td>{{$investigation->estimate1_partner_company_id}} </td></tr>
										<tr><th>estimate2_partner_company_id</th><td>{{$investigation->estimate2_partner_company_id}} </td></tr>
										<tr><th>estimate_date</th><td>{{$investigation->estimate_date}} </td></tr>
										<tr><th>estimate_request_date</th><td>{{$investigation->estimate_request_date}} </td></tr>
										<tr><th>estimate_submit_deadline_date</th><td>{{$investigation->estimate_submit_deadline_date}} </td></tr>
										<tr><th>estimate_money</th><td>{{$investigation->estimate_money}} </td></tr>
										<tr><th>aged_rank</th><td>{{$investigation->aged_rank}} </td></tr>
										<tr><th>aged_rank_comment</th><td>{{$investigation->aged_rank_comment}} </td></tr>
										<tr><th> degradation_rank</th><td>{{$investigation-> degradation_rank}} </td></tr>
										<tr><th>degradation_rank_comment</th><td>{{$investigation->degradation_rank_comment}} </td></tr>
										<tr><th>improvement_rank</th><td>{{$investigation->improvement_rank}} </td></tr>
										<tr><th>improvement_rank_comment</th><td>{{$investigation->improvement_rank_comment}} </td></tr>
										<tr><th>cost_reduction_rank</th><td>{{$investigation->cost_reduction_rank}} </td></tr>
										<tr><th>cost_reduction_rank_comment</th><td>{{$investigation->cost_reduction_rank_comment}} </td></tr>

                                        </tbody>
                                    </table>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endsection
    