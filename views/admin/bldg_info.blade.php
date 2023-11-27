@extends('admin.layout')
@section('content')
<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4 mt-3">
  <h3 class="mb-3">Building Information</h3>

  <script type="text/javascript">
    window.onload = function() {
        let table = new DataTable('#building-tbl');
        let table2 = new DataTable('#poi-tbl');
    };
  </script>

  <div class="table-responsive-sm" id="data-table">
          <table class="table table-bordered align-middle table-hover pt-2" id="building-tbl">
              <thead>
                <tr class="table-success">
                  <th>BUILDING CODE</th>
                  <th>BUILDING NAME</th>
                  <th>BUILDING DESCRIPTION</th>
                  <th>SERVICES OFFERED</th>
                  <th>ROOMS</th>
                  <th>ACTIONS</th>
                </tr>
              </thead>

              <tbody>
                <!-- Display the data here -->
                @foreach($building as $data)
                <tr>
                  <td>{{ $data->bldg_code }}</td>
                  <td>{{ $data->bldg_name }}</td>
                  <td><?php echo substr($data->bldg_desc, 0, 100) ?>...</td>
                  <td>{{ $data->bldg_services }}</td>
                  <td>{{ $data->bldg_rooms }}</td>
                  <td class="text-center">
                      <button id="{{$data->bldg_id }}" class="btn btn-secondary btn-md edit-info w-100 h-100"><span class="fa fa-pencil"></span> Edit</button>
                  </td>                        
                </tr>
                @endforeach
              </tbody>
          </table>
  </div>

  <h3 class="mb-3 mt-5">Points-of-Interests Information</h3>
  <div class="table-responsive-sm" id="data-poi-table">
          <table class="table table-bordered align-middle table-hover pt-2" id="poi-tbl">
              <thead>
                <tr class="table-primary">
                  <th>POI NAME</th>
                  <th>POI DESCRIPTION</th>
                  <th colspan="2">ICON</th>
                  <th>ACTION</th>
                </tr>
              </thead>

              <tbody>
                <!-- Display the data here -->
                @foreach($poi as $data)
                <tr>
                  <td>{{ $data->poi_name }}</td>
                  <td><?php echo substr($data->poi_desc, 0, 180) ?>...</td>
                  <td><img src="{{url('public/asset/img/poi_icon/'.$data->poi_icon)}}" class="img-fluid" width="100px" /></td>
                  <td>
                    <label type="button" class="btn btn-warning">
                      <input type="file" class="form-control sr-only before_crop_icon" id="{{$data->poi_code.'_icon' }}" accept="image/*"/>
                      <i class="fa fa-upload"></i> Icon
                    </label>  
                  </td>
                  <td class="text-center">
                      <button id="{{$data->poi_id }}" class="btn btn-secondary btn-md edit-info-poi w-100 h-100"><span class="fa fa-pencil"></span> Edit</button>
                  </td>                        
                </tr>
                @endforeach
              </tbody>
          </table>
</div>                  

          <!-- Map Placeholder -->
        <div id="map" style="visibility: hidden;"></div>
        </div>
</main>

<!-- Form for sending Bldg_ID to edit -->
    <form class="form-control" style="visibility: hidden;" id="bldg_info_id">
      @CSRF
        <input type="text" name="bldg_id_edit1" id="bldg_id_edit1">
    </form> 

