@extends('layout_index')
@section('contents')

<h2 class="text-center lead" style="font-weight: bold;">NaViSUre Admin</h2>

<!-- jQuery CDN -->
<script src="https://code.jquery.com/jquery-3.7.0.min.js" integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>

<script type="text/javascript">
	$(window).on('load', function() {
        $('#admin-login').modal('show');
    });
</script>

<!-- Login Modal -->
<div class="modal fade" id="admin-login" data-bs-backdrop="static" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <form class="form-control" id="admin-login-form">
          @CSRF
          <div class="modal-header">
            <h1 class="modal-title fs-5" id="admin-login">Admin Login</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <div class="row mb-3">
              <div class="col-md-3">
                <label for="login_email" class="form-label">Email</label>
            </div>
                <input type="email" class="form-control" id="login_email" name="login_email" required>
            </div>  
                <div class="row mb-3">
                <div class="col-md-3">
                  <label for="login_password" class="form-label">Password</label>
                </div>
                <input type="password" class="form-control" id="login_password" name="login_password" required>
              </div>
            <p class="text-center">Don't have an admin account? Please <a href="#" class="text-primary register">register</a>.</p>
          </div>
          <div class="modal-footer">
            <button type="submit" id="btn-login" class="btn btn-primary">Login</button>
          </div>
        </form>
      </div>
  </div>
</div>

<!-- Register Modal -->
<div class="modal fade" id="admin-register" data-bs-backdrop="static" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <form class="form-control" id="admin-register-form">
          @CSRF
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="admin-login">Admin Registration Account</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <div class="row mb-3">
            <div class="col-md-2">
              <label for="firstname" class="form-label">Firstname</label>
          </div>
              <input type="text" class="form-control" id="firstname" name="firstname" required>
          </div> 
          <div class="row mb-3">
            <div class="col-md-2">
              <label for="lastname" class="form-label">Lastname</label>
          </div>
              <input type="text" class="form-control" id="lastname" name="lastname" required>
          </div>  
          <div class="row mb-3">
            <div class="col-md-2">
              <label for="reg_email" class="form-label">Email</label>
          </div>
              <input type="email" class="form-control" id="reg_email" name="reg_email" required>
          </div>  
          <div class="row mb-3">
            <div class="col-md-2">
              <label for="reg_password" class="form-label">Password</label>
            </div>
            <input type="password" class="form-control" id="reg_password" name="reg_password" required>
          </div>
          <div class="row mb-3">
            <div class="col-md-4 text-left">
              <label for="rereg_password" class="form-label">Retype Password</label>
            </div>
            <input type="password" class="form-control" id="rereg_password" name="rereg_password" required>
          </div>
          <p class="text-center">Already have an account? Login <a href="#" class="text-primary login">here</a>.</p>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-primary" id="reg-btn">Register Account</button>
        </div>
        </form>
      </div>
  </div>
</div>
</html>

<!-- Show Modal -->
<script type="text/javascript">
  $(document).ready(function() {
    //show register modal
    $(document).on('click', '.register', function(e) {
        $('#admin-login').modal('hide');
        $('#admin-register').modal('show');
    });

    $(document).on('click', '.login', function(e) {
        $('#admin-register').modal('hide');
        $('#admin-login').modal('show');
    });
  });
</script>

<!-- AJAX for Register Admin -->
<script type="text/javascript">
  //admin register account
        $(document).ready(function(){
            //send data
            $('#admin-register-form').on('submit', function(e){
                e.preventDefault(); //stops the page from refreshing when form is submitted.

                var pword1 = $("#reg_password").val();
                var pword2 = $("#rereg_password").val();

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
                    url:"save-admin-account", //url to be routed
                    method:"POST",
                    data: $('#admin-register-form').serialize(),
                    beforeSend:function(){
                      $("#reg-btn").attr('disabled', 'true')
                    },
                    success:function(data){
                        if(data == 2){
                          Swal.fire(
                            'Admin Registration',
                            'Email already registered.',
                            'warning'
                          );
                          $('#reg-btn').attr('disabled', false);
                        } else if(data == 1){
                          Swal.fire(
                            'Admin Registration',
                            'Account successfully saved!',
                            'success'
                          );
                          $('#admin-register-form')[0].reset();
                        } else {
                          Swal.fire(
                            'Admin Registration',
                            'Account could not be saved!',
                            'error'
                          );
                          $('#reg-btn').attr('disabled', false);
                        }
                    }
                });
                  }
            });
        });

    // login script for admin account
    $('#admin-login-form').on('submit', function(e) {
      e.preventDefault();

      $.ajax({
        url: "login-admin",
        method: "POST",
        data: $('#admin-login-form').serialize(),
        beforeSend: function() {
          $('#btn-login').attr('disabled', true);
        },
        success: function(data) {
          if (data == 1) {
            Swal.fire(
              'Access Granted!',
              'Welcome aboard.',
              'success'
              );
            //redirect to the admin page
            window.location.href = "admin/edit";
          } else {
            Swal.fire(
              'Access Denied!',
              'Incorrect username or password. Please try again.',
              'error'
              );

            $('#admin-login-form')[0].reset();
          }

          $('#btn-login').attr('disabled', false);
        }
      });
    });

      $.ajaxSetup({
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
      });
    </script>

<!-- <div class="my-5 py-5"></div> -->

@endsection