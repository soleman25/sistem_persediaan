 <nav class="navbar navbar-expand-lg navbar-transparent navbar-absolute fixed-top ">
        <div class="container-fluid">
          <!-- <div class="navbar-wrapper">
            <a class="navbar-brand" href="#pablo">Dashboard</a>
          </div> -->
          <button class="navbar-toggler" type="button" data-toggle="collapse" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
            <span class="sr-only">Toggle navigation</span>
            <span class="navbar-toggler-icon icon-bar"></span>
            <span class="navbar-toggler-icon icon-bar"></span>
            <span class="navbar-toggler-icon icon-bar"></span>
          </button>
          <div class="collapse navbar-collapse justify-content-end">
            <!-- <form class="navbar-form">
              <div class="input-group no-border">
                <input type="text" value="" class="form-control" placeholder="Search...">
                <button type="submit" class="btn btn-danger btn-round btn-just-icon">
                  <i class="material-icons">search</i>
                  <div class="ripple-container"></div>
                </button>
              </div>
            </form> -->
            <ul class="navbar-nav">
              <?php  if($this->session->userdata('roles')  ==  '1' ): ?>
              <li class="nav-item">
                <a class="nav-link" href="<?php echo base_url('admin/dashboard'); ?>">
                  <i class="material-icons">dashboard</i>
                  <p class="d-lg-none d-md-block">
                    Stats
                  </p>
                </a>
              </li>
              <?php endif;?>
              <?php  if($this->session->userdata('roles')  ==  '2' ): ?>
              <li class="nav-item ">
                <a class="nav-link" href="<?php echo base_url('om/dashboard'); ?>">
                  <i class="material-icons">dashboard</i>
                  <p class="d-lg-none d-md-block">
                    Stats
                  </p>
                </a>
              </li>
              <li class="dropdown nav-item">
                  <a href="#pablo" class="nav-link" data-toggle="dropdown" aria-expanded="false"> <i class="material-icons">notifications</i> <span class="notification"><?php  
                  $this->db->where('stok <=', 3);
                  $this->db->from('products');
                  echo $this->db->count_all_results();?></span><div class="ripple-container"></div></a>
                  <div class="dropdown-menu">
                    <h6 class="dropdown-header">Notifications Stock</h6>
                        
                             <?php
                             $i=0;
                              foreach ($record as $retur ) :
                             $i++; 
                             ?>
                             <p class="dropdown-item"><?php echo  $retur->nma_product?> (<?php echo  $retur->stok?>)</p>

                              <?php endforeach; ?>
                    </div>
                </li>
              <?php endif;?>
              <?php  if($this->session->userdata('roles')  ==  '3' ): ?>
              <li class="nav-item ">
                <a class="nav-link" href="<?php echo base_url('supplier/dashboard'); ?>">
                  <i class="material-icons">dashboard</i>
                  <p class="d-lg-none d-md-block">
                    Stats
                  </p>
                </a>
              </li>
              <?php endif;?>
              <!-- <li class="nav-item dropdown">
                <a class="nav-link" href="http://example.com" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <i class="material-icons">notifications</i>
                  <span class="notification">1</span>
                  <p class="d-lg-none d-md-block">
                    Some Actions
                  </p>
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                  <a class="dropdown-item" href="#">Mike John responded to your email</a>
                  <a class="dropdown-item" href="#">You have 5 new tasks</a>
                  <a class="dropdown-item" href="#">You're now friend with Andrew</a>
                  <a class="dropdown-item" href="#">Another Notification</a>
                  <a class="dropdown-item" href="#">Another One</a>
                </div>
              </li> -->
              <li class="nav-item dropdown ">
            <?php  if($this->session->userdata('roles')  ==  '1'  or $this->session->userdata('roles') ==  '2'  or $this->session->userdata('roles') ==  '3' ):?>
              <a href="#" class="nav-link" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="material-icons">person</i>
                <?php echo $this->session->userdata('name');?>
                    <div class="ripple-container"></div>
              </a>
              <ul class="dropdown-menu dropdown-menu-right ">
                <li class="dropdown-header"></li>
                <li><a href="<?php echo base_url('auth/login/logout'); ?>">Sign Out</a></li>
              </ul>
             </li>
             <?php endif;?>
        </ul>
    </div>
  </div>
</nav>



