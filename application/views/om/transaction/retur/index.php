
<p><?php echo $this->session->flashdata('message'); ?></p>

<div class="container">
	<div class="row">
		<div class="col-sm-12"> 
			<div class="card">
				<div class="card-header card-header-danger">
                  <h4 class="card-title text-center">Data Retur Product</h4>
                </div>
				<div class="table-responsive">
					<table class="table">
						<thead>
						<tr>
						  	<th class="text-center">No</th>
						    <th>Date Order</th>
						    <th>Faktur Name</th>
						    <th>Status Retur</th>
						    <th class="text-center">Actions</th>
						</tr>
						</thead>
						<tbody>
						  <?php
						     $i=0;
						      foreach ($fakturs as $faktur ) :
						     $i++; 
						     ?>
						     <tr>
						         <td class="text-center"><?=  $i ?></td>
						         <td><?=  $faktur->periode  ?></td>
						         <td><?=  $faktur->nama  ?></td>
						         <td>
							         <?php if($faktur->status == 0):?>
									<?php echo 'Prosess Input'?>
									<?php else:?>
									<?php echo 'sent'?>
									<?php endif;?>
						         </td>

						          <td class="td-actions text-center">
						           <?php if($faktur->status == 0)
									{?>
										<?=  anchor('om/transaction/input_product_retur/'.$faktur->faktur_id,'<i class="fa fa-plus"></i>',['class'=>'btn btn-info btn-simple btn-xs','rel'=>'tooltip','data-original-title'=>'Input Product']) ?>
										<?=  anchor('om/transaction/delete/'.$faktur->faktur_id,'<i class="fa fa-times"></i>',['class'=>'btn btn-danger btn-simple btn-xs','rel'=>'tooltip','data-original-title'=>'Remove','onclick'=>'return confirm(\'Are you sure you want to delete this?\')'])?>
										<?=  anchor('om/transaction/sent/'.$faktur->faktur_id,'<i class="material-icons">message</i>',['class'=>'btn btn-info btn-simple btn-xs','rel'=>'tooltip','data-original-title'=>'snet','onclick'=>'return confirm(\'Are you sure you want to snet this?\')'])
										?>
									<?php } 
									else
									{?>
									<?=  anchor('om/transaction/view/'.$faktur->faktur_id,'<i class="fa fa-eye"></i>',['class'=>'btn btn-info btn-simple btn-xs','rel'=>'tooltip','data-original-title'=>'view','onclick'=>'return confirm(\'Are you sure you want to view this?\')'])
									?>
									<?php }?>
						        	</td>
						        </tr>
						      <?php endforeach; ?>
						     </tbody>
						     </table>
						   </div>
						  </div>
						  <button class="btn btn-danger" data-toggle="modal" data-target="#myModal">
								Create Faktur Retur
						  </button>
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
                  <h4 class="card-title text-center">Form Create Faktur Retur</h4>
                </div>
                <div class="card-body">
                  <div class="table-responsive">
                    	<?=  form_open('om/transaction/create_faktur_retur') ?>
							<select class="form-control" name="supplier_id" id="supplier_id" >
								<option  value="<?= set_value('supplier_id') ?>">--select Supplier--</option>
								<?php foreach ($suppliers as $supplier)
								{?>
								<option value="<?php echo $supplier->supplier_id;?>">
								<?php echo $supplier->nma_supplier;?>
								</option>
								<?php } ?>
								<?endforeach;?>
							</select>
							<div class="form-group is-empty">
							<select class="form-control" name="nama" id="nama" >
								<option  value="<?= set_value('nama') ?>">--select Faktur--</option>
								<option>Retur</option>
								
							</select>
							</div>
			                <div class="form-group is-empty">
	                      		<select class="form-control" name="periode" id="periode" >
								<option  value="<?= set_value('tgl_order') ?>">--select Date Order--</option>
								<?php foreach ($orders as $order)
								{?>
								<option value="<?php echo $order->tgl_order;?>">
								<?php echo $order->tgl_order;?>
								</option>
								<?php } ?>
								<?endforeach;?>
							</select>
			                 </div>
			                  <div class="footer text-center">
				                  <button type="submit" class="btn btn-default" data-toggle="tooltip" data-placement="top" title="Create Faktur">Create</button>
				                </div>
							</form>

		           </div>
                </div>
		</div>
	</div>
                				
	</div>
</div>
