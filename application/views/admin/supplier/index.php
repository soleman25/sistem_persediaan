<p><?php echo $this->session->flashdata('message'); ?></p>

<div class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-12">
            	<button class="btn btn-danger" data-toggle="modal" data-target="#myModal">
				  Add Supplier
				</button>
              <div class="card">
                <div class="card-header card-header-danger">
                  <h4 class="card-title ">Master Supplier</h4>
                </div>
                <div class="card-body">
                  <div class="table-responsive">
                    <table class="table">
                       <thead>
					       <tr>
					            <tr>
					                        <th class="text-center">No</th>
					                        <th>Code</th>
					                        <th>Supplier Name</th>
					                        <th>Address</th>
					                        <th>Phone</th>
					                        <th class="text-right">Actions</th>
					                    </tr>
					       </tr>
					   </thead>
                      <tbody>
					    <?php
                        					$i=0;
					                	    foreach ($suppliers as $supplier ) :
					                	    $i++; 
					                	?>
					                    <tr>
					                    	<td class="text-center"><?= $i ?></td>
					                        <td><?=  $supplier->kode_supplier?></td>
					                        <td><?=  $supplier->nma_supplier ?></td>
					                        <td><?=  $supplier->alamat  ?></td>
					                        <td><?=  $supplier->tlp  ?></td>
					                        <td class="td-actions text-right">				       
					                        	<?=  anchor('admin/supplier/view/'.$supplier->supplier_id,'<i class="fa fa-eye"></i>',['class'=>'btn btn-info btn-simple btn-xs','rel'=>'tooltip','data-original-title'=>'View Supplier']) ?>                      
					                            <?=  anchor('admin/supplier/edit/'.$supplier->supplier_id,'<i class="fa fa-edit"></i>',['class'=>'btn btn-success btn-simple btn-xs','rel'=>'tooltip','data-original-title'=>'Edit Supplier','onclick'=>'return confirm(\'Are you sure you want to edit this?\')']) ?>
					                            <?=  anchor('admin/supplier/delete/'.$supplier->supplier_id,'<i class="fa fa-times"></i>',['class'=>'btn btn-danger btn-simple btn-xs','rel'=>'tooltip','data-original-title'=>'Remove','onclick'=>'return confirm(\'Are you sure you want to delete this?\')']) ?>

					                        </td>
					                    </tr>
					                    <?php endforeach; ?>
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
                  <h4 class="card-title text-center">Form Add Supplier</h4>
                </div>
                <div class="card-body">
                  <div class="table-responsive">
                    <?=  form_open('admin/supplier/store') ?>
						    	<div class="form-group label-floating is-empty">
									<label class="control-label">Supplier Code</label>
									<input type="text" class="form-control" id="kode_supplier" name="kode_supplier" value="<?= set_value('kode_supplier') ?>" required/>
									<span class="material-input"></span>
						    	</div>
						    	<div class="form-group label-floating is-empty">
									<label class="control-label">Supplier Name</label>
									<input type="text" class="form-control" id="nma_supplier" name="nma_supplier" value="<?= set_value('nma_supplier') ?>" required/>
									<span class="material-input"></span>
						    	</div>
						    	<div class="form-group label-floating is-empty">
									<label class="control-label">Address</label>
									<input type="text" class="form-control" id="alamat" name="alamat" value="<?= set_value('alamat') ?>" required/>
									<span class="material-input"></span>
						    	</div>
						    	<div class="form-group label-floating is-empty">
									<label class="control-label">Phone</label>
									<input type="text" class="form-control" id="tlp" name="tlp" value="<?= set_value('tlp') ?>" required/>
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
