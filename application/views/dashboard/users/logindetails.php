            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Clothes Palace</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                            <li class="breadcrumb-item active"><?=$title?></li>
                        </ol>
                        
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                                <?=$title?>
                                <a href="<?=base_url('admin/users')?>" class="btn btn-outline-success btn-sm float-end">Go Back</a>
                            </div>
                            <div class="card-body">
                            <table id="datatablesSimple">
                                    <thead>
                                        <tr>
                                            <th>Users Id</th>
                                            <th>First Name</th>
                                            <th>Last Name</th>
                                            <th>Email</th>
                                            <th>Login Time</th>
                                            <th>Logout Time</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>Users Id</th>
                                            <th>First Name</th>
                                            <th>Last Name</th>
                                            <th>Email</th>
                                            <th>Login Time</th>
                                            <th>Logout Time</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        <?php foreach($logindetails as $item):?>
                                            
                                        <tr>
                                            <td><?=$item->user_id?></td>
                                            <td><?=$item->first_name?></td>
                                            <td><?=$item->last_name?></td>
                                            <td><?=$item->email?></td>
                                            <td><?=$item->login_time?></td>
                                            <td><?=$item->logout_time?></td>
                                        </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </main>
                