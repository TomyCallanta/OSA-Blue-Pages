<!DOCTYPE html>
<html lang="en">
<head>

  <!-- Basic Page Needs
    –––––––––––––––––––––––––––––––––––––––––––––––––– -->
    <meta charset="utf-8">
    <title>Suggestion Form</title>
    <meta name="description" content="">
    <meta name="author" content="">

  <!-- Mobile Specific Metas
    –––––––––––––––––––––––––––––––––––––––––––––––––– -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- FONT
    –––––––––––––––––––––––––––––––––––––––––––––––––– -->
    <link href="//fonts.googleapis.com/css?family=Raleway:400,300,600" rel="stylesheet" type="text/css">

  <!-- CSS
    –––––––––––––––––––––––––––––––––––––––––––––––––– -->
    <link rel="stylesheet" type="text/css" href="css/general.css">
    <link rel="stylesheet" href="css/normalize.css">
    <link rel="stylesheet" href="css/skeleton.css">
    <link rel="stylesheet" href="css/parallax.css">

    <link rel="stylesheet" type="text/css" href="css/component.css" />

  <!-- JS
    –––––––––––––––––––––––––––––––––––––––––––––––––– -->
    <script src="js/classie.js"></script>
    <script src="js/general.js"></script>

  <!-- Favicon
    –––––––––––––––––––––––––––––––––––––––––––––––––– -->
    <link rel="icon" type="image/png" href="images/favicon.png">

  </head>
  <body>
  <!-- Nav Bar
    –––––––––––––––––––––––––––––––––––––––––––––––––– -->
  @include('topnav')
  <!-- Header
    –––––––––––––––––––––––––––––––––––––––––––––––––– -->
    <div class="header">
      
    </div>

  <!-- Form
    –––––––––––––––––––––––––––––––––––––––––––––––––– -->
  <div class = "company page container" style="padding:20px">
    <?php $title = "Suggestion Form"; ?>
    @include('Form')
  </div>

    <!-- Scripts
  –––––––––––––––––––––––––––––––––––––––––––––––––– -->
  <script>
    var menuLeft = document.getElementById( 'cbp-spmenu-s1' )

    function menuToggle(x) {
      classie.toggle( x, 'active' );
      classie.toggle( menuLeft, 'cbp-spmenu-open' );
    };
  </script>

    <!-- Always wrap checkbox and radio inputs in a label and use a <span class="label-body"> inside of it -->

      <!-- Note: The class .u-full-width is just a utility class shorthand for width: 100% -->
<!-- End Document
  –––––––––––––––––––––––––––––––––––––––––––––––––– -->
</body>
</html>