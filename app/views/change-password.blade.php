@extends('layout.main')

@section('center-content')
<div class="page-header">
	<h1>Change Password</h1>
</div>
          
<div class="span5 offset0">
    <h4 class="widget-header"><i class="icon-lock"></i> Password Information</h4>
    <div class="widget-body">
      <div class="center-align">
            {{Form::open(array('class' => 'form-horizontal form-signin-signup form-profile'))}}
            <label for="old_password" class="col-sm-2 control-label">Old Password</label> <input type="password" name="old_password" placeholder="Password">
            <label for="new_password" class="col-sm-2 control-label">New Password</label><input type="password" name="new_password" placeholder="Password">
            <label for="password_confirmation" class="col-sm-2 control-label">Confirm Password</label><input type="password" name="password_confirmation" placeholder="Password Confirmation">
            <div class="clearfix"></div>
            <input type="submit" value="Update Account" class="btn btn-primary btn-large">
            {{form::close()}}
      </div>
    </div>
</div>
@stop