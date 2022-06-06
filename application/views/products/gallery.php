<div class="container">
    <div class="carousel slide">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="<?php echo base_url(); ?>assets/pictures/clothes2.jpg" class="d-block w-100" alt="..."width="420px" height="200px">
                <div class="carousel-caption d-none d-md-block">
                    <h5>First slide label</h5>
                    <p>Some representative placeholder content for the first slide.</p>
                </div>
            </div>
        </div>
    </div>
    
    <div class="container-fluid">
        <div class="collapse mb-3" id="collapseExample">
            <div class="card card-body">
                <ul class="list-style-none">
                    <li class="btn btn-primary opacity-75" data-filter="ALL">All</li>
                    <?php foreach($products as $items) :?>
                    <li class="btn btn-primary opacity-75" data-filter=<?=$items->category_name?>><?=$items->category_name?></li>
                    <?php endforeach; ?>
                </ul>
                <!-- Some placeholder content for the collapse component. This panel is hidden by default but revealed when the user activates the relevant trigger. -->
            </div>
        </div>
        <div class="btn-group mb-3">
            <button class="btn btn-light dropdown-toggle" style="background-color:#98afc733" type="button"  data-bs-toggle="collapse" data-bs-target="#collapseExample" >
                Filters
            </button><br>
        </div>
        <div style="float:right">
            <span class="position-absolute translate-middle badge rounded-pill bg-primary">
                <?= $this->cart->total_items();?>
                <span class="visually-hidden">unread messages</span>
            </span>
            <a href="<?= base_url('products/cart/'.$_SESSION['id']); ?>"><i style="font-size: 30px;" id="liveToastBtn" class ="fa fa-shopping-cart"></i></a>
        </div>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Products</li>
            </ol>
        </nav>
        <?php if ($this->session->flashdata('cart')):?>
            <div class="position-fixed bottom-0 end-0 p-3" style="z-index: 11">
                <div class="toast-container">
                <div role="alert" aria-live="assertive" id="alerttoast" aria-atomic="true" class="toast">
                    <div class="toast-header">
                    <img src="<?=base_url();?>assets/pictures/logo.png" class="rounded me-2" width="60" height="30" alt="">
                    <strong class="me-auto">Confirmed</strong>
                    <small class="text-muted">just now</small>
                    <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
                    </div>
                    <div class="toast-body">
                    <?= $this->session->flashdata('cart');?>
                    </div>
                </div>
                <script>
                    var option ={
                        animation : true,
                        delay :2000
                    }
                    var toastbox = document.getElementById('alerttoast');
                    var toastelement = new bootstrap.Toast(toastbox,option);
                    toastelement.show();
                </script>
            </div>
        <?php endif; ?>
        
        
    </div>
    <div class="row">
        <h3 class="text-center">Our Products</h3>
        <div class="col-9 w-100 justify-content-around flex-wrap">
            <?php foreach($products as $item){
                $name =$item->product_name;
                $description =$item->product_description;
                $price =$item->unit_price ;
                $discount =$item->discounted_price;
                $discountpercent =(($discount-$price)/$discount)*100;    
                ?>
                
                <div class="card" >
                <span class="position-absolute translate-middle badge rounded-pill bg-secondary">
                    <?= "-".number_format($discountpercent)."%"  ?>
                    <span class="visually-hidden">unread messages</span>
                </span>
                    <img src="<?php echo base_url('assets/pictures/database/'.$item->product_image); ?>"class="card-img-top" alt="..." width ="150" height="150">
                    <div class="card-body" style="padding:0">
                        <h5><?= $name?></h5>
                        <p><?= $description ?></p>
                        <p><b><?= "Ksh".$price ?></b><small style="padding:10px"><del><?= "Ksh".$discount?></del></small></p>
                         <br>
                        <a href="<?= base_url('Home/addtocart/'.$item->product_id); ?>" class="btn btn-success add_cart">Add To Cart</a>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
</div>
