@extends('layout.main')

@section('center-content')
<div class="span5 offset0">
    <h4 class="widget-header"><i class="icon-lock"></i>Edit Avatar</h4>
    <div class="widget-body">
    <div class="center-align">
        {{Form::open(array('files' => true,'class' => 'form-horizontal form-signin-signup form-profile' ))}}
		{{Form::label('image','Select Image', array('class'=>'col-sm-2 control-label'))}}
        {{Form::file('image',array('name'=>'image'))}}
        
        <div class="clearfix"></div>
        {{Form::submit('Submit', array('class'=>'btn btn-primary btn-large'))}}
        
        {{Form::close()}}
    </div>
</div>
@stop
