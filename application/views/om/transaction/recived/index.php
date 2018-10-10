<p><?php echo $this->session->flashdata('message'); ?></p>

<div class="container">
	<div class="row">
		<div class="col-sm-12"> 
			<div class="card">
				<div class="card-header card-header-danger">
                  <h4 class="card-title text-center">Data Faktur Order</h4>
                </div>
				<div class="table-responsive">
					<table class="table">
						<thead>
						<tr>
						  	<th class="text-center">No</th>
						    <th>Periode</th>
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
						          <td class="td-actions text-center">
								<?=  anchor('om/transaction/recived_product/'.$faktur->faktur_id,'<i class="fa fa-eye"></i>',['class'=>'btn btn-info btn-simple btn-xs','rel'=>'tooltip','data-original-title'=>'View','onclick'=>'return confirm(\'Are you sure you want to view this?\')'])
								?>
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


