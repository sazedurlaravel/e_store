<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>E Store - eCommerce HTML Template</title>
        <meta content="width=device-width, initial-scale=1.0" name="viewport">
        <meta content="eCommerce HTML Template Free Download" name="keywords">
        <meta content="eCommerce HTML Template Free Download" name="description">

      @include('frontend.partials.styles')
      @yield('styles')
    </head>

    <body>
       @include('frontend.partials.header')   
        
      @yield('content')       
        
       @include('frontend.partials.footer')
        
        <!-- Back to Top -->
        <a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>
        
       @include('frontend.partials.scripts')
       @yield('scripts')
    </body>
</html>