<!-- Modal for Edit Building Info-->
    <div class="modal fade" id="edit-bldg-info-modal"  aria-hidden="true" data-bs-backdrop="static" data-bs-keyboard="false">
      <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                  <h5 class="modal-title">Edit Building Info</h5> 
                  <button type="button" class="btn-close" aria-label="Close"></button> 
              </div>
              <div class="modal-body">
                <form class="px-3" id="edit-bldg-info">
                  @CSRF
                  <input type="text" class="form-control" id="bldg_id_edit2" name="bldg_id_edit2" hidden> 
              <div class="row mb-2">
                <div class="col-md-12">
                  <label for="bldg_code_edit1" class="form-label">Building Code</label>
              </div>
                  <input type="text" class="form-control" id="bldg_code_edit1" name="bldg_code_edit1" required>
              </div> 
              <div class="row mb-2">
                <div class="col-md-12">
                  <label for="bldg_name_edit1" class="form-label">Building Name</label>
              </div>
                  <input type="text" class="form-control mb-3" id="bldg_name_edit1" name="bldg_name_edit1" required>
              </div> 
              <div class="row mb-2">
                <div class="col-md-12">
                  <label for="bldg_desc_edit1" class="form-label">Building Description 
                    <i class="fa-solid fa-circle-info fa-sm" data-bs-toggle="tooltip" data-bs-placement="right" title="Don't use line breaks and special characters like apostrophe (').">
                    </i>
                  </label>
              </div>
                  <textarea type="text" rows="5" class="form-control" id="bldg_desc_edit1" name="bldg_desc_edit1" required></textarea> 
              </div>
              <div class="row mb-2">
                <div class="col-md-12">
                  <label for="bldg_services_edit1" class="form-label">Services Offered
                    <i class="fa-solid fa-circle-info fa-sm" data-bs-toggle="tooltip" data-bs-placement="right" title="Don't use line breaks and special characters like apostrophe ('). Indicate separate entities in commas. Example: Service 1, Service 2, Service 3">
                    </i>
                  </label>
              </div>
                  <input type="text" class="form-control" id="bldg_services_edit1" name="bldg_services_edit1">
              </div>  
              <div class="row mb-2">
                <div class="col-md-12">
                  <label for="bldg_rooms_edit1" class="form-label">Rooms
                    <i class="fa-solid fa-circle-info fa-sm" data-bs-toggle="tooltip" data-bs-placement="right" title="Don't use line breaks and special characters like apostrophe ('). Indicate separate entities in commas. Example: Room 1, Room 2, Room 3">
                    </i>
                  </label>
              </div>
                  <input type="text" class="form-control" id="bldg_rooms_edit1" name="bldg_rooms_edit1">
              </div>
              </div> 
            <div class="modal-footer">  
              <button type="submit" class="btn btn-primary" id="edit-btn-info">Save Changes</button>
             </div> 
            </form>
      </div>
    </div>
  </div>

  <!-- Form for sending POI ID to edit -->
    <form class="form-control" style="visibility: hidden;" id="poi_info_id">
      @CSRF
        <input type="text" name="poi_id_edit1" id="poi_id_edit1">
    </form>        

<!-- Modal for Edit POI Info-->
    <div class="modal fade" id="edit-poi-info-modal"  aria-hidden="true" data-bs-backdrop="static" data-bs-keyboard="false">
      <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                  <h5 class="modal-title">Edit Point-of-Interest Info</h5> 
                  <button type="button" class="btn-close" aria-label="Close"></button> 
              </div>
              <div class="modal-body">
                <form class="px-3" id="edit-poi-info">
                  @CSRF
                  <input type="text" class="form-control" id="poi_id_edit2" name="poi_id_edit2" hidden> 
              <div class="row mb-2">
                <div class="col-md-12">
                  <label for="poi_name_edit1" class="form-label">Point-of-Interest Name</label>
              </div>
                  <input type="text" class="form-control mb-3" id="poi_name_edit1" name="poi_name_edit1" required>
              </div> 
              <div class="row mb-2">
                <div class="col-md-12">
                  <label for="poi_desc_edit1" class="form-label">Point-of-Interest Description 
                    <i class="fa-solid fa-circle-info fa-sm" data-bs-toggle="tooltip" data-bs-placement="right" title="Don't use line breaks.">
                    </i>
                  </label>
              </div>
                  <textarea type="text" rows="5" class="form-control" id="poi_desc_edit1" name="poi_desc_edit1"></textarea> 
              </div>
              </div> 
            <div class="modal-footer">  
              <button type="submit" class="btn btn-primary" id="edit-btn-info">Save Changes</button>
             </div> 
            </form>
      </div>
    </div>
  </div>

<!-- jQuery CDN -->
    <script src="https://code.jquery.com/jquery-3.7.0.min.js" integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>

