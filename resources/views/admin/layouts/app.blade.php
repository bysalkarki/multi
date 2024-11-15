<!DOCTYPE html>
<html lang="en">

<head>
  @include('admin.layouts.style')
</head>

<body class="nav-md">
  <div class="container body">
    <div class="main_container">
      @include('admin.layouts.sidebar')

      @include('admin.layouts.header')
      <!-- page content -->
      <div class="right_col" role="main">
        <div class="">

         @yield('content')

          <div class="clearfix"></div>

         
        </div>
      </div>
      <!-- /page content -->

      <!-- footer content -->
      <footer>
        <div class="pull-right">
          Gentelella - Bootstrap Admin Template by <a href="https://colorlib.com">Colorlib</a>
        </div>
        <div class="clearfix"></div>
      </footer>
      <!-- /footer content -->
    </div>
  </div>


  @include('admin.layouts.script')

</body>

</html>