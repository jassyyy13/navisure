    @if(Session::get('admin_id') == '')
      <script type="text/javascript">window.location='{{url("/")}}'</script>
    @endif

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{csrf_token() }}">
    <link rel="icon" type="image/x-icon" href="{{ url('public/favicon.ico') }}">
    <title>NaViSUre Admin</title>
    <!-- Styling for admin panel -->
    <link rel="stylesheet" type="text/css" href="{{url('public/asset/css/admin.css')}}">
    <!-- FontAwesome CDN -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- Bootstrap CDN  -->
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
    <!-- Custom styles for this template -->
    <link href="{{url('public/asset/dashboard.css')}}" rel="stylesheet"/>
    <!-- Mapbox CDN -->
    <link href="https://api.mapbox.com/mapbox-gl-js/v2.15.0/mapbox-gl.css" rel="stylesheet">
    <!-- Mapbox JS -->
    <script src="https://api.mapbox.com/mapbox-gl-js/v2.15.0/mapbox-gl.js"></script>
    <!-- Croppie CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/croppie/2.6.5/croppie.min.css" integrity="sha512-zxBiDORGDEAYDdKLuYU9X/JaJo/DPzE42UubfBw9yg8Qvb2YRRIQ8v4KsGHOx2H1/+sdSXyXxLXv5r7tHc9ygg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- Data Tables CSS -->
    <link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
    <!-- jQuery UI JS for Autocomplete -->
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    

  </head>
  <body>
    
<header class="navbar navbar-dark sticky-top flex-md-nowrap p-0 shadow">
  <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3" href="#">NaViSUre Admin</a>
  <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="col-md-9 col-lg-10 text-center">
    <h5 class="text-white lead">NVSU - Bayombong Interactive Map</h5>
  </div>
</header>

<div class="container-fluid">
  <div class="row">
    <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
      <div class="position-sticky pt-3">
        <ul class="nav flex-column">
            <li class="nav-item">
              <a class="nav-link {{ (request()->is('admin/edit') ? 'active' : '' ) }}" href="{{url('admin/edit')}}">
                <i class="fa-solid fa-map-location-dot"></i> 
                 Edit Map
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link {{ (request()->is('admin/bldg_photos') ? 'active' : '' ) }}" href="{{url('admin/bldg_photos')}}">
                <i class="fa-sharp fa-solid fa-image"></i>
                 Building Photos
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link {{ (request()->is('admin/bldg_info') ? 'active' : '' ) }}" href="{{url('admin/bldg_info')}}">
                <i class="fa-sharp fa-solid fa-building"></i>
                 Entities Information
              </a>
            </li>
            <li class="nav-item border-bottom border-black">
              <a class="nav-link {{ (request()->is('admin/legend') ? 'active' : '' ) }} mb-2" href="{{url('admin/legend')}}">
                <i class="fa-sharp fa-solid fa-map"></i>
                 Legend
              </a>
            </li>
        </ul>

        <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
          <span>Settings</span>
            <i class="fa-solid fa-gear"></i>
          </a>
        </h6>
        <ul class="nav flex-column mb-2">
          <li class="nav-item">
            <a class="nav-link {{ (request()->is('admin/profile') ? 'active' : '' ) }}" href="{{url('admin/profile')}}">
              <span class="fa fa-user"></span>
              My Profile
            </a>
          </li>
          <li class="nav-item border-bottom border-black">
            <a class="nav-link pb-2" href="{{ route('logout.logoutAccount') }}"><i class="fa-solid fa-right-from-bracket"></i>
             Sign out</a>
          </li>

          <!-- Reset Map Button -->
        <div class="row" style="visibility: {{ (request()->is('admin/edit') ? 'visible' : 'hidden' ) }}">
          <div class="col-md-8 ml-auto mr-3">
            <button class="btn btn-sm btn-warning" id="reset_btn" style="position: relative; left: 50px; top: 50px;"><i class="fa-solid fa-refresh"></i> Reset Map</button>
          </div>
        </div>
        </ul> 
      </div>
    </nav>
  </div>
</div>

<!-- jQuery CDN -->
<script src="https://code.jquery.com/jquery-3.7.0.min.js" integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>
<!-- Data Tables JS -->
<script type="text/javascript" src="//cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>

@yield('content')

</div>

