<p><?php echo $this->session->flashdata('message'); ?></p>
<button class="btn btn-danger" data-toggle="modal" data-target="#myModal">
Input Product
</button><?php foreach ($fakturs as $faktur ):?>
             
            <?php endforeach; ?>
<?=  anchor('om/transaction/sent_retur/'.$faktur->faktur_id,'sent',['class'=>'btn btn-info btn-simple btn-xs','rel'=>'tooltip','data-original-title'=>'sent']) ?> 
 <div class="container">
  <div class="row">
    <div class="col-sm-12"> 
      <div class="card card-signup">
        <div class="table-responsive">
          <table class="table">
            <thead>
                <tr>
                  <th class="text-center">No</th>
                    <th>Product Name</th>
                    <th>Packing</th>
                    <th>Qty Order</th>
                    <th>Unit</th>
                    <th class="text-center">Actions</th>
                </tr>
            </thead>
            <tbody>
              <?php
                 $i=0;
                  foreach ($returs as $retur ) :
                 $i++; 
                 ?>
                 <tr>
                     <td class="text-center"><?=  $i ?></td>
                     <td><?=  $retur->nma_product  ?></td>
                     <td><?=  $retur->packing ?></td>
                     <td><?=  $retur->qty  ?></td>
                     <td><?=  $retur->unit ?></td>
                     <td class="pull-right">
                     <?=  anchor('om/transaction/remove_retur/'.$retur->retur_id,'remove',['class'=>'btn btn-info btn-simple btn-xs','rel'=>'tooltip','data-original-title'=>'Remove']) ?>
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
  </div>




<!-- Modal Core -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="myModalLabel"></h4>
      </div>
      <div class="modal-body">
        <div class="card">
                <div class="card-header card-header-danger">
                  <h4 class="card-title text-center">Form Input Product</h4>
                </div>
                
                <div class="card-body">
                  <?=  form_open('om/transaction/store_retur/'.$faktur->faktur_id) ?>
    
                          <div class="form-group">
                            <label>Periode</label>
                              <input type="text" class="form-control" id="supplier_id" name="supplier_id" value="<?= $faktur->periode?>" disabled/>
                          </div>
                          <div class="form-group">
                              <label>Nama Supplier</label>
                              <input type="text" class="form-control" name="supplier_id" value="<?= $faktur->nma_supplier?>" disabled/>
                          </div>
                          <div class="form-group">
                              <select class="form-control" name="product_id" id="product_id" required/ >
                                <option  value="<?= set_value('product_id') ?>"required/>--select Product--</option>
                                <?php foreach ($fakturs as $product)
                                {?>
                                 <option value="<?php echo $product->product_id;?>"required/>
                                  <?php echo $product->nma_product;?>
                                 </option>
                                <?php } ?>

                                <?endforeach;?>
                              </select>
                          </div>
                           <?endforeach;?>
                          <div class="form-group label-floating is-empty">
                              <label>Qty Retur</label>
                              <input type="text" class="form-control" name="qty" required/>
                              <span class="material-input"></span>
                          </div>
                          <div class="form-group label-floating is-empty">
                              <label>Information</label>
                              <input type="text" class="form-control" name="keterangan" required/>
                              <span class="material-input"></span>
                          </div>
                          <input type="hidden" name="supplier_id" value="<?= $faktur->supplier_id?>" >
                           <input type="hidden" class="form-control" name="faktur_id" value="<?= $product->faktur_id?>">
                        </div>
                      </div>
                          <div class="footer text-center">
                          <button type="submit" class="btn btn-default" data-toggle="tooltip" data-placement="top" title="Create Faktur">Save</button>
                          </div>
                        </form>
                      </div>
                </div>
        </div>
      </div>
                        
  </div>
</div>
</div>
