 <?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Google API client_id -->
    <meta name="google-signin-client_id" content=" 346265206996-ovo2fej7iph08gkb3a90pus1i3nbtiae.apps.googleusercontent.com">
    <title>Clothe Palace</title>
    <link rel="shortcut icon" href="<?=base_url()?>assets/pictures/logo2.png" type="image/x-icon">
    <!-- Personal CSS -->
    <link rel = "stylesheet" type = "text/css"  href = "<?php echo base_url(); ?>assets/css/style.css">
    <!-- Bootstrap CSS     -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awsome Css -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- Datatables stylesheet  -->
    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet">
    
  </head>
  <body>
    <!-- Personal Javascript File -->
    <script src="<?php echo base_url(); ?>assets/js/functions.js"></script>
    <!-- Jquery Script File  -->
    <script src="<?php echo base_url(); ?>assets/js/jquery.js"></script>
    <!-- Datatables bootstrap javascript -->
    <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
    <script src="<?=base_url()?>assets/js/datatables-simple-demo.js"></script>
    <!-- Bootstrap Javascript    -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    
    <nav class="navbar d-block">
      <header class="d-flex flex-wrap justify-content-center py-3 mb-4">
        <a href="<?=base_url();?>" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-dark text-decoration-none">
          <svg class="bi me-2" width="40" height="32"><use xlink:href="#bootstrap"/></svg>
          <img src="<?php echo base_url(); ?>assets/pictures/logo.png" alt="" width="80" height="40">

        </a>
        <ul class="nav nav-pills">
          <li class="nav-item"><a href="<?=base_url();?>" class="menulinks" aria-current="page">Home</a></li>
          <?phP if (isset($_SESSION['id'])) {?>
          <li class="nav-item"><a href="<?=base_url('products/'.$_SESSION['id']);?>" class="menulinks">Shop</a></li>
          <?php }else { ?>
          <li class="nav-item"><a href="<?=base_url('products/1');?>" class="menulinks">Shop</a></li>
          <?php } ?>
          <?php if(isset($_SESSION['name'])){?>
              <div class="flex-shrink-0 dropdown">
            <a href="#" class="d-block link-dark text-decoration-none dropdown-toggle me-3" id="dropdownUser2" data-bs-toggle="dropdown" data-bs-display="static"  aria-expanded="false">
            <i class="fa fa-user w-auto" aria-hidden="true"></i> 
            </a>
            <ul class="dropdown-menu dropdown-menu-lg-end text-small shadow" aria-labelledby="dropdownUser2">
              <li><a class="dropdown-item ps-0" href="<?=base_url('user/history/'.$_SESSION['id'])?>"><i class="fa fa-history"></i> History</a></li>
              <li><a class="dropdown-item ps-0" href="<?=base_url('user/wallet/'.$_SESSION['id'])?>"><i class="fa fa-money"></i> Wallet</a></li>
              <li><a class="dropdown-item ps-0" href="<?=base_url('user/profile/'.$_SESSION['id'])?>"><i class="fa fa-user"></i> Profile</a></li>
              <li><hr class="dropdown-divider"></li>
              <li><a class="dropdown-item ps-0" href="<?=base_url('Home/logout/'.$_SESSION['id'])?>"><i class="fa fa-sign-out"></i> Sign out</a></li>
            </ul>
          </div>
          <?php }else {
          ?></ul>
          <div class="col-md-3 text-end w-auto me-3">
            <a href="<?=base_url('user/login')?>" class="btn btn-outline-primary me-2">Login</a>
            <a href="<?=base_url('user/register')?>" class="btn btn-primary">Sign-up</a>
          </div>
          <?php }; ?>
        
      </header>  
    </nav>
  </div>