<!-- AJAX for Fetching Building Info to edit -->
<script type="text/javascript">
  $.ajaxSetup({
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
      });

  $(document).on('click', '.edit-info', function(){
    var bldg_id = $(this).attr('id');
    $('#bldg_id_edit1').val(bldg_id);

  $.ajax({
      url: "get-bldg-info",
      method: "POST",
      data: $('#bldg_info_id').serialize(),
      beforeSend: function(e) {
        $('.edit-info').attr('disabled', true);
      },
      success: function (data) {
        if (data.response == 1) {
                $('#bldg_id_edit2').val(data.building.bldg_id);
                $('#bldg_code_edit1').val(data.building.bldg_code);
                $('#bldg_name_edit1').val(data.building.bldg_name);
                $('#bldg_desc_edit1').val(data.building.bldg_desc);
                $('#bldg_services_edit1').val(data.building.bldg_services);
                $('#bldg_rooms_edit1').val(data.building.bldg_rooms);
                $('#edit-bldg-info-modal').modal('show');
          } else {
            Swal.fire(
              'Oops!',
              'Error retrieving building info. Please try again.',
              'error'
              );
          }

          $('.edit-info').attr('disabled', false);
      }
    });
});
</script>

<!-- AJAX for Fetching POI Info to edit -->
<script type="text/javascript">
  $.ajaxSetup({
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
      });

  $(document).on('click', '.edit-info-poi', function(){
    var poi_id = $(this).attr('id');
    $('#poi_id_edit1').val(poi_id);

  $.ajax({
      url: "get-poi-info",
      method: "POST",
      data: $('#poi_info_id').serialize(),
      beforeSend: function(e) {
        $('.edit-info-poi').attr('disabled', true);
      },
      success: function (data) {
        if (data.response == 1) {
                $('#poi_id_edit2').val(data.poi.poi_id);
                $('#poi_name_edit1').val(data.poi.poi_name);
                $('#poi_desc_edit1').val(data.poi.poi_desc);
                $('#edit-poi-info-modal').modal('show');
          } else {
            Swal.fire(
              'Oops!',
              'Error retrieving Point-of-Interest info. Please try again.',
              'error'
              );
          }

          $('.edit-info-poi').attr('disabled', false);
      }
    });
});
</script>

<!-- AJAX for Editing Building Info -->
<script type="text/javascript">
    $('#edit-bldg-info').on('submit', function(e) {
      e.preventDefault();

      name = $('#bldg_name_edit1').val();
      code = $('#bldg_code_edit1').val();
      desc = $('#bldg_desc_edit1').val();
      services = $('#bldg_services_edit1').val();
      rooms = $('#bldg_rooms_edit1').val();

      var specialCharacters = ["\n", "!", "@", "#", "$", "-", "%", "^", "*", "+", "=", "'", "<", ">"];
      var specialCharacters2 = ["\n", "!", "@", "#", "$", "@", "%", "^", "*", "+", "=", "'", "<", ">"];
      var containsSpecialCharacters = false;
      var specialCharacter = "";

      for (var i = 0; i < specialCharacters.length; i++) {
        if (name.includes(specialCharacters[i]) || code.includes(specialCharacters[i]) || desc.includes(specialCharacters2[i])) {
          containsSpecialCharacters = true;
          specialCharacter = specialCharacters[i];
          break;
        } 
      }

      if (containsSpecialCharacters) {
        Swal.fire(
              'Oops!',
              'The information you provided either contains a line break or special characters. Please omit any special characters and new lines.',
              'warning'
              );
      } else {
        $.ajax({
        url: "edit-bldg-info",
        method: "POST",
        data: $('#edit-bldg-info').serialize(),
        beforeSend: function() {
          $('#edit-btn-info').attr('disabled', true);
        },
        success: function(data) {
          if (data == 1) {
            Swal.fire(
              'Success!',
              'Changes successfully changed.',
              'success'
              );
            $('#building-tbl').load(document.URL + ' #building-tbl');
            $('#edit-bldg-info-modal').modal('hide');
          } else {
            Swal.fire(
              'Oops!',
              'An error occured, please try again.',
              'error'
              );
          }

          $('#edit-btn-info').attr('disabled', false);
        }
      });
      }
    });

      $.ajaxSetup({
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
      });
</script>

