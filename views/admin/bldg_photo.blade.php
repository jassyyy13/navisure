@extends('admin.layout')
@section('content')
<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4 mt-3">

  <script type="text/javascript">
    window.onload = function() {
        let table = new DataTable('#building-tbl');
        let table2 = new DataTable('#poi-tbl');
    };
  </script>
  </script>

  <h2 class="mb-3">Building Photos</h2>

<div class="table-responsive mb-3" id="data-table">
  <table class="table table-bordered align-middle table-hover pt-2" id="building-tbl">
      <thead>
        <tr class="table-success ">
          <th>BUILDING NAME</th>
          <th>BUILDING IMAGE 1</th>
          <th>BUILDING IMAGE 2</th>
          <th>BUILDING IMAGE 3</th>
          <th>BUILDING IMAGE 4</th>
          <th>BUILDING IMAGE 5</th>
          <th>BUILDING IMAGE 6</th>
          <th>BUILDING IMAGE 7</th>
          <th>BUILDING IMAGE 8</th>
          <th>BUILDING IMAGE 9</th>
          <th>BUILDING IMAGE 10</th>
        </tr>
      </thead>

      <tbody>
        <!-- Display the data here -->
        @foreach($building as $data)
        <tr>
          <td>{{ $data->bldg_name }}</td>
          <td class="text-center">
            <img src="{{ url('public/asset/img/bldg_img/' . $data->bldg_img) }}" id="{{ $data->bldg_img.'_bldg_img' }}" class="mb-2 img1" width="300px" loading="lazy"/><br>
            <label type="button" class="btn btn-warning" id="{{ $data->bldg_id . '_img1' }}">
                <input type="file" class="form-control sr-only before_crop_image" id="{{ $data->bldg_id . '_img1' }}" accept="image/*" />
                <i class="fa fa-upload"></i> Upload Photo
            </label>
            
          </td>
          <td class="text-center">
            <img src="{{url('public/asset/img/bldg_img/'.$data->bldg_img_2)}}" id="{{$data->bldg_img_2.'_bldg_img_2'}}" class="mb-2 img2" width="300px" loading="lazy"/><br>
            <label type="button" class="btn btn-warning btn-2" id="{{$data->bldg_img.'_img2'}}">
                  <input type="file" class="form-control sr-only before_crop_image" id="{{$data->bldg_id.'_img2'}}" accept="image/*"/>
                  <i class="fa fa-upload"></i> Upload Photo
            </label>
            <button class="btn btn-danger btn-delete" id="{{$data->bldg_id}},bldg_img_2"><i class="fa fa-trash"></i> Delete Photo</button>
          </td>
          <td class="text-center">
            <img src="{{url('public/asset/img/bldg_img/'.$data->bldg_img_3)}}" id="{{$data->bldg_img_3.'_bldg_img_3'}}" class="mb-2 img3" width="300px" loading="lazy"/><br>
            <label type="button" class="btn btn-warning btn-3" id="{{$data->bldg_img_2.'_img3'}}">
                  <input type="file" class="form-control sr-only before_crop_image" id="{{$data->bldg_id.'_img3'}}"  accept="image/*"/>
                  <i class="fa fa-upload"></i> Upload Photo
            </label>
            <button class="btn btn-danger btn-delete" id="{{$data->bldg_id}},bldg_img_3"><i class="fa fa-trash"></i> Delete Photo</button>
          </td>
          <td class="text-center">
            <img src="{{url('public/asset/img/bldg_img/'.$data->bldg_img_4)}}" id="{{$data->bldg_img_4.'_bldg_img_4'}}" class="mb-2 img4" width="300px" loading="lazy"/><br>
            <label type="button" class="btn btn-warning btn-4" id="{{$data->bldg_img_3.'_img4'}}">
                  <input type="file" class="form-control sr-only before_crop_image" id="{{$data->bldg_id.'_img4'}}"  accept="image/*"/>
                  <i class="fa fa-upload"></i> Upload Photo
            </label>
            <button class="btn btn-danger btn-delete" id="{{$data->bldg_id}},bldg_img_4"><i class="fa fa-trash"></i> Delete Photo</button>
          </td>
          <td class="text-center">
            <img src="{{url('public/asset/img/bldg_img/'.$data->bldg_img_5)}}" id="{{$data->bldg_img_5.'_bldg_img_5'}}" class="mb-2 img5" width="300px" loading="lazy"/><br>
            <label type="button" class="btn btn-warning btn-5" id="{{$data->bldg_img_4.'_img5'}}">
                  <input type="file" class="form-control sr-only before_crop_image btn-sm" id="{{$data->bldg_id.'_img5'}}" accept="image/*"/>
                  <i class="fa fa-upload"></i> Upload Photo
            </label>
            <button class="btn btn-danger btn-delete" id="{{$data->bldg_id}},bldg_img_5"><i class="fa fa-trash"></i> Delete Photo</button>
          </td>

          <td class="text-center">
            <img src="{{url('public/asset/img/bldg_img/'.$data->bldg_img_6)}}" id="{{$data->bldg_img_6.'_bldg_img_6'}}" class="mb-2 img6" width="300px" loading="lazy"/><br>
            <label type="button" class="btn btn-warning btn-6" id="{{$data->bldg_img_5.'_img6'}}">
                  <input type="file" class="form-control sr-only before_crop_image btn-sm" id="{{$data->bldg_id.'_img6'}}" accept="image/*"/>
                  <i class="fa fa-upload"></i> Upload Photo
            </label>
            <button class="btn btn-danger btn-delete" id="{{$data->bldg_id}},bldg_img_6"><i class="fa fa-trash"></i> Delete Photo</button>
          </td>
          <td class="text-center">
            <img src="{{url('public/asset/img/bldg_img/'.$data->bldg_img_7)}}" id="{{$data->bldg_img_7.'_bldg_img_7'}}" class="mb-2 img7" width="300px" loading="lazy"/><br>
            <label type="button" class="btn btn-warning btn-7" id="{{$data->bldg_img_6.'_img7'}}">
                  <input type="file" class="form-control sr-only before_crop_image btn-sm" id="{{$data->bldg_id.'_img7'}}" accept="image/*"/>
                  <i class="fa fa-upload"></i> Upload Photo
            </label>
            <button class="btn btn-danger btn-delete" id="{{$data->bldg_id}},bldg_img_7"><i class="fa fa-trash"></i> Delete Photo</button>
          </td>
          <td class="text-center">
            <img src="{{url('public/asset/img/bldg_img/'.$data->bldg_img_8)}}" id="{{$data->bldg_img_8.'_bldg_img_8'}}" class="mb-2 img8" width="300px" loading="lazy"/><br>
            <label type="button" class="btn btn-warning btn-8" id="{{$data->bldg_img_7.'_img8'}}">
                  <input type="file" class="form-control sr-only before_crop_image btn-sm" id="{{$data->bldg_id.'_img8'}}" accept="image/*"/>
                  <i class="fa fa-upload"></i> Upload Photo
            </label>
            <button class="btn btn-danger btn-delete" id="{{$data->bldg_id}},bldg_img_8"><i class="fa fa-trash"></i> Delete Photo</button>
          </td>
          <td class="text-center">
            <img src="{{url('public/asset/img/bldg_img/'.$data->bldg_img_9)}}" id="{{$data->bldg_img_9.'_bldg_img_9'}}" class="mb-2 img9" width="300px" loading="lazy"/><br>
            <label type="button" class="btn btn-warning btn-9" id="{{$data->bldg_img_8.'_img9'}}">
                  <input type="file" class="form-control sr-only before_crop_image btn-sm" id="{{$data->bldg_id.'_img9'}}" accept="image/*"/>
                  <i class="fa fa-upload"></i> Upload Photo
            </label>
            <button class="btn btn-danger btn-delete" id="{{$data->bldg_id}},bldg_img_9"><i class="fa fa-trash"></i> Delete Photo</button>
          </td>
          <td class="text-center">
            <img src="{{url('public/asset/img/bldg_img/'.$data->bldg_img_10)}}" id="{{$data->bldg_img_10.'_bldg_img_10'}}" class="mb-2 img10" width="300px" loading="lazy"/><br>
            <label type="button" class="btn btn-warning btn-10" id="{{$data->bldg_img_9.'_img10'}}">
                  <input type="file" class="form-control sr-only before_crop_image btn-sm" id="{{$data->bldg_id.'_img10'}}" accept="image/*"/>
                  <i class="fa fa-upload"></i> Upload Photo
            </label>
            <button class="btn btn-danger btn-delete" id="{{$data->bldg_id}},bldg_img_10"><i class="fa fa-trash"></i> Delete Photo</button>
          </td>
        </tr>
        @endforeach
      </tbody>
  </table>
