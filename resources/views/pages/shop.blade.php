<!DOCTYPE html>
<html lang="en">
<head>
<title>MarketHaven- Clothing Store</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="format-detection" content="telephone=no">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="author" content="">
    <meta name="keywords" content="">
    <meta name="description" content="">
    <link rel="stylesheet" type="text/css" href="{{asset('theme-ultras/css/normalize.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('theme-ultras/icomoon/icomoon.css')}}">
    <link rel="stylesheet" type="text/css" media="all" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="{{asset('theme-ultras/css/vendor.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('theme-ultras/style.css')}}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <!-- script
    ================================================== -->
    <script src="{{asset('theme-dashboard/js/modernizr.js')}}"></script>
  </head>
  <body>

    <div class="preloader-wrapper">
      <div class="preloader">
      </div>
    </div>

    <div class="search-popup">
      <div class="search-popup-container">

        <form role="search" method="get" class="search-form" action="{{ route('search.products') }}">
          <input type="search" id="search-form" class="search-field" placeholder="Type and press enter" value="" name="search" />
          <button type="submit" class="search-submit"><a href="#"><i class="icon icon-search"></i></a></button>
        </form>

        <h5 class="cat-list-title">Browse Categories</h5>
        
        <ul class="cat-list">
          @foreach($categories as $data)
          <li class="cat-list-item">
            <a href="{{ route('categories.show',$data->name) }}">{{ $data->name }}</a>
          </li>
          @endforeach
        </ul>
      </div>
    </div>

   <x-header />

    <section class="site-banner jarallax min-height300 padding-large" style="background:url({{ asset('theme-ultras/images/hero-image.jpg') }}) no-repeat; background-position: top;">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <h1 class="page-title">Shop page</h1>
            <div class="breadcrumbs">
              <span class="item">
                <a href="{{ route('home') }}">Home /</a>
              </span>
              <span class="item">Shop</span>
            </div>
          </div>
        </div>
      </div>
    </section>

    <div class="shopify-grid padding-large">
      <div class="container">
        <div class="row">
          <section id="selling-products" class="col-md-9 product-store">
            <div class="container">
              <ul class="tabs list-unstyled">
                <li data-tab-target="#all" class="active tab"></li>
              </ul>
              <div class="tab-content">
                <div id="all" data-tab-content class="active">
                  <div class="row d-flex flex-wrap">
                    @foreach($products as $data)
                    <div class="product-item col-lg-4 col-md-6 col-sm-6">
                      <div class="image-holder width:18rem;">
                        <img  style="" src="{{ asset('storage/' . $data->image) }}" alt="Books" class="product-image">
                      </div>
                      <div class="cart-concern">
                        <div class="cart-button d-flex text-center justify-content-between align-items-center">
                          <button type="button" class="btn-wrap cart-link d-flex align-items-center"><a style="color: black; text-decoration: none;" href="{{ route('carts.show',$data->id) }}">Add To Cart</a> <i class="icon icon-arrow-io"></i>
                          </button>
                          <button type="button" class="view-btn tooltip
                              d-flex">
                          </button>
                        </div>
                      </div>
                      <div class="product-detail">
                        <h3 class="product-title">
                          <a href="{{ route('products.show',$data->id) }}">{{ $data->product_name }}</a>
                        </h3>
                        <div class="item-price text-primary">Rp.{{number_format( $data->price, 0 ,',','.') }}</div>
                      </div>
                    </div>
                    @endforeach
                  </div>
                </div>
              </div>
              
            </div>
</section>
          
          <aside class="col-md-3">
            <div class="sidebar">
              <div class="widgets widget-menu">
                <div class="widget-search-bar">
                  <form method = "get"action = "{{ route('search.products') }}" role="search" method="get" class="d-flex">
                    <input class="search-field" placeholder="Search"name="search" type="text">
                    <button type= "submit" class="btn btn-dark"><i class="icon icon-search"></i></button>
                  </form>
                </div> 
              </div>
            </div>
          </aside>
          
        </div>        
      </div>      
    </div>

    <hr>

    <section id="brand-collection" class="padding-medium bg-light-grey">
      <div class="container">
        <div class="d-flex flex-wrap justify-content-between">
          <img src="{{asset('theme-ultras/images/brand1.png')}}" alt="phone" class="brand-image">
          <img src="{{asset('theme-ultras/images/brand2.png')}}" alt="phone" class="brand-image">
          <img src="{{asset('theme-ultras/images/brand3.png')}}" alt="phone" class="brand-image">
          <img src="{{asset('theme-ultras/images/brand4.png')}}" alt="phone" class="brand-image">
          <img src="{{asset('theme-ultras/images/brand5.png')}}" alt="phone" class="brand-image">
        </div>
      </div>
    </section>

  <x-social-media />


    <script src="{{asset('theme-ultras/js/jquery-1.11.0.min.js')}}"></script>
    <script src="{{asset('theme-ultras/js/plugins.js')}}"></script>
    <script src="{{asset('theme-ultras/js/script.js')}}"></script>
  </body>
</html>