<p><?php echo $this->session->flashdata('message'); ?></p>

<div class="container">
    <div class="row">
        <div class="col-sm-12"> 
             <div class="card">
                <div class="card-body">
                        <?=  form_open('admin/report/data_order') ?>
                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="form-group label-floating is-empty">
                                            <label class="control-label">Start Date</label>
                                            <input type="date" class="form-control" name="tanggal1">
                                        <span class="material-input"></span></div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group label-floating is-empty">
                                            <label class="control-label">End Date</label>
                                            <input type="date" class="form-control" name="tanggal2">
                                        <span class="material-input"></span></div>
                                    </div>
                                    <div class="col-md-6">
                                        <button type="submit" name="submit" class="btn btn-danger btn-raised"><i class="material-icons">search</i>
                                            Search
                                        </button>
                                        <a href="<?php echo base_url()?>admin/report/print_order" class="btn btn-default"><i class="fa fa-print"></i> Print</a>
                                        <a href="<?php echo base_url()?>admin/report/pdf_order" class="btn btn-default"><i class="fa fa-download"></i> PDF</a>
                                    </div>
                                </div>
                            </form>
                   </div>
                </div>
        </div>
    </div>
</div>

<div class="container">
    <div class="row">
        <div class="col-sm-12"> 
            <div class="card">
                <div class="card-header card-header-danger">
                  <h4 class="card-title text-center">Report Order Product</h4>
                </div>
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                        <tr>
                            <th class="text-center">No</th>
                            <th>Order Date</th>
                            <th>Product Name</th>
                            <th>QTY</th>
                            <th>Unit</th>
                        </tr>
                        </thead>
                        <tbody>
                             <?php
                             $i=0;
                              foreach ($record as $retur ) :
                             $i++; 
                             ?>
                             <tr>
                                 <td class="text-center"><?=  $i ?></td>
                                 <td><?php echo  $retur->create_at ?></td>
                                 <td><?php echo  $retur->nma_product ?></td>
                                 <td><?php echo  $retur->qty ?></td>
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

