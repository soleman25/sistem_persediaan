
<div class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-12">
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
					           <th>Stock</th>
					           <th>Unit</th>
					           <th class="text-right">Actions</th>
					       </tr>
					   </thead>
                      <tbody>
					    <?php
              			 $i=0;
					    foreach ($products as $product ) :
					    $i++; 
					    ?>
					    <tr>
					        <td class="text-center"><?=  $i ?></td>
					        <td><?=  $product->kode_product  ?></td>
					        <td><?=  $product->nma_product ?></td>
					        <td><?=  $product->packing  ?></td>
					        <td><?=  $product->stok  ?></td>
					        <td><?=  $product->unit  ?></td>
					        <td class="td-actions text-right">
					        <?=  anchor('om/master_product/view/'.$product->product_id,'<i class="fa fa-eye"></i>',['class'=>'btn btn-info btn-simple btn-xs','rel'=>'tooltip','data-original-title'=>'View Product']) ?>				                             
					        
					        </td>
						</tr>
					<?php endforeach; ?>
					</tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
