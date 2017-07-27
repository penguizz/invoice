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
        <br>
        <div class="col-md-offset-4">
            <form class="form-signin">
                <label for="inputEmail" class="sr-only">E-mail address
                </label>
                <input type="email" id="inputEmail" class="form-control" placeholder="E-mail address"> <!-- required autofocus -->
                <br>
                <label for="inputPassword" class="sr-only">Password</label>
                <input type="password" id="inputPassword" class="form-control" placeholder="Password"> <!-- required -->
                <div class="checkbox">
                <label>
                    <input class="Purchase-tracking" type="checkbox" value="remember-me">Remember me
                </label>
                </div>
                <div class="">
                    <a class="btn btn-lg btn-primary btn-block" type="submit" href="/">Login</a>

                </div>
            </form>
        </div>  
    </div>
</div>
@endsection
