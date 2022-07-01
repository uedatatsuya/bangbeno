@extends("layouts.app")
@section("content")
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">新規登録</div>
                <div class="panel-body">
                    <a href="{{ url("/distribution_board") }}" title="Back"><button class="btn btn-warning btn-xs">戻る</button></a>
                    <br />
                    <br />

                    @if ($errors->any())
                    <ul class="alert alert-danger">
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                    @endif


                    <form method="POST" action="{{route('distribution_board.store')}}" class="form-horizontal">
                        {{ csrf_field() }}

                        <div class="form-group">
                            <label for="investigation_id" class="col-md-4 control-label">investigation_id: </label>
                            <div class="col-md-6">
                                <input class="form-control" name="investigation_id" type="text" id="investigation_id" value="{{old('investigation_id')}}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="category" class="col-md-4 control-label">分電盤種類: </label>
                            <div class="col-md-6">
                                <select name="category" class="form-control">
                                    <option value="">-</option>
                                    @foreach(config('const.categorys') as $key => $category)
                                    <option value="{{$key}}">{{$category}}</option>
                                    @endforeach
                                </select>

                            </div>
                        </div>
                        <div class="form-group">
                            <label for="target_circuit" class="col-md-4 control-label">対象回路: </label>
                            <div class="col-md-6">
                                <select name="target_circuit" class="form-control">
                                    <option value="">-</option>
                                    @foreach(config('const.target_circuits') as $key => $target_circuit)
                                    <option value="{{$key}}">{{$target_circuit}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="supply_range" class="col-md-4 control-label">供給範囲: </label>
                            <div class="col-md-6">
                                <select name="supply_range" class="form-control">
                                    <option value="">-</option>
                                    @foreach(config('const.supply_range') as $key => $supply_range)
                                    <option value="{{$key}}">{{$supply_range}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="special_report" class="col-md-4 control-label">特記事項: </label>
                            <div class="col-md-6">
                                <input class="form-control" name="special_report" type="text" id="special_report" value="{{old('special_report')}}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="carry_route_movie" class="col-md-4 control-label">搬入経路（動画）: </label>
                            <div class="col-md-6">
                                <input class="form-control" name="carry_route_movie" type="text" id="carry_route_movie" value="{{old('carry_route_movie')}}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="memo" class="col-md-4 control-label">メモ: </label>
                            <div class="col-md-6">
                                <input class="form-control" name="memo" type="text" id="memo" value="{{old('memo')}}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="is_update_proposal" class="col-md-4 control-label">更新提案: </label>
                            <div class="col-md-6">
                                <input class="form-control" name="is_update_proposal" type="text" id="is_update_proposal" value="{{old('is_update_proposal')}}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="aged_rank_exterior_picture" class="col-md-4 control-label">経年度（外観）: </label>
                            <div class="col-md-6">
                                <input class="form-control" name="aged_rank_exterior_picture" type="text" id="aged_rank_exterior_picture" value="{{old('aged_rank_exterior_picture')}}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="aged_rank_exterior_picture_comment" class="col-md-4 control-label">経年度（外観）コメント: </label>
                            <div class="col-md-6">
                                <input class="form-control" name="aged_rank_exterior_picture_comment" type="text" id="aged_rank_exterior_picture_comment" value="{{old('aged_rank_exterior_picture_comment')}}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="target_repair_picture" class="col-md-4 control-label">改修対象（実施概略1）※経年度（外観）と同じ写真: </label>
                            <div class="col-md-6">
                                <input class="form-control" name="target_repair_picture" type="text" id="target_repair_picture" value="{{old('target_repair_picture')}}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="installation_location" class="col-md-4 control-label">設置場所: </label>
                            <div class="col-md-6">
                                <!-- <input class="form-control" name="installation_location" type="text" id="installation_location" value="{{old('installation_location')}}"> -->
                                <select name="installation_location" class="form-control">
                                    <option value="">-</option>
                                    @foreach(config('const.installation_locations') as $key => $installation_location)
                                    <option value="{{$key}}">{{$installation_location}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="change_method" class="col-md-4 control-label">交換方法: </label>
                            <div class="col-md-6">
                                <!-- <input class="form-control" name="change_method" type="text" id="change_method" value="{{old('change_method')}}"> -->
                                <select name="change_method" class="form-control">
                                    <option value="">-</option>
                                    @foreach(config('const.exchange_methods') as $key => $change_method)
                                    <option value="{{$key}}">{{$change_method}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="power_outage_range" class="col-md-4 control-label">停電範囲: </label>
                            <div class="col-md-6">
                                <!-- <input class="form-control" name="power_outage_range" type="text" id="power_outage_range" value="{{old('power_outage_range')}}"> -->
                                <select name="power_outage_range" class="form-control">
                                    <option value="">-</option>
                                    @foreach(config('const.power_off_ranges') as $key => $power_outage_range)
                                    <option value="{{$key}}">{{$power_outage_range}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="remark" class="col-md-4 control-label">備考: </label>
                            <div class="col-md-6">
                                <input class="form-control" name="remark" type="text" id="remark" value="{{old('remark')}}">
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