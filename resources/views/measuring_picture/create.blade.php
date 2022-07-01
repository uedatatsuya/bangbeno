
        @extends("layouts.app")
        @section("content")
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="panel panel-default">
                            <div class="panel-heading">Create New measuring_picture</div>
                            <div class="panel-body">
                                <a href="{{ url("/measuring_picture") }}" title="Back"><button class="btn btn-warning btn-xs">Back</button></a>
                                <br />
                                <br />

                                @if ($errors->any())
                                    <ul class="alert alert-danger">
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                @endif
                                
                                
                                <form method="POST" action="/measuring_picture/store" class="form-horizontal">
                                    {{ csrf_field() }}

    										<div class="form-group">
                                        <label for="distribution_board_id" class="col-md-4 control-label">distribution_board_id: </label>
                                        <div class="col-md-6">
                                            <input class="form-control" name="distribution_board_id" type="text" id="distribution_board_id" value="{{old('distribution_board_id')}}">
                                        </div>
                                    </div>
										<div class="form-group">
                                        <label for="path" class="col-md-4 control-label">path: </label>
                                        <div class="col-md-6">
                                            <input class="form-control" name="path" type="text" id="path" value="{{old('path')}}">
                                        </div>
                                    </div>
										<div class="form-group">
                                        <label for="width" class="col-md-4 control-label">width: </label>
                                        <div class="col-md-6">
                                            <input class="form-control" name="width" type="text" id="width" value="{{old('width')}}">
                                        </div>
                                    </div>
										<div class="form-group">
                                        <label for="height" class="col-md-4 control-label">height: </label>
                                        <div class="col-md-6">
                                            <input class="form-control" name="height" type="text" id="height" value="{{old('height')}}">
                                        </div>
                                    </div>
                    
                                    <div class="form-group">
                                        <div class="col-md-offset-4 col-md-4">
                                            <input class="btn btn-primary" type="submit" value="Create">
                                        </div>
                                    </div>     
                                </form>
                                
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endsection
    