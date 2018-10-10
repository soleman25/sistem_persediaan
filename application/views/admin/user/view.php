<div class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-8">
              <div class="card">
                <div class="card-header card-header-danger">
                  <h4 class="card-title">User Data</h4>
                  <p class="card-category">Complete user profile</p>
                </div>
                <div class="card-body">
                  <?php foreach ($roles as $roles => $role ):?>
                  <table class="table">
                          <thead>
                              <tr>
                                  <th class="text-center">No</th>
                                  <th>Email</th>
                                  <th>Status</th>
                                  <th>Create</th>
                                  <th>Update</th>
                                  <th>Last Login</th>               
                              </tr>
                          </thead>
                          <tbody>
                            <?php
                                  $i=0;
                               
                                $i++; 
                            ?>
                              <tr>
                                <td><?= $i ?></td>
                                  <td><?=  $role->email ?></td>
                                  <td>
                                    <?php if($role->status > 0)
                                    {
                                      echo 'Active';
                                    } else{
                                      echo 'Not Activated'; 
                                    }?>
                                  </td>
                                  <td><?=  $role->create_at ?></td>
                                  <td><?=  $role->update_at ?></td>
                                  <td><?=  $role->last_login ?></td>
                                 
                              </tr>
                        <?php endforeach; ?>
                          </tbody>
                   </table>
                </div>
              </div>
            </div>
            <div class="col-md-4">
              <div class="card card-profile">
                <div class="card-avatar">
                  <a href="#pablo">
                    <img class="profile-user-img img-responsive img-circle" src="<?php echo base_url('assets/img/default-avatar.png');?>" alt="User profile picture">
                  </a>
                </div>
                <div class="card-body">
                  <h6 class="card-category text-gray"><?=  $role->description ?></h6>
                  <h4 class="card-title"><?=  $shows->name  ?></h4>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
