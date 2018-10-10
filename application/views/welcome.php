<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>sistem informasi persediaan</title>

  <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />

  <!--     Fonts and icons     -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons" />
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" />
  <link rel="icon" href="<?php echo base_url('assets/img/logo_pizza.png');?>">

  <!-- CSS Files -->
    
    <link href="<?php echo base_url('assets/css/bootstrap.min.css');?>" rel="stylesheet"/>
    <link href="<?php echo base_url('assets/css/material-kit.css');?>" rel="stylesheet"/>

  <!-- CSS Just for demo purpose, don't include it in your project -->
  <link href="<?php echo base_url('assets/css/demo.css');?>" rel="stylesheet" />
</head>

<body class="tutorial-page">

<nav class="navbar navbar-danger">
<div class="container">
  <div class="navbar-header">
    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#example-navbar-primary" aria-expanded="true">
      <span class="sr-only">Toggle navigation</span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
    </button>
    <a href="<?php echo base_url(); ?>">
         <div class="logo-container">
              <div class="logo">
                  <img src="<?php echo base_url('assets/img/logo_pizza2.png');?>" alt="Creative Tim Logo">
              </div>
              <div class="brand">
                  Pizza Hut Delivery
              </div>
         </div>
    </a>
  </div>

  <div class="navbar-collapse collapse in" id="example-navbar-primary" aria-expanded="true" style="">
    <ul class="nav navbar-nav navbar-right">
       <?php  if($this->session->userdata('roles') !=  '1'  and $this->session->userdata('roles')  !=  '2'  and $this->session->userdata('roles')  !=  '3' and $this->session->userdata('roles')  !=  '4' ):?>
      <li class="active">
          <li><a href="#" data-toggle="modal" data-target="#myModal">
                <i class="material-icons">account_circle</i>
                  Sign in
              </a>
          </li>
          <li><a href="<?php echo base_url('auth/forgot')?>">
                <i class="material-icons">lock</i>
                   Forgot Password
              </a>
          </li>
          <?php endif;?>

<!-- User Account Menu -->
          <?php  if($this->session->userdata('roles')  ==  '1' ): ?>
          <li class="active">
            <!-- Menu toggle button -->
            <a href="<?php echo base_url('admin/dashboard'); ?>">
              Dashboard
            </a>
          </li>
          <?php  elseif($this->session->userdata('roles')  ==  '2' ): ?>
        <!-- User Account Menu -->
          <li class="active">
            <!-- Menu toggle button -->
            <a href="<?php echo base_url('om/dashboard'); ?>">
              Dashboard
            </a>
          </li>
          <?php  elseif($this->session->userdata('roles')  ==  '3' ): ?>
        <!-- User Account Menu -->
          <li class="active">
            <!-- Menu toggle button -->
            <a href="<?php echo base_url('supplier/dashboard'); ?>">
              Dashboard
            </a>
          </li>
          <?php endif;?>
    </ul>
  </div>
</div>
</nav>
<p><?php echo $this->session->flashdata('message'); ?></p>
  <div class="wrapper">
    <div class="header header-filter" >
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <h1 class="title text-center">Welcome to the Inventory Information System of Pizza hut delivery</h1>
          </div>
        </div>
      </div>
    </div>
  </div>
<footer class="footer footer-transparent">
  <?php $this->load->view('layouts/footer')?>
</footer>
<!-- Button trigger modal -->

<!-- Modal Core -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
      <center>
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="myModalLabel"><b>Please sign in</b></h4>
        <p class="login-box-msg">Sign in to start your session</p>
      </div>
      <div class="modal-body">
      <?php  if($this->session->userdata('role_id') !=  '1'  and $this->session->userdata('role_id')  !=  '2' ): ?>
  <div class="login-box">
    <div class="login-logo">
    <center>
      <img class="mb-4" src="<?php echo base_url('assets/img/logo_pizza.png');?>" alt="" width="72" height="72"><br>
    </center>
    </div>
  <!-- /.login-logo -->
        <div class="login-box-body">
          <form action="<?php echo base_url(); ?>auth/login/auth" method="post">
          
            <div class="form-group label-floating has-error">
            <label class="control-label">Username</label>
              <input type="text" class="form-control" placeholder="Username" id="name" name="name" required/>
              <span class="text-danger"><?php echo form_error('name'); ?></span>
            </div>
            
            <div class="form-group label-floating has-error">
              <label class="control-label">Password</label>
              <input type="password" class="form-control" placeholder="Password" id="pswd" name="password" required data-eye/>
              <span class="text-danger"><?php echo form_error('password'); ?></span>
            </div>
            <br>
            <button type="submit" class="btn btn-block btn-default btn-lg" data-toggle="tooltip" data-placement="top" title="Pastikan Username dan Password yang di input benar">Sign In</button>
          </form>
        </div>
  <!-- /.login-box-body -->
  <!-- Modal Core -->

  </div>
 <?php endif;?>


      </div>
     
    </div>
  </div>
</div>
    		
</body>
  <!--   Core JS Files   -->
  <script src="<?php echo base_url('assets/js/jquery.min.js" type="text/javascript');?>"></script>
  <script src="<?php echo base_url('assets/js/bootstrap.min.js" type="text/javascript');?>"></script>
  <script src="<?php echo base_url('assets/js/material.min.js');?>"></script>

  <!--  Plugin for the Sliders, full documentation here: http://refreshless.com/nouislider/ -->
  <script src="<?php echo base_url('assets/js/nouislider.min.js" type="text/javascript');?>"></script>

  <!--  Plugin for the Datepicker, full documentation here: http://www.eyecon.ro/bootstrap-datepicker/ -->
  <script src="<?php echo base_url('assets/js/bootstrap-datepicker.js" type="text/javascript');?>"></script>

  <!-- Control Center for Material Kit: activating the ripples, parallax effects, scripts from the example pages etc -->
  <script src="<?php echo base_url('assets/js/material-kit.js" type="text/javascript');?>"></script>

  <script>

$().ready(function(){

  $(window).on('scroll', materialKit.checkScrollForTransparentNavbar);

});
$('[data-toggle="tooltip"]').tooltip();
$(function() {
	$("input[type='password'][data-eye]").each(function(i) {
		let $this = $(this);

		$this.wrap($("<div/>", {
			style: 'position:relative'
		}));
		$this.css({
			paddingRight: 60
		});
		$this.after($("<div/>", {
			html: 'Show',
			class: 'btn btn-default btn-sm',
			id: 'passeye-toggle-'+i,
			style: 'position:absolute;right:0px;top:10%;transform:translate(0,-50%);padding: 2px 7px;font-size:12px;cursor:pointer;'
		}));
		$this.after($("<input/>", {
			type: 'hidden',
			id: 'passeye-' + i
		}));
		$this.on("keyup paste", function() {
			$("#passeye-"+i).val($(this).val());
		});
		$("#passeye-toggle-"+i).on("click", function() {
			if($this.hasClass("show")) {
				$this.attr('type', 'password');
				$this.removeClass("show");
				$(this).removeClass("btn-outline-primary");
			}else{
				$this.attr('type', 'text');
				$this.val($("#passeye-"+i).val());				
				$this.addClass("show");
				$(this).addClass("btn-outline-primary");
			}
		});
	});
});
</script>
</html>
