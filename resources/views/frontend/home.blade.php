<!DOCTYPE html>
<html lang="en">
  <head>
    <title>@yield('title', config('app.name'))</title>
    @include('frontend.layouts.partials.head')
    @yield('head')
  </head>
  <body>
  <body>
    <!-- search modal starts -->
    @include('frontend.layouts.partials.search')
<!-- search modal ends -->
<div class="home-page">
  <!-- /*header starts*/ -->
<header class="custom-header black">
<nav class="navbar navbar-expand-xl">
    <div class="container">
        <a class="header-logo" href="#">
            <img src="{{asset('front')}}/img/index/logo.svg" alt="Gazelli logo">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
            @include('frontend.layouts.partials.menu')
        </div>
</nav>
</header>
<!-- /*header ends*/ -->
<div class="slider-wrapper">
    <div class="home-slider_cover">
        <!-- slider starts -->
            <div class="owl-carousel">
                <!-- first slide starts -->
                <div class="full-screen" style="background-image: url('{{asset('front')}}/img/index/banner.png');">
                    <div class="banner-container">
                        <h1 class="page-title">GAZELLI GROUP</h1>
                        <h4 class="page-subtitle">Azerbaijan EST 1999</h4>
                        <p class="page-descr">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                        <a href="about.html" class="about-btn">Подробнее</a>
                    </div>
                </div>
                <!-- first slide ends -->
                <!-- second slides starts -->
                <div class="full-screen" style="background-image: url('{{asset('front')}}/img/about/about-bg.png');">
                    <div class="banner-container">
                        <h1 class="page-title">GAZELLI GROUP</h1>
                        <h4 class="page-subtitle">Azerbaijan EST 1999</h4>
                        <p class="page-descr">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                        <a href="about.html" class="about-btn">Подробнее</a>
                    </div>
                </div>
                <!-- second slides ends -->
                <!-- third slide starts -->
                <div class="full-screen" style="background-image: url('{{asset('front')}}/img/index/banner.png')">
                    <div class="banner-container">
                        <h1 class="page-title">GAZELLI GROUP</h1>
                        <h4 class="page-subtitle">Azerbaijan EST 1999</h4>
                        <p class="page-descr">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                        <a href="about.html" class="about-btn">Подробнее</a>
                    </div>
                </div>
                <!-- third slide ends -->
            </div>

    <!-- slider ends -->

    </div>
</div>
</div>
<!-- footer starts -->
@include('frontend.layouts.partials.footer')
@include('frontend.layouts.partials.scripts')
 </body>
</html>
