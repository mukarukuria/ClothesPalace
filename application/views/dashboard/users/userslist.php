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
                                <a href="<?=base_url('admin/logindetails')?>" class="btn btn-outline-primary btn-sm float-end">View Login Details</a>
                            </div>
                            <div class="card-body">
                            <table id="datatablesSimple">
                                    <thead>
                                        <tr>
                                            <th>Users Id</th>
                                            <th>First Name</th>
                                            <th>Last Name</th>
                                            <th>Email</th>
                                            <th>Role</th>
                                            <th>Gender</th>
                                            <th>Password</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>Users Id</th>
                                            <th>First Name</th>
                                            <th>Last Name</th>
                                            <th>Email</th>
                                            <th>Role</th>
                                            <th>Gender</th>
                                            <th>Password</th>
                                            <th>Action</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        <?php foreach($user as $item):?>
                                            
                                        <tr>
                                            <td><?=$item->user_id?></td>
                                            <td><?=$item->first_name?></td>
                                            <td><?=$item->last_name?></td>
                                            <td><?=$item->email?></td>
                                            <td><?=$item->role_name?></td>
                                            <td><?=$item->gender?></td>
                                            <td><?=$item->password?></td>
                                            <td>
                                                <div class="dropdown shadow-sm rounded-pill text-center">
                                                    <a href="#" class="dropdown-toggle text-body" data-bs-toggle="dropdown" >
                                                        <i class="fas fa-ellipsis-h" id="dropdownMenuLink" ></i>
                                                    </a>
                                                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                                        <li class="d-flex justify-content-around">
                                                            <a href="<?=base_url('Admin/edituser/'.$item->user_id)?>" class="text-body"><i class="fas fa-edit" data-bs-toggle="tooltip" title="Edit"></i></a>
                                                            <a href="<?=base_url('Admin/logindetail/'.$item->user_id)?>" class="text-body"><i class="fas fa-history" data-bs-toggle="tooltip" title="Login History"></i></a>
                                                            <a href="<?=base_url('Admin/deleteuser/'.$item->user_id)?>" class="text-body"><i class="fas fa-trash" data-bs-toggle="tooltip" title="Delete"></i></a>
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