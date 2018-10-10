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
                                  <th>stock</th>
                                  <th>Unit</th>
                                  <th>Create</th>
                                  <th>update</th>
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
                                  <td><?=  $product->stok ?></td>
                                  <td><?=  $product->unit ?></td>
                                  <td><?=  $product->create_at ?></td>
                                  <td><?=  $product->update_at ?></td>
                                  
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
                                  