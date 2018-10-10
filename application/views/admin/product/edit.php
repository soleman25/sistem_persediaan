<p><?php echo $this->session->flashdata('message'); ?></p>
<div class="row">
	<div class="col-sm-12">
		<div class="card">
			<div class="card-header card-header-danger">
                  <h4 class="card-title text-center">Form Edit Master Product</h4>
            </div>
	    	<div class="container">
							<br>
							 <form class="form-horizontal" action="<?php echo base_url('admin/master_product/update/'.$shows->product_id); ?>" method ="post">
								
						    	<div class="form-group">
									<label>Product Code</label>
									<input type="text" class="form-control" id="kode_product" name="kode_product" value="<?=  $shows->kode_product  ?>"required/ >
								</div>
								<div class="form-group">
									<label>Product Name</label>
									<input type="text" class="form-control" id="nma_product" name="nma_product" value="<?=  $shows->nma_product  ?>"required/ >
								</div>
								<div class="form-group">
									<label>Packing</label>
									<input type="text" class="form-control" id="packing" name="packing" value="<?=  $shows->packing  ?>" >
								</div>
								<div class="form-group">
									<label>Unit</label>
									<input type="text" class="form-control" id="unit" name="unit" value="<?=  $shows->unit  ?>" required/>
									<input type="hidden" class="form-control" id="supplier_id" name="supplier_id" value="<?=  $shows->supplier_id  ?>" required/>
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