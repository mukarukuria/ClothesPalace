            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <div class="row align-items-center mt-5 justify-content-end">
                            <div class="col-xl-5">
                                <div class="row align-items-center">
                                    <div class="col-xl-12 col-md-6">
                                        <div class="card bg-primary rounded-0 text-white mb-4">
                                            <div class="card-body">
                                                <div class="mt-5 text-center mx-4">
                                                    <h3 class="text-center mb-3"><strong>Welcome Back <?=$_SESSION['fname']?> </strong></h3>
                                                    <p>Welcome to the Clothes Palace Dashboard! we are glad to see you today. We will be happy to help you grow your business.</p>
                                                    <a href="<?=base_url("products/".$_SESSION['id'])?>" type="button" class="btn btn-outline-light">Go to Shop</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-12 col-md-6">
                                        <div class="card bg-primary text-white mb-4">
                                            <div class="card-body rounded-0">
                                                <div class="rounded-circle position-absolute translate-middle-x start-50 ">
                                                    <i class="fas fa-money-bill-alt fs-2"></i>
                                                </div>
                                                <div class="text-center">
                                                    <h3 class="text-center mt-5 mb-3">Total Revenue this Year</h3>
                                                    <p>KSH 34,560</p>
                                                    <small><i class="fas fa-arrow-up"></i> <span class="ms-3"></span> 78.96%</small>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-7">
                                <div class="card box-col-12 mt-5 table-card">
                                    <div class="card-header">
                                        <i class="fas fa-chart-area me-1"></i>
                                        Total Logins per Day
                                    </div>
                                    <div class="card-body"><canvas id="myAreaChart" width="100%" height="50"></canvas></div>
                                </div>
                            </div>
                        </div>
                        <div class="card  mb-4"> 
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                                List of Registered Users
                            </div>
                            <div class="card-body">
                                <table id="datatablesSimple">
                                    <thead>
                                        <tr>
                                            <th>Users Id</th>
                                            <th>First Name</th>
                                            <th>Last Name</th>
                                            <th>Email</th>
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
                                            <td><?=$item->gender?></td>
                                            <td><?=$item->password?></td>
                                            <td>
                                                <div class="dropdown shadow-sm rounded-pill text-center">
                                                    <a href="#" class="dropdown-toggle text-body" data-bs-toggle="dropdown" >
                                                        <i class="fas fa-ellipsis-h" id="dropdownMenuLink" ></i>
                                                    </a>
                                                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                                        <li class="d-flex justify-content-around">
                                                            <a href="#" class="text-body"><i class="fas fa-edit" data-bs-toggle="tooltip" title="Edit"></i></a>
                                                            <a href="#" class="text-body"><i class="fas fa-trash" data-bs-toggle="tooltip" title="Delete"></i></a>
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
                <!-- <div class="col-xl-3 col-md-6">
                                <div class="card bg-success text-white mb-4">
                                    <div class="card-body">Success Card</div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="#">View Details</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-danger text-white mb-4">
                                    <div class="card-body">Danger Card</div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="#">View Details</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                        </div> -->