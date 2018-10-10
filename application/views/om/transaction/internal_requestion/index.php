<p><?php echo $this->session->flashdata('message'); ?></p>

<div class="container">
	<div class="row">
		<div class="col-sm-12"> 
			<div class="card">
                <div class="card-header card-header-danger">
                  <h4 class="card-title text-center">Form Internal Requestion</h4>
                </div>
                <div class="card-body">
                  <div class="table-responsive">
                    	<?=  form_open('om/transaction/ambil') ?>
							<select class="form-control" name="product_id" id="supplier_id" >
								<option  value="<?= set_value('product_id') ?>">--select product--</option>
								<?php foreach ($products as $product)
								{?>
								<option value="<?php echo $product->product_id;?>">
								<?php echo $product->nma_product;?>
								</option>
								<?php } ?>
								<?endforeach;?>
							</select>
			                
			                 <div class="form-group is-empty">
	                      		<input class="form-control" type="text" name="qty" placeholder="Qty" value="<?php echo set_value('qty'); ?>"required/>
			                 </div>
			                  <div class="footer text-center">
				                  <button type="submit" class="btn btn-default" data-toggle="tooltip" data-placement="top" title="Save">Save</button>
				                </div>
							</form>
		           </div>
                </div>
		</div>
