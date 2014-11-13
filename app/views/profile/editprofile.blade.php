@extends('layout.main')

@section('center-content')
<div class="page-header">
            <h1>Profile <small>{{Auth::user()->username}}</small></h1>
          </div>
{{Form::open(array('files' => true,'class' => 'form-horizontal form-signin-signup form-profile','username' => Auth::user()->username))}}    
<div class="span6 offset0">
    <h4 class="widget-header"><i class="icon-gift"></i> Profile Settings</h4>
    <div class="widget-body">
      <div class="center-align">

            <label for="first_name" class="col-sm-3 control-label-wide">First Name</label><input type="text" name="first_name" value="" placeholder="{{Auth::user()->first_name}}">
            <label for="last_name" class="col-sm-3 control-label-wide">Last Name</label><input type="text" name="last_name" value="" placeholder="{{Auth::user()->last_name}}">
            <label for="username" class="col-sm-3 control-label-wide">Username</label><input type="text" name="username" value="" placeholder="{{Auth::user()->username}}">
            <label for="email" class="col-sm-3 control-label-wide">Email</label> <input type="text" name="email" value="" placeholder="{{Auth::user()->email}}">

            <div class="clearfix"></div>
            <input type="submit" value="Update Account" class="btn btn-primary btn-large">
<div class="clearfix"></div>
      </div>
    </div>
</div>

<div class="span4 offset0">
    <h4 class="widget-header"><i class="icon-gift "> </i>Profile Image</h4>
    <div class="widget-body">
        <div class="center-align">
        	@if(!empty(Auth::user()->avatar))
                {{ HTML::image(Auth::user()->avatar,'User Avatar', array('width' => '300')) }}
            @else
                {{HTML::image('products/missing-image.png')}}
            @endif
            <div class="clearfix"></div>
            <div style="margin-top:15px;">{{Form::file('image',array('name'=>'image', 'id'=>'image'))}}</div>
        </div>
    </div>
</div>
{{form::close()}}
@stop