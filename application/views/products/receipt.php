<div class="container">
    <div class="row">
        <div class="col">
            <div class="card shadow">
                <div class="card-body">
                    <div class="float-end">
                        <img src="<?=base_url()?>assets/pictures/receipt.jpg" alt=""  class="float-end me-3 opacity-50"width="50" height="75">
                    </div>
                    <div class="float-start">
                        <h5 class="mb-3">Receipt from Clothe Palace</h5>
                        <h4 class="mb-3"><strong>KSH <?=$this->cart->total();?></strong></h4>
                        <small class= "text-muted float-start mb-3">Paid</small>
                    </div>
                    
                    <div class="container-fluid" style ="margin-top:8rem">
                        <hr>
                        <a href="<?=base_url('Home/receiptpdf/'.$_SESSION['id'])?>" class="text-muted text-decoration-none pe-3"><i class="fa fa-arrow-down w-auto pe-2" aria-hidden="true"></i> Download Receipt</a>
                        <div class="container-fluid"></div>
                        <?php foreach($details as $item): ?>
                        <p><span class="text-muted">Customer Name</span> <span class="float-end"><?=$item->first_name.' '.$item->last_name?></span></p>
                        <p><span class="text-muted">Order Number </span> <span class="float-end"><?=$item->order_id?></span></p>
                        <p><span class="text-muted">Payment Method </span> <span class="float-end"><?=$item->paymenttype_name?></span></p>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
            <div class="card shadow">
                <div class="card-body">
                    <h4 class="text-muted mb-4">Order Made</h4>
                    <ul class="list-group mb-3">
                        <?php foreach($cartitems as $items) : ?>
                        <li class="d-flex bodder-bottom justify-content-between lh-sm">
                            <div>
                                <h6 class="my-0"><?=$items['name']?></h6>
                                <small class="text-muted">Quantity: <?=$items['qty']?></small>
                            </div>
                            <span><strong>Ksh <?=$items['subtotal']?></strong></span>
                        </li>
                        <hr class="fw-bold mt-1">
                        <?php endforeach; ?>
                    </ul>
                    <ul class="list-group mb-3">
                        <hr class="fw-bold mb-1">
                        <li class="d-flex bodder-bottom justify-content-between">
                            <span>Total:</span>
                            <strong>KSH <?=$this->cart->total();?></strong>
                        </li>
                        <hr class="fw-bold mt-1">
                    </ul>
                    <p class="text-muted">Questions? <a href="#" class="text-decoration-none">Email us</a> and we will get back to you as soon as possible</p>
                </div>
            </div>
        </div>
        <div class="col mt-4">
            <img src="<?=base_url()?>assets/pictures/cash.jpg" alt="" width="600" height="850">
        </div>
    </div>
</div>