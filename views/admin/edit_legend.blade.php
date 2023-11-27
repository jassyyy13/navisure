@extends('admin.layout')
@section('content')
	
<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4 mt-3">
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h2 class="mb-3">Edit Legend</h2>
        <div class="text-info">
        	<button type="button" id="add_legend_btn" class="btn btn-success"><i class="fa-solid fa-plus"></i> Add Legend</button>
        </div>	
</div>
<p>This section allows modification of essential markers to appear on the Legend page for the users to use as reference.</p>
<div class="table-responsive">
	<table class="table table-bordered" id="legend_tbl">
		<thead>
			<th>IMAGE</th>
			<th>LEGEND DESCRIPTION</th>
			<th colspan="3">ACTIONS</th>
		</thead>
		<tbody>
			@foreach($legend as $lgnd)
			<tr>
				<td class="text-center"><img src="{{url('public/asset/img/legend_icon/'.$lgnd->legend_img)}}" class="img-fluid" width="100px" /></td>
				<td>{{ $lgnd->legend_title }}</td>
				<td><label type="button" class="btn btn-warning w-100" id="{{ $lgnd->legend_title . 'btn_lgnd' }}">
                <input type="file" class="form-control sr-only before_crop_image" id="{{ $lgnd->id . '_lgnd' }}" accept="image/*" />
                <i class="fa fa-upload"></i> Upload</label>
		        </td>
				<td><button id="{{ $lgnd->legend_title }}" class="btn btn-secondary btn-md edit-legend-btn w-100 h-100"><span class="fa fa-pencil"></span> Edit</button></td>
				<td><button id="{{ $lgnd->id }}" class="btn btn-danger btn-md delete-legend-btn w-100 h-100"><span class="fa-solid fa-trash"></span> Delete</button></td>
			</tr>
			@endforeach
		</tbody>
	</table>
</div>

<!-- Add Legend Modal-->
<div class="modal fade" id="add-legend-modal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Add Legend</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body p-3">
        <form id="add-legend-form">
		    @CSRF  
		      <div class="row mb-2">
		        <div class="col-md-5">
		          <label for="legend_title" class="form-label">Legend Title</label>
		      </div>
		      	<div class="col-md-7">
		          <input type="text" class="form-control mb-3" id="legend_title" name="legend_title" required>
		        </div>  
		      </div>           
    	</div>
    	<div class="modal-footer">
		        <button type="submit" class="btn btn-primary mt-3" id="add-legend-btn">Add Legend</button>
		      </div>
		   </form>
    </div>
  </div>
</div>

<!-- Edit Legend Modal-->
<div class="modal fade" id="edit-legend-modal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Edit Legend</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form id="edit-legend-form">
		    @CSRF 
		    	<input type="text" name="id_legend" id="id_legend" hidden>
		      <div class="row mb-2">
		        <div class="col-md-12">
		          <label for="legend_title_edit" class="form-label">Legend Title</label>
		      </div>
		          <input type="text" class="form-control mb-3" id="legend_title_edit" name="legend_title_edit" required>
		      </div> 
		      <div class="modal-footer">
		        <button type="submit" class="btn btn-primary mt-3" id="edit-legend-btn">Save Changes</button>
		      </div>
		   </form>               
    	</div>
    </div>
  </div>
</div>

<!-- Modal confirmation in removing Legend -->
<div class="modal fade" id="confirm_modal_legend" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Delete Legend</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
            <div class="text-center">
              <p>Are you sure you want to delete this item?</p>
              <br>
              <button id="confirm-btn-legend" class="btn btn-danger">Yes</button>
              <button id="cancel-btn-legend" class="btn btn-primary">Cancel</button>
            </div>  
    </div>
    </div>
  </div>
</div>

<!-- Show/Hide Modal -->
<script type="text/javascript">
	$('#add_legend_btn').on('click', function (e) {
		$('#add-legend-modal').modal('show');
	});
</script>

<!-- Add Legend AJAX -->
<script type="text/javascript">
    $('#add-legend-form').on('submit', function(e) {
      e.preventDefault();

      	$.ajax({
        url: "add-legend",
        method: "POST",
        data: $('#add-legend-form').serialize(),
        beforeSend: function() {
          $('#add-legend-btn').attr('disabled', true);
        },
        success: function(data) {
            if (data == 2) {
            Swal.fire(
              'Oops!',
              'Duplicate item.',
              'warning'
              );
            $('#add-legend-form')[0].reset();
          }
          else if (data == 1) {
            Swal.fire(
              'Success!',
              'Successfully added.',
              'success'
              );
            window.location.reload();
          } else {
            Swal.fire(
              'Oops!',
              'An error occured, please try again.',
              'error'
              );

            $('#add-legend-form')[0].reset();
          }

          $('#add-legend-btn').attr('disabled', false);
        }
      });
    });  	

      $.ajaxSetup({
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
      });
