<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="">
        <title>Dashboard - TCP Admin</title> 
        <link rel="shortcut icon" href="<?=base_url()?>assets/pictures/logo.png" type="image/x-icon">
        <link rel="icon" href="<?=base_url()?>assets/pictures/logo.png" type="image/x-icon">
        <!-- personal stylesheet -->
        <link href="<?=base_url();?>assets/bootstrap/bootstrap.css" rel="stylesheet">
        <!-- font awesome script  -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous"></script>
    </head>
    <body class="sb-nav-fixed" >
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <!-- Navbar Brand-->
            <a class="navbar-brand ps-3 " href="<?=base_url('admin')?>"><img src="<?=base_url()?>assets/pictures/logo.png" alt="" width="80" height="40"></a>
            <!-- Sidebar Toggle-->
            <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
            <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0"></form>
            <!-- Navbar-->
            <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
                <li class="nav-item dropdown">
                    <a class="nav-link" id="notificationDropdown" href="#" role="button" data-bs-toggle="dropdown" data-bs-auto-close="inside" aria-expanded="false">
                        <i class="fas fa-bell fa-fw"></i>
                        <?php if($notifications != 0) :?>
                        <span class="position-absolute start-100 translate-middle badge rounded-pill bg-danger"> <?=$notifications?> </span>
                        <?php endif; ?>
                    </a>
                    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="notificationDropdown" style="min-width: 15rem;">
                        <ul class="list-unstyled">
                            <?php if($notifications != 0) {foreach($results as $item) :?>
                                <li class="ms-3">
                                    <div class="">
                                        <?=$item->name?> would like some credit because of <?=$item->reason?><br>
                                        <a href="<?=base_url('Admin/agreerequest/'.$item->user_id)?>" class="btn btn-success btn-sm">Agree</a> 
                                        <a href="<?=base_url('Admin/denyrequest/'.$item->user_id)?>" class="btn btn-danger btn-sm">Deny</a>
                                    </div>
                                </li>
                                <hr class="dropdown-divider" >
                            <?php endforeach; }else{ ?>
                                <li class="ms-3 mb-3">
                                    <strong>No Unread Messages  </strong> 
                                    <hr class="dropdown-divider" >
                                </li>
                            <?php } ?>
                            <li><a href="" class="dropdown-item">All Notifications <i class="fas fa-caret-down"></i></a></li>
                    
                        </ul>
                        
                    </div>
                </li>
                <li class="nav-item dropdown ms-5">
                    <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="#"><i class="fas fa-cog"></i><span class="ms-3"></span> Settings</a></li>
                        <li><a class="dropdown-item" href="#"><i class="fas fa-chart-line"></i><span class="ms-3"></span> Activity Log</a></li>
                        <li><hr class="dropdown-divider" /></li>
                        <li><a class="dropdown-item" href="<?=base_url('Home/logout/'.$_SESSION['id'])?>"><i class="fas fa-sign-out-alt"></i><span class="ms-3"></span> Logout</a></li>
                    </ul>
                </li>
            </ul>
        </nav>
        <!-- sidebar  -->
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        
                        <div class="nav">
                            <div class="sb-sidenav-menu-heading">Core</div>
                            <a class="nav-link" href="<?=base_url('admin')?>">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Dashboard
                            </a>
                            <div class="sb-sidenav-menu-heading">Interface</div>
                            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#pagesCollapseproduct" aria-expanded="false" aria-controls="pagesCollapseError">
                            <div class="sb-nav-link-icon"><i class="fas fa-box"></i></div>
                                Products
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="pagesCollapseproduct" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordionPages">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link" href="<?=base_url('admin/gallery')?>">Inventory</a>
                                    <a class="nav-link" href="<?=base_url('admin/deleted')?>">Deleted Inventory</a>
                                    <a class="nav-link" href="<?=base_url('admin/categories')?>">Categories</a>
                                </nav>
                            </div>
                            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#pagesCollapseusers" aria-expanded="false" aria-controls="pagesCollapseAuth">
                            <div class="sb-nav-link-icon"><i class="fas fa-user"></i></div>
                                Users
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="pagesCollapseusers" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordionPages">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link" href="<?=base_url('admin/users')?>">List of Users</a>
                                    <a class="nav-link" href="<?=base_url('admin/orders')?>">List of Orders</a>
                                </nav>
                            </div>
                            
                            <div class="sb-sidenav-menu-heading">Addons</div>

                            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapsePages" aria-expanded="false" aria-controls="collapsePages">
                                <div class="sb-nav-link-icon"><i class="fas fa-book-open"></i></div>
                                 Page
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapsePages" aria-labelledby="headingTwo">
                                <nav class="sb-sidenav-menu-nested nav accordion" id="sidenavAccordionPages">
                                    <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#pagesCollapseAuth" aria-expanded="false" aria-controls="pagesCollapseAuth">
                                        Accounts
                                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                                    </a>
                                    <div class="collapse" id="pagesCollapseAuth"  data-bs-parent="#sidenavAccordionPages">
                                        <nav class="sb-sidenav-menu-nested nav">
                                            <a class="nav-link" href="<?=base_url("user/profile/".$_SESSION['id'])?>">Profile</a>
                                            <a class="nav-link" href="<?=base_url("user/register")?>">Register</a>
                                        </nav>
                                    </div>
                                </nav>
                            </div>
                            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseAPI" aria-expanded="false">
                                <div class="sb-nav-link-icon"><i class="fab fa-hive"></i></div>
                                 API
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapseAPI">
                                        <nav class="sb-sidenav-menu-nested nav">
                                            <a class="nav-link" href="<?=base_url("api/createuser")?>">Create API user</a>
                                        </nav>
                                    </div>
                            
                        </div>
                    </div>
                    <div class="sb-sidenav-footer">
                        <?php if(isset($_SESSION['name'])): ?>
                        <div class="small">Logged in as:</div>
                        <?=$_SESSION['name']?>
                    </div>
                    <?php endif;?>
                </nav>
            </div>
