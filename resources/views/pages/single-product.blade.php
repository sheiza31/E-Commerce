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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
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

    <section class="site-banner padding-small bg-light-grey">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="breadcrumbs">
              <span class="item">
                <a href="{{ route('home') }}">Home /</a>
              </span>
              <span class="item">
                <a href="{{ route('shop') }}">Shop /</a>
              </span>
              <span class="item">Single post</span>
            </div>
          </div>
        </div>
      </div>
    </section>

    <div class="main-content d-flex flex-wrap padding-large">
      <div class="container">
        <div class="row">
          <div class="col-md-6">
            <div class="post-meta">
              <span class="post-date">{{ $products->created_at->format('F d, Y') }}
              </span> / <a href="{{ route('categories.show',$data->name) }}" class="blog-categories">{{ $products->categories->name }}</a>
            </div>
            <h1 class="page-title">{{ $products->product_name }}</h1>
            <div class="feature-image">
              <img src="{{ asset('storage/' . $products->image) }}" alt="post image" class="">
            </div>
          </div>
          <div class="col-md-6">
            <div class="post-content">
              <p><strong>{{ $products->product_name }}</strong></p>
              <p>{{ $products->description }}</blockquote>
              <div class="post-tags">
                <div class="block-tag">
                  <ul class="list-unstyled d-flex">
              @foreach($categories as $data)
                    <li>
                      <a href="{{ route('categories.show',$data->name) }}" class="btn btn-dark btn-small btn-rounded">{{ $data->name }}</a>
                    </li>
                   @endforeach
                  </ul>
                </div>
              </div>
              <div class="social-links d-flex margin-small">
                <div class="element-title">Share:</div>
                <ul class="d-flex list-unstyled">
                  <li>
                    <a href="#"><i class="icon icon-facebook"></i></a>
                  </li>
                  <li>
                    <a href="#"><i class="icon icon-twitter"></i></a>
                  </li>
                  <li>
                    <a href="#"><i class="icon icon-instagram"></i></a>
                  </li>
                  <li>
                    <a href="#"><i class="icon icon-youtube-play"></i></a>
                  </li>
                </ul>
              </div>
            </div>
            <div id="single-post-navigation">
              <hr>
              <div class="row post-navigation d-flex flex-wrap align-items-center justify-content-between">
                @if($back_products)
                <a itemprop="url" class="col-md-6 post-prev d-flex" href="{{ route('products.show',$back_products->id) }}" title="Previous Post">
                  <span>Previous</span>
                  <h3 class="page-nav-title">{{ $back_products->product_name }}</h3>
                </a>
                @else
                <a itemprop="url" class="col-md-6 post-prev d-flex" href="" title="Previous Post">
                  <span>Previous</span>
                  <h3 class="page-nav-title">Product Not Found</h3>
                </a>
                @endif
                @if($next_products)
                <a itemprop="url" class="col-md-6 post-next d-flex" href="{{ route('products.show',$next_products->id) }}" title="Next Post">
                  <span>Next</span>
                  <h3 class="page-nav-title">{{ $next_products->product_name }}</h3>
                </a>
                @else
                <a itemprop="url" class="col-md-6 post-prev d-flex" href="" title="Previous Post">
                  <span>Next</span>
                  <h3 class="page-nav-title">Product Not Found</h3>
                </a>
                @endif
              </div>
              <hr>
            </div>
          </div>
        </div>
      </div>
    </div>






    <script src="{{asset('theme-ultras/js/jquery-1.11.0.min.js')}}"></script>
    <script src="{{asset('theme-ultras/js/plugins.js')}}"></script>
    <script src="{{asset('theme-ultras/js/script.js')}}"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>