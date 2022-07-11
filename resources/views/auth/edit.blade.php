@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="panel panel-default">
                    <div class="panel-heading">ユーザー登録</div>

                    <div class="panel-body">
                        {{ Form::model($user, ['route' => ['register.update', ['id' => $user->id]], 'method' => 'PUT', 'class' => 'form-horizontal']) }}

                        <input type="hidden" name="category" value="1">

                        <div class="form-group row">

                            {{ Form::label('name', 'ユーザーID', ['class' => 'col-md-4 col-form-label text-md-right']) }}

                            <div class="col-md-6">

                                {!! Form::text('name', null, ['class' => 'form-control', 'id' => 'name', 'placeholder' => 'ユーザーID']) !!}

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

                            </div>

                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">パスワード</label>

                            <div class="col-md-6">
                                <!-- <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password"> -->
                                {{ Form::password('password', ['class' => 'form-control', 'id' => 'password', 'placeholder' => 'パスワード']) }}

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        {{-- <div class="form-group row">
                        <label for="password-confirm" class="col-md-4 col-form-label text-md-right">パスワード（確認）</label>

                        <div class="col-md-6">
                            <!-- <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password"> -->
                            {{ Form::password('password_confirmation', ['class' => 'form-control', 'id' => 'password_confirmation', 'placeholder' => 'パスワード']) }}
                        </div>
                    </div> --}}

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    登録
                                </button>
                            </div>
                        </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
