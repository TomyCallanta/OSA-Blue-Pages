<!DOCTYPE html>
<html lang="en">
<head>

  <!-- Basic Page Needs
    –––––––––––––––––––––––––––––––––––––––––––––––––– -->
    <meta charset="utf-8">
    <title>Admin-Blue Pages</title>
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="_token" content="{{csrf_token()}}" />

  <!-- Mobile Specific Metas
    –––––––––––––––––––––––––––––––––––––––––––––––––– -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- FONT
    –––––––––––––––––––––––––––––––––––––––––––––––––– -->
    <link href="//fonts.googleapis.com/css?family=Raleway:400,300,600" rel="stylesheet" type="text/css">

  <!-- CSS
    –––––––––––––––––––––––––––––––––––––––––––––––––– -->
    <link rel="stylesheet" type="text/css" href="{{asset('css/general.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('css/normalize.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('css/skeleton.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('css/component.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('css/admin.css')}}">

  <!-- JS
    –––––––––––––––––––––––––––––––––––––––––––––––––– -->
    <script src="{{asset('js/classie.js')}}"></script>
    <script src="{{asset('js/jquery-3.2.1.min.js')}}"></script>
  <script src="{{asset('js/admin-jquery.js')}}"></script>

  <!-- Favicon
    –––––––––––––––––––––––––––––––––––––––––––––––––– -->
    <link rel="icon" type="image/png" href="images/favicon.png">

  </head>
  <body id="body">
  <!-- Top Nav
    –––––––––––––––––––––––––––––––––––––––––––––––––– -->
    @include('Admin.Nav')
  <!-- Main Thing
    –––––––––––––––––––––––––––––––––––––––––––––––––– -->
    <?php $filterPage = !empty($view) && in_array($view, ['Suggestion', 'Accepted', 'Rejected']); ?>
    <div class="admin-block" id="adminBlock">
      <div class = "container">
        @if ($filterPage) 
          @include('Admin.View')
        @else
          <div class="company admin-head">
            <?php $title = "New Supplier"; ?>
            @include('Form')
          </div>
        @endif
      </div>
    </div>

    @if ($filterPage)
      @include('Admin.Modal')
    @endif


<!-- Scripts
  –––––––––––––––––––––––––––––––––––––––––––––––––– -->
  <script>
    var menuLeft = document.getElementById( 'cbp-spmenu-s1' );
    var mainContent = document.getElementById( 'adminBlock' );
    var modalContent = document.getElementById( 'modalContent' );

    function menuToggle(x) {
      classie.toggle( x, 'active' );
      classie.toggle( menuLeft, 'cbp-spmenu-open' );
      classie.toggle( mainContent, 'admin-close' );
      classie.toggle( modalContent, 'admin-close' );
    };

    var modalWhole = document.getElementById('modalWhole');

    function editToggle(){
      classie.toggle(modalWhole, 'modal-open');
    }
  </script>
<!-- End Document
  –––––––––––––––––––––––––––––––––––––––––––––––––– -->
</body>
</html>