@extends('layout.main')

@section('center-content')
<div class="page-header">
	<h1>Frak.TV Product : <small>{{$product->title}}</small></h1>
</div>


<div class="row">
            <div class="span10 offset1">    
                    
              <div class="row bottom-space">
                <div class="span3 center-align">
                    @if( !empty($product->image))
                        {{HTML::image($product->image)}}
                    @else
                        {{HTML::image('products/missing-image.png')}}
                    @endif
                </div>
                <div class="span7">

				<h1>{{$product->title}}</h1>

					<p class="team-member-description">{{$product->text}}</p>
                </div>
              </div>
              
                                          
            </div>
          </div>

@stop
