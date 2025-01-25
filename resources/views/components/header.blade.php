<header id="header">
      <div id="header-wrap">
        <nav class="secondary-nav border-bottom">
          <div class="container">
            <div class="row d-flex align-items-center">
              <div class="col-md-4 header-contact">
              </div>
              <div class="col-md-4 shipping-purchase text-center">
              </div>
              <div class="col-md-4 col-sm-12 user-items">
                <ul class="d-flex justify-content-end list-unstyled">
                  <li>
                    <a href="{{ route('login')}}">
                      <i class="icon icon-user"></i>
                    </a>
                  </li>
                  <li>
                    <a href="{{ route('carts.index') }}">
                      <i class="icon icon-shopping-cart"></i>
                    </a>
                  </li>
                  <li class="user-items search-item pe-3">
                    <a href="#" class="search-button">
                      <i class="icon icon-search"></i>
                    </a>
                  </li>
                </ul>
              </div>
            </div>
          </div>
        </nav>
        <nav class="primary-nav padding-small">
          <div class="container">
            <div class="row d-flex align-items-center">
              <div class="col-lg-2 col-md-2">
                <div class="main-logo">
                  <a href="{{ route('home') }}">
                    
                  </a>
                </div>
              </div>
              <div class="col-lg-10 col-md-10">
                <div class="navbar">

                  <div id="main-nav" class="stellarnav d-flex justify-content-end right">
                    <ul class="menu-list">

                      <li class="menu-item has-sub">
                        <a href="{{route('home')}}" class="item-anchor d-flex align-item-center" data-effect="Home">Home</a>
                      </li>

                      <li><a href="{{route('about')}}" class="item-anchor " data-effect="About">About</a></li>

                      <li class="menu-item has-sub">
                        <a href="{{route('shop')}}" class="item-anchor d-flex align-item-center" data-effect="Shop">Shop</a>
                      </li>


                      <li><a href="{{route('contact')}}" class="item-anchor" data-effect="Contact">Contact</a></li>

                    </ul>
                  </div>

                </div>
              </div>
            </div>
          </div>
        </nav>
      </div>
    </header>