</div>

<h2 class="mb-3">Points-of-Interest Photos</h2>

<div class="table-responsive" id="data-table">
  <table class="table table-bordered align-middle table-hover pt-2" id="poi-tbl">
      <thead>
        <tr class="table-success ">
          <th>POINT-OF-INTEREST NAME</th>
          <th>POI IMAGE 1</th>
          <th>POI IMAGE 2</th>
          <th>POI IMAGE 3</th>
          <th>POI IMAGE 4</th>
          <th>POI IMAGE 5</th>
        </tr>
      </thead>

      <tbody>
        <!-- Display the data here -->
        @foreach($poi as $data)
        <tr>
          <td>{{ $data->poi_name }}</td>
          <td class="text-center">
            <img src="{{url('public/asset/img/poi_img/'.$data->poi_img)}}" id="{{$data->poi_img}}" class="mb-2 img1" width="300px" loading="lazy"/><br>
            <label type="button" class="btn btn-warning" id="{{$data->poi_img.'_img1'}}">
                  <input type="file" class="form-control sr-only before_crop_image btn-sm" id="{{$data->poi_id.'_poi_img'}}" accept="image/*"/>
                  <i class="fa fa-upload"></i> Upload Photo
            </label>
          </td>
          <td class="text-center">
            <img src="{{url('public/asset/img/poi_img/'.$data->poi_img_2)}}" id="{{$data->poi_img_2}}" class="mb-2 img2" width="300px" loading="lazy"/><br>
            <label type="button" class="btn btn-warning btn-2" id="{{$data->poi_img.'_img2'}}">
                  <input type="file" class="form-control sr-only before_crop_image" id="{{$data->poi_id.'_poi_img2'}}" accept="image/*"/>
                  <i class="fa fa-upload"></i> Upload Photo
            </label>
            <button class="btn btn-danger btn-delete" id="{{$data->poi_id}},poi_img_2"><i class="fa fa-trash"></i> Delete Photo</button>
          </td>
          <td class="text-center">
            <img src="{{url('public/asset/img/poi_img/'.$data->poi_img_3)}}" id="{{$data->poi_img_3}}" class="mb-2 img3" width="300px" loading="lazy"/><br>
            <label type="button" class="btn btn-warning btn-3" id="{{$data->poi_img_2.'_img3'}}">
                  <input type="file" class="form-control sr-only before_crop_image" id="{{$data->poi_id.'_poi_img3'}}"  accept="image/*"/>
                  <i class="fa fa-upload"></i> Upload Photo
            </label>
            <button class="btn btn-danger btn-delete" id="{{$data->poi_id}},poi_img_3"><i class="fa fa-trash"></i> Delete Photo</button>
          </td>
          <td class="text-center">
            <img src="{{url('public/asset/img/poi_img/'.$data->poi_img_4)}}" id="{{$data->poi_img_4}}" class="mb-2 img4" width="300px" loading="lazy"/><br>
            <label type="button" class="btn btn-warning btn-4" id="{{$data->poi_img_3.'_img4'}}">
                  <input type="file" class="form-control sr-only before_crop_image" id="{{$data->poi_id.'_poi_img4'}}"  accept="image/*"/>
                  <i class="fa fa-upload"></i> Upload Photo
            </label>
            <button class="btn btn-danger btn-delete" id="{{$data->poi_id}},poi_img_4"><i class="fa fa-trash"></i> Delete Photo</button>
          </td>
          <td class="text-center">
            <img src="{{url('public/asset/img/poi_img/'.$data->poi_img_5)}}" id="{{$data->poi_img_5}}" class="mb-2 img5" width="300px" loading="lazy"/><br>
            <label type="button" class="btn btn-warning btn-5" id="{{$data->poi_img_4.'_img5'}}">
                  <input type="file" class="form-control sr-only before_crop_image" id="{{$data->poi_id.'_poi_img5'}}" accept="image/*"/>
                  <i class="fa fa-upload"></i> Upload Photo
            </label>
            <button class="btn btn-danger btn-delete" id="{{$data->poi_id}},poi_img_5"><i class="fa fa-trash"></i> Delete Photo</button>                  
          </td>
        </tr>
        @endforeach
      </tbody>
  </table>
