@extends('layouts.app')
@section('content')

<div class="list-group w-50 container">

    <a class="list-group-item list-group-item-action" href="{{ url('/investigation/' . $id . '/edit') }}" title="Edit questionnaire_score">
        調査基本設定
    </a>

    <a class="list-group-item list-group-item-action" href="{{ route('distribution_board.index_investigation',$id) }}">
        分電盤基本設定
    </a>

    <a class="list-group-item list-group-item-action" href="{{ url('/property/' . $id . '/comprehensive_edit') }}" title="Edit questionnaire_score">
        総合改善診断
    </a>

</div>

@endsection