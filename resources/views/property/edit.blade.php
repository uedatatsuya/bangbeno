@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">編集 #{{ $propertie->id }}</div>
                <div class="panel-body">
                    <a href="{{ route('investigation.menu', $propertie->id) }}" title="Back">
                        <button class="btn btn-warning btn-xs">戻る</button></a>

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
                            <label for="id" class="col-md-4 control-label">id: </label>
                            <div class="col-md-6">{{ $propertie->id }}</div>
                        </div>
                        <div class="form-group">
                            <label for="sfa_id" class="col-md-4 control-label">セールスフォースID: </label>
                            <div class="col-md-6">
                                <input class="form-control" name="sfa_id" type="text" id="sfa_id" value="{{ $propertie->sfa_id ?? ''}}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="name" class="col-md-4 control-label">物件名: </label>
                            <div class="col-md-6">
                                <input class="form-control" name="name" type="text" id="name" value="{{ $propertie->name ?? ''}}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="address" class="col-md-4 control-label">住所: </label>
                            <div class="col-md-6">
                                <input class="form-control" name="address" type="text" id="address" value="{{ $propertie->address ?? ''}}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="completion_date" class="col-md-4 control-label">竣工年月: </label>
                            <div class="col-md-6">
                                <input class="form-control" name="completion_date" type="date" id="completion_date" value="{{ $propertie->completion_date ?? ''}}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="unit" class="col-md-4 control-label">戸数: </label>
                            <div class="col-md-6">
                                <input class="form-control" name="unit" type="text" id="unit" value="{{ $propertie->unit ?? ''}}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="agency" class="col-md-4 control-label">紹介代理店拠点名: </label>
                            <div class="col-md-6">
                                <input class="form-control" name="agency" type="text" id="agency" value="{{ $propertie->agency ?? ''}}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="visit_date" class="col-md-4 control-label">訪問可能日時/管理人勤務: </label>
                            <div class="col-md-6">
                                <input class="form-control" name="visit_date" type="date" id="visit_date" value="{{ $propertie->visit_date ?? '' }}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="client" class="col-md-4 control-label">顧客名: </label>
                            <div class="col-md-6">
                                <input class="form-control" name="client" type="text" id="client" value="{{ $propertie->client ?? '' }}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for=" department_id" class="col-md-4 control-label"> 物件エスコ担当者部署名: </label>
                            <div class="col-md-6">
                                <select class="form-control" name="department_id" id="department_id">
                                    <option value="">-</option>
                                    @foreach ($departments as $department)
                                    <option value="{{ $department->id }}" {{ $department->id == $propertie->department_id ? 'selected' : '' }}>
                                        {{ $department->name }}
                                    </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="user_id" class="col-md-4 control-label">物件エスコ担当者名: </label>
                            <div class="col-md-6">
                                {{-- <input class="form-control" name="user_id" type="text" id="user_id"
                                        value="{{ $propertie->user_id }}"> --}}
                                <select class="form-control" name="user_id" id="user_id">
                                    <option value="">-</option>
                                    @foreach ($users as $user)
                                    <option value="{{ $user->id }}" {{ $user->id == $propertie->user_id ? 'selected' : '' }}>
                                        {{ $user->name }}
                                    </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="investigation_user_id" class="col-md-4 control-label">調査担当者（エスコ）: </label>
                            <div class="col-md-6">
                                {{-- <input class="form-control" name="investigation_user_id" type="text"
                                        id="investigation_user_id" value="{{ $propertie->investigation_user_id }}"> --}}
                                <select class="form-control" name="investigation_user_id" id="investigation_user_id">
                                    <option value="">-</option>

                                    @foreach ($users as $user)
                                    <option value="{{ $user->id }}" {{ $user->id == $propertie->investigation_user_id ? 'selected' : '' }}>
                                        {{ $user->name }}
                                    </option>
                                    @endforeach
                                </select>
                            </div>

                        </div>
                        <div class="form-group">
                            <label for="investigation_partner_company_id" class="col-md-4 control-label">調査協力会社（工事店）:
                            </label>
                            <div class="col-md-6">
                                {{-- <input class="form-control" name="investigation_partner_company_id" type="text"
                                        id="investigation_partner_company_id"
                                        value="{{ $propertie->investigation_partner_company_id }}"> --}}
                                <select name="investigation_partner_company_id" class="form-control" id="investigation_partner_company_id">
                                    <option value="">-</option>

                                    @foreach ($partner_companys as $partner_company)
                                    <option value="{{ $partner_company->id }}" @if ($partner_company->id == $propertie->investigation_partner_company_id) selected @endif>
                                        {{ $partner_company->name }}
                                    </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="estimate1_partner_company_id" class="col-md-4 control-label">見積協力会社1: </label>
                            <div class="col-md-6">
                                {{-- <input class="form-control" name="estimate1_partner_company_id" type="text"
                                        id="estimate1_partner_company_id"
                                        value="{{ $propertie->estimate1_partner_company_id }}"> --}}
                                <select name="estimate1_partner_company_id" class="form-control" id="estimate1_partner_company_id">
                                    <option value="">-</option>

                                    @foreach ($partner_companys as $partner_company)
                                    <option value="{{ $partner_company->id }}" @if ($partner_company->id == $propertie->estimate1_partner_company_id) selected @endif>
                                        {{ $partner_company->name }}
                                    </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="estimate2_partner_company_id" class="col-md-4 control-label">見積協力会社2: </label>
                            <div class="col-md-6">
                                {{-- <input class="form-control" name="estimate2_partner_company_id" type="text"
                                        id="estimate2_partner_company_id"
                                        value="{{ $propertie->estimate2_partner_company_id }}"> --}}
                                <select name="estimate2_partner_company_id" class="form-control" id="estimate2_partner_company_id">
                                    <option value="">-</option>

                                    @foreach ($partner_companys as $partner_company)
                                    <option value="{{ $partner_company->id }}" @if ($partner_company->id == $propertie->estimate2_partner_company_id) selected @endif>
                                        {{ $partner_company->name }}
                                    </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="estimate_date" class="col-md-4 control-label">調査日時（確定チェック機能）: </label>
                            <div class="col-md-6">
                                <input class="form-control" name="estimate_date" type="date" id="estimate_date" value="{{ $propertie->estimate_date ?? ''}}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="estimate_request_date" class="col-md-4 control-label">見積依頼（見積依頼日）: </label>
                            <div class="col-md-6">
                                <input class="form-control" name="estimate_request_date" type="date" id="estimate_request_date" value="{{ $propertie->estimate_request_date ?? ''}}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="estimate_submit_deadline_date" class="col-md-4 control-label">見積提出期日: </label>
                            <div class="col-md-6">
                                <input class="form-control" name="estimate_submit_deadline_date" type="date" id="estimate_submit_deadline_date" value="{{ $propertie->estimate_submit_deadline_date ?? ''}}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="estimate_money" class="col-md-4 control-label">見積金額（取込データ）: </label>
                            <div class="col-md-6">
                                <input class="form-control" name="estimate_money" type="text" id="estimate_money" value="{{ $propertie->estimate_money ?? ''}}">
                            </div>
                        </div>
                        <!-- <div class="form-group">
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
                        </div> -->

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