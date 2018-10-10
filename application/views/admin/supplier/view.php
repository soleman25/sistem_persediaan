<div class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-8">
              <div class="card">
                <div class="card-header card-header-danger">
                  <h4 class="card-title">Product Name</h4>
                  <p class="card-category"><?=  $shows->nma_supplier  ?></p>
                </div>
                <div class="card-body">
                  <div class="table-responsive ">
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
                             foreach ($products as $supplier => $product):
                              $i++; 
                             ?>
                              <tr>
                                  <td class="text-center"><?=  $i ?></td>
                                  <td><?=  $product->kode_product  ?><?=  $product->product_id  ?></td>
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
            <div class="col-md-4">
              <div class="card card-profile">
                <div class="card-avatar">
                  <a href="#pablo">
                    <img class="profile-user-img img-responsive img-circle" src="<?php echo base_url('assets/img/default-avatar.png');?>" alt="User profile picture">
                  </a>
                </div>
                <div class="card-body">
                  <h6 class="card-category text-gray">Supplier</h6>
                  CODE :<?=  $shows->kode_supplier ?>
                  <h4 class="card-title"><?=  $shows->nma_supplier  ?></h4>
                  <p class="card-description">
                      Address 
                      <?=  $shows->alamat  ?>
                      Telepon : <?=  $shows->tlp  ?>
                      
                  CREATE AT : <?=  $shows->create_at ?><br> 
                  UPDATE AT : <?=  $shows->update_at ?>
                  </p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

               
