<?= $this->include('header') ?>

        <div class="breadcrumbs">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>User</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li><a href="#">User</a></li>
                            <li class="active">Listing</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>

        <div class="content mt-3">
            <div class="animated fadeIn">
                <div class="row">

                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                            <button onclick="location.href='<?php echo base_url('user/create');?>'" class="btn btn-primary" type="button">Add User</button>
    
                            </div>
                            <div class="card-body table-responsive">
                                <table id="bootstrap-data-table-export" class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Phone</th>
                                            <th>User Type</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php 
                                        if($coaches):
                                        foreach($coaches as $coach){?>
                                            <tr>
                                                <td><?php echo $coach->name; ?></td>
                                                <td><?php echo $coach->email; ?></td>
                                                <td><?php echo $coach->contactno; ?></td>
                                                <td><?php if($coach->user_role == 1){ echo "Super Admin"; }elseif($coach->user_role == 2){ echo "Admin"; }elseif($coach->user_role == 3){ echo "Coach"; }elseif($coach->user_role == 4){ echo "Customer"; }?></td>
                                                <td><a href="<?php echo base_url('user/edit/'.$coach->id); ?>" class="edit_button ui-button ui-widget ui-state-default ui-corner-all ui-button-text-icon-primary" role="button">
                                                        <i class="fa fa-edit"></i>
                                                        <span class="ui-button-text">&nbsp;Edit</span>
                                                    </a></td>
                                            </tr>
                                            <?php }
                                            endif; ?>
                                    </tbody>
                                   
                                </table>
                            </div>
                        </div>
                    </div>


                </div>
            </div><!-- .animated -->
        </div><!-- .content -->


    </div><!-- /#right-panel -->



    <!-- Right Panel -->
    <?= $this->include('footer') ?>
