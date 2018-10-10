<p><?php echo $this->session->flashdata('message'); ?></p>
<div class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-6">
              <div class="card">
                <div class="card-header card-header-danger">
                  <h4 class="card-title ">Form Add User</h4>
                </div>
                <div class="card-body">
                	
                </div>
            </div>
							<p><?php echo $this->session->flashdata('message'); ?></p> 
				          	<?=  form_open('admin/user_management/store') ?>
				          		<div class="form-group label-floating is-empty">
									<label class="control-label">User Name</label>
									<input type="text" class="form-control" id="name" name="name" value="<?= set_value('name') ?>" required/>
									<span class="text-danger"><?php echo form_error('name'); ?></span>
						    	</div>
				          		<div class="form-group abel-floating is-empty">
									<label class="control-label">User group</label>
										<select class="form-control" id="role_id" name="role_id">
											<option value="<?= set_value('role_id') ?>">--select--</option>
											<?php foreach ($roles as $role)
											{?>
											 <option value="<?php echo $role->id;?>">
											 	<?php echo $role->description;?>
											 </option>
											<?php } ?>
											<?endforeach;?>
										</select>
								</div>
								<div class="form-group label-floating is-empty">
									<label class="control-label">User Email</label>
									<input type="email" class="form-control" id="email" name="email" value="<?= set_value('email') ?>" required/>
									<span class="text-danger"><?php echo form_error('email'); ?></span>
						    	</div>
				          		<div class="form-group label-floating is-empty">
									<label class="control-label">Password</label>
									<input type="password" class="form-control" id="password" name="password" value="<?= set_value('password') ?>" required/>
									<span class="text-danger"><?php echo form_error('password'); ?></span>
						    	</div>
						    	<div class="form-group label-floating is-empty">
									<label class="control-label">Password</label>
									<input type="password" class="form-control" id="confirmpswd" name="confirmpswd" value="<?= set_value('password') ?>" required/>
									<span class="text-danger"><?php echo form_error('confirmpswd'); ?></span>
						    	</div>    
				        		<button type="submit" class="btn  btn-default ">Create</button>
				      		<?= form_close() ?>
         				 </div>
         			 </div>
				</div>
	        </div>
	    </div>
</div>










