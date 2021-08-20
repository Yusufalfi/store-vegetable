<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1, shrink-to-fit=no"
    />
    <meta name="description" content="" />
    <meta name="author" content="" />

    <title>@yield('title')</title>

    {{-- css --}}
    @stack('sebelum-style')
    @include('includes.style')
    @stack('sesudah-style')


  
  </head>

  <body>


    {{-- navbar --}}
     @include('includes.navbar-auth')

    

    <!-- page-content -->
    @yield('content')
  


    <!-- Bootstrap core JavaScript -->
    @stack('sebelum-script')
    @include('includes.script')
    @stack('sesudah-script')
    
  </body>
</html>
