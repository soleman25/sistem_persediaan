<p><?php echo $this->session->flashdata('message'); ?></p>
<div class="row">
	<div class="col-sm-12">
		<div class="card">
			<div class="card-header card-header-danger">
                  <h4 class="card-title text-center">Form Edit Master Product</h4>
            </div>
	    	<div class="container">
							<br>
							 <form class="form-horizontal" action="<?php echo base_url('om/master_product/update/'); ?>" method ="post">
						    	<div class="form-group">
									<label>Product Name</label>
									<input type="text" class="form-control" id="nma_product" name="nma_product" value="<?=  $shows->product_id  ?>"required/ >
								</div>
								<div class="form-group">
									<label>Packing</label>
									<input type="text" class="form-control" id="packing" name="packing" value="" >
								</div>
								<div class="form-group">
									<label>Unit</label>
									<input type="text" class="form-control" id="unit" name="unit" value="" required/>
								</div>
								
								<div class="form-group">
									<button type="submit" class="btn btn-default">Save</button>
								</div>
							
						    <?= form_close() ?>
						</div>

					</div>
				</div>

	        </div>
	    </div>

</div>