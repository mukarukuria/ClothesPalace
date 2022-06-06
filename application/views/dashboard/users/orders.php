            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Clothes Palace <?=$title?> </h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                            <li class="breadcrumb-item active"><?=$title?></li>
                        </ol>
                        
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                                Clothe Palace <?=$title?>
                            </div>
                            <div class="card-body">
                                <table id="datatablesSimple">
                                    <thead>
                                        <tr>
                                            <th>Orders Id</th>
                                            <th>First Name</th>
                                            <th>Last Name</th>
                                            <th>Amount</th>
                                            <th>Status</th>
                                            <th>Payment Type</th>
                                            <th>Updated At</th>
                                            <th>Actin</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>Orders Id</th>
                                            <th>First Name</th>
                                            <th>Last Name</th>
                                            <th>Amount</th>
                                            <th>Status</th>
                                            <th>Payment Type</th>
                                            <th>Updated At</th>
                                            <th>Action</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                       
                                        <?php foreach($orders as $item) :?>
                                        <tr>
                                            <td><?=$item->order_id?></td>
                                            <td><?=$item->first_name?></td>
                                            <td><?=$item->last_name?></td>
                                            <td><?=$item->order_amount?></td>
                                            <td><?=$item->order_status?></td>
                                            <td><?=$item->paymenttype_name?></td>
                                            <td><?=$item->updated_at?></td>
                                            <td>
                                                <div class="dropdown shadow-sm rounded-pill text-center">
                                                    <a href="#" class="dropdown-toggle text-body" data-bs-toggle="dropdown" >
                                                        <i class="fas fa-ellipsis-h" id="dropdownMenuLink" ></i>
                                                    </a>
                                                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                                        <li class="d-flex justify-content-around">
                                                            <a href="<?=base_url('Admin/orderdetail/'.$item->customer_id)?>" class="text-body"><i class="fas fa-eye" data-bs-toggle="tooltip" title="Order Details"></i></a>
                                                            <a href="<?=base_url('Admin/deleteorder/'.$item->customer_id)?>" class="text-body"><i class="fas fa-trash" data-bs-toggle="tooltip" title="Delete"></i></a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </td>
                                        </tr>
                                        <?php endforeach;?>
                                    </tbody>
                                    
                                </table>
                            </div>
                        </div>
                    </div>
                
                </main>