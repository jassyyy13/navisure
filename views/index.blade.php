@extends('layout_index')
@section('contents')

<script>
  window.onload = function() {
    // Check if the user has chosen to dismiss the modal
    if (localStorage.getItem('dismissModal') !== 'true') {
      // If not, display the modal
      $('#imageLoadModal').modal('show');
    }

    // When the modal is dismissed
    $('#dismissButton').on('click', function () {
      // Check if the "Do not show again" checkbox is checked
      if ($('#dismissCheck').prop('checked')) {
        // Store the preference in local storage
        localStorage.setItem('dismissModal', 'true');
      }

      $('#imageLoadModal').modal('hide');
    });
}
</script>


<!-- Map Placeholder -->
<div id="map"></div>

<!-- Building info Modal-->
<div class="modal fade" id="bldg_info_modal" role="dialog" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
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
          <h5 class="visibility">Services</h5>
          <p id="bldg_service"></p>
        </div>
        <div class="mb-3 pb-3 border-bottom border-black" id="bldg_rm">
          <h5>Rooms</h5>
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
<div class="modal fade" id="poi_info_modal" role="dialog" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
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

<!-- Info Modal -->
<div class="modal fade" id="imageLoadModal" tabindex="-1" role="dialog" aria-labelledby="imageLoadModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="imageLoadModalLabel">Important Notice</h5>
        <button type="button" class="close btn-close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true"></span>
        </button>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="col-md-12 text-center">
            <img class="img-responsive m-3" style="height: 120px; width: auto;" src="{{url('public\asset\img\icons\warning-icon.png')}}">
          </div> 
        </div>
        
        <p>Images may load slowly when you first view building images, as it may take time to download high sizes of data, but it will load faster next time.</p>
        <div class="form-check">
          <input type="checkbox" class="form-check-input" id="dismissCheck">
          <label class="form-check-label" for="dismissCheck">Do not show again</label>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" data-dismiss="modal" id="dismissButton">Dismiss</button>
      </div>
    </div>
  </div>
</div>


<!-- jQuery CDN -->
  <script src="https://code.jquery.com/jquery-3.7.0.min.js" integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>
<!-- Include jQuery UI -->
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">


<!-- Autocomplete Search -->
<script type="text/javascript">
    // Convert the PHP array to a JSON string
    var building_names_json = @json($building);
    var poi_names_json = @json($poi);

    $("#user_search_input").autocomplete({
        source: function(request, response) {
            var term = request.term.toLowerCase();
            var results = [];

            var poi_names = poi_names_json.map(function(poi) {
                return poi.poi_name;
            });


            // Filter and combine results from multiple sources
            $.each(building_names_json, function(index, building) {
                // Ensure that the properties exist and are not null or undefined
                var buildingName = (building.bldg_name || "").toLowerCase();
                var buildingServices = (building.bldg_services || "").toLowerCase();
                var buildingRooms = (building.bldg_rooms || "").toLowerCase();


                // Check if the term matches in any of the sources
                if (buildingName.includes(term) || buildingServices.includes(term) || buildingRooms.includes(term)) {
                    results.push(building.bldg_name);
                }
            });

            $.each(poi_names, function(index, poiName) {
                if (poiName.toLowerCase().includes(term)) {
                    results.push(poiName);
                }
            });

            response(results);
        },
        maxResults: 10, // Set the maximum number of results to display
        minLength: 1 // Specify the minimum length to trigger autocomplete
    });
</script>

<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
<script>
   
