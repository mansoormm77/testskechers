<?= $this->include('header') ?>
<div class="card">
    <div class="card-header">
        <strong>User</strong> Form
    </div>
    <div class="card-body card-block">

    <div>
        <?php 
        
        $session = session();
        if($session->getFlashdata('error')) {
            $arr = $session->getFlashdata('error');
            foreach($arr as $key=>$value){
echo '
<div class="sufee-alert alert with-close alert-danger alert-dismissible fade show">
                                        <span class="badge badge-pill badge-danger">Error</span>
                                        ';
                                        print_r($value);
                                        echo '
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                <span aria-hidden="true">×</span>
                                            </button>
                                    </div>';
            }
}elseif($session->getFlashdata('success')){
    echo '<div class="sufee-alert alert with-close alert-primary alert-dismissible fade show">
    <span class="badge badge-pill badge-primary">Success</span>
    User Successfully added.
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">×</span>
        </button>
</div>';

} ?>
    </div>
        <form action="<?php echo base_url('user/store');?>" method="post" class="">
            <div class="form-group col-md-4">
                <label for="nf-email" class=" form-control-label">Name</label>
                <input type="text" id="nf-name" name="name" placeholder="Enter Name.." class="form-control">
            </div>
            <div class="form-group col-md-4">
                <label for="nf-email" class=" form-control-label">Email</label>
                <input type="email" id="nf-email" name="email" placeholder="Enter Email.." class="form-control">
            </div>
            <div class="form-group col-md-4">
                <label for="nf-password" class=" form-control-label">Password</label>
                <input type="password" id="nf-password" name="password" placeholder="Enter Password.." class="form-control">
            </div>
            <div class="form-group col-md-4">
                <label for="nf-password" class=" form-control-label">Phone Number</label>
                <input type="tell" id="nf-phone" name="phone" placeholder="Enter Phone Number" class="form-control">
            </div>

            <div class="form-group col-md-4">
                <label class=" form-control-label">Select Gender</label>
                <div class="radio">
                <label for="gender1" class="form-check-label ">
                    <input type="radio" id="gender1" name="gender" value="male" class="form-check-input">Male
                </label>
                </div>
                <div class="radio">
                <label for="gender2" class="form-check-label ">
                    <input type="radio" id="gender2" name="gender" value="female" class="form-check-input">Female
                </label>
                </div>
                <div class="radio">
                    <label for="gender3" class="form-check-label ">
                        <input type="radio" id="gender3" name="gender" value="other" class="form-check-input">Other
                    </label>
                </div>
            
            </div>

            <div class="form-group col-md-4">
                <label class=" form-control-label">Select User Type</label>
                <div class="radio">
                <label for="usertype1" class="form-check-label ">
                    <input type="radio" id="usertype1" name="usertype" value="1" class="form-check-input">Super Admin
                </label>
                </div>
                <div class="radio">
                <label for="usertype2" class="form-check-label ">
                    <input type="radio" id="usertype2" name="usertype" value="2" class="form-check-input">Admin
                </label>
                </div>
                <div class="radio">
                    <label for="usertype3" class="form-check-label ">
                        <input type="radio" id="usertype3" name="usertype" value="3" class="form-check-input">Coach
                    </label>
                </div>
                <div class="radio">
                    <label for="usertype4" class="form-check-label ">
                        <input type="radio" id="usertype4" name="usertype" value="4" class="form-check-input">User
                    </label>
                </div>
            
            </div>
       
            <div class="form-group col-md-4">
                <label for="nf-dob" class=" form-control-label">Date Of Birth</label>
                <input type="date" id="nf-dob" name="dob" placeholder="" class="form-control">
            </div>
            <div class="form-group col-md-4">
                <label for="nf-password" class=" form-control-label">Select State</label>
                <select name="state" id="state" class="form-control">
                    <option value="">Please select</option>
                    <option value="1">Maharashtra</option>
                    <option value="2">Delhi</option>
                    <option value="3">Goa</option>
                </select>
            
            </div>
            <div class="form-group col-md-4">
                <label for="nf-password" class=" form-control-label">Select City</label>
                <select name="city" id="city" class="form-control">
                    <option value="">Please select</option>
                    <option value="1">Mumbai</option>
                </select>
            
            </div>
            <div class="form-group col-md-4">
                <label for="nf-pincode" class=" form-control-label">Pincode</label>
                <input type="text" id="nf-pincode" name="pincode" placeholder="Enter Pincode" class="form-control">
            </div>
            <div class="form-group col-md-4">
                <label for="nf-password" class=" form-control-label">Select Club</label>
               <select name="club" id="club" class="form-control">
                   <option value="">Please select</option>
               
                   <?php foreach($clubs as $club){?>
                       <option value="<?php echo $club->id;?>"><?php echo $club->club_name;?></option>
               
                   <?php } ?>
                  
               </select>
            
            </div>
        </div>  

       
    </div>
    <div class="card-footer">
        <button type="submit" class="btn btn-primary btn-sm">
            <i class="fa fa-dot-circle-o"></i> Submit
        </button>
        <button type="reset" class="btn btn-danger btn-sm">
            <i class="fa fa-ban"></i> Reset
        </button>
    </div>
    </form>
</div>

<?= $this->include('footer') ?>
