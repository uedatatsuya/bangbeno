@extends('layouts.app')
@push('css')
    <link href="{{ asset('css/fine-uploader.css') }}" rel="stylesheet">
    <link href="{{ asset('css/fine-uploader-gallery.css') }}" rel="stylesheet">
    <link href="{{ asset('css/fine-uploader-new.css') }}" rel="stylesheet">
@endpush

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">編集 #{{ $investigation->id ?? '' }}</div>
                    <div class="panel-body">
                        <a href="{{ route('investigation.menu', $investigation->property_id) }}" title="Back">
                            <button class="btn btn-warning btn-xs">戻る</button></a>
                        <br />
                        <br />

                        @if ($errors->any())
                            <ul class="alert alert-danger">
                                name_plate @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        @endif

                        <form method="POST" action="{{ route('investigation.update', $investigation->id ?? '') }}"
                            class="form-horizontal" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            {{ method_field('PUT') }}

                            <div class="form-group">
                                <label for="name_plate" class="col-md-4 control-label">銘板: </label>
                                <div class="col-md-6">
                                    <input class="form-control" name="name_plate" type="file" id="name_plate">

                                    @if (isset($investigation->name_plate))
                                        <div class="py-3">
                                            <img src="{{ asset('storage/images/' . $investigation->name_plate) }}"
                                                alt="{{ $investigation->name_plate }}" width="100px">
                                        </div>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="electric_meter" class="col-md-4 control-label">電灯メーター: </label>
                                <div class="col-md-6">
                                    <input class="form-control" name="electric_meter" type="file" id="electric_meter">

                                    @if (isset($investigation->electric_meter))
                                        <div class="py-3">
                                            <img src="{{ asset('storage/images/' . $investigation->electric_meter) }}"
                                                alt="{{ $investigation->electric_meter }}" width="100px">
                                        </div>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="power_meter" class="col-md-4 control-label">動力メーター: </label>
                                <div class="col-md-6">
                                    <input class="form-control" name="power_meter" type="file" id="power_meter">

                                    @if (isset($investigation->power_meter))
                                        <div class="py-3">
                                            <img src="{{ asset('storage/images/' . $investigation->power_meter) }}"
                                                alt="{{ $investigation->power_meter }}" width="100px">
                                        </div>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="is_high_voltage_power_reception" class="col-md-4 control-label">高圧受電: </label>
                                <div class="col-md-6">
                                    <input class="form-control" name="is_high_voltage_power_reception" type="text"
                                        id="is_high_voltage_power_reception"
                                        value="{{ $investigation->is_high_voltage_power_reception ?? '' }}">
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="is_power_contract" class="col-md-4 control-label">動力契約: </label>
                                <div class="col-md-6">
                                    <input class="form-control" name="is_power_contract" type="text"
                                        id="is_power_contract" value="{{ $investigation->is_power_contract ?? '' }}">
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="cost_reduction_1" class="col-md-4 control-label">コスト削減（契約1）: </label>
                                <div class="col-md-6">

                                    <select class="form-control" name="cost_reduction_1" id="cost_reduction_1">
                                        <option value="">-</option>
                                        @foreach (config('const.cost_reductions') as $key => $value)
                                            <option value="{{ $key }}"
                                                {{ $investigation->cost_reduction_1 == $key ? 'selected' : '' }}>
                                                {{ $value['list'] }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="cost_reduction_picture_1" class="col-md-4 control-label">写真: </label>
                                <div class="col-md-6">
                                    <input class="form-control" name="cost_reduction_picture_1" type="file"
                                        id="cost_reduction_picture_1"
                                        value="{{ $investigation->cost_reduction_picture_1 ?? '' }}">

                                    @if (isset($investigation->cost_reduction_picture_1))
                                        <div class="py-3">
                                            <img src="{{ asset('storage/images/' . $investigation->cost_reduction_picture_1) }}"
                                                alt="{{ $investigation->cost_reduction_picture_1 }}" width="100px">
                                        </div>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="cost_reduction_comment_list_1" class="col-md-4 control-label">コメントリスト: </label>
                                <div class="col-md-6">

                                    <select class="form-control" name="cost_reduction_comment_list_1_1"
                                        id="cost_reduction_comment_list_1_1">
                                        <option value="">-</option>
                                        @foreach (config('const.cost_reductions')['1']['comments'] as $key => $value)
                                            <option value="{{ $key }}"
                                                {{ $investigation->cost_reduction_comment_list_1 == $key ? 'selected' : '' }}>
                                                {{ $value['list'] }}</option>
                                        @endforeach
                                    </select>

                                    <select class="form-control" name="cost_reduction_comment_list_1_2"
                                        id="cost_reduction_comment_list_1_2">
                                        <option value="">-</option>
                                        @foreach (config('const.cost_reductions')['2']['comments'] as $key => $value)
                                            <option value="{{ $key }}"
                                                {{ $investigation->cost_reduction_comment_list_1 == $key ? 'selected' : '' }}>
                                                {{ $value['list'] }}</option>
                                        @endforeach
                                    </select>

                                </div>
                            </div>
                            <div class="form-group">
                                <label for="cost_reduction_comment_1" class="col-md-4 control-label">コメント: </label>
                                <div class="col-md-6">

                                    <textarea class="form-control" name="cost_reduction_comment_1" id="cost_reduction_comment_1" rows="3">{{ $investigation->cost_reduction_comment_1 ?? '' }}</textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="cost_reduction_2" class="col-md-4 control-label">コスト削減（契約2）: </label>
                                <div class="col-md-6">

                                    <select class="form-control" name="cost_reduction_2" id="cost_reduction_2">
                                        <option value="">-</option>
                                        @foreach (config('const.cost_reductions') as $key => $value)
                                            <option value="{{ $key }}"
                                                {{ $investigation->cost_reduction_2 == $key ? 'selected' : '' }}>
                                                {{ $value['list'] }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="cost_reduction_picture_2" class="col-md-4 control-label">写真: </label>
                                <div class="col-md-6">
                                    <input class="form-control" name="cost_reduction_picture_2" type="file"
                                        id="cost_reduction_picture_2"
                                        value="{{ $investigation->cost_reduction_picture_2 ?? '' }}">

                                    @if (isset($investigation->cost_reduction_picture_2))
                                        <div class="py-3">
                                            <img src="{{ asset('storage/images/' . $investigation->cost_reduction_picture_2) }}"
                                                alt="{{ $investigation->cost_reduction_picture_2 }}" width="100px">
                                        </div>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="cost_reduction_comment_list_2" class="col-md-4 control-label">コメントリスト:
                                </label>
                                <div class="col-md-6">

                                    <select class="form-control" name="cost_reduction_comment_list_2_1"
                                        id="cost_reduction_comment_list_2_1">
                                        <option value="">-</option>
                                        @foreach (config('const.cost_reductions')['1']['comments'] as $key => $value)
                                            <option value="{{ $key }}"
                                                {{ $investigation->cost_reduction_comment_list_1 == $key ? 'selected' : '' }}>
                                                {{ $value['list'] }}</option>
                                        @endforeach
                                    </select>

                                    <select class="form-control" name="cost_reduction_comment_list_2_2"
                                        id="cost_reduction_comment_list_2_2">
                                        <option value="">-</option>
                                        @foreach (config('const.cost_reductions')['2']['comments'] as $key => $value)
                                            <option value="{{ $key }}"
                                                {{ $investigation->cost_reduction_comment_list_2 == $key ? 'selected' : '' }}>
                                                {{ $value['list'] }}</option>
                                        @endforeach
                                    </select>


                                </div>
                            </div>


                            <div class="form-group">
                                <label for="cost_reduction_comment_2" class="col-md-4 control-label">コメント: </label>
                                <div class="col-md-6">

                                    <textarea class="form-control" name="cost_reduction_comment_2" id="cost_reduction_comment_2" rows="3">{{ $investigation->cost_reduction_comment_2 ?? '' }}</textarea>

                                </div>
                            </div>

                            {{-- <div class="form-group">
                                <label for="is_renewal_board" class="col-md-4 control-label">更新済みの盤の有無: </label>
                                <div class="col-md-6">

                                    <select class="form-control" name="is_renewal_board" id="is_renewal_board">
                                        <option value="">-</option>

                                        <option value="1"
                                            {{ $investigation->is_renewal_board == 1 ? 'selected' : '' }}>
                                            有</option>
                                        <option value="2"
                                            {{ $investigation->is_renewal_board == 2 ? 'selected' : '' }}>
                                            無</option>
                                    </select>
                                </div>
                            </div> --}}

                            <div class="form-group">
                                <div class="col-md-6">
                                    <div class="custom-control custom-switch">
                                        {{-- <input type="checkbox" class="custom-control-input" id="is_renewal_board"
                                            name="is_renewal_board" @if $investigation->is_renewal_board == 'on' ? 'checked' @endif>
                                        <label class="custom-control-label" for="is_renewal_board">更新済みの盤の有無</label> --}}

                                        <input type="checkbox" class="custom-control-input" id="is_renewal_board"
                                            name="is_renewal_board"
                                            {{ $investigation->is_renewal_board == 'on' ? 'checked' : '' }}>
                                        <label class="custom-control-label" for="is_renewal_board">更新済みの盤の有無</label>

                                    </div>
                                </div>
                            </div>


                            <div class="form-group">
                                <div class="col-md-offset-4 col-md-4">
                                    <input class="btn btn-primary" type="submit" value="登録">
                                </div>
                            </div>

                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