axios.get('admin/get-api-key')
    .then(function (response) {
    const apiKey = response.data.api_key;
        
// Set the Mapbox access token using the retrieved API key
mapboxgl.accessToken = apiKey;

// const bounds = [
// [121.14058359493015, 16.47057118151561], // Southwest coordinates
// [121.14296879922574, 16.485193274291888] // Northeast coordinates
// ];

const map = new mapboxgl.Map({
container: 'map', // container ID
// Choose from Mapbox's core styles, or make your own style with Mapbox Studio
style: 'mapbox://styles/mapbox/streets-v12', // style URL
minZoom: 17,
maxZoom: 19,
pitch: 40, // pitch in degrees
bearing: 303, // bearing in degrees
center: [121.14397000122347, 16.479612708062987], // starting position [lng, lat]
zoom: 17.3, // starting zoom
});

//Add fullscreen control
map.addControl(new mapboxgl.FullscreenControl());
// Add zoom and rotation controls to the map.
map.addControl(new mapboxgl.NavigationControl());

// Add geolocate control to the map.
map.addControl(
new mapboxgl.GeolocateControl({
positionOptions: {
enableHighAccuracy: true
},
// When active the map will receive updates to the device's location as it changes.
trackUserLocation: true,
// Draw an arrow next to the location dot to indicate which direction the device is heading.
showUserHeading: true
})
);

map.on('load', () => {
    // The whole surface area of NVSU. Uncomment this after all map features are displayed
    // map.addSource('area', {
    // 'type': 'geojson',
    // 'data': {
    // 'type': 'Feature',
    // 'geometry': {
    // 'type': 'Polygon',
    // // These coordinates outlines the NVSU map. Add as many as you can to display the NVSU perimeter.
    // 'coordinates': [[
    // [121.14193065344494, 16.478656472022408],
    // [121.14447545515225, 16.482600530473363],
    // [121.14578701451597, 16.48132197393997],
    // [121.14326187222059, 16.477390228986224],
    // [121.14193065344494, 16.478656472022408],
    // ]]
    // }
    // }
    // });
     
    // // Add a black outline around the polygon.
    // map.addLayer({
    // 'id': 'area1',
    // 'type': 'line',
    // 'source': 'area',
    // 'layout': {},
    // 'paint': {
    // 'line-color': '#000',
    // 'line-width': 1
    // }
    // });
//Display coordinates when clicked
// map.on('click', function(e) {
// var coordinates = e.lngLat;
// new mapboxgl.Popup()
//   .setLngLat(coordinates)
//   .setHTML('Coordinates: ' + coordinates)
//   .addTo(map);
// });

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
[{{$path->point_2}}]
]}}});

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

//add icons to markers
const geojson = {
'type': 'FeatureCollection',
'features': [
@foreach($building as $center)
{
'type': 'Feature',
'properties': {
'id': '{{$center->bldg_code}}',
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
]};

// AJAX for Search Query
$('#user_search').on('submit', function(e) {
    e.preventDefault();

    $.ajax({
      url: "user-search-bldg",
      method: "POST",
      data: $('#user_search').serialize(),
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
el.style.backgroundImage = `url('public/asset/img/icons/vector-sign-of-building-icon.jpg')`;
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
//transforms the text in rooms into badges
if(rooms !== ''){
let text = rooms;
const roomNames = text.split(", ");

var badgeContainer = document.getElementById("bldg_room");

badgeContainer.innerHTML = "";

roomNames.forEach(function(room) {
    var badge = document.createElement("span");
    badge.style.fontSize = '15px';
    badge.className = 'badge bg-primary mx-1 py-1';
    badge.textContent = room;
    badgeContainer.appendChild(badge);
});
}

//transforms the text in services into badges
if(services !== ''){
let text = services;
const services_ = text.split(", ");

var badgeContainer_ = document.getElementById("bldg_service");

badgeContainer_.innerHTML = "";

services_.forEach(function(service) {
    var badge = document.createElement("span");
    badge.style.fontSize = '15px';
    badge.className = 'badge bg-warning mx-1 py-1';
    badge.textContent = service;
    badgeContainer_.appendChild(badge);
});
}

$('#modal_title').html(name);
$('#bldg_description').html(desc);
// $('#bldg_service').html(services);
// $('#bldg_room').html(rooms);

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
]};

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
icon.style.backgroundImage = `url("public/asset/img/poi_icon/${icn}")`;
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

//Add a building Pop-up
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
}},@endforeach
]}});
 
// Add a layer showing the places.
map.addLayer({
'id': 'places',
'type': 'circle',
'source': 'places',
'paint': {
'circle-color': '#ff1a1a',
'circle-radius': 5,
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

@endsection