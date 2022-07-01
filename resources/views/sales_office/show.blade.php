
        @extends("layouts.app")
        @section("content")
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="panel panel-default">
                            <div class="panel-heading">sales_office {{ $sales_office->id }}</div>
                            <div class="panel-body">

                                <a href="{{ url("sales_office") }}" title="Back"><button class="btn btn-warning btn-xs">Back</button></a>
                                <a href="{{ url("sales_office") ."/". $sales_office->id . "/edit" }}" title="Edit sales_office"><button class="btn btn-primary btn-xs">Edit</button></a>
                                <form method="POST" action="/sales_office/{{ $sales_office->id }}" class="form-horizontal" style="display:inline;">
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
										<tr><th>id</th><td>{{$sales_office->id}} </td></tr>
										<tr><th>name</th><td>{{$sales_office->name}} </td></tr>
										<tr><th>新規列</th><td>{{$sales_office->新規列}} </td></tr>
										<tr><th>新規列</th><td>{{$sales_office->新規列}} </td></tr>

                                        </tbody>
                                    </table>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endsection
    