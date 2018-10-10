<p><?php echo $this->session->flashdata('message'); ?></p>
<!--  -->
<button class="btn btn-danger" data-toggle="modal" data-target="#myModal">
Input Product
</button><?php foreach ($fakturs as $faktur ):?>
             
            <?php endforeach; ?>
<?=  anchor('om/transaction/sent/'.$faktur->faktur_id,'sent',['class'=>'btn btn-info btn-simple btn-xs','rel'=>'tooltip','data-original-title'=>'sent']) ?> 
 <div class="container">
  <div class="row">
  <div class="col-lg-6">
    <div class="card card-stats">
      <div id="data_barang"></div>
    </div>
  </div>

    <div class="col-sm-6"> 
      <div class="card card-signup">
        <div class="table-responsive">
          <table class="table">
            <thead>
                <tr>
                  <th class="text-center">No</th>
                    <th>Product</th>
                    <th>Packing</th>
                    <th>Qty Order</th>
                    <th>Unit</th>
                    <th class="text-center">Actions</th>
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
                     <td><?=  $order->nma_product  ?></td>
                     <td><?=  $order->packing ?></td>
                     <td><?=  $order->qty  ?></td>
                     <td><?=  $order->unit ?></td>
                     <td class="pull-right">
                      

                     <?=  anchor('om/transaction/remove/'.$order->order_id,'remove',['class'=>'btn btn-info btn-simple btn-xs','rel'=>'tooltip','data-original-title'=>'Remove']) ?>
                      
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
                <?php foreach ($fakturs as $faktur ):?>
             
            <?php endforeach; ?>
                <div class="card-body">
                  <?=  form_open('om/transaction/store/'.$faktur->faktur_id) ?>
    
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
                              <label>Qty Order</label>
                              <input type="text" class="form-control" name="qty" required/>
                              <input type="hidden" class="form-control" name="faktur_id" value="<?= $product->faktur_id?>">
                              <span class="material-input"></span>
                          </div>
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

      <?php
        foreach($report as $data){
            $nma_product[] = $data->nma_product;
            $stok[]        = intval($data->stok);
        }
    ?>
<script src="<?php echo base_url();?>assets/highcharts/highcharts.js"></script>
<script src="<?php echo base_url();?>assets/highcharts/exporting.js"></script>
<script type="text/javascript">

  Highcharts.chart('data_barang', {
    chart: {
        type: 'area'
    },
    title: {
        text: 'Report Product Name and Stok'
    },
    subtitle: {
        text: 'Pizza Hut Delivery Mustika Jaya'
    },
    xAxis: {
        categories: <?= json_encode($nma_product);?>,
        tickmarkPlacement: 'on',
        title: {
            enabled: false
        }
    },
    yAxis: {
        title: {
            text: 'Total Stock'
        },
        labels: {
            formatter: function () {
                return this.value / 1;
            }
        }
    },
    tooltip: {
        split: false,
        valueSuffix:''
    },
    plotOptions: {
        area: {
            stacking: 'normal',
            lineColor: '#666666',
            lineWidth: 1,
            marker: {
                lineWidth: 1,
                lineColor: '#666666'
            }
        }
    },
    series: [{
        name: 'Total Stock',
        data: <?= json_encode($stok);?>
    }]
});
</script>
      
        