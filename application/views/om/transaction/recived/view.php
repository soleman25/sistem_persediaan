<p><?php echo $this->session->flashdata('message'); ?></p>
<div class="container">
	<div class="row">
		<div class="col-sm-12"> 
			<div class="card ">
				<div class="card-header card-header-danger">
                  <h4 class="card-title text-center">Product Order</h4>
                </div>
				<div class="table-responsive">
					<table class="table">
						<thead>
						   <tr>
						     <th class="text-center">No</th>
						       <th>faktur</th>
						       <th>Product Name</th>
						       <th>Packing</th>
						       <th>Order Qty</th>
						       <th>unit</th>
						       <th>Action</th>
						   </tr>
					</thead>
					<tbody>
					 <?php
		                 $i=0;
		                  foreach ($orders as $order ) :
		                 $i++; 
		                 ?>
		                 <tr>
		                     <td class="text-center"><?=  $i ?></td>
		                     <td><?=  $order->faktur_id  ?></td>
		                     <td><?=  $order->nma_product ?></td>
		                     <td><?=  $order->packing ?></td>
		                     <td><?=  $order->qty  ?></td>
		                     <td><?=  $order->unit ?></td>
		                     <td>
		                     	<?php if($order->sttus == 1)
									{?>
									recived
								
								<?php } 
								else
								{?>
								<?=  anchor('om/transaction/simpan/'.$order->order_id,'<i class="fa fa-save"></i>',['class'=>'btn btn-info btn-simple btn-xs','rel'=>'tooltip','data-original-title'=>'save Product']) ?>
								<?php }?>
						        </td>
		                     	
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
