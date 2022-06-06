<div class="row" style="padding: 30px;">
    <div class="col-4">
        <img src="<?php echo base_url(); ?>assets/pictures/signup.jpg" alt="" width="400" height="600">
    </div>
    <div class="col-6">
        <div class="tabcontent">
            <h1>Welcome Back</h1>
            <div class="card shadow">
                <?php if(form_error('email') != NULL){?>
                    <div class="alert alert-danger" id="alertbox" style="position:fixed">
                        <?php echo form_error('email'); ?>
                    </div><?php } ?>
                    <?php if(form_error('password') != NULL){?>
                    <div class="alert alert-danger" id="alertbox" style="position:fixed">
                        <?php echo form_error('password'); ?>
                    </div><?php } ?>
                    <?php if($this->session->flashdata('status')) { ?>
                    <div class="alert alert-success" id="alertbox">
                        <?= $this->session->flashdata('status'); ?>
                    </div><?php } 
                ?>
                <script> window.setTimeout("closeHelpDiv();", 3000); </script>
                         
                <form action="" method="post">
                    <input type="hidden" name="first_name" placeholder="First Name">
                    <input type="hidden" name="last_name" placeholder="First Name" >
                    <input type="email" name="email" placeholder="Enter Email Address" class="form-control" required><br>
                    <div class="input-group mb-3">
                        <input type="password" name="password" class="form-control" id="passcheck"placeholder="Input Password" >
                        <button type="button" class="input-group-text" id="basic-addon1" onclick="passwordchecker('passcheck')"><i class="fa fa-eye-slash" ></i></button>
                    </div>
                    <button type="submit" class="btn btn-primary" style="background-color:#29465B; color:white;">Log In</button>
                </form><br> 
                <a href="<?=base_url();?>register" style="text-decoration:none">Don't Have an account?</a> <br>
                <a href="#" style="text-decoration:none">Forgot Password?</a>
                <div class="accounts">
                    <p>Log in with:</p>
                    <i class= "fa fa-facebook"></i>
                    <i class="fa fa-google"></i>
                </div>
                
            </div>
        </div>
    </div>
</div>