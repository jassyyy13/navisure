@if(Session::get('admin_id') != "")
      <script type="text/javascript">window.location='{{url("/admin")}}'</script>
@endif

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="csrf-token" content="{{csrf_token() }}">
  <title>NaViSUre: Interactive Map of NVSU Bayombong</title>
  <link rel="icon" type="image/x-icon" href="{{ url('public/favicon.ico') }}">
  <!-- Styling for admin panel -->
  <link rel="stylesheet" type="text/css" href="{{url('public/asset/css/admin.css')}}">
  <!-- Bootstrap CDN -->
  <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
  <!-- FontAwesome CDN -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <!-- Mapbox CDN -->
  <link href="https://api.mapbox.com/mapbox-gl-js/v2.15.0/mapbox-gl.css" rel="stylesheet">
  <!-- Mapbox JS -->
  <script src="https://api.mapbox.com/mapbox-gl-js/v2.15.0/mapbox-gl.js"></script>
  <!-- Map Styling -->
  
  <style>
  #map { position: absolute; top: 55px; bottom: 0; width: 100%; }
  .navbar {background-color: #149c3c} 
  .mapboxgl-popup {
    max-width: 400px;
    font: 12px/20px 'Helvetica Neue', Arial, Helvetica, sans-serif;
    }
/*  #108831 - Darker green shade*/
/*  #88f0a5 - Lighter green shade*/

  .navbar {
      z-index: 1;
    }

  </style>
</head>
<body>
  <!-- Navbar -->
  <header>
    <nav class="navbar navbar-expand-md navbar-dark fixed-top">
      <div class="container-fluid">
        <a class="navbar-brand" href="#">NaViSUre</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
          <ul class="navbar-nav me-auto mb-2 mb-md-0">
            <li class="nav-item">
              <a class="nav-link {{ (request()->is('home') ? 'active' : '' ) }} {{ (request()->is('/') ? 'active' : '' ) }}" aria-current="page" href="{{url('/home/')}}">Map</a>
            </li>
            <li class="nav-item">
              <a class="nav-link {{ (request()->is('legend') ? 'active' : '' ) }}" aria-current="page" href="{{url('/legend/')}}">Legend</a>
            </li> 
            <li class="nav-item">
              <a class="nav-link {{ (request()->is('control') ? 'active' : '' ) }}" aria-current="page" href="{{url('/control/')}}">Controls</a>
            </li>
            <li class="nav-item">
              <a class="nav-link {{ (request()->is('about') ? 'active' : '' ) }}" aria-current="page" href="{{url('/about/')}}">About</a>
            </li>
          </ul>
          <button class="btn btn-sm btn-warning text-white btn-outline-black" id="reset_map" type="button"
            style="position: relative; right: 10px; visibility: {{ (request()->is('home') || request()->is('/') ? 'visible' : 'hidden' ) }}">
            <i class="fa fa-refresh"></i> Reset Map
          </button>

          <form class="d-flex" id="user_search" style="visibility: {{ (request()->is('home') || request()->is('/') ? 'visible' : 'hidden' ) }}">
            @CSRF
            <input class="form-control me-2" id="user_search_input" name="user_search_input" type="search" placeholder="Search" aria-label="Search">
            <button class="btn text-white btn-outline-success" type="submit"><i class="fa fa-search"></i></button>
          </form>
        </div>
      </div>
    </nav>
  </header>

@yield('contents')

<!-- jQuery CDN -->
  <script src="https://code.jquery.com/jquery-3.7.0.min.js" integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>
  <!-- Bootstrap Bundle CDN -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <script type="text/javascript" src="public/asset/js/map3.js"></script>
</body>

<script>
    window.addEventListener('load', function () {
        var button = document.getElementById('reset_map');
        if (button) {
            if (window.innerWidth <= 768) {
                button.classList.add('mb-3');
            }
        }
    });
</script>


<!-- Reset Modal when closed -->
<script type="text/javascript">
  var carousel_reset = $("#bldg_carousel").html();
  var carousel_reset1 = $("#poi_carousel").html();

$('.btn-close').click(function(){
  $("#bldg_carousel").html(carousel_reset);
  $("#poi_carousel").html(carousel_reset1);
  $("#imageLoadModal").modal('hide');
});
</script>

<!-- Reset map -->
<script type="text/javascript">
  $('#reset_map').click(function() {
    window.location.reload();
  })
</script>