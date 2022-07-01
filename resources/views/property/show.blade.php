
        @extends("layouts.app")
        @section("content")
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="panel panel-default">
                            <div class="panel-heading">propertie {{ $propertie->id }}</div>
                            <div class="panel-body">

                                <a href="{{ url("propertie") }}" title="Back"><button class="btn btn-warning btn-xs">Back</button></a>
                                <a href="{{ url("propertie") ."/". $propertie->id . "/edit" }}" title="Edit propertie"><button class="btn btn-primary btn-xs">Edit</button></a>
                                <form method="POST" action="/propertie/{{ $propertie->id }}" class="form-horizontal" style="display:inline;">
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
										<tr><th>id</th><td>{{$propertie->id}} </td></tr>
										<tr><th>sfa_id</th><td>{{$propertie->sfa_id}} </td></tr>
										<tr><th>name</th><td>{{$propertie->name}} </td></tr>
										<tr><th>address</th><td>{{$propertie->address}} </td></tr>
										<tr><th>completion_date</th><td>{{$propertie->completion_date}} </td></tr>
										<tr><th>unit</th><td>{{$propertie->unit}} </td></tr>
										<tr><th>agency</th><td>{{$propertie->agency}} </td></tr>
										<tr><th>visit_date</th><td>{{$propertie->visit_date}} </td></tr>
										<tr><th>client</th><td>{{$propertie->client}} </td></tr>
										<tr><th> department_id</th><td>{{$propertie-> department_id}} </td></tr>
										<tr><th>user_id</th><td>{{$propertie->user_id}} </td></tr>
										<tr><th>investigation_user_id</th><td>{{$propertie->investigation_user_id}} </td></tr>
										<tr><th>investigation_partner_company_id</th><td>{{$propertie->investigation_partner_company_id}} </td></tr>
										<tr><th>estimate1_partner_company_id</th><td>{{$propertie->estimate1_partner_company_id}} </td></tr>
										<tr><th>estimate2_partner_company_id</th><td>{{$propertie->estimate2_partner_company_id}} </td></tr>
										<tr><th>estimate_date</th><td>{{$propertie->estimate_date}} </td></tr>
										<tr><th>estimate_request_date</th><td>{{$propertie->estimate_request_date}} </td></tr>
										<tr><th>estimate_submit_deadline_date</th><td>{{$propertie->estimate_submit_deadline_date}} </td></tr>
										<tr><th>estimate_money</th><td>{{$propertie->estimate_money}} </td></tr>
										<tr><th>aged_rank</th><td>{{$propertie->aged_rank}} </td></tr>
										<tr><th>aged_rank_comment</th><td>{{$propertie->aged_rank_comment}} </td></tr>
										<tr><th> degradation_rank</th><td>{{$propertie-> degradation_rank}} </td></tr>
										<tr><th>degradation_rank_comment</th><td>{{$propertie->degradation_rank_comment}} </td></tr>
										<tr><th>improvement_rank</th><td>{{$propertie->improvement_rank}} </td></tr>
										<tr><th>improvement_rank_comment</th><td>{{$propertie->improvement_rank_comment}} </td></tr>
										<tr><th>cost_reduction_rank</th><td>{{$propertie->cost_reduction_rank}} </td></tr>
										<tr><th>cost_reduction_rank_comment</th><td>{{$propertie->cost_reduction_rank_comment}} </td></tr>

                                        </tbody>
                                    </table>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endsection
    