<p><?php echo $this->session->flashdata('message'); ?></p>

<div class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-12">
            	<button class="btn btn-danger" data-toggle="modal" data-target="#myModal">
				  Add Product
				</button>
              <div class="card">
                <div class="card-header card-header-danger">
                  <h4 class="card-title ">Master Product</h4>
                </div>
                <div class="card-body">
                  <div class="table-responsive">
                    <table class="table">
                       <thead>
					       <tr>
					           <th class="text-center">No</th>
					           <th>Code</th>
					           <th>Product Name</th>
					           <th>Packing</th>
					           <th>Unit</th>
					           <th class="text-right">Actions</th>
					       </tr>
					   </thead>
                      <tbody>
					    <?php
              			 $i= $this->uri->segment('3') + 1;
					    foreach ($products as $product ) {
					    ?>
					    <tr>
					        <td class="text-center"><?php echo  $i++;  ?></td>
					        <td><?php echo $product->kode_product  ?></td>
					        <td><?php echo  $product->nma_product ?></td>
					        <td><?php echo $product->packing  ?></td>
					        <td><?php echo  $product->unit  ?></td>
					        <td class="td-actions text-right">
					        <?=  anchor('admin/master_product/view/'.$product->product_id,'<i class="fa fa-eye"></i>',['class'=>'btn btn-info btn-simple btn-xs','rel'=>'tooltip','data-original-title'=>'View Product']) ?>				                             
					        <?=  anchor('admin/master_product/edit/'.$product->product_id,'<i class="fa fa-edit"></i>',['class'=>'btn btn-success btn-simple btn-xs','rel'=>'tooltip','data-original-title'=>'Edit Product','onclick'=>'return confirm(\'Are you sure you want to edit this?\')']) ?>
					        <?=  anchor('admin/master_product/delete/'.$product->product_id,'<i class="fa fa-times"></i>',['class'=>'btn btn-danger btn-simple btn-xs','rel'=>'tooltip','data-original-title'=>'Remove','onclick'=>'return confirm(\'Are you sure you want to delete this?\')']) ?>

					        </td>
						</tr>
					<?php } ?>
					
				</tbody>
                    </table>
                   
                  </div>
                </div>
              </div>
            </div>

<!-- Button trigger modal -->


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
                  <h4 class="card-title text-center">Form Add Product</h4>
                </div>
                <div class="card-body">
                  <div class="table-responsive">
                    <?=  form_open('admin/master_product/store/') ?>
							 <div class="form-group abel-floating is-empty">
									<label class="control-label">supplier</label>
										<select class="form-control" name="supplier_id" id="supplier_id" required/>
											<option value="<?= set_value('supplier_id') ?>" required/>--select--</option>
											<?php foreach ($suppliers as $supplier)
											{?>
											 <option value="<?php echo $supplier->supplier_id;?>"required/>
											 	<?php echo $supplier->nma_supplier;?>
											 </option>
											<?php } ?>
											<?endforeach;?>
										</select>
								</div>
						    	<div class="form-group label-floating is-empty">
									<label class="control-label">Product Code</label>
									<input type="text" class="form-control" id="kode_product" name="kode_product" value="<?= set_value('kode_product') ?>" required/>
									<span class="material-input"></span>
						    	</div>
						    	<div class="form-group label-floating is-empty">
									<label class="control-label">Product Name</label>
									<input type="text" class="form-control" id="nma_product" name="nma_product" value="<?= set_value('nma_product') ?>" required/>
									<span class="material-input"></span>
						    	</div>
						    	<div class="form-group label-floating is-empty">
									<label class="control-label">Packing</label>
									<input type="text" class="form-control" id="packing" name="packing" value="<?= set_value('packing') ?>" required/>
									<span class="material-input"></span>
						    	</div>
						    	<div class="form-group label-floating is-empty">
									<label class="control-label">Unit</label>
									<input type="text" class="form-control" id="unit" name="unit" value="<?= set_value('unit') ?>" required/>
									<span class="material-input"></span>
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