</script>

<!-- Fetch Legend Info -->
<script type="text/javascript">
	$('.edit-legend-btn').click(function(){
		var legendId = $(this).attr("id");
            var editLegendModal = $("#edit-legend-modal");
            var editLegendForm = $("#edit-legend-form");

            // Make an AJAX request to fetch the legend's data
            $.ajax({
                url: "fetch-legend",
                method: "POST",
                data: { id: legendId },
                success: function (data) {
                    // Populate the modal fields with the fetched data
                    editLegendForm.find("input[name='legend_title_edit']").val(data.legend_title);
                    editLegendForm.find("input[name='id_legend']").val(legendId);

                    // Show the modal
                    editLegendModal.modal("show");
                },
                error: function () {
                    // Handle errors or display an error message
                    console.log("Error fetching data");
                }
            });
        });
</script>

<!-- AJAX for Editing Legend -->
<script type="text/javascript">
    $('#edit-legend-form').on('submit', function(e) {
      e.preventDefault();

      	$.ajax({
        url: "edit-legend",
        method: "POST",
        data: $('#edit-legend-form').serialize(),
        beforeSend: function() {
          $('#edit-legend-btn').attr('disabled', true);
        },
        success: function(data) {
            if (data == 1) {
            Swal.fire(
              'Success!',
              'Changes successfully saved.',
              'success'
              );
            window.location.reload();
          } else {
            Swal.fire(
              'Oops!',
              'An error occured, please try again.',
              'error'
              );

            $('#edit-legend-form')[0].reset();
          }

          $('#edit-legend-btn').attr('disabled', false);
        }
      });
    });

      $.ajaxSetup({
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
      });
</script>

<!-- AJAX for Delete Legend -->
<script type="text/javascript">
      $('.delete-legend-btn').on('click', function (e) {
            delete_id = $(this).attr("id");
            $('#confirm_modal_legend').modal('show');
      });

      $('#cancel-btn-legend').on('click', function(e) {
            e.preventDefault();
            $('#confirm_modal_legend').modal('hide');
      });   

      $('#confirm-btn-legend').on('click', function(e) {
	          e.preventDefault();
	          $('#confirm_modal_legend').modal('hide');

            $.ajax({
                  url: "delete-legend",
                  method: "POST",
                  data: { id : delete_id },
                  beforeSend: function() {
                        $('#submit_delete_legend').attr('disabled', true);
                  },
                  success: function (data) {
                     if (data == 1) {
			            Swal.fire(
			              'Success!',
			              'Item successfully deleted.',
			              'success'
			              );
			            $('#legend_tbl').load(document.URL + ' #legend_tbl');
			          } else {
			            Swal.fire(
			              'Oops!',
			              'Error in deleting item. Please try again.',
			              'error'
			              );
			          }
			          $('#submit_delete_legend').attr('disabled', false);
			                  }
			            });
      });

      $.ajaxSetup({
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
      });
</script> 

<!-- Icon Uploader Modal -->
<div class="modal fade" id="legendModal" aria-hidden="true" data-bs-backdrop="static" data-bs-keyboard="false">
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
          <input type="text" name="legend_id_photo" class="form-control" id="legend_id_photo" hidden>
          <button type="submit" class="btn btn-primary crop_image_icon" id="btn-upload-icon"><span class="fa fa-save"></span> Upload</button>
        </div>
      </div>
  </div>
</div>
  
  <!-- Image Upload Form -->
  <form id="img-upload-form" style="visibility: hidden;">
    @CSRF
    <input type="text" name="cropped_image" id="cropped_image" hidden>
    <input type="text" name="legend_id_img" id="legend_id_img">
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

  $('.before_crop_image').on('change', function(){
    var reader = new FileReader();
    var legend_id = $(this).attr('id');

    reader.onload = function(event){
      $icon_crop.croppie('bind', {
        url:event.target.result
      }).then(function(){
        console.log('Jquery bind complete.');
      });
    }

    reader.readAsDataURL(this.files[0]);
    $('#legend_id_photo').val(legend_id);
    $('#legendModal').modal('show');
  

  //Crop and upload image
  $('#btn-upload-icon').on('click', function(event){
      event.preventDefault();

      $icon_crop.croppie('result', {
        type:'canvas',
        size:'viewport',

        }).then(function(response) {
        $('#legend_id_img').val(legend_id);
        var legend_id_1 = $('#legend_id_photo').val();
        $('#cropped_image').val(response);

        $.ajax({
          url:"upload-photo",
          method: "POST",
          cache: false,
          data: $('#img-upload-form').serialize(),
          beforeSend:function(){
          },
          success:function(data){
            $('#legendModal').modal('hide');
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