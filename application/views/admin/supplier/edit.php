<p><?php echo $this->session->flashdata('message'); ?></p>
<div class="row">
	<div class="col-sm-12">
		<div class="card">
			<div class="card-header card-header-danger">
                  <h4 class="card-title text-center">Form Edit Master Supplier</h4>
            </div>
	    	<div class="container">
							<br>
							 <form class="form-horizontal" action="<?php echo base_url('admin/supplier/update/'.$shows->supplier_id); ?>" method="post">
						    	<div class="form-group">
									<label>Supplier Code</label>
									<input type="text" class="form-control" id="kode_supplier" name="kode_supplier" value="<?=  $shows->kode_supplier  ?>" >
								</div>
								<div class="form-group">
									<label>Supplier Name</label>
									<input type="text" class="form-control" id="nma_supplier" name="nma_supplier" value="<?=  $shows->nma_supplier  ?>" >
								</div>
								<div class="form-group">
									<label>Phone Number</label>
									<input type="text" class="form-control" id="alamat" name="alamat" value="<?=  $shows->alamat  ?>" >
								</div>
								<div class="form-group">
									<label>Phone Number</label>
									<input type="text" class="form-control" id="tlp" name="tlp" value="<?=  $shows->tlp  ?>" >
								</div>
								
								<div class="form-group">
									<button type="submit" class="btn btn-default">Save</button>
								</div>
							
						    </form>
						</div>

					</div>
				</div>

	        </div>
	    </div>

</div>