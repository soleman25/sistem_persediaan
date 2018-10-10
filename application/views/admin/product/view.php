<div class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-12">
              <div class="card">  
              <div class="jumbotron">
                  <?php foreach ($products as $supplier => $product):?>
                    <h1 class="text-center"><?=  $product->nma_supplier  ?></h1>
              </div> 
              <div class="table-responsive">
                   <table class="table">
                          <thead>
                              <tr>
                                  <th class="text-center">No</th>
                                  <th>Code</th>
                                  <th>Product Name</th>
                                  <th>Packing</th>
                                  <th>Unit</th>
                                  <th>Create</th>
                                  <th>update</th>
                                  <th class="text-right">Actions</th>
                              </tr>
                          </thead>
                          <tbody>
                            <?php
                                  $i=0;
                             
                              $i++; 
                             ?>
                              <tr>
                                  <td class="text-center"><?=  $i ?></td>
                                  <td><?=  $product->kode_product  ?></td>
                                  <td><?=  $product->nma_product ?></td>
                                  <td><?=  $product->packing ?></td>
                                  <td><?=  $product->unit ?></td>
                                  <td><?=  $product->create_at ?></td>
                                  <td><?=  $product->update_at ?></td>
                                  <td class="td-actions text-right">                                   
                                      <?=  anchor('admin/master_product/edit/'.$product->product_id,'<i class="fa fa-edit"></i>',['class'=>'btn btn-success btn-simple btn-xs','rel'=>'tooltip','data-original-title'=>'Edit Product','onclick'=>'return confirm(\'Are you sure you want to edit this?\')']) ?>
                                      <?=  anchor('admin/master_product/delete/'.$product->product_id,'<i class="fa fa-times"></i>',['class'=>'btn btn-danger btn-simple btn-xs','rel'=>'tooltip','data-original-title'=>'Remove','onclick'=>'return confirm(\'Are you sure you want to delete this?\')']) ?>

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
</div>
                                  