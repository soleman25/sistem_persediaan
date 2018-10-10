 <!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <link rel="apple-touch-icon" sizes="76x76" href="<?php echo base_url('assets/img/logo_pizza.png');?>">
  <link rel="icon" type="image/png" href="<?php echo base_url('assets/img/logo_pizza.png');?>">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>
    Sistem Informasi Prsediaan 
  </title>
  <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
  <!--     Fonts and icons     -->
  <link rel="stylesheet" type="text/javascript" href="https://developers.google.com/chart/interactive/docs/gallery/linechart" />

  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">

  <!-- CSS Files -->
  <link href="<?php echo base_url('assetss/css/material-dashboard.css?v=2.1.0');?>" rel="stylesheet" />
  <!-- CSS Just for demo purpose, don't include it in your project -->
  <link href="<?php echo base_url('assetss/demo/demo.css');?>" rel="stylesheet" />
</head>

<body class="">
  <div class="wrapper ">
    <div class="sidebar" data-color="danger" data-background-color="white" data-image="<?php echo base_url('assetss/img/sidebar-1.jpg');?>">
    <?php  if($this->session->userdata('roles')  ==  '3' ): ?>
      <div class="logo">
        <a href="http://www.creative-tim.com" class="simple-text logo-normal">
          Genstore Lorotan <br> <small>Supplier</small>
        </a>
      </div>
          <?php endif;?>
      <?php  if($this->session->userdata('roles')  ==  '1'or $this->session->userdata('roles')  ==  '2' ): ?>
      <div class="logo">
        <a href="http://www.creative-tim.com" class="simple-text logo-normal">
          Pizza Hut Delivery <br> <small> Mustika Jaya</small>
        </a>
      </div>
          <?php endif;?>
       <?php $this->load->view('layouts/sidebar')?>
    </div>
    <div class="main-panel">
      <!-- Navbar -->
     <?php $this->load->view('layouts/navigation')?>
      <!-- End Navbar -->
      <div class="content">
        <div class="container-fluid">
         <?php echo $contents; ?>
          
          
          <footer class="footer">
            <div class="container-fluid">
             <!--  footer -->

             <?php $this->load->view('layouts/footer')?>
             <!--  footer -->
            </div>
          </footer>
        </div>
      </div>
  <!--   Core JS Files   -->
  <script src="<?php echo base_url('assetss/js/core/jquery.min.js" type="text/javascript');?>"></script>
  <script src="<?php echo base_url('assetss/js/core/popper.min.js" type="text/javascript');?>"></script>
  <script src="<?php echo base_url('assetss/js/core/bootstrap-material-design.min.js" type="text/javascript');?>"></script>
  <script src="<?php echo base_url('assetss/js/plugins/perfect-scrollbar.jquery.min.js');?>"></script>
  <!--  Google Maps Plugin    -->
  <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>
  <!-- Chartist JS -->
  <script src="<?php echo base_url('assetss/js/plugins/chartist.min.js');?>"></script>
  <!--  Notifications Plugin    -->
  <script src="<?php echo base_url('assetss/js/plugins/bootstrap-notify.js');?>"></script>
  <!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="<?php echo base_url();?>assets/js/Chart.js"></script>
  <script src="<?php echo base_url();?>assets/js/Chart.min.js"></script>

  <!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
  <!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="<?php echo base_url('assetss/js/material-dashboard.min.js?v=2.1.0');?>" type="text/javascript"></script>
  <!-- Material Dashboard DEMO methods, don't include it in your project! -->
  <script src="<?php echo base_url('assetss/demo/demo.js');?>"></script>
 
  <script>
    $(document).ready(function() {
      // Javascript method's body can be found in assets/js/demos.js
      md.initDashboardPageCharts();

    });
  </script>
  <script>
    $(document).ready(function() {
      // Javascript method's body can be found in assets/js/demos.js
      md.initDashboardPageCharts();

    });
  </script>
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
</body>

</html>