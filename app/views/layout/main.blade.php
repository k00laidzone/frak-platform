<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Frak.tv | The software company that only cares about what YOU think.">
    <meta name="author" content="Frak.TV">
    <title>Frak.tv | We mean business!</title>
    <!-- Bootstrap -->
    {{HTML::style('css/bootstrap.min.css')}}
        <!-- Bootstrap responsive -->
    {{HTML::style('css/bootstrap-responsive.min.css')}}
    <!-- Font awesome - iconic font with IE7 support --> 
	{{HTML::style('css/font-awesome.css')}}
	{{HTML::style('css/font-awesome-ie7.css')}}
    <!-- Frak.tv theme -->
	{{HTML::style('css/boot-business.css')}}    
    {{ HTML::script('ckeditor/ckeditor.js') }}
    {{ HTML::script('js/jquery.min.js') }}

    {{ HTML::script('js/bootstrap.min.js') }}
    {{ HTML::script('js/boot-business.js') }}

	<script type="text/javascript">
    $( document ).ready(function() {
        $('.delconf').on('click', function(event){
            event.preventDefault();
            var href = $(this).data('href');
            if (confirm('Are you sure you want to delete this product?')) {
                var url = $(this).attr('href');
                window.location.href = url;
            }
        });
    });
    </script>


  </head>
  <body>
    <!-- Start: HEADER -->
    <header>
      <!-- Start: Navigation wrapper -->
      <div class="navbar navbar-fixed-top">
        <div class="navbar-inner">
          <div class="container">
            <a href="{{ URL::route('home') }}" class="brand brand-bootbus">Frak.tv</a>
            <!-- Below button used for responsive navigation -->
            <button type="button" class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
            <!-- Start: Primary navigation -->
            <div class="nav-collapse collapse">        
              <ul class="nav pull-right">
                <li>{{ HTML::linkRoute('products', 'Products') }}</li>
                <li class="dropdown">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown">About<b class="caret"></b></a>
                  <ul class="dropdown-menu">
                    <li>{{ HTML::linkRoute('crew', 'The Crew') }}</li>
                    <li><a href="news.html">News</a></li>
                    <li><a href="events.html">Events</a></li>
                    <li><a href="blog.html">Blog</a></li>
                  </ul>
                </li>
                <li><a href="faq.html">FAQ</a></li>
                <li>{{ HTML::linkRoute('contact', 'Contact us') }}</li>
                
                
                @if(Auth::check())
                <li class="dropdown">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  @if( file_exists(public_path().Auth::user()->avatar ))
                   {{HTML::image(Auth::user()->avatar,Auth::user()->username, array('style'=>'height:30px;'))}}
                  @else
                  {{HTML::image('img/profile-gear.png')}}
                  @endif
                  <b class="caret"></b></a>
                  
                  <ul class="dropdown-menu">
                    <li>{{ HTML::linkRoute('profile-show', 'Profile', array('username' => Auth::user()->username)) }}</li>
                    <li>{{ HTML::linkRoute('change-password', 'Change Password') }}</li>
                    <li class="divider"></li>
                    <li>{{ HTML::linkRoute('logout', 'Sign out') }}</li>
                  </ul>
                </li>
                	
                @else
                    <li>{{ HTML::linkRoute('account-create', 'Sign up') }}</li>
                    <li>{{ HTML::linkRoute('login', 'Sign in') }}</li>
                @endif
                
                
                
              </ul>
            </div>
          </div>
        </div>
      </div>
      <!-- End: Navigation wrapper -->   
    </header>
    <!-- End: HEADER -->
    <!-- Start: MAIN CONTENT -->
    <div class="content">
      @yield('slider')

        <div class="container">
    
            @foreach ($errors->all() as $error)
                <div class="alert alert-danger alert-dismissible" role="alert">
                    <button type="button" class="close" data-dismiss="alert">
                    <span aria-hidden="true">&times;</span></button>
                    <strong>Warning!</strong> {{ $error }}.
                </div>
            @endforeach
            
            @if(Session::has('global'))
                <div class="alert alert-success alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert">
                    <span aria-hidden="true">&times;</span></button>
                    <strong>Success!</strong> {{ Session::get('global') }}.
                </div>
            @endif
			@yield('center-content')          
        </div>
      <!-- End: PRODUCT LIST -->
    </div>
    <!-- End: MAIN CONTENT -->
    <!-- Start: FOOTER -->
    <footer>
      <div class="container">
        <div class="row">
          <div class="span2">
            <h4><i class="icon-star icon-white"></i> Products</h4>
            <!--
            <nav>
              <ul class="quick-links">
                <li><a href="product.html">Product1</a></li>
                <li><a href="product.html">Product2</a></li>
                <li><a href="product.html">Product3</a></li>
                <li>{{ HTML::linkRoute('products', 'All Products') }}</li>
              </ul>
            </nav>
            -->
            <h4><i class="icon-cogs icon-white"></i> Services</h4>
            <!-- 
            <nav>
              <ul class="quick-links">
                <li><a href="service.html">Service1</a></li>
                <li><a href="service.html">Service2</a></li>
                <li><a href="service.html">Service3</a></li>
                <li><a href="all_services.html">All services</a></li>              
              </ul>
            </nav>
            -->
          </div>
          <div class="span2">
            <h4><i class="icon-beaker icon-white"></i> About</h4>
            <nav>
              <ul class="quick-links">
                <li>{{ HTML::linkRoute('crew', 'The Crew') }}</li>
                <li><a href="news.html">News</a></li>
                <li><a href="events.html">Events</a></li>
                <li><a href="blog.html">Blog</a></li>
              <ul>
            </nav>          
          </div>
          <div class="span2">
            <h4><i class="icon-thumbs-up icon-white"></i> Support</h4>
            <nav>
              <ul class="quick-links">
                <li><a href="faq.html">FAQ</a></li>
                <li>{{ HTML::linkRoute('contact', 'Contact us') }}</li>            
              </ul>
            </nav>
            <h4><i class="icon-legal icon-white"></i> Legal</h4>
            <nav>
              <ul class="quick-links">
                <li><a href="#">License</a></li>
                <li><a href="#">Terms of Use</a></li>
                <li><a href="#">Privacy Policy</a></li>
                <li><a href="#">Security</a></li>      
              </ul>
            </nav>            
          </div>
          <div class="span3">
            <h4>Get in touch</h4>
            <div class="social-icons-row">
              <a href="#"><i class="icon-twitter"></i></a>
              <a href="#"><i class="icon-facebook"></i></a>
              <a href="#"><i class="icon-linkedin"></i></a>                                         
            </div>
            <div class="social-icons-row">
              <a href="#"><i class="icon-google-plus"></i></a>              
              <a href="#"><i class="icon-github"></i></a>
              <a href="mailto:soundar.rathinasamy@gmail.com"><i class="icon-envelope"></i></a>        
            </div>
            <div class="social-icons-row">
              <i class="icon-phone icon-large phone-number"></i> (780) 756-8155
            </div>
          </div>      
          <div class="span3">
            <h4>Get updated by email</h4>
            <form>
              <input type="text" name="email" placeholder="Email address">
              <input type="submit" class="btn btn-primary" value="Subscribe">
            </form>
          </div>
        </div>
      </div>
      <hr class="footer-divider">
      <div class="container">
        <p>
          &copy; 2014 Frak Programming Group, Inc. All Rights Reserved.
        </p>
      </div>
    </footer>
    <!-- End: FOOTER -->

  </body>
</html>
