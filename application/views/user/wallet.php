<div class="container">
    <?php if($this->session->flashdata('request')):?>
    <div class="position-absolute end-0 p-3" style="z-index: 11">
        <div class="alert alert-success">
            <?= $this->session->flashdata('request')?>
            <button type="button" class="btn-close ms-5" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        
    </div>
    <?php endif;?>
    <div class="row">
        <div class="col">
            <img src="<?=base_url()?>assets/pictures/money.jpg" alt="" width="600" height="500"srcset="">
        </div>
        <div class="col align-self-center">
            <div class="card shadow">
                 <?php if($wallet != NULL) {foreach($wallet as $item): ?>
                <div class="card-header">
                    <h4 class="float-start">Your Wallet</h4>
                    <a href="<?=base_url('products/'.$item->customer_id)?>" class="btn btn-secondary float-end">Go Back</a>
                </div>
                <div class="card-body">
                    <small class="float-end align-baseline">
                        Last updated
                        <?php
                            $origin = new DateTime($item->updated_At);
                            $target = new DateTime(date('Y-m-d H:m:s'));
                            $interval = $origin->diff($target);
                            echo $interval->format('%H hours ago');
                        ?>
                    </small><br>
                    <h3 class="text-center">Your Account balance is:</h3>
                    <h4 class="text-center"><strong>KSH <?=$item->amount_available?></strong></h4>
                    <?php endforeach;} else {?>
                        <div class="card-header">
                            <h4 class="float-start">Your Wallet</h4>
                            <a href="<?=base_url('products/'.$_SESSION['id'])?>" class="btn btn-secondary float-end">Go Back</a>
                        </div>
                        <div class="card-body">
                            <h3 class="text-center">Your Account balance is:</h3>
                            <h4 class="text-center"><strong>KSH 0</strong></h4>
                            <small class="text-muted">Please Top up</small>
                        </div>
                    <?php } ?>
                    <div class="pb-3">
                    <button type="button" class="btn btn-primary float-start" data-bs-toggle="modal" data-bs-target="#creditcardmodal">Link a Card</button>
                    <div class="modal fade" tabindex="-1" id="creditcardmodal" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h3 class="modal-title">Enter Card Details</h3>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="close"></button>
                                </div>
                                <div class="modal-body">
                                    <form role="form" onsubmit="event.preventDefault()">
                                        <div class="form-group"> 
                                            <label for="username"> <h6>Card Owner</h6> </label> 
                                            <input type="text" class="form-control " name="username" placeholder="Card Holder Name" value="<?=$_SESSION['name']?>"required > 
                                        </div>
                                        <div class="form-group"> 
                                            <label for="cardNumber"> <h6>Card number</h6> </label>
                                            <div class="input-group"> 
                                                <input type="text" class="form-control " name="cardNumber" placeholder="0000 0000 0000 0000" required>
                                                <div class="input-group-append"> <span class="input-group-text text-muted" style="height:40px"> <i class="fa fa-cc-visa mx-1"></i></span> </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-8">
                                                <div class="form-group"> 
                                                    <label>
                                                        <span class="hidden-xs">
                                                            <h6>Expiration Date</h6>
                                                        </span>
                                                    </label>
                                                    <div class="input-group"> <input type="number" placeholder="MM" name="" class="form-control" required> <input type="number" placeholder="YY" name="" class="form-control" required> </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-4">
                                                <div class="form-group mb-4"> 
                                                    <label data-toggle="tooltip" data-bs-placement="top" title="Three digit CV code on the back of your card">
                                                        <h6>CVV <i class="fa fa-question-circle d-inline"></i></h6>
                                                    </label> <input type="text" required class="form-control"> 
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-primary">Link</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <button type="button" class="btn btn-primary float-end" data-bs-toggle="modal" data-bs-target="#requestmodal">Request Credit</button>
                    <div class="modal fade" tabindex="-1" id="requestmodal" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h3 class="modal-title">Request Credit</h3>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"aria-label="close"></button>
                                </div>
                                <div class="modal-body">
                                    <form action="<?=base_url("Home/requestwallet")?>" method="post">
                                        <div class="mb-3">
                                            <label for="recipient-email" class="col-form-label">Your Email:</label>
                                            <input type="text" class="form-control" name="requestemail"id="recipient-email">
                                        </div>
                                        <div class="mb-3">
                                            <label for="message" class="col-form-label">Message:</label>
                                            <textarea id="message" name="requestmessage"class="form-control"placeholder="Give reason for your request" ></textarea>
                                        </div>
                                        <small class="text-muted w-100">Note: A request like this might take some time we ask that you please be patient with us and we will get back to you as soon as we can. Thank you and enjoy Shopping with us</small>
                                    
                                </div>        
                                        <div class="modal-footer">
                                            <button type="submit"  class="btn btn-primary">Send</button>
                                        </div>
                                    </form>
                            </div>
                        </div>
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>