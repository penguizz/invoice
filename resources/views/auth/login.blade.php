@extends('layouts.master-layout-login')

@section('title', 'Page Title')


@section('content')

<div id="pic">
<div class="col-md-12">
    <div class="container" class="form-group">   
        <div class="login-header">
            <h1 class="text-center">LOGIN</h1>
            <p class="text-center"> Purchase tracking system</p>   
        </div>   
    </div>
    <div class="login-body">
        <div class="col-md-offset-4">
            <form class="form-horizontal no-ajax" role="form" method="POST" action="{{ route('login') }}">
                {{ csrf_field() }}

                <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                    <div class="col-md-6">
                        <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" placeholder="E-mail address" required autofocus>

                        @if ($errors->has('email'))
                             <span class="help-block">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                    <div class="col-md-6">
                        <input id="inputpassword" type="password" class="form-control" name="password" placeholder="Password" required>
                        @if ($errors->has('password'))
                            <span class="help-block">
                                <strong>{{ $errors->first('password') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-6">
                        <div class="checkbox">
                            <label>
                                <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Remember Me
                            </label>
                        </div>
                    </div>
                </div> 
                <div class="form-group">
                    <div class="col-md-6">
                        <button type="submit" class="btn btn-primary btn-lg btn-block">
                            Login
                        </button> 
                    </div>
                </div>
            </form>
        </div> 
</div>
</div>
@endsection