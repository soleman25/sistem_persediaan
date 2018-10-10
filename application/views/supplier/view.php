<div class="container">
	<div class="row">
		<div class="col-sm-12"> 
			
			<div class="card card-signup">
				<div class="table-responsive">
					<table class="table">
						<thead>
						   <tr>
						     <th class="text-center">No</th>
						       <th>Periode</th>
						       <th>Product Name</th>
						       <th>Packing</th>
						       <th>Qty</th>
						       <th>unit</th>
						       <th>Date Order</th>
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
		                     <td><?=  $order->periode ?></td>
						</tr>
					<?php endforeach; ?>
					</tbody>
				</table>
				</div>
				</div>
				<?=  anchor('supplier/dashboard/print_faktur/'.$order->faktur_id,'<i class="fa fa-print"></i>',['class'=>'btn btn-info btn-simple btn-xs','rel'=>'tooltip','data-original-title'=>'Print','onclick'=>'return confirm(\'Are you sure you want to print this?\')'])
                ?>
				
			</div>
		</div>
	</div>