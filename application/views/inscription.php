<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Skydash Admin</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="<?php echo site_url('assets/vendors/feather/feather.css') ;?>">
  <link rel="stylesheet" href="<?php echo site_url('assets/vendors/ti-icons/css/themify-icons.css') ;?>">
  <link rel="stylesheet" href="<?php echo site_url('assets/vendors/css/vendor.bundle.base.css') ;?>">
  <!-- endinject -->
  <!-- Plugin css for this page -->
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="<?php echo site_url('assets/css/vertical-layout-light/style.css') ;?>">
  <!-- endinject -->
  <link rel="shortcut icon" href="<?php echo site_url('assets/images/favicon.png') ;?>" />
</head>

<body>
  <div class="container-scroller">
    <div class="container-fluid page-body-wrapper full-page-wrapper">
      <div class="content-wrapper d-flex align-items-center auth px-0">
        <div class="row w-100 mx-0">
          <div class="col-lg-4 mx-auto">
            <div class="auth-form-light text-left py-5 px-4 px-sm-5">
              <div class="brand-logo">
                <img src="<?php echo site_url('assets/logo.svg') ;?>" alt="Takalo">
              </div>
              <h4>New here?</h4>
              <h6 class="font-weight-light">Signing up is easy. It only takes a few steps</h6>
              <form class="pt-3" action = "<?php echo site_url('login/controlInscription') ; ?>" method = "post">
                <div class="form-group">
                  <input type="text" class="form-control form-control-lg" id="exampleInputUsername1" placeholder="Name" name = "name">
                </div>
                <div class="form-group">
                  <input type="text" class="form-control form-control-lg" id="exampleInputUsername1" placeholder="Username" name = "username">
                </div>
                <div class="form-group">
                  <input type="email" class="form-control form-control-lg" id="exampleInputEmail1" placeholder="Email" name = "email">
                </div>
                
                <div class="form-group">
                  <input type="password" class="form-control form-control-lg" id="exampleInputPassword1" placeholder="Password" name = "password">
                </div>
                <div class="mb-4">
                  <div class="form-check">
                    <label class="form-check-label text-muted">
                      <input type="checkbox" class="form-check-input">
                      I agree to all Terms & Conditions
                    </label>
                  </div>
                </div>
                <div class="mt-3">
                  <input class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn" value = "SIGN IN" type = "submit">
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
      <!-- content-wrapper ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->
  <!-- plugins:js -->
  <script src="<?php echo site_url('assets/vendors/js/vendor.bundle.base.js') ;?>"></script>
  <!-- endinject -->
  <!-- Plugin js for this page -->
  <!-- End plugin js for this page -->
  <!-- inject:js -->
  <script src="<?php echo site_url('assets/js/off-canvas.js') ;?>"></script>
  <script src="<?php echo site_url('assets/js/hoverable-collapse.js') ;?>"></script>
  <script src="<?php echo site_url('assets/js/template.js') ;?>"></script>
  <script src="<?php echo site_url('assets/js/settings.js') ;?>"></script>
  <script src="<?php echo site_url('assets/js/todolist.js') ;?>"></script>
  <!-- endinject -->
</body>

</html>
