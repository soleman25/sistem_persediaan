<p><?php echo $this->session->flashdata('message'); ?></p>

<div class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-12">
            	<button class="btn btn-danger" data-toggle="modal" data-target="#myModal">
				  Add User
				</button>
              <div class="card">
                <div class="card-header card-header-danger">
                  <h4 class="card-title ">User Data</h4>
                </div>
                <div class="card-body">
                  <div class="table-responsive">
                    <table class="table">
                      <thead>
					    <tr>
					        <th class="text-center">No</th>
					        <th>User Name</th>
					        <th>Status</th>
					        <th>Last Login</th>
					        <th class="text-right">Actions</th>				        
					    </tr>
					  </thead>
					<tbody>
					                	<?php
                        					$i=0;
					                	    foreach ($users as $user ) :
					                	    $i++; 
					                	?>
					                    <tr>
					                    	<td class="text-center"><?= $i ?></td>
					                        <td><?=  $user->name?></td>
					                        <td>
					                        	<?php 
					                  			if($user->status > 0)
					                        	{
					                        		echo 'Active';
					                        	} else{
					                        		echo 'Not Activated';	
					                        	}
					                        	?>
					                        </td>
					                        
					                        <td><?=  $user->last_login ?></td>
					                        <td class="td-actions text-right">
					                        <?php if ($user->role_id == '1'):?>

					                            <?=  anchor('admin/user_management/view/'.$user->user_id,'<i class="fa fa-eye"></i>',['class'=>'btn btn-info btn-simple btn-xs','rel'=>'tooltip','data-original-title'=>'View User']) ?>				                             
					                            <?=  anchor('admin/user_management/edit/'.$user->user_id,'<i class="fa fa-edit"></i>',['class'=>'btn btn-success btn-simple btn-xs','rel'=>'tooltip','data-original-title'=>'Change User Data','onclick'=>'return confirm(\'Are you sure you want to edit this?\')']) ?>
					                            
					                            <?php else:?>

					                            	<?=  anchor('admin/user_management/view/'.$user->user_id,'<i class="fa fa-eye"></i>',['class'=>'btn btn-info btn-simple btn-xs','rel'=>'tooltip','data-original-title'=>'View User']) ?>
					                       
					                            	<?=  anchor('admin/user_management/delete/'.$user->user_id,'<i class="fa fa-times"></i>',['class'=>'btn btn-danger btn-simple btn-xs','rel'=>'tooltip','data-original-title'=>'Remove','onclick'=>'return confirm(\'Are you sure you want to delete this?\')']) ?>
					                            
					                            <?php endif;?>
					                        </td>
					                    </tr>
					                    <?php endforeach; ?>
					                </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>


<!-- Modal Core -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="myModalLabel"></h4>
      </div>
      <div class="modal-body">
        <div class="card">
                <div class="card-header card-header-danger">
                  <h4 class="card-title text-center">Form Add Supplier</h4>
                </div>
                <div class="card-body">
                  <div class="table-responsive">
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
				        		
								<div class="modal-footer">
									<button type="submit" class="btn btn-info btn-simple" >Save</button>
									<button type="button" class="btn btn-default btn-simple" data-dismiss="modal">Close</button>
								</div>
						    <?= form_close() ?>
                  </div>
                </div>
              </div>
      </div>
    </div>
  </div>
</div>
