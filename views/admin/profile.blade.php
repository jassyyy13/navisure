@extends('admin.layout')
@section('content')

<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h2>My Profile</h2>
       </div>

       <div class="container mb-3">
       		<div class="row text-center">
       			<img src="{{url('public/asset/img/admin_img/'.$admin->photo)}}" class="rounded-circle mx-auto mb-3" style="height: 150px; width: 180px;">
       		</div>
       		<div class="row text-center">
       			<h3 class="lead">
       				{{ Session::get('admin_firstname'); }} {{ Session::get('admin_lastname'); }}
       			</h3>
       		</div>
       		<div class="row text-center">
       			<h4>Admin</h4>
       		</div>
       </div>

   		<form class="form-control p-3" id="profile-edit-form">
   			@CSRF
        <input type="number" name="profile_id" value="{{ $admin->id }}" hidden>
   			<div class="row mb-3">
   				<div class="col-md-4">
   					<label for="profile_fname">Firstname:</label>
   				</div>
   				<div class="col-md-8">
   					<input type="text" class="form-control" name="profile_fname" id="profile_fname" value="{{ $admin->firstname }}">
   				</div>
   			</div>
   			<div class="row mb-3">
   				<div class="col-md-4">
   					<label for="profile_lname">Lastname:</label>
   				</div>
   				<div class="col-md-8">
   					<input type="text" class="form-control" name="profile_lname" id="profile_lname" value="{{ $admin->lastname }}">
   				</div>
   			</div>
   			<div class="row mb-3">
   				<div class="col-md-4">
   					<label for="profile_email">Email:</label>
   				</div>
   				<div class="col-md-8">
   					<input type="email" class="form-control" name="profile_email" id="profile_email" value="{{ $admin->email }}">
   				</div>
   			</div>
   			<div class="row mb-3">
   				<div class="col-md-4">
   					<label for="profile_pass">Password:</label>
   				</div>
   				<div class="col-md-8">
   					<button type="button" id="reset_pass" class="btn btn-sm btn-danger"><i class="fa fa-refresh"></i> Change Password</button>
   				</div>
   			</div>
        <div class="row mb-2">
            <label type="button" class="btn btn-primary w-75 mx-auto">
              <input type="file" class="form-control sr-only before_crop_image" id="{{ $admin->id }}" accept="image/*"/>
                <i class="fa fa-camera"></i> Change Photo
            </label>
        </div>
        <div class="row">
			     <button type="submit" class="btn btn-warning w-75 mx-auto" id="btn-save-profile" style="position: relative; left: auto;"><i class="fa fa-check"></i> Save Changes</button>
        </div>
   		</form>

<!-- Change Password Modal -->
<div class="modal fade" id="passwordModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Change Password</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form class="form-control p-3" id="pass-edit-form">
        @CSRF
          <input type="number" name="admin_pass_id" value="{{ $admin->id }}" hidden>
          <div class="row mb-3">
            <div class="col-md-6">
              <label for="profile_pass_change">Type new password:</label>
            </div>
            <div class="col-md-6">
              <input type="password" class="form-control" name="profile_pass_change" id="profile_pass_change">
            </div>
          </div>
          <div class="row mb-3">
            <div class="col-md-6">
              <label for="profile_repass">Retype new password:</label>
            </div>
            <div class="col-md-6">
              <input type="password" class="form-control" name="profile_repass" id="profile_repass">
            </div>
          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary close" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary" id="btn-save-pass">Save changes</button>
        </form>
      </div>
    </div>
  </div>
</div>

<script type="text/javascript">
  $('#reset_pass').on('click', function(){
    $('#passwordModal').modal('show');
  });

  $('.close').on('click', function(){
    $('#passwordModal').modal('hide');
  });
</script>

<!-- Edit profile AJAX -->
<script type="text/javascript">
    $('#profile-edit-form').on('submit', function(e) {
      e.preventDefault();

      $.ajax({
        url: "profile-edit",
        method: "POST",
        data: $('#profile-edit-form').serialize(),
        beforeSend: function() {
          $('#btn-save-profile').attr('disabled', true);
        },
        success: function(data) {
          if (data == 1) {
            Swal.fire(
              'Success!',
              'Changes successfully saved!',
              'success'
              );
            window.location.reload();
          } else {
            Swal.fire(
              'Oops!',
              'An error has occured while saving changes. Please try again.',
              'error'
              );

            $('#admin-login-form')[0].reset();
          }

          $('#btn-save-profile').attr('disabled', false);
        }
      });
    });

      $.ajaxSetup({
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
      });
    </script>

