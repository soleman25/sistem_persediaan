<h1 class="text-center">Data Request Order Outlet</h1>
<div class="container">
  <div class="row">
    <div class="col-sm-12"> 
      <div class="card">
        <div class="table-responsive">
          <table class="table">
            <thead>
            <tr>
                <th class="text-center">No</th>
                <th>Periode</th>
                <th>Status Order</th>
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
                  
                <?php } 
                else
                {?>
                <?=  anchor('supplier/dashboard/view/'.$faktur->faktur_id,'<i class="fa fa-eye"></i>',['class'=>'btn btn-info btn-simple btn-xs','rel'=>'tooltip','data-original-title'=>'view','onclick'=>'return confirm(\'Are you sure you want to view this?\')'])
                ?>
                <?php }?>
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

