

  <div class="wrapper">
    <div class="header header-filter" >
      <div class="container">
        <div class="row">
          <div class="col-md-12">
          <div class="container">
				<div class="row">
					<div class="col-md-4 col-md-offset-4">
						<div class="card card-signup">
            <form action="<?php echo base_url();?>auth/forgot/kirim_reset" method="post">
								<div class="header header-danger text-center">
									<h4>Insert new password</h4>
								</div>
								<p class="text-divider"><?php echo $this->session->flashdata('message'); ?></p>
								<div class="content">

									<div class="input-group">
										<span class="input-group-addon">
											<i class="material-icons">email</i>
                    </span>
                    <input type="text" name="token" id="token" value="<?php echo $token; ?>"  hidden>
                    <input type="password" name="password" id="password" class="form-control" placeholder="Password Baru"> 
									</div>
								</div>
								<div class="footer text-center">
                <button type="submit" class="btn btn-danger ">Change</button>
								</div>
							</form>
						</div>

					</div>
				</div>
			</div>

          </div>
        </div>
      </div>
    </div>
  </div>
   