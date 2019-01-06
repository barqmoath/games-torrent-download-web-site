<!-- pageheader
================================================== -->
<div class="s-pageheader">

    <header class="header">
        <div class="header__content row">

            <div class="header__logo">
                <a class="logo" href="index.html">
                  <!--<img src="images/logo.svg" alt="Homepage">-->
                  <p style="font-size: 2.5rem;font-family: Segoe UI;margin-bottom: .5rem;text-decoration: none;color: #EEE;font-weight: 700;">GAMES TORRENT</p>
                </a>
            </div> <!-- end header__logo -->

            <ul class="header__social">
                <li>
                    <a href="#0"><i class="fa fa-facebook" aria-hidden="true"></i></a>
                </li>
                <li>
                    <a href="#0"><i class="fa fa-twitter" aria-hidden="true"></i></a>
                </li>
                <li>
                    <a href="#0"><i class="fa fa-instagram" aria-hidden="true"></i></a>
                </li>
                <li>
                    <a href="#0"><i class="fa fa-pinterest" aria-hidden="true"></i></a>
                </li>
                @if(!Auth::check())
                  <li>
                      <a href="{{ route('login') }}"><i class="fa fa-sign-in" aria-hidden="true"></i></a>
                  </li>
                @endif
            </ul> <!-- end header__social -->

            <a class="header__search-trigger" href="#0"></a>

            <div class="header__search">

              <form role="search" method="get" class="header__search-form" action="{{ route('search') }}">
                  <label>
                      <span class="hide-content">Search for:</span>
                      <input type="search" class="search-field" placeholder="Type Keywords" value="" name="s" title="Search for:" autocomplete="off">
                  </label>
                  <input type="submit" class="search-submit" value="Search">
              </form>

                <a href="#0" title="Close Search" class="header__overlay-close">Close</a>

            </div>  <!-- end header__search -->


            <a class="header__toggle-menu" href="#0" title="Menu"><span>Menu</span></a>

            <nav class="header__nav-wrap">

                <h2 class="header__nav-heading h6">Navigation</h2>

                <ul class="header__nav">
                    <li><a href="{{ route('home') }}" title="">Home</a></li>
                    <li><a href="{{ route('top') }}" title="">Top Games</a></li>
                    <li class="has-children">
                        <a href="#0" title="">Platforms</a>
                        <ul class="sub-menu">
                          @foreach($platforms as $platform)
                            <li><a href="{{ route('plat',['pid'=>$platform->id]) }}">{{ $platform->title }}</a></li>
                          @endforeach
                        </ul>
                    </li>
                    <li class="has-children">
                        <a href="#0" title="">Categories</a>
                        <ul class="sub-menu">
                          @foreach($categories as $category)
                            <li><a href="{{ route('cat',['catid' => $category->id]) }}">{{ $category->title }}</a></li>
                          @endforeach
                        </ul>
                    </li>
                    <li><a href="{{ route('photos') }}" title="">Games Photos</a></li>
                    <li><a href="{{ route('about') }}" title="">About</a></li>
                    @if(Auth::check())
                    <li class="has-children">
                        <a href="#0" title="">{{ Auth::user()->name }}</a>
                        <ul class="sub-menu">
                          <li><a href="{{ route('settings.index') }}">Settings</a></li>
                          <li><a href="#" onclick="event.preventDefault(); document.getElementById('logoutForm').submit();">Logout</a></li>
                          <form id="logoutForm" action="/logout" method="POST" style="display: none;">{{ csrf_field() }}</form>
                        </ul>
                    </li>
                    @endif
                </ul> <!-- end header__nav -->

                <a href="#0" title="Close Menu" class="header__overlay-close close-mobile-menu">Close</a>

            </nav> <!-- end header__nav-wrap -->

        </div> <!-- header-content -->
    </header> <!-- header -->

</div> <!-- end s-pageheader -->
