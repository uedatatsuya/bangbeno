@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">編集 #{{ $department->id }}</div>
                    <div class="panel-body">
                        <a href="{{ url('department') }}" title="Back"><button
                                class="btn btn-warning btn-xs">戻る</button></a>
                        <br />
                        <br />

                        @if ($errors->any())
                            <ul class="alert alert-danger">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        @endif

                        <form method="POST" action="{{ route('department.update', $department->id) }}"
                            class="form-horizontal">
                            {{ csrf_field() }}
                            {{ method_field('PUT') }}

                            <div class="form-group">
                                <label for="id" class="col-md-4 control-label">id: </label>
                                <div class="col-md-6">{{ $department->id }}</div>
                            </div>
                            <div class="form-group">
                                <label for="name" class="col-md-4 control-label">部署名: </label>
                                <div class="col-md-6">
                                    <input class="form-control" name="name" type="text" id="name"
                                        value="{{ $department->name }}">
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-offset-4 col-md-4">
                                    <input class="btn btn-primary" type="submit" value="更新">
                                </div>
                            </div>
                        </form>


                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
