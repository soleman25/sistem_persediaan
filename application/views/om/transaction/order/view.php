<div class="container">
	<div class="row">
		<div class="col-sm-12"> 
			
			<div class="card card-signup">
				<div class="table-responsive">
					<table class="table">
						<thead>
						   <tr>
						     <th class="text-center">No</th>
						       <th>Code</th>
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
		                     <td><?=  $order->kode_product  ?></td>
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
			</div>
		</div>
	</div>