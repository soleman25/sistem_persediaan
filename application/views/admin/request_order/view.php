<div class="container">
  <div class="row">
    <div class="col-sm-6"> 
      <div class="card card-signup">
        <div class="table-responsive">
          <table class="table">
            <thead>
               <tr>
                 <th class="text-center">No</th>
                   <th>No Faktur</th>
                   <th>Periode</th>
                   <th>Status</th>
                   <th>Action</th>
               </tr>
          </thead>
          <tbody>
                <?php if(count($cari)>0)
                  {
                    
                    foreach ($cari as $data)
                    $i=0;
                    $i++;
                     {?>
                    <tr>
                        <td class="text-center"><?= $i ?></td>
                        <td><?php echo $data->faktur_id;?></td>
                        <td><?php echo $data->periode;?></td>
                        <td><?php if($data->status == 0):?>
                            <?php echo 'Prosess Input'?>
                            <?php else:?>
                            <?php echo 'sent'?>
                            <?php endif;?>
                        </td>
                        <td><?php if($data->status == 0):?>
                            <?php echo "Not sent";?>
                            <?php else:?>
                            <?=  anchor('admin/supplier/view/'.$data->faktur_id,'<i class="fa fa-eye"></i>',['class'=>'btn btn-info btn-simple btn-xs','rel'=>'tooltip','data-original-title'=>'View Supplier']) ?> 

                            <?=  anchor('admin/supplier/edit/'.$data->faktur_id,'<i class="fa fa-edit"></i>',['class'=>'btn btn-success btn-simple btn-xs','rel'=>'tooltip','data-original-title'=>'Edit Supplier','onclick'=>'return confirm(\'Are you sure you want to edit this?\')']) ?>
                            <?=  anchor('admin/supplier/delete/'.$data->faktur_id,'<i class="fa fa-times"></i>',['class'=>'btn btn-danger btn-simple btn-xs','rel'=>'tooltip','data-original-title'=>'Remove','onclick'=>'return confirm(\'Are you sure you want to delete this?\')']) ?>
                              <?php endif;?>
                            </td>
                     </tr>
           </tbody>
          </table>
            <?php }
                  }
                  else
                  {
                    echo "Data tidak ditemukan";
                  }
               
                  ?>
        </table>
        </div>
        </div>
      </div>
    </div>
  </div>
 