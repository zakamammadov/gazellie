<!DOCTYPE html>
<html lang="en">
  <head>
    <title>@yield('title', config('app.name'))</title>
    @include('frontend.layouts.partials.head')
    @yield('head')
  </head>
  <body>
    @include('frontend.layouts.partials.search')
    @include('frontend.layouts.partials.navbar')
    @yield('content')
    @include('frontend.layouts.partials.footer')
    @include('frontend.layouts.partials.scripts')
    @yield('script')
</body>
</html>
