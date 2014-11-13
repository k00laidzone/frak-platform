@extends('layout.main')


@section('slider')
<!-- Start: slider -->
      <div class="slider">
        <div class="container-fluid">
          <div id="heroSlider" class="carousel slide">
            <div class="carousel-inner">
              <div class="active item">
                <div class="hero-unit">
                  <div class="row-fluid">
                    <div class="span7 marketting-info">
                      <h1>Frak.tv is alive!</h1>
                      <p>
                        Frak.tv is all about creating great apps that people accually use!.  We are dedicated to providing you with creative and fun ways to waste your bandwidth.  Our team of mad scientists have cooked up some interesting and resourceful applications to deliver the most useful content all across the web. .
                      </p>
                      <h3>
                        <a href="#" class="btn">Learn more</a>
                      </h3>                      
                    </div>
                    <div class="span5">
                      <img src="img/city.png" class="thumbnail">
                    </div>
                  </div>                  
                </div>
              </div>
              <div class="item">
                <div class="hero-unit">
                  <div class="row-fluid">
                    <div class="span7 marketting-info">
                      <h1>Disruptive Development</h1>
                      <p>
                        At Frak.tv we belive that appulactions should run the way YOU want them too! deliver content YOU want to see and have their development shaped by YOU the user (do ya see a theme starting here?)</p>
                      
                      <p>We create apps that we use ourselves, after being disappointed over and over again by app manufactures churning out meat grinder style products we took our queue from one of the great poets of our time.<br />
<i>“We’re not gonna take, any moreeeeeeeeeeeee!!” </i>- (insert head banging here)<br>
- Dee Snider
</p>
                      <h3>
                        <a href="the-frak-team.html" class="btn">Learn more</a>
                      </h3>                      
                    </div>
                    <div class="span5">
                      <img src="img/frag-comming-soon.jpg" class="thumbnail">
                    </div>
                  </div>                  
                </div>
              </div>
              <div class="item">
                <div class="hero-unit">
                  <div class="row-fluid">
                    <div class="span7 marketting-info">
                      <h1>TELL ABOUT YOUR PRODUCT</h1>
                      <p>
                        Get excited about our products.We build awesome products in mobile.
                        We build awesome products in mobile.We build awesome products in mobile.
                      </p>
                      <h3>
                        <a href="#" class="btn btn-primary">Buy now</a>
                        <a href="product.html" class="btn">Learn more</a>
                      </h3>                      
                    </div>
                    <div class="span5">
                      <img src="img/placeholder.jpg" class="thumbnail">
                    </div>
                  </div>                  
                </div>
              </div>
              <div class="item">
                <div class="hero-unit">
                  <div class="row-fluid">
                    <div class="span7 marketting-info">
                      <h1>TELL ABOUT YOUR ANOTHER PRODUCT</h1>
                      <p>
                        Get excited about our products.We build awesome products in mobile.
                        We build awesome products in mobile.We build awesome products in mobile.
                      </p>
                      <h3>
                        <a href="#" class="btn btn-primary">Buy now</a>
                        <a href="product.html" class="btn">Learn more</a>
                      </h3>                      
                    </div>
                    <div class="span5">
                      <img src="img/placeholder.jpg" class="thumbnail">
                    </div>
                  </div>                  
                </div>
              </div>
            </div>
            <a class="left carousel-control" href="#heroSlider" data-slide="prev">‹</a>
            <a class="right carousel-control" href="#heroSlider" data-slide="next">›</a>
          </div>
        </div>
      </div>
      <!-- End: slider -->
@stop


@section('center-content')
<ul class="thumbnails">
@foreach($products->all() as $product)
  <li class="span4">
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
           {{ HTML::linkRoute('product-showcase','Read More',array('id'=>$product->id), array('class'=>'btn')) }}
        </p>
      </div>
    </div>
  </li>
@endforeach



</ul>

@stop