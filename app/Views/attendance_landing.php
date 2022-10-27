<?= $this->include('header') ?>

<form action="<?php echo base_url('attendance');?>" method="get" class="">

<div class="card">
    <div class="card-header">
        <strong>Attandence</strong> Form
    </div>
    <div class="card-body card-block">
            <div class="form-group col-md-4">
                <label for="nf-password" class=" form-control-label">Phone Number Of User</label>
                <input type="tell" id="nf-phone" name="phone" placeholder="Enter Phone Number" value="<?php if($user_profile){ echo $user_profile[0]->contactno;}?>" class="form-control">
            </div>
    </div>  

       
    </div>
    <div class="card-footer">
        <button type="submit" class="btn btn-primary btn-sm">
            <i class="fa fa-dot-circle-o"></i> Submit
        </button>

    </div>
    </form>


<?php if($user_profile){ ?>
<div class="row">
    <div class="col-md-4">
    <div class="card">
                            <div class="card-header" style="display: flex;align-items: baseline;">
                                <i class="fa fa-user"></i><strong class="card-title pl-2">User Profile</strong>
                            </div>
                            <div class="card-body">
                                <div class="mx-auto d-block">
                                    <img class="rounded-circle mx-auto d-block" src="images/admin.jpg" alt="Card image cap">
                                    <h5 class="text-sm-center mt-2 mb-1"><?php print_r($user_profile[0]->name);?></h5>
                                    <div class="location text-sm-center"><?php print_r($user_profile[0]->email);?></div>
                                    <div class="location text-sm-center"><?php print_r($user_profile[0]->contactno);?></div>
                                    <div class="location text-sm-center"><?php print_r(ucfirst($user_profile[0]->gender));?></div>


                                </div>
                                <hr>
                                <div class="card-text text-sm-center">
                                <button type="button" style="<?php if($attendace_mark == 1){ echo 'display:none;'; }else{ echo 'display:block;';}?>" id="mark_attendance" data-id="<?php print_r(ucfirst($user_profile[0]->id));?>"  data-contactno="<?php print_r(ucfirst($user_profile[0]->contactno));?>" class="btn btn-success btn-lg btn-block">Mark Attendance</button>
                                <button type="button" style="<?php if($attendace_mark == 0){ echo 'display:none;'; }else{ echo 'display:block;';}?>" id="remove_attendance" data-id="<?php print_r(ucfirst($user_profile[0]->id));?>" class="btn btn-danger btn-lg btn-block">Remove Attendance</button>

                              
                            </div>
                            </div>
                        </div>

</div>
</div>
    <?php } ?>
    </div>
<?= $this->include('footer') ?>
