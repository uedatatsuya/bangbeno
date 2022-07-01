
        @extends("layouts.app")
        @section("content")
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="panel panel-default">
                            <div class="panel-heading">partner_companie {{ $partner_companie->id }}</div>
                            <div class="panel-body">

                                <a href="{{ url("partner_companie") }}" title="Back"><button class="btn btn-warning btn-xs">Back</button></a>
                                <a href="{{ url("partner_companie") ."/". $partner_companie->id . "/edit" }}" title="Edit partner_companie"><button class="btn btn-primary btn-xs">Edit</button></a>
                                <form method="POST" action="/partner_companie/{{ $partner_companie->id }}" class="form-horizontal" style="display:inline;">
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
										<tr><th>id</th><td>{{$partner_companie->id}} </td></tr>
										<tr><th>name</th><td>{{$partner_companie->name}} </td></tr>

                                        </tbody>
                                    </table>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endsection
    