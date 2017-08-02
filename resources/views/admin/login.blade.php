@extends('admin')
@section('content')
<div class="login-box">
  <div class="login-logo">
    <a href=""><b>WRC </b>Admin</a>
  </div>
 
  <div class="login-box-body">
    @if(Session::has('login-status'))
      <p class="login-box-msg" style="color: red;">{{ Session::get('login-status') }}</p>
    @else
      <p class="login-box-msg">Sign in to start your session</p>
    @endif

    <form action="login" method="post">
    {{ csrf_field() }}

      <div class="form-group has-feedback {{ $errors->has('email') ? 'has-error' : '' }}.">
        <input type="email" name="email" class="form-control" placeholder="Email">
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
        <span class="text-danger">{{ $errors->first('email') }}</span>
      </div>
      <div class="form-group has-feedback {{ $errors->has('password') ? 'has-error' : '' }}">
        <input type="password" name="password" class="form-control" placeholder="Password" >
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
        <span class="text-danger">{{ $errors->first('password') }}</span>
      </div>
      <div class="row">
        <div class="col-xs-8">
          <div class="checkbox icheck">
            <label>
              <input type="checkbox"> Remember Me
            </label>
          </div>
        </div>
        
        <div class="col-xs-4">
          <button type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>
        </div>
        
      </div>
    </form>


    <a href="#">I forgot my password</a><br>
   

  </div>
 
</div>
@stop