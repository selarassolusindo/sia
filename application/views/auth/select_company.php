<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- <title>AdminLTE 3 | Log in</title> -->
    <title><?php echo SITE_NAME; ?> | Select Company</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/adminlte/plugins/fontawesome-free/css/all.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/adminlte/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/adminlte/dist/css/adminlte.min.css">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  </head>
  <body class="hold-transition login-page">
  <div class="login-box">
    <!-- <div class="login-logo">
      <a href="../../index2.html"><b>Admin</b>LTE</a>
    </div> -->
    <div class="login-logo">
      <a href="#"><b><?php echo SITE_NAME; ?> </b> <?php echo SITE_VERSION; ?></a>
    </div>
    <!-- /.login-logo -->
    <div class="card">
      <div class="card-body login-card-body">
        <!-- <p class="login-box-msg">Sign in to start your session</p> -->

        <!-- <h4 class='text-center'><?php //echo lang('login_heading');?></h4>
        <p><?php //echo lang('login_subheading');?></p> -->
        <h4 class='text-center'>Select Company</h4>
        <p>Please select a company in the list below</p>

        <div id="infoMessage"><?php echo $message;?></div>

        <!-- <form action="../../index3.html" method="post"> -->
        <?php echo form_open("auth/selectCompany");?>

          <!-- company -->
          <?php //echo pre($s01_thaj);?>
          <div class="input-group mb-3">
              <select class="form-control" name="idcompany">
                <option>Company</option>
                <?php foreach ($t01_company as $r) { ?>
                  <option value="<?php echo $r->idcompany; ?>"><?php echo $r->Nama; ?></option>
                <?php } ?>
              </select>
              <div class="input-group-append">
                <div class="input-group-text">
                  <span class="fas fa-building"></span>
                </div>
              </div>
          </div>

          <div class="row">
            <div class="col-3">
              <button type="submit" class="btn btn-primary btn-block">Proses</button>
              <!-- <p> -->
              <?php //echo form_submit('submit', lang('login_submit_btn'));?>
              <!-- </p> -->
            </div>
            <div class="col-3">
               <a href="<?php echo site_url('auth/logout'); ?>" class="btn btn-default btn-block">Cancel</a>
            </div>
          </div>
        <!-- </form> -->
        <?php echo form_close();?>

      </div>
      <!-- /.login-card-body -->
    </div>
  </div>
  <!-- /.login-box -->

  <!-- jQuery -->
  <script src="<?php echo base_url(); ?>assets/adminlte/plugins/jquery/jquery.min.js"></script>
  <!-- Bootstrap 4 -->
  <script src="<?php echo base_url(); ?>assets/adminlte/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- AdminLTE App -->
  <script src="<?php echo base_url(); ?>assets/adminlte/dist/js/adminlte.min.js"></script>

  <script>
    $(function () {
      $('body').addClass('text-sm')
      $('.btn').addClass('btn-sm')
      $('.table').addClass('table-sm')
      $('.form-control').addClass('form-control-sm')
    })
  </script>

  </body>
</html>
