<div class="container">
    <h1 class="mt-4">Clothes Palace </h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
        <li class="breadcrumb-item active"><?="Order History"?> </li>
    </ol>
    <div class="card shadow w-100">
        <div class="card-header">
            <i class="fa fa-table me-1"></i>
            Order History for <?=$_SESSION['name']?> 
        </div>
        <div class="card-body">
            <table id="datatablesSimple">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Product name</th>
                        <th>Price</th>
                        <th>Quantity</th>
                        <th>Total</th>
                        <th>Date</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>#</th>
                        <th>Product name</th>
                        <th>Price</th>
                        <th>Quantity</th>
                        <th>Total</th>
                        <th>Date</th>
                    </tr>
                </tfoot>
                <tbody>
                    <?php foreach ($userdata as $item):?>
                    <tr>
                        <td><?=$item->product_id?></td>
                        <td><?=$item->product_name?></td>
                        <td><?=$item->unit_price?></td>
                        <td><?=$item->order_quantity?></td>
                        <td><?=$item->order_amount?></td>
                        <td><?=$item->updated_at?></td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>