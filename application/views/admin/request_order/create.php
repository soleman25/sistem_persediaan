<section class="content">
      <!-- Info boxes -->
      <div class="row">
        <div class="col-md-3 col-sm-3 col-xs-3 ">
          <div class="box box-primary">
            <ul class="nav flex-column">
              <li class="nav-item">
                <a class="nav-link active" href="<?php echo base_url('admin/dashboard'); ?>">
                  <span data-feather="home"></span>
                  Dashboard <span class="sr-only">(current)</span>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo base_url('admin/outlet/create'); ?>" class="nav-link">Add New Outlet</a>
              </li>
            </ul>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <div class="col-md-8 col-sm-8 col-xs-8">
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Create New Outlet<p><?php echo $this->session->flashdata('message'); ?></p></h3>
            </div>
           <form class="form-horizontal" action="<?php echo base_url(); ?>admin/outlet/create" method="post">
              <div class="box-body">
                <div class="form-group">
                  <label class="col-sm-2 control-label" for="outlet_code">Outlet Code</label>
                  <div class="col-sm-10">
                    <span class="text-danger"><?php echo form_error('outlet_code'); ?></span>
                    <input type="text" class="form-control" id="outlet_code" name="outlet_code" placeholder="Outlet Code" required/>
                  </div>
                </div>
                <div class="form-group">
                  <label id="outlet_name" class="col-sm-2 control-label">Outlet Name</label>
                  <div class="col-sm-10">
                    <span class="text-danger"><?php echo form_error('outlet_name'); ?></span>
                    <input type="text" class="form-control" id="outlet_name" name="outlet_name" placeholder="Outlet Name" required/>
                  </div>
                </div>
                  <div class="form-group">
                    <label id="outlet_address" class="col-sm-2 control-label">Address</label>
                      <div class="col-sm-10">
                        <span class="text-danger"><?php echo form_error('outlet_address'); ?></span>
                        <textarea class="form-control" rows="3" id="outlet_address" name="outlet_address" placeholder="Outlet Address" required/></textarea>
                      </div>
                  </div>
                <div class="form-group">
                  <label id="outlet_tlp" class="col-sm-2 control-label">Telephone</label>
                  <div class="col-sm-10">
                    <span class="text-danger"><?php echo form_error('outlet_tlp'); ?></span>
                    <input type="text" class="form-control" id="outlet_tlp" name="outlet_tlp" placeholder="Telephone" required/>
                  </div>
                </div>
              </div>
              <!-- /.box-body -->
              <div class="box-footer">
                <button type="submit" class="btn btn-primary pull-right">Save</button>
                <button class="btn btn-default pull-right" style="margin-right: 5px;"><a href="<?php echo base_url('admin/outlet'); ?>">Cancel</a></button>
              </div>
              <!-- /.box-footer -->
            </form>
          </div>
        </div>
        <!-- /.col -->
      </div>
</section>
<script>
  $(function () {
    $("#example1").DataTable();
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false
    });
  });
</script>

