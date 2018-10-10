<div class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-12">
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
					                        	<?=  anchor('om/supplier/view/'.$supplier->supplier_id,'<i class="fa fa-eye"></i>',['class'=>'btn btn-info btn-simple btn-xs','rel'=>'tooltip','data-original-title'=>'View Supplier']) ?>
					                        		
					                        	</td>
					                    </tr>
					                    <?php endforeach; ?>
							</tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>