<!-- Building info Modal-->
<div class="modal fade" id="bldg_info_modal" role="dialog" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl modal-dialog-scrollable modal-dialog-centered modal-dialog-lg" role="document" role="document">
    <div class="modal-content">
      <div class="modal-header text-center" style="background-color: #47d147">
        <h4 class="modal-title w-100 text-center"  id="modal_title"></h4>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body" id="modal_body">
        <div class="row text-center">
        <div id="bldg_carousel" class="carousel carousel-dark slide" data-bs-ride="carousel">
          <div class="carousel-inner">
            <div class="carousel-item active" id="bldg_image_1_carousel">
              <a href="" id="bldg_image_url">
                <img src="" class="mb-3 pb-3 border-bottom border-black mx-auto img-responsive" id="bldg_image" style="width: 80%;visibility: hidden;">
              </a>
            </div>
              <div class="" id="bldg_image_2_carousel">
                <a href="" id="bldg_image_url_2">
                  <img src="" class="mb-3 pb-3 border-bottom border-black mx-auto img-responsive" id="bldg_image_2" style="width: 80%;visibility: hidden; position: absolute;">
                </a>
              </div>
            <div class="" id="bldg_image_3_carousel">
              <a href="" id="bldg_image_url_3">
                <img src="" class="mb-3 pb-3 border-bottom border-black mx-auto img-responsive" id="bldg_image_3" style="width: 80%;visibility: hidden; position: absolute;">
              </a>
            </div>
            <div class="" id="bldg_image_4_carousel">
              <a href="" id="bldg_image_url_4">
                <img src="" class="mb-3 pb-3 border-bottom border-black mx-auto img-responsive" id="bldg_image_4" style="width: 80%;visibility: hidden; position: absolute;">
              </a>
            </div>
            <div class="" id="bldg_image_5_carousel">
              <a href="" id="bldg_image_url_5">
                <img src="" class="mb-3 pb-3 border-bottom border-black mx-auto img-responsive" id="bldg_image_5" style="width: 80%;visibility: hidden; position: absolute;">
              </a>
            </div>
            <div class="" id="bldg_image_6_carousel">
              <a href="" id="bldg_image_url_6">
                <img src="" class="mb-3 pb-3 border-bottom border-black mx-auto img-responsive" id="bldg_image_6" style="width: 80%;visibility: hidden; position: absolute;">
              </a>
            </div>
            <div class="" id="bldg_image_7_carousel">
              <a href="" id="bldg_image_url_7">
                <img src="" class="mb-3 pb-3 border-bottom border-black mx-auto img-responsive" id="bldg_image_7" style="width: 80%;visibility: hidden; position: absolute;">
              </a>
            </div>
            <div class="" id="bldg_image_8_carousel">
              <a href="" id="bldg_image_url_8">
                <img src="" class="mb-3 pb-3 border-bottom border-black mx-auto img-responsive" id="bldg_image_8" style="width: 80%;visibility: hidden; position: absolute;">
              </a>
            </div>
            <div class="" id="bldg_image_9_carousel">
              <a href="" id="bldg_image_url_9">
                <img src="" class="mb-3 pb-3 border-bottom border-black mx-auto img-responsive" id="bldg_image_9" style="width: 80%;visibility: hidden; position: absolute;">
              </a>
            </div>
            <div class="" id="bldg_image_10_carousel">
              <a href="" id="bldg_image_url_10">
                <img src="" class="mb-3 pb-3 border-bottom border-black mx-auto img-responsive" id="bldg_image_10" style="width: 80%;visibility: hidden; position: absolute;">
              </a>
            </div>
          </div>
          <button class="carousel-control-prev carousel-btn" type="button" data-bs-target="#bldg_carousel" data-bs-slide="prev" style="visibility: hidden;">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
          </button>
          <button class="carousel-control-next carousel-btn" type="button" data-bs-target="#bldg_carousel" data-bs-slide="next" style="visibility: hidden;">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
          </button>
        </div>

        </div>
        <div class="mb-3 pb-3 border-bottom border-black" id="bldg_dsc">
          <h5 id="bldg_desc">Building Information</h5>
          <p id="bldg_description" style="text-align: justify;"></p>
        </div>
        <div class="mb-3 pb-3 border-bottom border-black" id="bldg_svc">
          <h5>Services</h5>
          <p id="bldg_service"></p>
        </div>
        <div class="mb-3 pb-3 border-bottom border-black" id="bldg_rm">
          <h5 >Rooms</h5>
          <p id="bldg_room"></p>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<!-- POI info Modal-->
