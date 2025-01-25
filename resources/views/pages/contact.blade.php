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
            <a href="{{ route('categories.show',$data->name) }}" title="Men Jackets">{{ $data->name }}</a>
          </li>
          @endforeach
        </ul>
      </div>
    </div>
    <x-header />

    <section class="site-banner jarallax padding-large" style="background: url(theme-ultras/images/hero-image.jpg) no-repeat; background-position: top;">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <h1 class="page-title">Contact us</h1>
            <div class="breadcrumbs">
              <span class="item">
                <a href="{{route('home')}}">Home /</a>
              </span>
              <span class="item">Contact us</span>
            </div>
          </div>
        </div>
      </div>
    </section>

    <section class="contact-information padding-large">
      <div class="container">
        <div class="row">
          <div class="col-md-6">
            <div class="section-header">
              <h2 class="section-title">Contact</h2>
            </div>
            <div class="contact-detail">
              <div class="detail-list">
                <p>We're here to help! If you have any questions, suggestions, or need assistance, feel free to reach out. Our team is ready to provide you with the best information or solutions.</p>
                <ul class="list-unstyled list-icon">
                  <li>
                    <a href="#"><i class="icon icon-phone"></i>089663128938</a>
                  </li>
                  <li>
                    <a href="mailto:info@yourcompany.com"><i class="icon icon-mail"></i>MarketHaven@gmail.com</a>
                  </li>
                  <li>
                    <a href="#"><i class="icon icon-map-pin"></i>Depok Timur,Indonesia</a>
                  </li>
                </ul>
              </div>
            </div>
          </div>
          <div class="col-md-6">
            <div class="contact-information">
              <div class="section-header">
                <h2 class="section-title">Send us a message</h2>
              </div>
              <form action = "{{ route('send.email') }}" name="contactform" method="post" class="contact-form">
                @csrf
                <div class="form-item">
                  <input type="text" minlength="2" name="name" placeholder="Name" class="u-full-width bg-light" required>
                  <input type="email" name="email" placeholder="E-mail" class="u-full-width bg-light" required>
                  <textarea class="u-full-width bg-light" name="message" placeholder="Message" style="height: 180px;" required></textarea>
                </div>
                <button type="submit" name="submit" class="btn btn-dark btn-full btn-medium">Submit</button>
              </form>
            </div>
          </div>
        </div>
       <x-social-media />

    <script src="{{asset('theme-ultras/js/jquery-1.11.0.min.js')}}"></script>
    <script src="{{asset('theme-ultras/js/plugins.js')}}"></script>
    <script src="{{asset('theme-ultras/js/script.js')}}"></script>
  </body>
</html>