<p><?php echo $this->session->flashdata('message'); ?></p>
<div class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-6">
              <div class="card">
                <div class="card-header card-header-danger">
                  <h4 class="card-title ">Form Edit Profil</h4>
                </div>
                <div class="card-body">
                	<?=  form_open('admin/user_management/update') ?>
				          		
								<div class="form-group">
									<label class="control-label">User Email</label>
									<input type="email" class="form-control" id="email" name="email" value="<?=  $shows->email  ?>" required/>
									<span class="text-danger"><?php echo form_error('email'); ?></span>
						    	</div>
				          		<div class="form-group">
									<label class="control-label">Password</label>
									<input type="password" class="form-control" id="password" name="password" value="<?= set_value('password') ?>" required/>
									<span class="text-danger"><?php echo form_error('password'); ?></span>
						    	</div>
						    	   
				        		<button type="submit" class="btn  btn-default ">Save</button>
				      		<?= form_close() ?>
				                </div>
				            </div> 
							
				          	
         				 </div>
         			 </div>
				</div>
	        </div>
	    </div>
</div>










