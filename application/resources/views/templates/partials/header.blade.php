<!-- preloader -->
<div class="loader-wrap">
    <div class="preloader">
        <div class="preloader-close"><i class="far fa-times"></i></div>
        <div id="handle-preloader" class="handle-preloader">
            <div class="animation-preloader">
                <div class="spinner"></div>
                <div class="txt-loading">
                    <span data-text-preloader="E" class="letters-loading">
                        E
                    </span>
                    <span data-text-preloader="A" class="letters-loading">
                        A
                    </span>
                    <span data-text-preloader="S" class="letters-loading">
                        S
                    </span>
                    <span data-text-preloader="Y" class="letters-loading">
                        Y
                    </span>
                    <span data-text-preloader="L" class="letters-loading">
                        L
                    </span>
                    <span data-text-preloader="A" class="letters-loading">
                        A
                    </span>
                    <span data-text-preloader="N" class="letters-loading">
                        N
                    </span>
                    <span data-text-preloader="D" class="letters-loading">
                        D
                    </span>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- preloader end -->


<!-- switcher menu -->

<!-- end switcher menu -->


<!-- main header -->
<header class="main-header">
    <!-- header-top -->
    <div class="header-top">
        <div class="top-inner clearfix">
            <div class="left-column pull-left">
                <ul class="info clearfix">
                    <li><i class="far fa-map-marker-alt"></i>Discover St, New York, NY 10012, USA</li>
                    <li><i class="far fa-clock"></i>Mon - Sat 9.00 - 18.00</li>
                    <li><i class="far fa-phone"></i><a href="tel:2512353256">+251-235-3256</a></li>
                </ul>
            </div>
            <div class="right-column pull-right">
                <ul class="social-links clearfix">
                    <li><a href="index.html"><i class="fab fa-facebook-f"></i></a></li>
                    <li><a href="index.html"><i class="fab fa-twitter"></i></a></li>
                    <li><a href="index.html"><i class="fab fa-pinterest-p"></i></a></li>
                    <li><a href="index.html"><i class="fab fa-google-plus-g"></i></a></li>
                    <li><a href="index.html"><i class="fab fa-vimeo-v"></i></a></li>
                </ul>
                @auth
                    <div class="sign-box">
                        <a href="{{ route('user.dashboard') }}"><i class="fas fa-user"></i>Dashboard</a>
                        <a href="{{ route('user.logout') }}"><i class="fas fa-user"></i>Logout</a>
                    </div>
                @else
                    <div class="sign-box">
                        <a href="{{ route('login') }}"><i class="fas fa-user"></i>Sign In</a>
                    </div>
                @endauth

            </div>
        </div>
    </div>
    <!-- header-lower -->
    <div class="header-lower">
        <div class="outer-box">
            <div class="main-box">
                <div class="logo-box">
                    <figure class="logo"><a href="{{ route('templates') }}"><img
                                src="{{ asset('application/public/frontend/assets/images/logo.png') }}"
                                alt=""></a></figure>
                </div>
                <div class="menu-area clearfix">
                    <!--Mobile Navigation Toggler-->
                    <div class="mobile-nav-toggler">
                        <i class="icon-bar"></i>
                        <i class="icon-bar"></i>
                        <i class="icon-bar"></i>
                    </div>
                    <nav class="main-menu navbar-expand-md navbar-light">
                        <div class="collapse navbar-collapse show clearfix" id="navbarSupportedContent">
                            <ul class="navigation clearfix">
                                <li><a href="{{ route('templates') }}"><span>Home</span></a>
                                <!-- <li><a href="{{ route('templates') }}"><span>About Us</span></a> -->
                                </li>

                                <li class="dropdown"><a href="#"><span>Property</span></a>
                                    <ul>
                                        <li><a href="{{ route('all.rent.property') }}">Rent Property</a></li>
                                        <li><a href="{{ route('all.buy.property') }}">Buy Property</a></li>
                                    </ul>
                                </li>

                                <!-- <li><a href="{{ route('templates') }}"><span>Agent List</span></a> -->
                                </li>
                                <li><a href="{{ route('blog.list') }}"><span>Blog</span></a></li>
                                <li><a href="{{ route('contact') }}"><span>Contact</span></a></li>
                                {{-- <li><a href="contact.html" class="btn btn-success"><span>Add Listing</span></a></li> --}}
                            </ul>
                        </div>
                    </nav>
                </div>
                <div class="btn-box">
                    <a href="{{ route('agent.login') }}" class="theme-btn btn-one"><span>+</span>Add Listing</a>
                </div>
            </div>
        </div>
    </div>

    <!--sticky Header-->
    <div class="sticky-header">
        <div class="outer-box">
            <div class="main-box">
                <div class="logo-box">
                    <figure class="logo"><a href="index.html"><img src="assets/images/logo.png" alt=""></a>
                    </figure>
                </div>
                <div class="menu-area clearfix">
                    <nav class="main-menu clearfix">
                        <!--Keep This Empty / Menu will come through Javascript-->
                    </nav>
                </div>
                <div class="btn-box">
                    <a href="index.html" class="theme-btn btn-one"><span>+</span>Add Listing</a>
                </div>
            </div>
        </div>
    </div>
</header>
<!-- main-header end -->
