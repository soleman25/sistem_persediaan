<div class="sidebar-wrapper" >
        <ul class="nav">
          <?php  if($this->session->userdata('roles')  ==  '1' ): ?>
          <li class="nav-item active  ">
            <a class="nav-link" href="<?php echo base_url('admin/dashboard'); ?>">
              <i class="material-icons">dashboard</i>
              <p>Dashboard</p>
            </a>
          </li>
          <li class="nav-item ">
            <a class="nav-link" href="<?php echo base_url('admin/user_management'); ?>">
              <i class="material-icons">person</i>
              <p>Management User</p>
            </a>
          </li>
          <li class="nav-item ">
            <a class="nav-link" href="<?php echo base_url('admin/master_product'); ?>">
              <i class="material-icons">content_paste</i>
              <p>Master Product</p>
            </a>
          </li>
          <li class="nav-item ">
            <a class="nav-link" href="<?php echo base_url('admin/supplier'); ?>">
              <i class="material-icons">store</i>
              <p>Supplier</p>
            </a>
          </li>
          <li class="nav-item ">
                <a class="nav-link" data-toggle="collapse" href="#formsExamples">
                    <i class="material-icons">library_books</i>
                    <p> Report 
                       <b class="caret"></b>
                    </p>
                </a>

                <div class="collapse" id="formsExamples">
                    <ul class="nav">
                        <li class="nav-item ">
                            <a class="nav-link" href="<?php echo base_url('admin/report/retur'); ?>">
                              <span class="sidebar-mini"> RR </span>
                              <span class="sidebar-normal"> Report Retur </span>
                            </a>
                        </li>
                        <li class="nav-item ">
                            <a class="nav-link" href="<?php echo base_url('admin/report/order'); ?>">
                              <span class="sidebar-mini"> RO </span>
                              <span class="sidebar-normal"> Report Order </span>
                            </a>
                        </li>
                        <li class="nav-item ">
                            <a class="nav-link" href="<?php echo base_url('admin/report/recived'); ?>">
                              <span class="sidebar-mini"> RRC </span>
                              <span class="sidebar-normal"> Report Recived </span>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>
          
          
          <?php endif;?>

          <?php  if($this->session->userdata('roles')  ==  '2' ): ?>

          <li class="nav-item active ">
            <a class="nav-link" href="<?php echo base_url('om/dashboard'); ?>">
              <i class="material-icons">dashboard</i>
              <p>Dashboard</p>
            </a>
          </li>
          <li class="nav-item ">
            <a class="nav-link" href="<?php echo base_url('om/master_product'); ?>">
              <i class="material-icons">content_paste</i>
              <p>Master Product</p>
            </a>
          </li>
          <li class="nav-item ">
            <a class="nav-link" href="<?php echo base_url('om/supplier'); ?>">
              <i class="material-icons">store</i>
              <p>Supplier</p>
            </a>
          </li>
           <li class="nav-item ">
                <a class="nav-link" data-toggle="collapse" href="#formsExamples">
                    <i class="material-icons">library_books</i>
                    <p> Report 
                       <b class="caret"></b>
                    </p>
                </a>

                <div class="collapse" id="formsExamples">
                    <ul class="nav">
                        <li class="nav-item ">
                            <a class="nav-link" href="<?php echo base_url('om/report/stok'); ?>">
                              <span class="sidebar-mini"> RS </span>
                              <span class="sidebar-normal"> Report Stok </span>
                            </a>
                        </li>
                        <li class="nav-item ">
                            <a class="nav-link" href="<?php echo base_url('om/report/retur'); ?>">
                              <span class="sidebar-mini"> RR </span>
                              <span class="sidebar-normal"> Report Retur </span>
                            </a>
                        </li>
                        <li class="nav-item ">
                            <a class="nav-link" href="<?php echo base_url('om/report/order'); ?>">
                              <span class="sidebar-mini"> RO </span>
                              <span class="sidebar-normal"> Report Order </span>
                            </a>
                        </li>
                        <li class="nav-item ">
                            <a class="nav-link" href="<?php echo base_url('om/report/recived'); ?>">
                              <span class="sidebar-mini"> RRC </span>
                              <span class="sidebar-normal"> Report Recived </span>
                            </a>
                        </li>
                        <li class="nav-item ">
                            <a class="nav-link" href="<?php echo base_url('om/report/internal_requestion'); ?>">
                              <span class="sidebar-mini"> RIR </span>
                              <span class="sidebar-normal"> Report Internal Requestion </span>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>
          <li class="nav-item ">
            <a class="nav-link" href="<?php echo base_url('om/transaction/order'); ?>">
              <i class="material-icons">shopping_cart</i>
              <p>order</p>
            </a>
          </li>
          <li class="nav-item ">
            <a class="nav-link" href="<?php echo base_url('om/transaction/recived'); ?>">
              <i class="material-icons">save</i>
              <p>Recived</p>
            </a>
          </li>
          <li class="nav-item ">
            <a class="nav-link" href="<?php echo base_url('om/transaction/internal_requestion'); ?>">
              <i class="material-icons">shopping_basket</i>
              <p>Internal Requestion</p>
            </a>
          </li>
          <li class="nav-item ">
            <a class="nav-link" href="<?php echo base_url('om/transaction/retur'); ?>">
              <i class="material-icons">remove_shopping_cart</i>
              <p>Retur</p>
            </a>
          </li>
          <?php endif;?>

          <?php  if($this->session->userdata('roles')  ==  '3' ): ?>
          <li class="nav-item active  ">
            <a class="nav-link" href="<?php echo base_url('supplier/dashboard'); ?>">
              <i class="material-icons">dashboard</i>
              <p>Dashboard</p>
            </a>
          </li>
         <!--  <li class="nav-item ">
            <a class="nav-link" href="<?php echo base_url('supplier/request_order'); ?>">
              <i class="material-icons">library_books</i> 
              <p>Data Retur</p>
            </a>
          </li> -->
          
          <?php endif;?>
        </ul>
      </div>