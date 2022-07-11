@extends('layouts.app')
@section('content')

<div class="d-flex container">

    <div class="list-group  container mb-1">

        <span>
            1.基本情報
        </span>


        <a class="list-group-item list-group-item-action" href="{{ url('/property/' . $id . '/edit') }}" title="Edit propertie">
            物件情報
        </a>

    </div>

    <div class="list-group  container mb-3">

        <span>
            2.調査情報
        </span>

        <a class="list-group-item list-group-item-action" href="{{ url('/investigation/' . $id . '/edit') }}" title="Edit questionnaire_score">
            調査基本設定
        </a>

        <a class="list-group-item list-group-item-action" href="{{ route('distribution_board.index_investigation',$id) }}">
            分電盤基本設定
        </a>


        <a class="list-group-item list-group-item-action" href="{{ route('distribution_board.index_investigation',$id) }}">
            調査内容（写真DL）<br>（未着手）
        </a>

        <a class="list-group-item list-group-item-action" href="{{ url('/property/' . $id . '/comprehensive_edit') }}" title="Edit questionnaire_score">
            総合改善診断
        </a>

        <a class="list-group-item list-group-item-action" href="{{ route('distribution_board.index_investigation',$id) }}">
            工事見積依頼登録<br>（未着手）
        </a>


        <a class="list-group-item list-group-item-action" href="{{ route('distribution_board.index_investigation',$id) }}">
            盤改修提案書DL<br>（未着手）
        </a>

    </div>

    <div class="list-group  container mb-3">

        <span>
            3.工事情報
        </span>

        <a class="list-group-item list-group-item-action" href="{{ route('distribution_board.index_investigation',$id) }}">
            工事見積登録（工事店）<br>（未着手）
        </a>

        <a class="list-group-item list-group-item-action" href="{{ route('distribution_board.index_investigation',$id) }}">
            工事見積登録（エスコ）<br>（未着手）
        </a>

        <a class="list-group-item list-group-item-action" href="{{ route('distribution_board.index_investigation',$id) }}">
            工事スケジュール<br>（未着手）
        </a>

        <a class="list-group-item list-group-item-action" href="{{ route('distribution_board.index_investigation',$id) }}">
            工事内容登録<br>（未着手）
        </a>

        <a class="list-group-item list-group-item-action" href="{{ route('distribution_board.index_investigation',$id) }}">
            工事内容（写真DL）<br>（未着手）
        </a>

        <a class="list-group-item list-group-item-action" href="{{ route('distribution_board.index_investigation',$id) }}">
            関連資料登録<br>（未着手）
        </a>

        <a class="list-group-item list-group-item-action" href="{{ route('distribution_board.index_investigation',$id) }}">
            工事報告書DL<br>（未着手）
        </a>


    </div>
</div>
@endsection