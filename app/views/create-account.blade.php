@extends('layout.main')

@section('center-content')
<div class="page-header">
	<h1>Create a Frak.TV account</h1>
</div>
<div class="span6 offset3">
    <h4 class="widget-header"><i class="icon-gift"></i> Sign up for a Frag.TV account</h4>
    <div class="widget-body">
      <div class="center-align">
            {{Form::open(array('class' => 'form-horizontal form-signin-signup'))}}
            <input type="text" name="username" placeholder="Username">
            <input type="text" name="email" placeholder="Email Address">
            <input type="password" name="password" placeholder="Password">
            <input type="password" name="password_confirmation" placeholder="Password Confirmation">
            <div class="clearfix"></div>
            <input type="submit" value="Create Account" class="btn btn-primary btn-large">
            {{form::close()}}
        <h4><i class="icon-question-sign"></i> Already have an account?</h4>
        <a href="{{ URL::route('login') }}" class="btn btn-large bottom-space">Sign in</a>
      </div>
    </div>
</div>
@stop