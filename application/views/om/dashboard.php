<div class="row">
            <div class="col-lg-6 col-md-6 col-sm-6">
              <div class="card card-stats">
                <div class="card-header card-header-primary card-header-icon">
                  <div class="card-icon">
                    <i class="material-icons">save</i>
                  </div>
                  <p class="card-category">Recived Product</p>
                  <h3 class="card-title"><?php echo $this->db->count_all('penerimaan');?>
                  </h3>
                </div>
                <div class="card-footer">
                  <div class="stats">
                   <i class="material-icons">access_time</i> campaign sent 2 days ago
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-6">
              <div class="card card-stats">
                <div class="card-header card-header-default card-header-icon">
                  <div class="card-icon">
                    <i class="material-icons">shopping_basket</i>
                  </div>
                  <p class="card-category">Internal Requestion</p>
                  <h3 class="card-title"><?php echo $this->db->count_all('pengambilan');?>
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
                <div class="card-header card-header-warning card-header-icon">
                  <div class="card-icon">
                    <i class="material-icons">remove_shopping_cart</i>
                  </div>
                  <p class="card-category">Retur</p>
                  <h3 class="card-title"><?php echo $this->db->count_all('retur');?>
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
                  <p class="card-category"> Product</p>
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

