@extends('layout.main')

@section('center-content')
<div class="span6 offset3">
    <h4 class="widget-header"><i class="icon-lock"></i> Signin to Frag.TV</h4>
    <div class="widget-body">
      <div class="center-align">
            {{Form::open(array('class' => 'form-horizontal form-signin-signup'))}}
            <input type="text" name="username" placeholder="Username">
            <input type="password" name="password" placeholder="Password">
            <div class="clearfix"></div>
            <input type="submit" value="Signin" class="btn btn-primary btn-large">
            {{form::close()}}
        <h4><i class="icon-question-sign"></i> Don't have an account?</h4>
        <a href="{{ URL::route('account-create') }}" class="btn btn-large bottom-space">Signup</a>
      </div>
    </div>
</div>

@stop()