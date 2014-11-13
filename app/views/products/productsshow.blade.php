@extends('layout.main')

@section('center-content')

<div class="page-header">
	<h1>Frak.TV Products</h1>
</div>
<div class="row-fluid">
    <ul class="thumbnails">
    @foreach($products->all() as $product)
    
        <li class="span3">
            <div class="thumbnail">
            	<div class="img-holder">
                    @if( !empty($product->image))
                        {{HTML::image($product->image)}}
                    @else
                        {{HTML::image('products/missing-image.png')}}
                    @endif
                    
                    
                </div>
                <div class="caption">	
                	<h3>{{ $product->title }}</h3>
                	<p>{{ Str::limit( $product->text, 100) }}</p>
                </div>
                <div class="widget-footer">
                    <p>
                    <!-- <a href="#" class="btn btn-primary">Buy now</a>&nbsp;-->
                   {{ HTML::linkRoute('product-showcase','Read More',array('id'=>$product->id), array('class'=>'btn')) }}
                   @if(Auth::check())
                   		@if(Auth::user()->admin)
    	               		{{ HTML::linkRoute('product-edit','Edit Product',array('id'=>$product->id), array('class'=>'btn'))  }}
	                   		{{ HTML::linkRoute('product-delete','Delete Product',array('id'=>$product->id), array('class'=>'btn delconf'))  }}
						@endif
                   @endif
                    </p>
                </div>
            </div>

        </li>
        @endforeach
        @if(Auth::check())
            @if(Auth::user()->admin)
            <li class="span3">
                <div class="thumbnail">
                    <div class="img-holder">{{HTML::image('img/new-product-image.png')}}</div>
                    <div class="caption">	
                        <h3>Create New Product</h3>
                        <p>Want to create a new product ?</p>
                    </div>
                    <div class="widget-footer">
                        <p>
                        <!-- <a href="#" class="btn btn-primary">Buy now</a>&nbsp;-->
                       {{ HTML::linkRoute('product-new','Create New Product','', array('class'=>'btn btn-primary')) }}
                        </p>
                    </div>
                </div>
            </li>
            @endif
        @endif
    </ul>
</div>

@stop