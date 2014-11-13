@extends('layout.main')

@section('center-content')
<div class="page-header">
	<h1>Profile Information</h1>
</div>

<div class="span6 offset0">
    <h4 class="widget-header"><i class="icon-thumbs-up"></i> Profile : {{ Auth::user()->username }} </h4>
    <div class="widget-body">
<table class="table span5 offset">
        <tr>
            <td>First Name</td>
            <td>{{ Auth::user()->first_name }}</td>
        </tr>
        
        <tr>
            <td>Last Name</td>
            <td>{{ Auth::user()->last_name }}</td>
        </tr>
        
        <tr>
            <td>Username</td>
            <td>{{ Auth::user()->username }}</td>
        </tr>
        
        <tr>
            <td>E-mail Address</td>
            <td>{{ Auth::user()->email }}</td>
        </tr>
        
        <tr>
            <td>Last login</td>
            <td>{{ Auth::user()->updated_at }}</td>
        </tr>
        
</table>
 <div class="clearfix"></div>
	<a class="btn btn-primary offset4" href="{{ URL::route('profile-edit',array('username'=>Auth::user()->username)) }}" role="button">Edit Profile</a>

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

        </div>
    </div>
</div>
    
@stop
