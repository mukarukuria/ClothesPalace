            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Clothes Palace <?=$title?> </h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                            <li class="breadcrumb-item active"><?=$title?> </li>
                        </ol>
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                                Clothe Palace <?=$title?> 
                                <a href="<?=base_url('admin/uploadimage')?>" class="btn btn-outline-primary btn-sm float-end">Add Product</a>
                            </div>
                            <div class="card-body">
                                <table id="datatablesSimple">
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Description</th>
                                            <th>Price</th>
                                            <th>Discount</th>
                                            <th>Available</th>
                                            <th>Created at</th>
                                            <th>Updated At</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>Name</th>
                                            <th>Description</th>
                                            <th>Price</th>
                                            <th>Discount</th>
                                            <th>Available</th>
                                            <th>Created At</th>
                                            <th>Updated At</th>
                                            <th>Action</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        <?php foreach ($products as $item) : ?>
                                        <tr>
                                            
                                            <td><?=$item->product_name?></td>
                                            <td><?=$item->product_description?></td>
                                            <td><?=$item->unit_price?></td>
                                            <td><?=$item->discounted_price?></td>
                                            <td><?=$item->available_quantity?></td>
                                            <td><?=$item->created_at?></td>
                                            <td><?=$item->updated_at?></td>
                                            <td>
                                                <div class="dropdown shadow-sm rounded-pill text-center">
                                                    <a href="#" class="dropdown-toggle text-body" data-bs-toggle="dropdown" >
                                                        <i class="fas fa-ellipsis-h" id="dropdownMenuLink" ></i>
                                                    </a>
                                                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                                        <li class="d-flex justify-content-around">
                                                            <?php if($deleted == 'TRUE'){ ?>
                                                            <a href="<?=base_url('Admin/editimage/'.$item->product_id)?>" class="text-body"><i class="fas fa-edit" data-bs-toggle="tooltip" title="Edit"></i></a>
                                                            <a href="<?=base_url('Admin/restoreproduct/'.$item->product_id)?>" class="text-body"><i class="fas fa-trash-restore" data-bs-toggle="tooltip" title="Restore"></i></a>
                                                            <?php  }else {?>
                                                                <a href="<?=base_url('Admin/editimage/'.$item->product_id)?>" class="text-body"><i class="fas fa-edit" data-bs-toggle="tooltip" title="Edit"></i></a>
                                                            <a href="<?=base_url('Admin/deleteproduct/'.$item->product_id)?>" class="text-body"><i class="fas fa-trash" data-bs-toggle="tooltip" title="Delete"></i></a>
                                                            <?php } ?>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </td>
                                        </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </main>