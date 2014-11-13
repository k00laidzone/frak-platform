@extends('layout.main')

@section('center-content')
<div class="page-header">
            <h1>Profile <small>{{Auth::user()->username}}</small></h1>
          </div>
          
<div class="span5 offset0">
    <h4 class="widget-header"><i class="icon-gift"></i> Profile Settings</h4>
    <div class="widget-body">
      <div class="center-align">
            {{Form::open(array('class' => 'form-horizontal form-signin-signup form-profile'))}}
            <label for="first_name" class="col-sm-2 control-label">First Name</label><input type="text" name="first_name" value="{{Auth::user()->first_name}}">
            <label for="last_name" class="col-sm-2 control-label">Last Name</label><input type="text" name="last_name" value="{{Auth::user()->last_name}}">
            <label for="username" class="col-sm-2 control-label">Username</label><input type="text" name="username" value="{{Auth::user()->username}}">
            <label for="email" class="col-sm-2 control-label">Email</label> <input type="text" name="email" value="{{Auth::user()->email}}">

            <div class="clearfix"></div>
            <input type="submit" value="Update Account" class="btn btn-primary btn-large">
            {{form::close()}}
      </div>
    </div>
</div>
@stop