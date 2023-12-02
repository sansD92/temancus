<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
       @include('partials.head')
    </head>
    <body >
        @include('partials.nav')
        @include('partials.alert')
          @yield('body')
          @include('partials.footer')
          @include('partials.script')
          @yield('after-script')
    </body>
</html>
