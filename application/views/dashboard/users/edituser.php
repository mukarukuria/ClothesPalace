<div class="row" style="padding: 30px;">
    
    <div class="col-4">
        <img src="<?php echo base_url(); ?>assets/pictures/signup.jpg" alt="" width="400" height="600">
    </div>
    <div class="col-6">
        <div class="tabcontent">
            <h1 style="float:left;">Welcome Home</h1> 
            <div class="card shadow">
                    <?php if($this->session->flashdata('status')) { ?>
                    <div class="alert alert-danger" id="alertbox">
                        <?= $this->session->flashdata('status'); ?>
                    </div><?php } 
                ?>
                <script> window.setTimeout("closeHelpDiv();", 3000); </script>
                <?php foreach ($user as $item): ?>
                    <form action="<?=base_url('admin/users/edit/'.$item->user_id);?>" method="post">
                        <input type="hidden" name="role" value="532419">
                        <label for="fname" class="form-label">First Name</label>
                        <input id="fname" type="text" name="first_name" placeholder="First Name" class="form-control" value="<?=$item->first_name?>" required><br>
                        <label for="lname" class="form-label">Last Name</label>
                        <input id="lname" type="text" name="last_name" placeholder="Last Name" class="form-control" value="<?=$item->last_name?>" required><br>
                        <label for="email" class="form-label">Email</label>
                        <input id="email" type="email" name="email" placeholder="Enter Email Address"  value="<?=$item->email?>"class="form-control" required><br>
                        <label for="passwordcheck" class="form-label">Password</label>
                        <div class="input-group mb-3">
                            <input  type="text" class="form-control" name="password" value="<?=$item->password?>" placeholder="Input Password" id="passwordcheck" aria-label="Recipient's username" aria-describedby="button-addon2">
                            <button class="input-group-text" type="button" id="button-addon2" onclick="passwordchecker('passwordcheck')"><i class="fa fa-eye-slash"></i></button>
                        </div>
                        <button class="btn btn-outline-primary" type="submit">Submit form</button>
                    </form>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</div>