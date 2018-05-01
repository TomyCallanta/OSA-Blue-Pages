
<!DOCTYPE html>
<html lang="en">
<head>

  <!-- Basic Page Needs
  –––––––––––––––––––––––––––––––––––––––––––––––––– -->
  <meta charset="utf-8">
  <title>OSA Blue Pages</title>
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
  <link rel="stylesheet" href="{{asset('css/general.css')}}">
  <link rel="stylesheet" href="{{asset('css/normalize.css')}}">
  <link rel="stylesheet" href="{{asset('css/skeleton.css')}}">

  <link rel="stylesheet" type="text/css" href="{{asset('css/component.css')}}" />

  <!-- JS
  –––––––––––––––––––––––––––––––––––––––––––––––––– -->
  <script src="{{asset('js/classie.js')}}"></script>
  <script src="{{asset('js/general.js')}}"></script>

  <!-- Favicon
  –––––––––––––––––––––––––––––––––––––––––––––––––– -->
  <link rel="icon" type="image/png" href="{{asset('favicon.ico')}}">

</head>
<body>
  <!-- Nav Bar
  –––––––––––––––––––––––––––––––––––––––––––––––––– -->
  @include('topnav')

  <!-- Header
  –––––––––––––––––––––––––––––––––––––––––––––––––– -->
  @include('search')
<!-- Filter Bar
  –––––––––––––––––––––––––––––––––––––––––––––––––– -->
  <div class="filter">
    <div class="container">
      <div class="row">
        <div class="services">
          <div class="filterButton">
            <a>
              @if (!empty($current) && is_numeric($current))
                {{$categories[$current-1]->name}}
              @else  
                All Services 
              @endif
            </a>
            <img src="{{asset('img/ic_arrow_drop_down_black_18px.svg')}}">
          </div>

          <div class="services-content">
            @if (!empty($categories))
              <?php $c=0; 
              $first = true;  
              ?>
              @for ($i = 0; $i < ceil((count($categories)+1)/4); $i++)
                <div class="row">
                  @for ($j = 0; $j < 4; $j++)
                    @if (!empty($categories[$c]))
                      @if ($first)
                        <a class="three columns" href="/">All Services</a>
                        <?php $first = false; ?>
                      @else
                        <a class="three columns" href="{{route('search', ['sort' => $categories[$c]->id])}}"> {{$categories[$c]->name}} </a>
                        <?php $c++; ?>
                      @endif
                    @else
                      @break
                    @endif
                  @endfor
                </div>
                @if (empty($categories[$c]))
                  @break
                @endif
              @endfor
            @endif
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Primary Page Layout
  –––––––––––––––––––––––––––––––––––––––––––––––––– -->
  <div class="itemBox">
    @foreach ($suppliers as $supplier)
      <div class="item">
        <h5 class="itemName"><a href="{{url('/Supplier/'.$supplier->id)}}"> {{$supplier->company_name}} </a></h5>
        <p class="itemService"><a href="{{route('search', ['sort' => $supplier->category_id])}}"> {{$categories[$supplier->category_id - 1]->name}} </a></p>
        
        <div class="itemDetails">
          <p class="itemContent"><a href="#"> {{$supplier->email}} </a></p>
          <p class="itemContent"> {{$supplier->contact_no}} </p>
          <p class="itemContent itemRate"><strong>★ {{$supplier->rating}}</strong></p>
        </div>
      </div>
    @endforeach

    <?php $paginator = $suppliers->appends(['sort' => $current,'search' => $search])  ; ?>
    @include('pagination.limit_links')
    
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
<!-- End Document
  –––––––––––––––––––––––––––––––––––––––––––––––––– -->
</body>
</html>