</div>

<!-- Photo Uploader Modal -->
<div class="modal fade" id="imageModal" aria-hidden="true" data-bs-backdrop="static" data-bs-keyboard="false">
  <div class="modal-dialog modal-lg modal-dialog-centered">
      <div class="modal-content">
        @CSRF
        <div class="modal-header">
          <h1 class="modal-title fs-5">Upload Building Photo</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>

        <div class="modal-body">
          <center><div id="image_demo" style="width:700px;"></div></center>
        </div>

        <div class="modal-footer">
          <input type="text" name="bldg_id_photo" class="form-control" id="bldg_id_photo" hidden>
          <button type="submit" class="btn btn-primary crop_image" id="btn-upload"><span class="fa fa-save"></span> Upload</button>
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

<!-- Modal confirmation for deleting photo -->
<div class="modal fade" id="delete_photo" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Delete Photo</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body mb-3">
        <div class="text-center">
          <p>Are you sure you want to delete this photo?</p>
          <br>
          <button id="btn-yes" class="btn btn-danger">Yes</button>
          <button id="btn-no" class="btn btn-primary">No</button>
        </div>  
        </div>
      </form>
    </div>
    </div>
  </div>
</div>

<!-- Delete Image Form -->
<form id="del-photo-form" style="visibility: hidden;">
  @CSRF
  <input type="text" name="bldg_del_id" id="bldg_del_id" hidden>
  <input type="text" name="bldg_del_img_num" id="bldg_del_img_num" hidden>
