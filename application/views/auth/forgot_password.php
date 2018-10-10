<p><?php echo $this->session->flashdata('message'); ?></p>
<div class="row">
	<div class="col-sm-12">
		<div class="card">
			<div class="card-header card-header-danger">
                  <h4 class="card-title text-center">Insert your email address</h4>
            </div>
	    	<div class="container">
							<br>
							 <form action="<?php echo base_url(); ?>auth/forgot/send_email" method="post">
												<div class="header header-danger text-center">
												
												</div>
													<div class="col-sm-12">
													<div class="form-group label-floating has-error">
														
															<input type="email" class="form-control" placeholder="Email" id="email" name="email" required/>
															<span class="text-danger"><?php echo form_error('email'); ?></span>
														</div>
													</div>
													<div class="footer text-center">
														<button type="submit" class="btn btn-default" data-toggle="tooltip" data-placement="top" title="Anda akan menerima email setelah clik button ini">Next</button>
													</div>
										</form>
						</div>

					</div>
				</div>

	        </div>
	    </div>

</div>

<p><?php echo $this->session->flashdata('message'); ?></p>
<div class="wrapper">
    <div class="header header-filter" >
      <div class="container">
        <div class="row">
          <div class="col-md-12">
          	<div class="container">
							<div class="row">
								<div class="col-md-4 col-md-offset-4">
									<div class="card card-signup">
										
									</div>
								</div>
							</div>
						</div>
          </div>
        </div>
      </div>
    </div>
  </div>
   