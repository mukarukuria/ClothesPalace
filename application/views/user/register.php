<div class="row" style="padding: 30px;">
    
    <div class="col-4">
        <img src="<?php echo base_url(); ?>assets/pictures/signup.jpg" alt="" width="400" height="600">
    </div>
    <div class="col-6">
        
        <div class="tabcontent">
            <h1 style="float:left;">Welcome Home</h1> 
            
            <div class="card shadow">
                <?php if(form_error('email') != NULL){?>
                    <div class="alert alert-danger" id="alertbox">
                        <?php echo form_error('email'); ?>
                    </div><?php } ?>
                    <?php if(form_error('confirm_password') != NULL){?>
                    <div class="alert alert-danger" id="alertbox" >
                        <?php echo form_error('confirm_password'); ?>
                    </div><?php } ?>
                    <?php if($this->session->flashdata('status')) { ?>
                    <div class="alert alert-danger" id="alertbox">
                        <?= $this->session->flashdata('status'); ?>
                    </div><?php } 
                ?>
                <script> window.setTimeout("closeHelpDiv();", 3000); </script>
                <form action="" method="post">
                    <input type="hidden" name="role" value="532419">
                    <input type="text" name="first_name" placeholder="First Name" class="form-control" required><br>
                    <input type="text" name="last_name" placeholder="Last Name" class="form-control" required><br>
                    <input type="email" name="email" placeholder="Enter Email Address" class="form-control" required><br>
                    <div class="input-group mb-3">
                        <input type="password" class="form-control" name="password" placeholder="Input Password" id="passwordcheck" aria-label="Recipient's username" aria-describedby="button-addon2">
                        <button class="input-group-text" type="button" id="button-addon2" onclick="passwordchecker('passwordcheck')"><i class="fa fa-eye-slash"></i></button>
                    </div>
                    <div class="input-group mb-3">
                        <input type="password" class="form-control" name="confirm_password" placeholder="Confirm Password" id="confirmcheck"  aria-label="Recipient's username" aria-describedby="button-addon2">
                        <button class="input-group-text" type="button" id="button-addon2" onclick="passwordchecker('confirmcheck')"><i class="fa fa-eye-slash" ></i></button>
                    </div>
                    <input type="radio" name="gender" id="malecheck" value="male">
                    <label for="malecheck">Male</label>
                    <input type="radio" name="gender" id="femalecheck" value="female">
                    <label for="femalecheck">Female</label> <br><br>
                    <button type="submit" class="btn btn-primary">Sign Up</button>
                </form>
                <a href="<?= base_url();?>login">Already Have an account</a>
                <div class="accounts">
                    <p>Sign up with:</p>
                    <i class= "fa fa-facebook"></i>
                    <i class="fa fa-google" data-onsuccess="onSignIn"></i>
                </div>
                
            </div>
        </div>
    </div>
</div>