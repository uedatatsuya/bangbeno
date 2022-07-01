
        @extends("layouts.app")
        @section("content")
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="panel panel-default">
                            <div class="panel-heading">measuring_picture</div>
                            <div class="panel-body">
                            
                            
                                <a href="{{ url("measuring_picture/create") }}" class="btn btn-success btn-sm" title="Add New measuring_picture">
                                    Add New
                                </a>

                                <form method="GET" action="{{ url("measuring_picture") }}" accept-charset="UTF-8" class="navbar-form navbar-right" role="search">
                                    <div class="input-group">
                                        <input type="text" class="form-control" name="search" placeholder="Search...">
                                        <span class="input-group-btn">
                                            <button class="btn btn-info" type="submit">
                                                <span>Search</span>
                                            </button>
                                        </span>
                                    </div>
                                </form>


                                <br/>
                                <br/>
                                
                                
                                <div class="table-responsive">
                                    <table class="table table-borderless">
                                        <thead>
                                            <tr><th>id</th><th>distribution_board_id</th><th>path</th><th>width</th><th>height</th><th>investigation_id</th><th>category</th><th>target_circuit</th><th>supply_range</th><th>special_report</th><th>carry_route_movie</th><th>memo</th><th>is_update_proposal</th><th>aged_rank_exterior_picture</th><th>aged_rank_exterior_picture_comment</th><th>target_repair_picture</th><th>installation_location</th><th>change_method</th><th>power_outage_range</th><th>remark</th></tr>
                                        </thead>
                                        <tbody>
                                        @foreach($measuring_picture as $item)
                                    
                                    <tr>

                                            <td>{{ $item->id}} </td>

                                            <td>{{ $item->distribution_board_id}} </td>

                                            <td>{{ $item->path}} </td>

                                            <td>{{ $item->width}} </td>

                                            <td>{{ $item->height}} </td>

                                                    <td>{{ $item->investigation_id}} </td>

                                                    <td>{{ $item->category}} </td>

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
  
                                                <td><a href="{{ url("/measuring_picture/" . $item->id) }}" title="View measuring_picture"><button class="btn btn-info btn-xs">View</button></a></td>
                                                <td><a href="{{ url("/measuring_picture/" . $item->id . "/edit") }}" title="Edit measuring_picture"><button class="btn btn-primary btn-xs">Edit</button></a></td>
                                                <td>
                                                    <form method="POST" action="/measuring_picture/{{ $item->id }}" class="form-horizontal" style="display:inline;">
                                                        {{ csrf_field() }}
                                                        
                                                        {{ method_field("DELETE") }}
                                                        <button type="submit" class="btn btn-danger btn-xs" title="Delete User" onclick="return confirm('Confirm delete')">
                                                        Delete
                                                        </button>    
                                                    </form>
                                                   </td>
                                              </tr>

                                        @endforeach
                                        </tbody>
                                    </table>
                                    <div class="pagination-wrapper"> {!! $measuring_picture->appends(["search" => Request::get("search")])->render() !!} </div>
                                </div>
                                

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endsection
    