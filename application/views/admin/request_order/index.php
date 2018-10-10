	<p><?php echo $this->session->flashdata('message'); ?></p>
	    	<div class="container">
	            <div id="inputs">
		            <div class="row">
						<div class="col-md-4 col-md-offset-4">
		                	<div class="card card-signup">
                			<form action="<?php echo base_url('admin/request_order/find')?>" action="GET">
								<div class="content">
                  				  <div class="input-group">
                   					 	<span class="input-group-addon"></span>
                    				<div class="form-group is-empty">
	                      				<select class="form-control" name="periode" id="periode" >
												<option  value="<?= set_value('periode') ?>">--select Periode--</option>
												<?php foreach ($fakturs as $faktur)
												{?>
												 <option value="<?php echo $faktur->periode;?>">
												 	<?php echo $faktur->periode;?>
												 </option>
												<?php } ?>
												<?endforeach;?>
											</select>
			                             <span class="material-input"></span>
		                         	</div>
                  				  </div>
								</div>
				                <div class="footer text-center">
				                  <button type="submit" class="btn btn-default" data-toggle="tooltip" data-placement="top" title="find Request Order">Find Order</button>
				                </div>
								</form>
            				</div>
		                </div>
					</div>
				</div>
			</div>
						

