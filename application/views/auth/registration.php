
  <div class="login-box">
    
  <!-- /.login-logo -->
    <div class="login-box-body">
      <p class="login-box-msg"><b>Sign up for new account</b></p>
      <p><?php echo $this->session->flashdata('message'); ?></p>

    <form action="<?php echo base_url(); ?>auth/registrasi/create" method="post">
        <div class="form-group has-feedback">
          <input type="text" class="form-control" id="name" name="name" placeholder="Username" required="">  
          <span class="text-danger"><?php echo form_error('name'); ?></span>
          <span class="glyphicon glyphicon-user form-control-feedback"></span>
        </div>
        <div class="form-group has-feedback">
          <input type="email" class="form-control" id="email" name="email" placeholder="Email" required=""> 
          <span class="text-danger"><?php echo form_error('email'); ?></span>
          <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
        </div>
        <div class="form-group has-feedback">
          <input type="password" class="form-control" id="pswd" name="password" placeholder="Password" required="">  
          <span class="text-danger"><?php echo form_error('password'); ?></span>
          <span class="glyphicon glyphicon-lock form-control-feedback"></span>
        </div>
        <div class="form-group has-feedback">
          <input type="password" class="form-control" id="cn-pswd" name="confirmpswd" placeholder="Confirm Password" required="">  
          <span class="text-danger"><?php echo form_error('confirmpswd'); ?></span>
          <span class="glyphicon glyphicon-log-in form-control-feedback"></span>
        </div>
        <div><a href="login" class="text-center">I already have a account</a> </div>
      <br>     
      <button type="submit" class="btn btn-block btn-primary btn-lg">Register</button>
    </form>
  </div>
  <!-- /.form-box -->
</div>
