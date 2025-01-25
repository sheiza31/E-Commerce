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
    <script src="{{asset('theme-ultras/js/modernizr.js')}}"></script>
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
            <a href="{{ route('categories.show',$data->name) }}" title="Men Jackets">{{ $data->name }}</a>
          </li>
          @endforeach
        </ul>
      </div>
    </div>
   <x-header />

    <section class="site-banner jarallax min-height300 padding-large" style="background: url(theme-ultras/images/hero-image.jpg) no-repeat;">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <h1 class="page-title">About us</h1>
            <div class="breadcrumbs">
              <span class="item">
                <a href="{{ route('home') }}">Home /</a>
              </span>
              <span class="item">About</span>
            </div>
          </div>
        </div>
      </div>
    </section>

    <section id="shipping-information" class="padding-large ">
      <div class="container">
        <div class="row d-flex flex-wrap  align-items-center justify-content-between">
          <div class="col-md-3 col-sm-6">
            <div class="icon-box">
              <i class="icon icon-truck"></i>
              <h4 class="block-title">
                <strong>Shipping Goods</strong> Via Expedition Service
              </h4>
            </div>
          </div>
          <div class="col-md-3 col-sm-6">
            <div class="icon-box">
              <i class="icon icon-return"></i>
              <h4 class="block-title">
                <strong>Money Back</strong> Within 3 day return product
              </h4>
            </div>
          </div>
          <div class="col-md-3 col-sm-6">
            <div class="icon-box">
              <i class="icon icon-tags1"></i>
              <h4 class="block-title">
                <strong>Shipping costs  </strong> Paid by the buyer
              </h4>
            </div>
          </div>
          <div class="col-md-3 col-sm-6">
            <div class="icon-box">
              <i class="icon icon-help_outline"></i>
              <h4 class="block-title">
                <strong>Any Questions?</strong> Contact Us
              </h4>
            </div>
          </div>
        </div>
      </div>
    </section>

    <section id="about-us">
      <div class="container ">
        <div class="row d-flex align-items-center">
          <div class="col-lg-6 col-md-12">
            <div class="image-holder">
              <img src="{{asset('theme-ultras/images/single-image1.jpg')}}" alt="single" class="about-image">
            </div>
          </div>
          <div class="col-lg-6 col-md-12">
            <div class="detail">
              <div class="display-header">
                <h2 class="section-title">How was MarketHaven started?</h2>
                <p>MarketHaven was born out of a simple yet powerful idea: to make online shopping easier, more reliable, and enjoyable for everyone. Founded by a team of passionate entrepreneurs, MarketHaven began with the vision of bringing high-quality products from around the world directly to your doorstep.
                  It all started when we noticed the challenges shoppers faced in finding a wide variety of trusted brands and products in one place. With the growing demand for convenience and accessibility, we set out to create a one-stop e-commerce platform that would offer an effortless shopping experience for every customer.
                <br>
                from our humble beginnings, MarketHaven grew rapidly by focusing on customer satisfaction, offering competitive prices, and ensuring fast delivery. Our commitment to excellence, personalized service, and innovation has allowed us to build a community of loyal shoppers who trust us for their everyday needs.
                  Today, MarketHaven continues to evolve, expanding our product range and refining our services to meet the changing demands of the modern consumer. What started as a small idea is now a thriving online marketplace that strives to bring the best of global shopping to your fingertips.   </p>
                <div class="btn-wrap">
                  <a href="{{ route('shop') }}" class="btn btn-dark btn-medium d-flex align-items-center" tabindex="0">Shop our store<i class="icon icon-arrow-io"></i>
                  </a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>


    <hr>
  
    <x-social-media />

    <script src="{{asset('theme-ultras/js/jquery-1.11.0.min.js')}}"></script>
    <script src="{{asset('theme-ultras/js/plugins.js')}}"></script>
    <script src="{{asset('theme-ultras/js/script.js')}}"></script>
  </body>
</html>