<!-- Edit Pass AJAX -->
<script type="text/javascript">
  $('#pass-edit-form').on('submit', function(e) {
    e.preventDefault();

    var pword1 = $("#profile_pass_change").val();
    var pword2 = $("#profile_repass").val();

      if(pword1 != pword2){
        Swal.fire(
                'Oops!',
                'Password do not match.',
                'warning'
              );
      } else if((pword1.length < 8) || (pword1.length > 12)){
        Swal.fire(
                'Oops!',
                'Password should be 8 - 12 characters.',
                'warning'
              );
      } else {
        //submit the data
        $.ajax({
      url: "password-edit",
      method: "POST",
      data: $('#pass-edit-form').serialize(),
      beforeSend: function() {
        $('#btn-save-pass').attr('disabled', true);
      },
      success: function(data) {
        if (data == 1) {
          Swal.fire(
            'Success!',
            'Password successfully changed!',
            'success'
            );
          window.location.reload();
        } else {
          Swal.fire(
            'Oops!',
            'An error has occured while saving changes. Please try again.',
            'error'
            );

          $('#admin-login-form')[0].reset();
        }

        $('#btn-save-pass').attr('disabled', false);
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

    <!-- Admin Photo Uploader Modal -->
<div class="modal fade" id="adminModal" aria-hidden="true" data-bs-backdrop="static" data-bs-keyboard="false">
  <div class="modal-dialog modal-lg modal-dialog-centered">
      <div class="modal-content">
        @CSRF
        <div class="modal-header">
          <h1 class="modal-title fs-5">Upload Photo</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>

        <div class="modal-body">
          <center><div id="image_demo" style="width:350px;"></div></center>
        </div>

        <div class="modal-footer">
          <input type="text" name="admin_id_photo" class="form-control" id="admin_id_photo" hidden>
          <button type="submit" class="btn btn-primary crop_image_icon" id="btn-upload-img"><span class="fa fa-save"></span> Upload</button>
        </div>
      </div>
  </div>
</div>
  
  <!-- Image Upload Form -->
  <form id="img-upload-form" style="visibility: hidden;">
    @CSRF
    <input type="text" name="cropped_image" id="cropped_image" hidden>
    <input type="text" name="admin_id_img" id="admin_id_img">
  </form>

<!-- Croppie CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/croppie/2.6.5/croppie.min.css" integrity="sha512-zxBiDORGDEAYDdKLuYU9X/JaJo/DPzE42UubfBw9yg8Qvb2YRRIQ8v4KsGHOx2H1/+sdSXyXxLXv5r7tHc9ygg==" crossorigin="anonymous" referrerpolicy="no-referrer" />

<!-- Croppie JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/croppie/2.6.5/croppie.min.js" integrity="sha512-Gs+PsXsGkmr+15rqObPJbenQ2wB3qYvTHuJO6YJzPe/dTLvhy0fmae2BcnaozxDo5iaF8emzmCZWbQ1XXiX2Ig==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

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
      width:300,
      height:300,
      type: 'square'
    },
    boundary:{
      width: 350,
      height: 350
    },
    quality: 1.0,
    size: {
      width:1800,
      height:1800,
      type:'square'
    }
  });

  $('.before_crop_image').on('change', function(){
    var reader = new FileReader();
    var admin_id = $(this).attr('id');

    reader.onload = function(event){
      $image_crop.croppie('bind', {
        url:event.target.result
      }).then(function(){
        console.log('Jquery bind complete.');
      });
    }

    reader.readAsDataURL(this.files[0]);
    $('#admin_id_photo').val(admin_id);
    $('#adminModal').modal('show');
  

  //Crop and upload image
  $('#btn-upload-img').on('click', function(event){
      event.preventDefault();

      $image_crop.croppie('result', {
        type:'canvas',
        size:'size',

        }).then(function(response) {
        $('#admin_id_img').val(admin_id);
        $('#cropped_image').val(response);

        $.ajax({
          url:"upload-photo-admin",
          method: "POST",
          cache: false,
          data: $('#img-upload-form').serialize(),
          beforeSend:function(){
            // alert(admin_id);
          },
          success:function(data){
            $('#adminModal').modal('hide');
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