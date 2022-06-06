<div class="container">
    <h2>Shopping Cart</h2>

    <table class="table table-striped table-hover">
        <thead>
            <th scope ="col">#</th>
            <th scope ="col">Image</th>
            <th scope ="col">Name</th>
            <th scope ="col">Price</th>
            <th scope ="col">Quantity</th>
            <th scope ="col">Total</th>
            <th scope= "col">Action</th>
        </thead>
        <tbody>
        <?php
            if($this->cart->total_items()>0){foreach ($cartitems as $item):?>
            <tr>
                <td><?= $item['id'] ?></td>
                <td><img src="<?=base_url('assets/pictures/database/'.$item['image'] );?>" alt="" width="100" height="100"></td>
                <td><?= $item['name'] ?></td>
                <td><?= $item['price'] ?></td>
                <td><?= $item['qty'] ?></td>
                <td><?= $item['subtotal'] ?></td>
                <td><a class="btn btn-danger btn-sm" href="<?= base_url('Home/removecart/'.$item['rowid']);?>">Remove</a></td>
            </tr>
            <?php endforeach;?>
            <tr>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td><strong>Cart Total:</strong></td>
                <td class="text-right"> <strong id="carttotal"><?= "KSH ".$this->cart->total();?></strong></td>
            </tr>
            <?php } ?>
        </tbody>
    </table>
    <div class="col-12">
            
            <?php if ($this->cart->total_items() > 0) {?>
                <a href="<?=base_url('products/checkout/'.$_SESSION['id']);?>" class= "btn btn-success"style="float:right">CheckOut</a>
                <a href="<?=base_url('products/'.$_SESSION['id']);?>" class= "btn btn-warning "style="float:left">Continue Shopping</a>
            <?php }else { ?>
                <div class="alert alert-danger text-center" >You have nothing in your Cart <a href="<?=base_url('products/'.$_SESSION['id']);?>" class="alert-link">Go Back to Shopping</a></div>
            <?php }?>
    </div>
</div>