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
    <section id="billboard" class="overflow-hidden">

      <button class="button-prev">
        <i class="icon icon-chevron-left"></i>
      </button>
      <button class="button-next">
        <i class="icon icon-chevron-right"></i>
      </button>
      <div class="swiper main-swiper">
        <div class="swiper-wrapper">
          <div class="swiper-slide" style="background-image: url('theme-ultras/images/banner1.jpg');background-repeat: no-repeat;background-size: cover;background-position: center;">
            <div class="banner-content">
              <div class="container">
                <div class="row">
                  <div class="col-md-6">
                    <h2 class="banner-title">Summer Collection</h2>
                    <p></p>
                    <div class="btn-wrap">
                      <a href="{{ route('shop') }}" class="btn btn-light btn-medium d-flex align-items-center" tabindex="0">Shop it now <i class="icon icon-arrow-io"></i>
                      </a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="swiper-slide" style="background-image: url('theme-ultras/images/banner2.jpg');background-repeat: no-repeat;background-size: cover;background-position: center;">
            <div class="banner-content">
              <div class="container">
                <div class="row">
                  <div class="col-md-6">
                    <h2 class="banner-title">Casual Collection</h2>
                    <p></p>
                    <div class="btn-wrap">
                      <a href="{{ route('shop') }}" class="btn btn-light btn-light-arrow btn-medium d-flex align-items-center" tabindex="0">Shop it now <i class="icon icon-arrow-io"></i>
                      </a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <section id="selling-products" class="product-store bg-light-grey padding-large">
      <div class="container">
        <div class="section-header">
          <h2 class="section-title">Best Selling Product</h2>
        </div>
        <div class="tab-content">
          <div id="all" data-tab-content class="active">
            <div class="row d-flex flex-wrap">
              @foreach($top_product as $data)
              <div class="product-item col-lg-3 col-md-6 col-sm-6">
                <div class="image-holder">
                  <img src="{{ asset('storage/' . $data->image) }}" alt="Books" class="product-image">
                </div>
                <div class="cart-concern">
                  <div class="cart-button d-flex justify-content-between align-items-center">
                  <button type="button" class="btn-wrap cart-link d-flex align-items-center "><a class = "text-center" style="color: black; text-decoration: none;" href="{{ route('carts.show',$data->id) }}">Add To Cart</a> <i class="icon icon-arrow-io"></i>
                  </button>
                  </div>
                </div>
                <div class="product-detail">
                  <h3 class="product-title">
                    <a href="{{ route('products.show',$data->id) }}">{{$data->product_name}} </a>
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
    <section id="latest-collection">
      <div class="container">
        <div class="product-collection row">
          <div class="col-lg-7 col-md-12 left-content">
            <div class="collection-item">
              <div class="products-thumb">
                <img src="{{asset('theme-ultras/images/collection-item1.jpg')}}" alt="collection item" class="large-image image-rounded">
              </div>
              <div class="col-lg-6 col-md-6 col-sm-6 product-entry">
                <div class="categories">casual collection</div>
                <h3 class="item-title">street wear.</h3>
                <p></p>
                <div class="btn-wrap">
                  <a href="{{ route('shop') }}" class="d-flex align-items-center">shop collection <i class="icon icon-arrow-io"></i>
                  </a>
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-5 col-md-12 right-content flex-wrap">
            <div class="collection-item top-item">
              <div class="products-thumb">
                <img src="{{asset('theme-ultras/images/collection-item2.jpg')}}" alt="collection item" class="small-image image-rounded">
              </div>
              <div class="col-md-6 product-entry">
                <div class="categories">Basic Collection</div>
                <h3 class="item-title">Basic shoes.</h3>
                <div class="btn-wrap">
                  <a href="{{ route('shop') }}" class="d-flex align-items-center">shop collection <i class="icon icon-arrow-io"></i>
                  </a>
                </div>
              </div>
            </div>
            <div class="collection-item bottom-item">
              <div class="products-thumb">
                <img src="{{asset('theme-ultras/images/collection-item3.jpg')}}" alt="collection item" class="small-image image-rounded">
              </div>
              <div class="col-md-6 product-entry">
                <div class="categories">Best Selling Product</div>
                <h3 class="item-title">woolen hat.</h3>
                <div class="btn-wrap">
                  <a href="{{ route('shop') }}" class="d-flex align-items-center">shop collection <i class="icon icon-arrow-io"></i>
                  </a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>


    <section id="testimonials" class="padding-large no-padding-bottom">
      <div class="container">
        <div class="reviews-content">
          <div class="row d-flex flex-wrap">
            <div class="col-md-2">
              <div class="review-icon">
                <i class="icon icon-right-quote"></i>
              </div>
            </div>
            <div class="col-md-8">
              <div class="swiper testimonial-swiper overflow-hidden">
                <div class="swiper-wrapper">
                  <div class="swiper-slide">
                    <div class="testimonial-detail">
                      <p>"You miss 100% of the shots you don’t take."</p>
                      <div class="author-detail">
                        <div class="name">By Wayne Gretzky</div>
                      </div>
                    </div>
                  </div>
                  <div class="swiper-slide">
                    <div class="testimonial-detail">
                      <p>"The only way to do great work is to love what you do." </p>
                      <div class="author-detail">
                        <div class="name">By Steve Jobs</div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="swiper-arrows">
                <button class="prev-button">
                  <i class="icon icon-arrow-left"></i>
                </button>
                <button class="next-button">
                  <i class="icon icon-arrow-right"></i>
                </button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <section id="selling-products" class="product-store bg-light-grey padding-large">
      <div class="container">
        <div class="section-header">
          <h2 class="section-title">Highest Price Product</h2>
        </div>
        <div class="tab-content">
          <div id="all" data-tab-content class="active">
            <div class="row d-flex flex-wrap">
              @foreach($products_high as $data)
              <div class="product-item col-lg-3 col-md-6 col-sm-6">
                <div class="image-holder">
                  <img src="{{ asset('storage/' . $data->image) }}" alt="Books" class="product-image">
                </div>
                <div class="cart-concern">
                  <div class="cart-button d-flex justify-content-between align-items-center">
                  <button type="button" class="btn-wrap cart-link d-flex align-items-center"><a style="color: black; text-decoration: none;" href="{{ route('carts.show',$data->id) }}">Add To Cart</a> <i class="icon icon-arrow-io"></i>
                  </button>
                  </div>
                </div>
                <div class="product-detail">
                  <h3 class="product-title">
                    <a href="{{ route('products.show',$data->id) }}">{{$data->product_name}} </a>
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

    <section id="testimonials" class="padding-large no-padding-bottom">
      <div class="container">
        <div class="reviews-content">
          <div class="row d-flex flex-wrap">
            <div class="col-md-2">
              <div class="review-icon">
                <i class="icon icon-right-quote"></i>
              </div>
            </div>
            <div class="col-md-8">
              <div class="swiper testimonial-swiper overflow-hidden">
                <div class="swiper-wrapper">
                  <div class="swiper-slide">
                    <div class="testimonial-detail">
                      <p>“The future belongs to those who believe in the beauty of their dreams.”</p>
                      <div class="author-detail">
                        <div class="name">By Eleanor Roosevelt</div>
                      </div>
                    </div>
                  </div>
                  <div class="swiper-slide">
                    <div class="testimonial-detail">
                      <p>“No one can make you feel inferior without your consent."</p>
                      <div class="author-detail">
                        <div class="name">By Eleanor Roosevelt</div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="swiper-arrows">
                <button class="prev-button">
                  <i class="icon icon-arrow-left"></i>
                </button>
                <button class="next-button">
                  <i class="icon icon-arrow-right"></i>
                </button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <section id="selling-products" class="product-store bg-light-grey padding-large">
      <div class="container">
        <div class="section-header">
          <h2 class="section-title">Most Affordable Product</h2>
        </div>
        <div class="tab-content">
          <div id="all" data-tab-content class="active">
            <div class="row d-flex flex-wrap">
              @foreach($products_cheapest as $data)
              <div class="product-item col-lg-3 col-md-6 col-sm-6">
                <div class="image-holder">
                  <img src="{{ asset('storage/' . $data->image) }}" alt="Books" class="product-image">
                </div>
                <div class="cart-concern">
                  <div class="cart-button d-flex justify-content-between align-items-center">
                  <button type="button" class="btn-wrap cart-link d-flex align-items-center"><a style="color: black; text-decoration: none;" href="{{ route('carts.show',$data->id) }}">Add To Cart</a> <i class="icon icon-arrow-io"></i>
                  </button>
                  </div>
                </div>
                <div class="product-detail">
                  <h3 class="product-title">
                    <a href="{{ route('products.show',$data->id) }}">{{  $data->product_name }}</a>
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

    <section class="shoppify-section-banner">
      <div class="container">
        <div class="product-collection">
          <div class="left-content collection-item">
            <div class="products-thumb">
              <img src="{{asset('theme-ultras/images/model.jpg')}}" alt="collection item" class="large-image image-rounded">
            </div>
            <div class="col-lg-6 col-md-6 col-sm-6 product-entry">
              <div class="categories">Denim collection</div>
              <h3 class="item-title">The casual selection.</h3>
              <p></p>
              <div class="btn-wrap">
                <a href="{{ route('shop')}}" class="d-flex align-items-center">shop collection <i class="icon icon-arrow-io"></i>
                </a>
              </div>
            </div>
          </div>
        </div>        
      </div>
    </section>

    <section id="quotation" class="align-center padding-large">
      <div class="inner-content">
        <h2 class="section-title divider">Quote of the day</h2>
        <blockquote>
          <q>It's true, I don't like the whole cutoff-shorts-and-T-shirt look, but I think you can look fantastic in casual clothes.</q>
          <div class="author-name">- Dr. Seuss</div>
        </blockquote>
      </div>
    </section>

    <script src="{{asset('theme-ultras/js/jquery-1.11.0.min.js')}}"></script>
    <script src="{{asset('theme-ultras/js/plugins.js')}}"></script>
    <script src="{{asset('theme-ultras/js/script.js')}}"></script>
  </body>
</html>