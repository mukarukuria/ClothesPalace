<div class="container">
    <?php if ($this->session->flashdata('broke')) : ?>
        <div class="alert alert-danger">
            <?=$this->session->flashdata('broke')?>
        </div>
    <?php endif; ?>
    
    <div class="row g-5">
        <div class="col-md-5 col-lg-4 order-md-last card shadow">
            <h4 class="d-flex justify-content-between align-items-center mb-3">
            <a class="text-primary text-decoration-none">Your cart</a>
            <a href="<?=base_url('products/cart')?>" class="badge bg-primary rounded-pill text-decoration-none"><?=$this->cart->total_items();?></a>
            </h4>
            <?php foreach ($cartitems as $item) :?>
            <ul class="list-group mb-3">
                <li class="list-group-item d-flex justify-content-between lh-sm">
                    <div>
                        <h6 class="my-0"><?=$item['name']?></h6>
                        <small class="text-muted"><?=$item['qty']?></small>
                    </div>
                    <span class="text-muted"><?=$item['subtotal']?></span>
                </li>
            </ul>
            <?php endforeach; ?>
            <ul class="list-group mb-3">
                <li class="list-group-item d-flex justify-content-between">
                    <span>Total:</span>
                    <strong><?="KSH ".$this->cart->total()?></strong>
                </li>
            </ul>
            <form class="card p-2" style="width:100%"> 
                <div class="input-group">
                    <input type="text" class="form-control" placeholder="Promo code">
                    <button type="submit" class="btn btn-secondary">Redeem</button>
                </div>
            </form>
        </div>
        <div class="col-md-7 col-lg-8">
            <h4 class="mb-3">Billing address</h4>
            <form class="needs-validation" novalidate>
                <?php foreach($users as $user){ ?>
                <div class="row g-3">
                    <div class="col-sm-6">
                        <label for="firstName" class="form-label">First name</label>
                        <input type="text" class="form-control" id="firstName"  name="fname" placeholder="" value="<?=$user->first_name?>" required>
                        <div class="invalid-feedback">
                            Valid first name is required.
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <label for="lastName" class="form-label">Last name</label>
                        <input type="text" class="form-control" id="lastName" name="lname"  placeholder="" value="<?=$user->last_name?>" required>
                        <div class="invalid-feedback">
                            Valid last name is required.
                        </div>
                    </div>
                    <div class="col-12">
                        <label for="email" class="form-label">E-mail</label>
                        <input type="email" class="form-control" id="email"  name="email" placeholder="example@something.com" value="<?=$user->email?>"required>
                        <div class="invalid-feedback">
                            Please enter your valid email.
                        </div>
                    </div>
                    <div class="col-12">
                        <label for="address" class="form-label">Address</label>
                        <input type="text" class="form-control" id="address"  name="addrees" placeholder="1234 Main St" required>
                        <div class="invalid-feedback">
                            Please enter your shipping address.
                        </div>
                    </div>
                    <div class="col-md-5">
                        <label for="country" class="form-label">Country</label>
                        <select class="form-select" id="country"  name="country" required>
                            <option value="">Choose...</option>
                            <option>Kenya</option>
                        </select>
                        <div class="invalid-feedback">
                            Please select a valid country.
                        </div>
                    </div>
                    <div class="col-md-4">
                        <label for="state" class="form-label">County</label>
                        <select class="form-select" id="state" required>
                            <option value="">Choose...</option>
                            <option>Nairobi</option>
                            <option>Kiambu</option>
                        </select>
                        <div class="invalid-feedback">
                            Please provide a valid state.
                        </div>
                    </div>
                    <div class="col-md-3">
                        <label for="zip" class="form-label">Zip</label>
                        <input type="text" class="form-control" id="zip" placeholder="" required>
                            <div class="invalid-feedback">
                                Zip code required.
                            </div>
                    </div>
                </div>
                    <hr class="my-4">
                <div class="form-check">
                    <input type="checkbox" class="form-check-input" id="same-address">
                    <label class="form-check-label" for="same-address">Shipping address is the same as my billing address</label>
                </div>

                <div class="form-check">
                    <input type="checkbox" class="form-check-input" id="save-info">
                    <label class="form-check-label" for="save-info">Save this information for next time</label>
                </div> 
                
                    <?php } ?>
            </form>
            <hr class="my-4">
                <button type="submit" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#staticBackdrop">Proceed to Payment</button>
                <hr class="my-4">

            <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header">
                        <div class="nav nav-tabs" id="nav-tab" role="tablist">
                            <nav class="nav nav-pills nav-fill">
                                <button type="button" class="nav-link active" data-bs-toggle="tab" data-bs-target="#nav-home" aria-selected="true">Credit Card</button>
                                <button type="button" class="nav-link" data-bs-toggle="tab" data-bs-target="#nav-profile" aria-selected="false">PayPal</button>
                                <button type="button" class="nav-link" data-bs-toggle="tab" data-bs-target="#nav-contact" aria-selected="false">M-Pesa</button>
                                <button type="button" class="nav-link" data-bs-toggle="tab" data-bs-target="#nav-payment" aria-selected="false">Wallet</button>
                            </nav>
                        </div>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                      </div>
                      <div class="modal-body">
                        <div class="tab-content" id="nav-tabContent">
                          <div class="tab-pane fade show active" id="nav-home">
                              <form role="form">
                                  <div class="form-group"> 
                                      <label for="username">
                                          <h6>Card Owner</h6>
                                      </label> <input type="text" name="username" placeholder="Card Holder Name" required class="form-control "> </div>
                                      <div class="form-group"> <label for="cardNumber">
                                              <h6>Card number</h6>
                                          </label>
                                          <div class="input-group"> <input type="text" name="cardNumber" placeholder="0000 0000 0000 0000" class="form-control " required>
                                              <div class="input-group-append"> <span class="input-group-text text-muted" style="height:40px"> <i class="fa fa-cc-visa mx-1"></i></span> </div>
                                          </div>
                                      </div>
                                  <div class="row">
                                      <div class="col-sm-8">
                                          <div class="form-group"> 
                                              <label><span class="hidden-xs">
                                                      <h6>Expiration Date</h6>
                                                  </span></label>
                                              <div class="input-group"> <input type="number" placeholder="MM" name="" class="form-control" required> <input type="number" placeholder="YY" name="" class="form-control" required> </div>
                                          </div>
                                      </div>
                                      <div class="col-sm-4">
                                          <div class="form-group mb-4"> 
                                              <label data-toggle="tooltip" data-bs-placement="top" title="Three digit CV code on the back of your card">
                                                  <h6>CVV <i class="fa fa-question-circle d-inline"></i></h6>
                                              </label> <input type="text" required class="form-control"> </div>
                                      </div>
                                  </div>

                              </form>
                              <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Go Back</button>
                                <button type="button" class="btn btn-primary">Buy</button>
                              </div>
                          </div>
                          <div class="tab-pane fade" id="nav-profile">
                            <button type="button" class="btn btn-info mb-3 text-white"><i class="fa fa-paypal mr-2"></i> Log into my Paypal</button>
                            <p class="text-muted w-100"> Note: After clicking on the button, you will be directed to a secure gateway for payment. After completing the payment process, you will be redirected back to the website to view details of your order. </p>  
                              
                          </div>
                          <div class="tab-pane fade" id="nav-contact">
                              <h6 class="pb-2">Input your M-pesa number</h6>
                              <div class="form-group "><input type="text" class="form-control"></div>
                              <p class="text-muted w-100"> Note: After clicking on the button, you will be directed to a secure gateway for payment. After completing the payment process, you will be redirected back to the website to view details of your order. </p>
                              <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Go Back</button>
                                <button type="button" class="btn btn-success">Buy</button>
                              </div>
                          </div>
                          <div class="tab-pane fade" id="nav-payment">
                              
                            <?php foreach($wallet as $wallet):?>
                            <a href="<?=base_url('Admin/walletpay/'.$_SESSION['id'])?>"class="btn btn-primary mb-3"><i class="fa fa-money mr-2"></i>Use My Wallet</a>
                            <p class="text-muted w-100">You have <strong>Ksh <?=number_format($wallet->amount_available);?></strong> in your wallet if you wish to use it, <strong> KSH <?=number_format($this->cart->total());?></strong> will be deducted from your account click the button above to proceed to payment. Thank you for shopping with us</p>  
                            <?php endforeach; ?>
                          </div>
                      </div>
                      </div>
                      
                    </div>
                  </div>
                </div>
        </div>
    </div>
</div>