<div class="modal fade" id="poi_info_modal" role="dialog" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl modal-dialog-scrollable modal-dialog-centered modal-dialog-lg" role="document">
    <div class="modal-content">
      <div class="modal-header text-center" style="background-color: #47d147">
        <h4 class="modal-title w-100 text-center"  id="poi_title"></h4>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body" id="modal_body">
        <div class="row text-center">
          <div id="poi_carousel" class="carousel carousel-dark slide" data-bs-ride="carousel">
            <div class="carousel-inner">
              <div class="carousel-item active" id="poi_image_1_carousel">
                <a href="" id="poi_image_url">
                  <img src="" class="mb-3 pb-3 border-bottom border-black mx-auto img-responsive" id="poi_image" style="width: 80%;visibility: hidden;">
                </a>
              </div>
                <div class="" id="poi_image_2_carousel">
                  <a href="" id="poi_image_url_2">
                    <img src="" class="mb-3 pb-3 border-bottom border-black mx-auto img-responsive" id="poi_image_2" style="width: 80%;visibility: hidden; position: absolute;">
                  </a>
                </div>
              <div class="" id="poi_image_3_carousel">
                <a href="" id="poi_image_url_3">
                  <img src="" class="mb-3 pb-3 border-bottom border-black mx-auto img-responsive" id="poi_image_3" style="width: 80%;visibility: hidden; position: absolute;">
                </a>
              </div>
              <div class="" id="poi_image_4_carousel">
                <a href="" id="poi_image_url_4">
                  <img src="" class="mb-3 pb-3 border-bottom border-black mx-auto img-responsive" id="poi_image_4" style="width: 80%;visibility: hidden; position: absolute;">
                </a>
              </div>
              <div class="" id="poi_image_5_carousel">
                <a href="" id="poi_image_url_5">
                  <img src="" class="mb-3 pb-3 border-bottom border-black mx-auto img-responsive" id="poi_image_5" style="width: 80%;visibility: hidden; position: absolute;">
                </a>
              </div>
            </div>
            <button class="carousel-control-prev poi-carousel-btn" type="button" data-bs-target="#poi_carousel" data-bs-slide="prev" style="visibility: hidden;">
              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
              <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next poi-carousel-btn" type="button" data-bs-target="#poi_carousel" data-bs-slide="next" style="visibility: hidden;">
              <span class="carousel-control-next-icon" aria-hidden="true"></span>
              <span class="visually-hidden">Next</span>
            </button>
          </div>
        </div>
        <div class="mb-3 pb-3 border-bottom border-black" id="poi_dsc">
          <h5>Description</h5>
          <p id="poi_description" style="text-align: justify;"></p>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

</div>

<!-- Popper JS -->
<script type="text/javascript" src="https://unpkg.com/@popperjs/core@2"></script>
<!-- Bootstrap Bundle CDN -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>

<!-- Enabling popper -->
<script type="text/javascript">
  var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
  var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
  return new bootstrap.Tooltip(tooltipTriggerEl)
})
</script>

<!-- Reset map -->
<script type="text/javascript">
  $('#reset_btn').click(function() {
    window.location.reload();
  })
</script>

<!-- Reset Modal when closed -->
<script type="text/javascript">
  var carousel_reset = $("#bldg_carousel").html();
  var carousel_reset1 = $("#poi_carousel").html();

$('.btn-close').click(function(){
  $("#bldg_carousel").html(carousel_reset);
  $("#poi_carousel").html(carousel_reset1);
});
</script>

