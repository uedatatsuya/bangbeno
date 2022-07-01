@extends("layouts.app")
@section("content")
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">Edit improvement_rank_internal2_picture #{{ $improvement_rank_internal2_picture->id }}</div>
                <div class="panel-body">
                    <a href="{{ url("improvement_rank_internal2") }}" title="Back"><button class="btn btn-warning btn-xs">Back</button></a>
                    <br />
                    <br />

                    @if ($errors->any())
                    <ul class="alert alert-danger">
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                    @endif

                    <form method="POST" action="/improvement_rank_internal2/{{ $improvement_rank_internal2_picture->id }}" class="form-horizontal">
                        {{ csrf_field() }}
                        {{ method_field("PUT") }}

                        <div class="form-group">
                            <label for="id" class="col-md-4 control-label">id: </label>
                            <div class="col-md-6">{{$improvement_rank_internal2_picture->id}}</div>
                        </div>
                        <div class="form-group">
                            <label for="distribution_board_id" class="col-md-4 control-label">distribution_board_id: </label>
                            <div class="col-md-6">
                                <input class="form-control" name="distribution_board_id" type="text" id="distribution_board_id" value="{{$improvement_rank_internal2_picture->distribution_board_id}}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="number" class="col-md-4 control-label">number: </label>
                            <div class="col-md-6">
                                <input class="form-control" name="number" type="text" id="number" value="{{$improvement_rank_internal2_picture->number}}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="path" class="col-md-4 control-label">path: </label>
                            <div class="col-md-6">
                                <input class="form-control" name="path" type="text" id="path" value="{{$improvement_rank_internal2_picture->path}}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="comment" class="col-md-4 control-label">comment: </label>
                            <div class="col-md-6">
                                <input class="form-control" name="comment" type="text" id="comment" value="{{$improvement_rank_internal2_picture->comment}}">
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