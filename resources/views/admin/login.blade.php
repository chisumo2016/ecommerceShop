
@extends('admin.layout.app')

@section('content')
    <div class="row-fluid">
        <div class="login-box">
            <div class="icons">
                <a href="index.html"><i class="halflings-icon home"></i></a>
                <a href="#"><i class="halflings-icon cog"></i></a>
            </div>
            <h2>Login to your account</h2>
            <form class="form-horizontal" action="" method="post">
                <fieldset>

                    <div class="input-prepend" title="Username">
                        <span class="add-on"><i class="halflings-icon user"></i></span>
                        <input class="input-large span10" name="admin_email" id="admin_email" type="text" placeholder="Enter Email Address"/>
                    </div>
                    <div class="clearfix"></div>

                    <div class="input-prepend" title="Password">
                        <span class="add-on"><i class="halflings-icon lock"></i></span>
                        <input class="input-large span10" name="admin_password" id="admin_password" type="password" placeholder=" password"/>
                    </div>
                    {{--<div class="clearfix"></div>--}}

                    {{--<label class="remember" for="remember"><input type="checkbox" id="remember" />Remember me</label>--}}

                    <div class="button-login">
                        <button type="submit" class="btn btn-primary">Login</button>
                    </div>
                    <div class="clearfix"></div>
            </form>
            <hr>
            <h3>Forgot Password?</h3>
            <p>
                No problem, <a href="#">click here</a> to get a new password.
            </p>
        </div><!--/span-->
    </div><!--/row-->
@endsection