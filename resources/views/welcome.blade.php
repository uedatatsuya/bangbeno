<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200;600&display=swap" rel="stylesheet">

    <link href="{{ asset('css/app.css') }}" rel="stylesheet">


    <!-- Styles -->
    <style>
        html,
        body {
            background-color: #fff;
            color: #636b6f;
            font-family: 'Nunito', sans-serif;
            font-weight: 200;
            height: 100vh;
            margin: 0;
        }

        .full-height {
            height: 100vh;
        }

        .flex-center {
            align-items: center;
            display: flex;
            justify-content: center;
        }

        .position-ref {
            position: relative;
        }

        .top-right {
            position: absolute;
            right: 10px;
            top: 18px;
        }

        .content {
            text-align: center;
        }

        .title {
            font-size: 84px;
        }

        .links>a {
            color: #636b6f;
            padding: 0 25px;
            font-size: 13px;
            font-weight: 600;
            letter-spacing: .1rem;
            text-decoration: none;
            text-transform: uppercase;
        }

        .m-b-md {
            margin-bottom: 30px;
        }
    </style>
</head>

<body>
    <div class="flex-center position-ref full-height">
        @if (Route::has('login'))
        <div class="top-right links">
            @auth
            <a href="{{ url('/home') }}">Home</a>
            @else
            <a href="{{ route('login') }}">Login</a>

            @if (Route::has('register'))
            <a href="{{ route('register') }}">Register</a>
            @endif
            @endauth
        </div>
        @endif

        <div class="content">
            <div class="title m-b-md">
                Bangbeno
            </div>

            <div class="list-group">
                <a class="list-group-item list-group-item-action" href="./property">物件</a>
                <a class="list-group-item list-group-item-action" href="./sales_office">営業所マスタ</a>
                <a class="list-group-item list-group-item-action" href="./partner_company">協力会社マスタ</a>
                <a class="list-group-item list-group-item-action" href="./department/">部署マスタ</a>
                <!-- <a class="list-group-item list-group-item-action" href="./investigation">Investigations</a>
                <a class="list-group-item list-group-item-action" href="./distribution_board">DistributionBoards</a>
                <a class="list-group-item list-group-item-action" href="./measuring_picture">MeasuringPictures</a>
                <a class="list-group-item list-group-item-action" href="./component_picture">ComponentPictures</a>
                <a class="list-group-item list-group-item-action" href="./other_picture">OtherPictures</a>
                <a class="list-group-item list-group-item-action" href="./aged_rank_internal_picture">AgedRankInternalPictures</a>
                <a class="list-group-item list-group-item-action" href="./degradation_rank_internal1">DegradationRankInternal1Pictures</a>
                <a class="list-group-item list-group-item-action" href="./degradation_rank_internal2">DegradationRankInternal2Pictures</a>
                <a class="list-group-item list-group-item-action" href="./improvement_rank_internal1">ImprovementRankInternal1Pictures</a>
                <a class="list-group-item list-group-item-action" href="./improvement_rank_internal2">ImprovementRankInternal2Pictures</a> -->
            </div>

        </div>
    </div>
</body>


</html>