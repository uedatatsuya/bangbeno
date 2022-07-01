@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">編集 #{{ $propertie->id }}</div>
                <div class="panel-body">
                    <a href="{{ route('investigation.menu', $propertie->id) }}" title="Back"><button class="btn btn-warning btn-xs">戻る</button></a>
                    <br />
                    <br />

                    @if ($errors->any())
                    <ul class="alert alert-danger">
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                    @endif

                    <form method="POST" action="{{ route('property.update', $propertie->id) }}" class="form-horizontal">
                        {{ csrf_field() }}
                        {{ method_field('PUT') }}


                        <div class="form-group">
                            <label for="aged_rank" class="col-md-4 control-label">経年度ランク: </label>
                            <div class="col-md-6">

                                <select class="form-control" name="aged_rank" id="aged_rank">
                                    <option value="">-</option>

                                    @foreach (config('const.aged_ranks') as $key => $aged_rank)
                                    <option value="{{ $key }}" data-comment="{{$aged_rank['comment']}}" @if ($key==$propertie->aged_rank) selected @endif>
                                        {{ $aged_rank['list'] }}
                                    </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="aged_rank_comment" class="col-md-4 control-label">経年度ランクコメント: </label>
                            <div class="col-md-6">
                                <textarea class="form-control" name="aged_rank_comment" id="aged_rank_comment" rows="8">{{ $propertie->aged_rank_comment ?? ''}}</textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for=" degradation_rank" class="col-md-4 control-label"> 劣化度ランク: </label>
                            <div class="col-md-6">
                                <select class="form-control" name="degradation_rank" id="degradation_rank">
                                    <option value="">-</option>
                                    @foreach (config('const.degradation_ranks') as $key => $degradation_rank)
                                    <option value="{{ $key }}" data-comment="{{$degradation_rank['comment']}}" @if ($key==$propertie->degradation_rank) selected @endif>
                                        {{ $degradation_rank['list'] }}
                                    </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="degradation_rank_comment" class="col-md-4 control-label">劣化度ランクコメント: </label>
                            <div class="col-md-6">
                                <textarea class="form-control" name="degradation_rank_comment" id="degradation_rank_comment" rows="8">{{ $propertie->degradation_rank_comment ?? ''}}</textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="improvement_rank" class="col-md-4 control-label">改善点ランク: </label>
                            <div class="col-md-6">
                                <select class="form-control" name="improvement_rank" id="improvement_rank">
                                    <option value="">-</option>
                                    @foreach (config('const.improvement_ranks') as $key => $improvement_rank)
                                    <option value="{{ $key }}" data-comment="{{$improvement_rank['comment']}}" @if ($key==$propertie->improvement_rank) selected @endif>
                                        {{ $improvement_rank['list'] }}
                                    </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="improvement_rank_comment" class="col-md-4 control-label">改善点ランクコメント: </label>
                            <div class="col-md-6">
                                <textarea class="form-control" name="improvement_rank_comment" id="improvement_rank_comment" rows="8">{{ $propertie->improvement_rank_comment ?? ''}}</textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="cost_reduction_rank" class="col-md-4 control-label">コスト削減ランク: </label>
                            <div class="col-md-6">
                                <select class="form-control" name="cost_reduction_rank" id="cost_reduction_rank">
                                    <option value="">-</option>
                                    @foreach (config('const.cost_reduction_ranks') as $key => $cost_reduction_rank)
                                    <option value="{{ $key }}" data-comment="{{$cost_reduction_rank['comment']}}" @if ($key==$propertie->cost_reduction_rank) selected @endif>
                                        {{ $cost_reduction_rank['list'] }}
                                    </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="cost_reduction_rank_comment" class="col-md-4 control-label">コスト削減ランクコメント:
                            </label>
                            <div class="col-md-6">
                                <textarea class="form-control" name="cost_reduction_rank_comment" id="cost_reduction_rank_comment" rows="8">{{ $propertie->cost_reduction_rank_comment ?? ''}}</textarea>
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