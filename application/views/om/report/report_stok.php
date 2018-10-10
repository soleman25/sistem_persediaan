<p><?php echo $this->session->flashdata('message'); ?></p>

<div class="container">
    <div class="row">
        <div class="col-sm-12"> 
             <div class="card">
                <div class="card-body">
                        <?=  form_open('om/report/data_stok') ?>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="card card-stats">
                                        <div id="data_barang"></div>
                                        </div>
                                    </div>
                                    
                                    <div class="col-md-6">
                                      <div class="form-group label-floating is-empty">
                                        <select class="form-control" name="product_id" id="product_id" required/ >
                                            <option  value="<?= set_value('product_id') ?>"required/>--select Product--</option>
                                            <?php foreach ($products as $product)
                                            {?>
                                             <option value="<?php echo $product->product_id;?>"required/>
                                              <?php echo $product->nma_product;?>
                                             </option>
                                            <?php } ?>

                                            <?endforeach;?>
                                         </select>
                                        </div>
                                        <button type="submit" name="submit" class="btn btn-danger btn-raised"><i class="material-icons">search</i>
                                            Search
                                        </button>
                                        <a href="<?php echo base_url()?>om/report/print_stok" class="btn btn-default"><i class="fa fa-print"></i> Print</a>
                                        <a href="<?php echo base_url()?>om/report/pdf_stok" class="btn btn-default" target="blank" ><i class="fa fa-download"></i> PDF</a>
                                        </form>

                                        <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                    <tr>
                                        <th class="text-center">No</th>
                                        <th>Code</th>
                                        <th>Product</th>
                                        <th>Packing</th>
                                        <th>Stock</th>
                                        <th>Unit</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                         <?php
                                         $i=0;
                                          foreach ($stock as $retur ) :
                                         $i++; 
                                         ?>
                                         <tr>
                                             <td class="text-center"><?=  $i ?></td>
                                             <td><?php echo  $retur->kode_product?></td>
                                             <td><?php echo  $retur->nma_product ?></td>
                                             <td><?php echo  $retur->packing ?></td>
                                             <td><?php echo  $retur->stok ?></td>
                                             <td><?php echo  $retur->unit ?></td>
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
        text: 'Report Product Name and Stock'
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