</form>

<!-- AJAX Delete Photo -->
<script type="text/javascript">
$('.btn-delete').click(function(){

bldg_id_del = $(this).attr("id");
bldg_id_img = bldg_id_del.split(",");
  
  $('#delete_photo').modal('show');
    
  $('#btn-no').click(function(){ 
    $('#delete_photo').modal('hide');
  });

  $('#btn-yes').click(function(){
    $('#bldg_del_id').val(bldg_id_img[0]);
    $('#bldg_del_img_num').val(bldg_id_img[1]);

    $.ajax({
      url:"delete-photo",
      method: "POST",
      data: $('#del-photo-form').serialize(),
      beforeSend:function(){
        console.log(bldg_id_img[0]);
        console.log(bldg_id_img[1]);
      },
      success:function(data){
        $('#delete_photo').modal('hide');
        if(data == 1){
              Swal.fire(
            'Success!',
            'Photo has been deleted!',
            'success'
          );
          window.location.reload();
        } else{
              Swal.fire(
            'Oops!',
            'Could not delete photo. Please try again.',
            'warning'
          );  
        }
      }
    });
  });
});
</script>

  <style type="text/css">
    /* CSS */
.croppie-container {
    max-width: 100%; /* Ensure the container doesn't exceed the screen width */
    max-height: 80vh; /* Limit the height to 80% of the viewport height */
    overflow: auto; /* Add scrollbars when content overflows */
}

  </style>


<!-- Upload photo crop before image -->
<script type="text/javascript">
  $.ajaxSetup({
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
      });

  $image_crop = $('#image_demo').croppie({
    enableExif:true,
    viewport: {
      width:650,
      height:300,
      type: 'square'
    },
    boundary:{
      width: 700,
      height: 350
    },
    size: {
      width:1950,
      height:900,
      type:'square'
    }
  });

  $('.before_crop_image').on('change', function(){
    var reader = new FileReader();
    var bldg_id = $(this).attr('id');

    reader.onload = function(event){
      $image_crop.croppie('bind', {
        url:event.target.result
      }).then(function(){
        console.log('Jquery bind complete.');
      });
    }

    reader.readAsDataURL(this.files[0]);
    $('#bldg_id_photo').val(bldg_id);
    $('#imageModal').modal('show');
  

  //Crop and upload image
  $('#btn-upload').on('click', function(event){
      event.preventDefault();

      $image_crop.croppie('result', {
        type:'canvas',
        size: { width: 1950, height: 900 },
        quality: 1

        }).then(function(response) {
        $('#bldg_id_img').val(bldg_id);
        $('#cropped_image').val(response);

        $.ajax({
          url:"upload-photo",
          method: "POST",
          cache: false,
          data: $('#img-upload-form').serialize(),
          beforeSend:function(){
          },
          success:function(data){
            console.log(data);
            $('#imageModal').modal('hide');
            if(data == 1){
                  Swal.fire(
                'Success!',
                'Photo succesfully uploaded!',
                'success'
              );
              $('#building-tbl').load(document.URL + ' #building-tbl');
              $('#poi-tbl').load(document.URL + ' #poi-tbl');
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