<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
<script>
axios.get('get-api-key')
    .then(function (response) {
    const apiKey = response.data.api_key;
        
// Set the Mapbox access token using the retrieved API key
mapboxgl.accessToken = apiKey;

const map = new mapboxgl.Map({
container: 'map', // container ID
// Choose from Mapbox's core styles, or make your own style with Mapbox Studio
style: 'mapbox://styles/mapbox/streets-v12', // style URL
minZoom: 17,
maxZoom: 19,
pitch: 30, // pitch in degrees
bearing: 305, // bearing in degrees
center: [121.14424930671487, 16.479763821101017], // starting position [lng, lat]
zoom: 17.3, // starting zoom
// maxBounds: bounds // Set the map's boundaries.
// cooperativeGestures: true
});

//Add fullscreen control
map.addControl(new mapboxgl.FullscreenControl());
// Add zoom and rotation controls to the map.
map.addControl(new mapboxgl.NavigationControl());

//Display coordinates when clicked
map.on('click', function(e) {
var coordinates = e.lngLat;
new mapboxgl.Popup()
  .setLngLat(coordinates)
  .setHTML('Coordinates: ' + coordinates)
  .addTo(map);
});

map.on('load', () => {
    
@foreach($paths as $path)
  map.addSource('{{$path->pth_code}}', {
'type': 'geojson',
'data': {
'type': 'Feature',
'properties': {},
'geometry': {
'type': 'LineString',
'coordinates': [
[{{$path->point_1}}],
[{{$path->point_2}}]]}}});

map.addLayer({
'id': '{{$path->pth_code}}',
'type': 'line',
'source': '{{$path->pth_code}}',
'layout': {
'line-join': 'round',
'line-cap': 'round'
},
'paint': {
'line-color': '#888',
'line-width': 8
}
});
@endforeach

//Retrieve building coordinates from databse and show it as polygons.
@foreach($building as $points)
// Add a data source containing GeoJSON data.
map.addSource('{{$points->bldg_code}}', {
'type': 'geojson',
'data': {
'type': 'Feature',
'geometry': {
'type': 'Polygon',
// These coordinates outlines the building.
'coordinates': [[
[{{$points->point_1}}],
[{{$points->point_2}}],
[{{$points->point_3}}],
[{{$points->point_4}}],
[{{$points->point_1}}],
]]}}});

//Polygon color based on building category
bldg_color = '#ffcc00';
if('{{$points->bldg_category}}' === 'for_classes'){
  bldg_color = '#ffcc00';
  //hex value
} if('{{$points->bldg_category}}' === 'not_for_classes'){
  bldg_color = '#ffa64d';
} if('{{$points->bldg_category}}' === 'reference_bldg'){
  bldg_color = '#66e0ff';
}
 
// Add a new layer to visualize the polygon.
map.addLayer({
'id': '{{$points->bldg_code}}',
'type': 'fill',
'source': '{{$points->bldg_code}}', // reference the data source
'layout': {},
'paint': {
'fill-color': bldg_color, // color fill #2BE3F0
'fill-opacity': 1
}
});
@endforeach

//set markers
const geojson = {
'type': 'FeatureCollection',
'features': [
@foreach($building as $center)
{
'type': 'Feature',
'properties': {
'id': '{{$center->bldg_code}}',
'name' : '{{$center->bldg_name}}',
'img': '{{url("public/asset/img/bldg_img/$center->bldg_img")}}',
'img2': '{{url("public/asset/img/bldg_img/$center->bldg_img_2")}}',
'img3': '{{url("public/asset/img/bldg_img/$center->bldg_img_3")}}',
'img4': '{{url("public/asset/img/bldg_img/$center->bldg_img_4")}}',
'img5': '{{url("public/asset/img/bldg_img/$center->bldg_img_5")}}',
'img6': '{{url("public/asset/img/bldg_img/$center->bldg_img_6")}}',
'img7': '{{url("public/asset/img/bldg_img/$center->bldg_img_7")}}',
'img8': '{{url("public/asset/img/bldg_img/$center->bldg_img_8")}}',
'img9': '{{url("public/asset/img/bldg_img/$center->bldg_img_9")}}',
'img10': '{{url("public/asset/img/bldg_img/$center->bldg_img_10")}}',
'name': '{{$center->bldg_name}}',
'desc': '{{$center->bldg_desc}}',
'services': '{{$center->bldg_services}}',
'rooms': '{{$center->bldg_rooms}}',
'center' : '{{$center->bldg_center}}',
'iconSize': [20, 20]
},
'geometry': {
'type': 'Point',
'coordinates': [{{$center->bldg_center}}]
}},
@endforeach
]
};
 
// Add markers to the map.
for (const marker of geojson.features) {
// Create a DOM element for each marker.
const el = document.createElement('div');
const width = marker.properties.iconSize[0];
const height = marker.properties.iconSize[1];
const id = marker.properties.id;
const img = marker.properties.img;
const img2 = marker.properties.img2;
const img3 = marker.properties.img3;
const img4 = marker.properties.img4;
const img5 = marker.properties.img5;
const img6 = marker.properties.img6;
const img7 = marker.properties.img7;
const img8 = marker.properties.img8;
const img9 = marker.properties.img9;
const img10 = marker.properties.img10;
const name = marker.properties.name;
const desc = marker.properties.desc;
const services = marker.properties.services;
const rooms = marker.properties.rooms;
const center = marker.properties.center;
el.className = 'marker';
el.style.backgroundImage = `url('../public/asset/img/icons/vector-sign-of-building-icon.jpg')`;
el.style.width = `${width}px`;
el.style.height = `${height}px`;
el.style.backgroundSize = '100%';

// Add markers to the map.
new mapboxgl.Marker(el)
.setLngLat(marker.geometry.coordinates)
.addTo(map);

el.addEventListener('click', () => {
text = center.toString();
bldg_center = text.split(", ");
map.flyTo({
  center: [bldg_center[0], bldg_center[1]],
  essential: true
});

});

//Display building info when building polygon is clicked.
map.on('click', id, (e) => {
text = center.toString();
bldg_center = text.split(", ");
map.flyTo({
  center: [bldg_center[0], bldg_center[1]],
  essential: true
});
$('#modal_title').html(name);
$('#bldg_description').html(desc);
$('#bldg_service').html(services);
$('#bldg_room').html(rooms);

if(desc == ''){
  $('#bldg_dsc').css('visibility', 'hidden');
  $('#bldg_dsc').css('position', 'absolute');
} else {
  $('#bldg_dsc').css('visibility', 'visible');
  $('#bldg_dsc').css('position', 'relative');
}

if(services == ''){
  $('#bldg_svc').css('visibility', 'hidden');
  $('#bldg_svc').css('position', 'absolute');
} else {
  $('#bldg_svc').css('visibility', 'visible');
  $('#bldg_svc').css('position', 'relative');
}

if(rooms == ''){
  $('#bldg_rm').css('visibility', 'hidden');
  $('#bldg_rm').css('position', 'absolute');
} else {
  $('#bldg_rm').css('visibility', 'visible');
  $('#bldg_rm').css('position', 'relative');
}

var img_count = 0;

if(img.endsWith("png")){
  img_count += 1;
  $('#bldg_image').css('visibility', 'visible');
  $('#bldg_image').attr('src', img);
  $('#bldg_image_url').attr('href', img);
} 

if(img2.endsWith("png")){
  img_count += 1;
  $('#bldg_image_2_carousel').addClass('carousel-item');
  $('#bldg_image_2').css('visibility', 'visible');
  $('#bldg_image_2').css('position', 'relative');
  $('#bldg_image_2').attr('src', img2);
  $('#bldg_image_url_2').attr('href', img2);
}

if(img3.endsWith("png")){
  img_count += 1;
  $('#bldg_image_3_carousel').addClass('carousel-item');
  $('#bldg_image_3').css('visibility', 'visible');
  $('#bldg_image_3').css('position', 'relative');
  $('#bldg_image_3').attr('src', img3);
  $('#bldg_image_url_3').attr('href', img3);
} 

if(img4.endsWith("png")){
  img_count += 1;
  $('#bldg_image_4_carousel').addClass('carousel-item');
  $('#bldg_image_4').css('visibility', 'visible');
  $('#bldg_image_4').css('position', 'relative');
  $('#bldg_image_4').attr('src', img4);
  $('#bldg_image_url_4').attr('href', img4);
} 

if(img5.endsWith("png")){
  img_count += 1;
  $('#bldg_image_5_carousel').addClass('carousel-item');
  $('#bldg_image_5').css('visibility', 'visible');
  $('#bldg_image_5').css('position', 'relative');
  $('#bldg_image_5').attr('src', img5);
  $('#bldg_image_url_5').attr('href', img5);
} 

if(img6.endsWith("png")){
  img_count += 1;
  $('#bldg_image_6_carousel').addClass('carousel-item');
  $('#bldg_image_6').css('visibility', 'visible');
  $('#bldg_image_6').css('position', 'relative');
  $('#bldg_image_6').attr('src', img6);
  $('#bldg_image_url_6').attr('href', img6);
} 

if(img7.endsWith("png")){
  img_count += 1;
  $('#bldg_image_7_carousel').addClass('carousel-item');
  $('#bldg_image_7').css('visibility', 'visible');
  $('#bldg_image_7').css('position', 'relative');
  $('#bldg_image_7').attr('src', img7); 
  $('#bldg_image_url_7').attr('href', img7);
} 

if(img8.endsWith("png")){
  img_count += 1;
  $('#bldg_image_8_carousel').addClass('carousel-item');
  $('#bldg_image_8').css('visibility', 'visible');
  $('#bldg_image_8').css('position', 'relative');
  $('#bldg_image_8').attr('src', img8);
  $('#bldg_image_url_8').attr('href', img8);
} 

if(img9.endsWith("png")){
  img_count + 1;
  $('#bldg_image_9_carousel').addClass('carousel-item');
  $('#bldg_image_9').css('visibility', 'visible');
  $('#bldg_image_9').css('position', 'relative');
  $('#bldg_image_9').attr('src', img9);
  $('#bldg_image_url_9').attr('href', img9);

} 

if(img10.endsWith("png")){
  img_count += 1;
  $('#bldg_image_10_carousel').addClass('carousel-item');
  $('#bldg_image_10').css('visibility', 'visible');
  $('#bldg_image_10').css('position', 'relative');
  $('#bldg_image_10').attr('src', img10);
  $('#bldg_image_url_10').attr('href', img10);
} 

if(img_count > 1) {
  $('.carousel-btn').css('visibility', 'visible');
}
  else {
    $('.carousel-btn').css('visibility', 'hidden')
}

$('#bldg_info_modal').modal('show');
    });
}

// AJAX for Search Query
$('#bldg_search_form').on('submit', function(e) {
    e.preventDefault();

    $.ajax({
      url: "search-bldg",
      method: "POST",
      data: $('#bldg_search_form').serialize(),
      success: function(data) {
        if (data.response == 1) {
          //flyTo function of Mapbox to jump on the location of searched building
          const building_center = [data.building];
          text = building_center.toString();
          bldg_center = text.split(", ");

          map.flyTo({
            center: [bldg_center[0], bldg_center[1]],
            essential: true
          });

          // Create a default Marker and add it to the map.
          const marker1 = new mapboxgl.Marker()
          .setLngLat([bldg_center[0], bldg_center[1]])
          .addTo(map);

        } else {
          Swal.fire(
            'Oops!',
            'Building not found. Please enter correct building name or code.',
            'error'
            );
        }
      }
    });
  });

    $.ajaxSetup({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
    });

    $('.btn-close').click(function() {
    $('#add-bldg-form-floating').css('visibility', 'hidden');
    $('#edit-bldg-form-floating').css('visibility', 'hidden'); 
    $('#edit-poi-form-floating').css('visibility', 'hidden'); 
    $('#edit-path-form-floating').css('visibility', 'hidden');
});

//AJAX for editing building
$('#bldg_code_edit_form').on('submit', function(e) {
      e.preventDefault();

    $.ajax({
      url: "edit-bldg-code",
      method: "POST",
      data: $('#bldg_code_edit_form').serialize(),
      beforeSend: function() {
        $('#submit_bldg_code').attr('disabled', true);
      },
      success: function (data) {
        if (data.status == 1) {
            Swal.fire(
              'Success!',
              'Building info retrieved.',
              'success'
              );

            var bldg_category_value = (data.building.bldg_category + "_edit");
            $('#bldg_id_edit').val(data.building.bldg_id);
        $('#bldg_code_edit').val(data.building.bldg_code);
            $('#bldg_name_edit').val(data.building.bldg_name);
            var radiobtn = document.getElementById(bldg_category_value);
            radiobtn.checked = true;
            $('#bldg_center_edit').val(data.building.bldg_center);
            $('#point_1_edit').val(data.building.point_1);
            $('#point_2_edit').val(data.building.point_2);
            $('#point_3_edit').val(data.building.point_3);
            $('#point_4_edit').val(data.building.point_4);
            $('#edit_modal').modal('hide');

            //flyTo function of Mapbox to jump on the location of searched building
            const building_center = [data.building.bldg_center];
            text = building_center.toString();
            bldg_center = text.split(", ");

            map.flyTo({
              center: [bldg_center[0], bldg_center[1]],
              essential: true
            });

            // Create a default Marker and add it to the map.
            const marker1 = new mapboxgl.Marker()
            .setLngLat([bldg_center[0], bldg_center[1]])
            .addTo(map);

            $('#edit-bldg-form-floating').css('visibility', 'visible');
          } else {
            Swal.fire(
              'Oops!',
              'Error retrieving building info. Please try again.',
              'error'
              );

            $('#edit_modal').modal('show');
      $('#edit-bldg-form-floating').css('visibility', 'hidden');
          }

          $('#submit_bldg_code').attr('disabled', false);
      }
    });
  });

//AJAX for Submitting POI Code to Edit POI
$('#poi_code_edit_form').on('submit', function(e) {
      e.preventDefault();

      $.ajax({
      url: "edit-poi-code",
      method: "POST",
      data: $('#poi_code_edit_form').serialize(),
      beforeSend: function() {
            $('#submit_poi_code').attr('disabled', true);
      },
      success: function (data) {
            if (data.status == 1) {
      Swal.fire(
        'Success!',
        'Point-of-Interest info retrieved.',
        'success'
        ); 
        $('#poi_id_edit').val(data.poi.poi_id);
        $('#poi_name_edit').val(data.poi.poi_name);
        $('#point_1_poi_edit').val(data.poi.poi_coordinate);
        $('#edit_poi_modal').modal('hide');

        //flyTo function of Mapbox to jump on the location of searched building
      const poi_coord = [data.poi.poi_coordinate];
      text = poi_coord.toString();
      poi = text.split(", ");

      map.flyTo({
        center: [poi[0], poi[1]],
        essential: true
      });

      // Create a default Marker and add it to the map.
      const marker1 = new mapboxgl.Marker()
      .setLngLat([poi[0], poi[1]])
      .addTo(map);

        $('#edit-poi-form-floating').css('visibility', 'visible');
    } else {
      Swal.fire(
        'Oops!',
        'Error retrieving POI info. Please try again.',
        'error'
        );

      $('#edit_poi_modal').modal('show');
      $('#edit-poi-form-floating').css('visibility', 'hidden');
    }

    $('#submit_poi_code').attr('disabled', false);
            }
      });
});


$('#path_code_edit_form').on('submit', function(e) {
  e.preventDefault();

        $.ajax({
        url: "edit-path-code",
        method: "POST",
        data: $('#path_code_edit_form').serialize(),
        beforeSend: function() {
              $('#submit_path_code').attr('disabled', true);
        },
        success: function (data) {
        if (data.status == 1) {
        Swal.fire(
          'Success!',
          'Pathway info retrieved.',
          'success'
          ); 
          $('#pth_id_edit').val(data.pathway.pth_id);
          $('#pth_code_edit').val(data.pathway.pth_code);
          $('#point_1_pth_edit').val(data.pathway.point_1);
          $('#point_2_pth_edit').val(data.pathway.point_2);

          //flyTo function of Mapbox to jump on the location of searched building
          const pth_coord = [data.pathway.point_1];
          text = pth_coord.toString();
          pth = text.split(", ");

          map.flyTo({
            center: [pth[0], pth[1]],
            essential: true
          });

          // Create a default Marker and add it to the map.
          const marker1 = new mapboxgl.Marker()
          .setLngLat([pth[0], pth[1]])
          .addTo(map);

          $('#edit_path_modal').modal('hide');
          $('#edit-path-form-floating').css('visibility', 'visible');
      } else {
        Swal.fire(
          'Oops!',
          'Error retrieving building info. Please try again.',
          'error'
          );

        $('#edit_path_modal').modal('show');
        $('#edit-path-form-floating').css('visibility', 'hidden');
      }

      $('#submit_path_code').attr('disabled', false);
              }
        });
});

//set markers for icon
const geojson1 = {
'type': 'FeatureCollection',
'features': [
@foreach($poi as $_poi)
{
'type': 'Feature',
'properties': {
'id': '{{$_poi->poi_code}}',
'icon': '{{$_poi->poi_icon}}',
'img': '{{url("public/asset/img/poi_img/$_poi->poi_img")}}',
'img2': '{{url("public/asset/img/poi_img/$_poi->poi_img_2")}}',
'img3': '{{url("public/asset/img/poi_img/$_poi->poi_img_3")}}',
'img4': '{{url("public/asset/img/poi_img/$_poi->poi_img_4")}}',
'img5': '{{url("public/asset/img/poi_img/$_poi->poi_img_5")}}',
'name': '{{$_poi->poi_name}}',
'desc': '{{$_poi->poi_desc}}',
'center' : '{{$_poi->poi_coordinate}}',
'iconSize': [20, 20]
},
'geometry': {
'type': 'Point',
'coordinates': [{{$_poi->poi_coordinate}}]
}},
@endforeach
]
};

// Add icons to the map.
for (const icons of geojson1.features) {
// Create a DOM element for each marker.
const icon = document.createElement('div');
const width = icons.properties.iconSize[0];
const height = icons.properties.iconSize[1];
const id = icons.properties.id;
const img = icons.properties.img;
const img2 = icons.properties.img2;
const img3 = icons.properties.img3;
const img4 = icons.properties.img4;
const img5 = icons.properties.img5;
const icn = icons.properties.icon;
const name = icons.properties.name;
const desc = icons.properties.desc;
const center = icons.properties.center;
icon.className = 'marker';
icon.style.backgroundImage = `url("../public/asset/img/poi_icon/${icn}")`;
icon.style.width = `${width}px`;
icon.style.height = `${height}px`;
icon.style.backgroundSize = '100%';

// Add markers to the map.
new mapboxgl.Marker(icon)
.setLngLat(icons.geometry.coordinates)
.addTo(map);

icon.addEventListener('click', () => {
text = center.toString();
icon_center = text.split(", ");
map.flyTo({
  center: [icon_center[0], icon_center[1]],
  essential: true
});

$('#poi_title').html(name);
$('#poi_description').html(desc);

if(desc == ''){
  $('#poi_dsc').css('visibility', 'hidden');
  $('#poi_dsc').css('position', 'absolute');
} else {
  $('#poi_dsc').css('visibility', 'visible');
  $('#poi_dsc').css('position', 'relative');
}

var img_count = 0;

if(img.endsWith('png')){
  img_count += 1;
  $('#poi_image').css('visibility', 'visible');
  $('#poi_image').attr('src', img);
  $('#poi_image_url').attr('href', img);
} 

if(img2.endsWith('png')){
  img_count += 1;
  $('#poi_image_2_carousel').addClass('carousel-item');
  $('#poi_image_2').css('visibility', 'visible');
  $('#poi_image_2').css('position', 'relative');
  $('#poi_image_2').attr('src', img2);
  $('#poi_image_url_2').attr('href', img2);
}

if(img3.endsWith('png')){
  img_count += 1;
  $('#poi_image_3_carousel').addClass('carousel-item');
  $('#poi_image_3').css('visibility', 'visible');
  $('#poi_image_3').css('position', 'relative');
  $('#poi_image_3').attr('src', img3);
  $('#poi_image_url_3').attr('href', img3);
} 

if(img4.endsWith('png')){
  img_count += 1;
  $('#poi_image_4_carousel').addClass('carousel-item');
  $('#poi_image_4').css('visibility', 'visible');
  $('#poi_image_4').css('position', 'relative');
  $('#poi_image_4').attr('src', img4);
  $('#poi_image_url_4').attr('href', img4);
} 

if(img5.endsWith('png')){
  img_count += 1;
  $('#poi_image_5_carousel').addClass('carousel-item');
  $('#poi_image_5').css('visibility', 'visible');
  $('#poi_image_5').css('position', 'relative');
  $('#poi_image_5').attr('src', img5);
  $('#poi_image_url_5').attr('href', img5);
} 

if(img_count > 1) {
  $('.poi-carousel-btn').css('visibility', 'visible');
}
  else {
    $('.poi-carousel-btn').css('visibility', 'hidden')
}

$('#poi_info_modal').modal('show');
});
}

//Add Pop-up for buildings
map.addSource('places', {
'type': 'geojson',
'data': {
'type': 'FeatureCollection',
'features': [
@foreach($building as $popup)
{
'type': 'Feature',
'properties': {
'description':
'<img src="{{url("public/asset/img/bldg_img/$popup->bldg_img")}}" class="img-fluid"><br><br><strong>{{$popup->bldg_name}}</strong><br><?php echo substr($popup->bldg_desc, 0, 100) ?>... <br><br><p class="text-primary"><u>Click to see more</u></p>'
},
'geometry': {
'type': 'Point',
'coordinates': [{{$popup->bldg_center}}]
}
},
@endforeach
]
}
});
 
// Add a layer showing the places.
map.addLayer({
'id': 'places',
'type': 'circle',
'source': 'places',
'paint': {
'circle-color': '#ff1a1a',
'circle-radius': 4,
}
});

// Create a popup, but don't add it to the map yet.
const popup = new mapboxgl.Popup({
closeButton: false,
closeOnClick: false
});
 
map.on('mouseenter', 'places', (e) => {
// Change the cursor style as a UI indicator.
map.getCanvas().style.cursor = 'pointer';
 
// Copy coordinates array.
const coordinates = e.features[0].geometry.coordinates.slice();
const description = e.features[0].properties.description;
 
// Ensure that if the map is zoomed out such that multiple
// copies of the feature are visible, the popup appears
// over the copy being pointed to.
while (Math.abs(e.lngLat.lng - coordinates[0]) > 180) {
coordinates[0] += e.lngLat.lng > coordinates[0] ? 360 : -360;
}
 
// Populate the popup and set its coordinates
// based on the feature found.
popup.setLngLat(coordinates).setHTML(description).addTo(map);
});
 
map.on('mouseleave', 'places', () => {
map.getCanvas().style.cursor = '';
popup.remove();
});
});

map.on('style.load', () => {
    // This code will execute once the map style has finished loading

    // Add the POI source
    map.addSource('pois', {
        type: 'geojson',
        data: {
            type: 'FeatureCollection',
                    features: [
        @foreach($poi as $popup)
        {
        'type': 'Feature',
        'properties': {
        'description':
        '<img src="{{url("public/asset/img/poi_img/$popup->poi_img")}}" class="img-fluid"><br><br><strong>{{$popup->poi_name}}</strong><br><?php echo substr($popup->poi_desc, 0, 100) ?>... <br><br><p class="text-primary"><u>Click to see more</u></p>'
        },
        'geometry': {
        'type': 'Point',
        'coordinates': [{{$popup->poi_coordinate}}]
        }
        },
        @endforeach
            ]
        }
    });

    // Add the POI layer
    map.addLayer({
        id: 'pois',
        type: 'circle',
        source: 'pois',
        paint: {
            'circle-color': '#ff1a1a',
            'circle-radius': 4,
        }
    });

    // Create a popup, but don't add it to the map yet.
    const popup = new mapboxgl.Popup({
        closeButton: false,
        closeOnClick: false
    });

    // Add event listeners
    map.on('mouseenter', 'pois', (e) => {
        // Change the cursor style as a UI indicator.
        map.getCanvas().style.cursor = 'pointer';

        // Copy coordinates array.
        const coordinates = e.features[0].geometry.coordinates.slice();
        const description = e.features[0].properties.description;

        // Ensure that if the map is zoomed out such that multiple
        // copies of the feature are visible, the popup appears
        // over the copy being pointed to.
        while (Math.abs(e.lngLat.lng - coordinates[0]) > 180) {
            coordinates[0] += e.lngLat.lng > coordinates[0] ? 360 : -360;
        }

        // Populate the popup and set its coordinates
        // based on the feature found.
        popup.setLngLat(coordinates).setHTML(description).addTo(map);
    });

    map.on('mouseleave', 'pois', () => {
        map.getCanvas().style.cursor = '';
        popup.remove();
    });
});
});
</script>


<script type="text/javascript">

</script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/croppie/2.6.5/croppie.min.js" integrity="sha512-Gs+PsXsGkmr+15rqObPJbenQ2wB3qYvTHuJO6YJzPe/dTLvhy0fmae2BcnaozxDo5iaF8emzmCZWbQ1XXiX2Ig==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  </body>
</html>