<!-- AJAX for Editing POI Info -->
<script type="text/javascript">
    $('#edit-poi-info').on('submit', function(e) {
      e.preventDefault();

      $.ajax({
        url: "edit-poi-info",
        method: "POST",
        data: $('#edit-poi-info').serialize(),
        beforeSend: function() {
          $('#edit-btn-info').attr('disabled', true);
        },
        success: function(data) {
          if (data == 1) {
            Swal.fire(
              'Success!',
              'Changes successfully changed.',
              'success'
              );
            $('#poi-tbl').load(document.URL + ' #poi-tbl');
            $('#edit-poi-info-modal').modal('hide');
          } else {
            Swal.fire(
              'Oops!',
              'An error occured, please try again.',
              'error'
              );
          }

          $('#edit-btn-info').attr('disabled', false);
        }
      });
    });

      $.ajaxSetup({
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
      });
</script>

<!-- Close Modal -->
<script type="text/javascript">
  $('.btn-close').click(function (){
    $('#edit-bldg-info-modal').modal('hide');
    $('#edit-poi-info-modal').modal('hide');
  });
</script>

<!-- Icon Uploader Modal -->
<div class="modal fade" id="iconModal" aria-hidden="true" data-bs-backdrop="static" data-bs-keyboard="false">
  <div class="modal-dialog modal-lg modal-dialog-centered">
      <div class="modal-content">
        @CSRF
        <div class="modal-header">
          <h1 class="modal-title fs-5">Photo Uploader</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>

        <div class="modal-body">
          <center><div id="icon" style="width:500px;"></div></center>
        </div>

        <div class="modal-footer">
          <input type="text" name="poi_id_photo" class="form-control" id="poi_id_photo" hidden>
          <button type="submit" class="btn btn-primary crop_image_icon" id="btn-upload-icon"><span class="fa fa-save"></span> Upload</button>
        </div>
      </div>
  </div>
</div>
  
  <!-- Image Upload Form -->
  <form id="img-upload-form" style="visibility: hidden;">
    @CSRF
    <input type="text" name="cropped_image" id="cropped_image" hidden>
    <input type="text" name="bldg_id_img" id="bldg_id_img">
  </form>

<!-- Croppie JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/croppie/2.6.5/croppie.min.js" integrity="sha512-Gs+PsXsGkmr+15rqObPJbenQ2wB3qYvTHuJO6YJzPe/dTLvhy0fmae2BcnaozxDo5iaF8emzmCZWbQ1XXiX2Ig==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<!-- Upload cropped icon -->
<script type="text/javascript">
  $.ajaxSetup({
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
      });

  $icon_crop = $('#icon').croppie({
    enableExif:true,
    viewport: {
      width:300,
      height:300,
      type: 'square'
    },
    boundary:{
      width: 350,
      height: 350
    },
    quality: 1.0,
  });

  $('.before_crop_icon').on('change', function(){
    var reader = new FileReader();
    var poi_id = $(this).attr('id');

    reader.onload = function(event){
      $icon_crop.croppie('bind', {
        url:event.target.result
      }).then(function(){
        console.log('Jquery bind complete.');
      });
    }

    reader.readAsDataURL(this.files[0]);
    $('#poi_id_photo').val(poi_id);
    $('#iconModal').modal('show');
  

  //Crop and upload image
  $('#btn-upload-icon').on('click', function(event){
      event.preventDefault();

      $icon_crop.croppie('result', {
        type:'canvas',
        size:'viewport',

        }).then(function(response) {
        $('#bldg_id_img').val(poi_id);
        var poi_id_1 = $('#poi_id_photo').val();
        $('#cropped_image').val(response);

        $.ajax({
          url:"upload-photo",
          method: "POST",
          cache: false,
          data: $('#img-upload-form').serialize(),
          beforeSend:function(){
          },
          success:function(data){
            $('#iconModal').modal('hide');
            if(data == 1){
              window.location.reload();
                  Swal.fire(
                'Success!',
                'Photo succesfully uploaded!',
                'success'
              );
            } else{
                  Swal.fire(
                'Oops!',
                'Could not upload photo. Please try again.',
                'warning'
              );  
            }
          }
        });
      });
  });
 }); 
</script>  
@endsection