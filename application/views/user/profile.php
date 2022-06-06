<div class="container d-flex justify-content-around">
    <div class="card col-lg-offset-4">
        <div class="position-absolute top-0 start-50 translate-middle rounded-circle"style="background-color: #98afc733;">
            <img src="<?=base_url()?>assets/pictures/icon.png" alt="" width="150" height="150">
        </div>
        <div class="mt-5">
        <?php foreach ($userdata as $item) : ?>
            <h3 class="text-center mb-3"><strong><?=$item->first_name. " ". $item->last_name?></strong></h3>
            <p class="mb-3"><span class="float-start">Email: </span><span class="float-end"><?=$item->email?></span></p><br>
            <p class="mb-3"><span class="float-start">Gender: </span><span class="float-end"><?=$item->gender?></span></p><br>
            <p class="mb-3"><span class="float-start">Role: </span><span class="float-end"><?=$item->role_name?></span></p><br>
        </div>
        <div class="text-center mt-3"><button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#profilemodal"> Edit Profile</button></div>
        <div class="modal fade" id="profilemodal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="float-start">User Information</h5>
                        <button type="button" class="btn-close float-end" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="<?=base_url('Home/updateprofile/'.$_SESSION['id'])?>" method="post" novalidate>
                            <div class="form-group"> 
                                <label for="firstname"> <h6>First Name</h6> </label> 
                                <input type="text" name="firstname" value="<?=$item->first_name?>" class="form-control" required> 
                            </div>
                            <div class="form-group"> 
                                <label for="lastname"> <h6>Last Name</h6> </label>
                                <div class="input-group"> 
                                    <input type="text" name="lastname" value="<?=$item->last_name?>" class="form-control " required>
                                </div>
                            </div> 
                            <div class="form-group"> 
                                <label for="gender"> <h6>Gender</h6> </label>
                                <div class="input-group"> 
                                    <label data-toggle="tooltip" data-bs-placement="top" title="You cannot change your Gender" class="w-100">
                                        <input type="text" value="<?=$item->gender?>" name="gender" class="form-control" disabled readonly> 
                                    </label>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col">
                                    <div class="form-group"> 
                                        <label for="password"> <h6>Password</h6> </label>
                                        <div class="input-group"> 
                                            <input type="password" value="<?=$item->password?>" name="password" id="password" class="form-control disabled" required> 
                                            <button type="button" class="input-group-text" id="basic-addon1" onclick="passwordchecker('password')"><i class="fa fa-eye" ></i></button>
                                        </div>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group"> 
                                        <label for="confirm"> <h6>Confirm Password</h6> </label>
                                        <div class="input-group"> 
                                            <input type="password" value="<?=$item->password?>" name="confirm" id="conf"class="form-control disabled" required> 
                                            <button type="button" class="input-group-text" id="basic-addon1" onclick="passwordchecker('conf')"><i class="fa fa-eye" ></i></button>
                                        </div>
                                    </div>
                                </div>
                                
                            </div>
                            <small><?=form_error('confirm')?></small>
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-primary">Edit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <?php endforeach; ?>
    </div>
</div>