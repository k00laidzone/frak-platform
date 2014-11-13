@extends('layout.main')

@section('center-content')
<div class="row-fluid">
            <ul class="thumbnails">
              <li class="span3">
                <div class="thumbnail">
                  {{ HTML::image('img/frag-comming-soon.jpg', 'Frak ts a great day', array( 'width' => 20, 'height' => 200 )) }}
                  <div class="caption">
                    <h3>Frak.TV</h3>
                    <p>
                      Gone are the days of chasing down the scores from all those online games you want to watch, consider Frak.TV your one stop shop for everything ESports has to offer. 
                    </p>
                  </div>
                  <div class="widget-footer">
                    <p>
                      <!-- <a href="#" class="btn btn-primary">Buy now</a>&nbsp;-->
                      <a href="product.html" class="btn">Read more</a> 
                    </p>
                  </div>
                </div>
              </li>
              <li class="span3">
                <div class="thumbnail">
                  <img src="img/placeholder-260x150.jpg" alt="product name">
                  <div class="caption">
                    <h3>Product name</h3>
                    <p>
                      Few attractive words about your product.Few attractive words about your product.
                      Few attractive words about your product.Few attractive words about your product.
                    </p>
                  </div>
                  <div class="widget-footer">
                    <p>
                      <a href="#" class="btn btn-primary">Buy now</a>&nbsp;
                      <a href="product.html" class="btn">Read more</a>
                    </p>
                  </div>
                </div>
              </li>
              <li class="span3">
                <div class="thumbnail">
                  <img src="img/placeholder-260x150.jpg" alt="product name">
                  <div class="caption">
                    <h3>Product name</h3>
                    <p>
                      Few attractive words about your product.Few attractive words about your product.
                      Few attractive words about your product.Few attractive words about your product.
                    </p>
                  </div>
                  <div class="widget-footer">
                    <p>
                      <a href="#" class="btn btn-primary">Buy now</a>&nbsp;
                      <a href="product.html" class="btn">Read more</a>
                    </p>
                  </div>
                </div>
              </li>
              <li class="span3">
                <div class="thumbnail">
                  <img src="img/placeholder-260x150.jpg" alt="product name">
                  <div class="caption">
                    <h3>Product name</h3>
                    <p>
                      Few attractive words about your product.Few attractive words about your product.
                      Few attractive words about your product.Few attractive words about your product.
                    </p>
                  </div>
                  <div class="widget-footer">
                    <p>
                      <a href="#" class="btn btn-primary">Buy now</a>&nbsp;
                      <a href="product.html" class="btn">Read more</a>
                    </p>
                  </div>
                </div>
              </li>
            </ul>
          </div>
@stop