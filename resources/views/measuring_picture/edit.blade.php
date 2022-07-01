
        @extends("layouts.app")
        @section("content")
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="panel panel-default">
                            <div class="panel-heading">Edit measuring_picture #{{ $measuring_picture->id }}</div>
                            <div class="panel-body">
                                <a href="{{ url("measuring_picture") }}" title="Back"><button class="btn btn-warning btn-xs">Back</button></a>
                                <br />
                                <br />

                            @if ($errors->any())
                                <ul class="alert alert-danger">
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            @endif
    
                            <form method="POST" action="/measuring_picture/{{ $measuring_picture->id }}" class="form-horizontal">
                                        {{ csrf_field() }}
                                        {{ method_field("PUT") }}
            
										<div class="form-group">
                                        <label for="id" class="col-md-4 control-label">id: </label>
                                        <div class="col-md-6">{{$measuring_picture->id}}</div>
                                    </div>
										<div class="form-group">
                                            <label for="distribution_board_id" class="col-md-4 control-label">distribution_board_id: </label>
                                            <div class="col-md-6">
                                                <input class="form-control" name="distribution_board_id" type="text" id="distribution_board_id" value="{{$measuring_picture->distribution_board_id}}">
                                            </div>
                                        </div>
										<div class="form-group">
                                            <label for="path" class="col-md-4 control-label">path: </label>
                                            <div class="col-md-6">
                                                <input class="form-control" name="path" type="text" id="path" value="{{$measuring_picture->path}}">
                                            </div>
                                        </div>
										<div class="form-group">
                                            <label for="width" class="col-md-4 control-label">width: </label>
                                            <div class="col-md-6">
                                                <input class="form-control" name="width" type="text" id="width" value="{{$measuring_picture->width}}">
                                            </div>
                                        </div>
										<div class="form-group">
                                            <label for="height" class="col-md-4 control-label">height: </label>
                                            <div class="col-md-6">
                                                <input class="form-control" name="height" type="text" id="height" value="{{$measuring_picture->height}}">
                                            </div>
                                        </div>
               
                                    <div class="form-group">
                                        <div class="col-md-offset-4 col-md-4">
                                            <input class="btn btn-primary" type="submit" value="Update">
                                        </div>
                                    </div>   
                                </form>
                                

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endsection
    