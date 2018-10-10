<div class="row">
            <div class="col-lg-3 col-md-6 col-sm-6">
              <div class="card card-stats">
                <div class="card-header card-header-warning card-header-icon">
                  <div class="card-icon">
                    <i class="material-icons">person</i>
                  </div>
                  <p class="card-category">User</p>
                  <h3 class="card-title"><?php echo $this->db->count_all('user');?>
                  </h3>
                </div>
                <div class="card-footer">
                  <div class="stats">
                   <i class="material-icons">access_time</i> campaign sent 2 days ago
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6">
              <div class="card card-stats">
                <div class="card-header card-header-success card-header-icon">
                  <div class="card-icon">
                    <i class="material-icons">store</i>
                  </div>
                  <p class="card-category">Supplier</p>
                  <h3 class="card-title"><?php echo $this->db->count_all('suppliers');?></h3>
                </div>
                <div class="card-footer">
                  <div class="stats">
                     <i class="material-icons">access_time</i> campaign sent 2 days ago
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6">
              <div class="card card-stats">
                <div class="card-header card-header-danger card-header-icon">
                  <div class="card-icon">
                    <i class="material-icons">content_paste</i>
                  </div>
                  <p class="card-category">Product</p>
                  <h3 class="card-title"><?php echo $this->db->count_all('products');?></h3>
                </div>
                <div class="card-footer">
                  <div class="stats">
                     <i class="material-icons">access_time</i> campaign sent 2 days ago
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6">
              <div class="card card-stats">
                <div class="card-header card-header-info card-header-icon">
                  <div class="card-icon">
                    <i class="material-icons">shopping_cart</i>
                  </div>
                  <p class="card-category">Order</p>
                  <h3 class="card-title"><?php echo $this->db->count_all('order');?></h3>
                </div>
                <div class="card-footer">
                  <div class="stats">
                     <i class="material-icons">access_time</i> campaign sent 2 days ago
                  </div>
                </div>
              </div>
            </div>
          </div>
         


<div class="row">
  <div class="col-lg-12">
    <div class="card card-stats">
      <div id="data_barang"></div>
    </div>
  </div>
</div>
      <?php
        foreach($report as $data){
            $nma_product[] = $data->nma_product;
            $tgl_order[] = $data->tgl_order;
            $qty[]        = intval($data->qty);
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
        text: 'Report Order Product'
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
            text: 'Total Order'
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
        name: 'Qty Order',
        data: <?= json_encode($qty);?>
    }]


});
</script>



 
    <!--Load chart js-->
    

   
      
      
               