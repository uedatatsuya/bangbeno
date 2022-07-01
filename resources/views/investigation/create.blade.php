@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">新規登録</div>
                    <div class="panel-body">
                        <a href="{{ url('/investigation') }}" title="Back"><button
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


                        <form method="POST" action="{{ route('investigation.store') }}" class="form-horizontal"
                            enctype="multipart/form-data">
                            {{ csrf_field() }}

                            <div class="form-group">
                                <label for="property_id" class="col-md-4 control-label">property_id: </label>
                                <div class="col-md-6">
                                    <input class="form-control" name="property_id" type="text" id="property_id"
                                        value="{{ old('property_id') }}">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="name_plate" class="col-md-4 control-label">name_plate: </label>
                                <div class="col-md-6">
                                    <input class="form-control" name="name_plate" type="text" id="name_plate"
                                        value="{{ old('name_plate') }}">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="electric_meter" class="col-md-4 control-label">電灯メーター: </label>
                                <div class="col-md-6">
                                    <input class="form-control" name="electric_meter" type="file" id="electric_meter"
                                        value="{{ old('electric_meter') }}">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="is_high_voltage_power_reception"
                                    class="col-md-4 control-label">is_high_voltage_power_reception: </label>
                                <div class="col-md-6">
                                    <input class="form-control" name="is_high_voltage_power_reception" type="text"
                                        id="is_high_voltage_power_reception"
                                        value="{{ old('is_high_voltage_power_reception') }}">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="is_power_contract" class="col-md-4 control-label">is_power_contract: </label>
                                <div class="col-md-6">
                                    <input class="form-control" name="is_power_contract" type="text"
                                        id="is_power_contract" value="{{ old('is_power_contract') }}">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="cost_reduction_1" class="col-md-4 control-label">cost_reduction_1: </label>
                                <div class="col-md-6">
                                    <input class="form-control" name="cost_reduction_1" type="text" id="cost_reduction_1"
                                        value="{{ old('cost_reduction_1') }}">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="cost_reduction_picture_1"
                                    class="col-md-4 control-label">cost_reduction_picture_1: </label>
                                <div class="col-md-6">
                                    <input class="form-control" name="cost_reduction_picture_1" type="text"
                                        id="cost_reduction_picture_1" value="{{ old('cost_reduction_picture_1') }}">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="cost_reduction_comment_1"
                                    class="col-md-4 control-label">cost_reduction_comment_1: </label>
                                <div class="col-md-6">
                                    <input class="form-control" name="cost_reduction_comment_1" type="text"
                                        id="cost_reduction_comment_1" value="{{ old('cost_reduction_comment_1') }}">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="cost_reduction_2" class="col-md-4 control-label">cost_reduction_2: </label>
                                <div class="col-md-6">
                                    <input class="form-control" name="cost_reduction_2" type="text" id="cost_reduction_2"
                                        value="{{ old('cost_reduction_2') }}">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="cost_reduction_picture_2"
                                    class="col-md-4 control-label">cost_reduction_picture_2: </label>
                                <div class="col-md-6">
                                    <input class="form-control" name="cost_reduction_picture_2" type="text"
                                        id="cost_reduction_picture_2" value="{{ old('cost_reduction_picture_2') }}">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="cost_reduction_comment_2"
                                    class="col-md-4 control-label">cost_reduction_comment_2: </label>
                                <div class="col-md-6">
                                    <input class="form-control" name="cost_reduction_comment_2" type="text"
                                        id="cost_reduction_comment_2" value="{{ old('cost_reduction_comment_2') }}">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="is_renewal_board" class="col-md-4 control-label">is_renewal_board: </label>
                                <div class="col-md-6">
                                    <input class="form-control" name="is_renewal_board" type="text"
                                        id="is_renewal_board" value="{{ old('is_renewal_board') }}">
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
