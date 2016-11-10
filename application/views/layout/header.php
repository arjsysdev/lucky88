<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Lucky88 ERP System</title>
	<link href="<?php echo base_url(); ?>assets/css/bootstrap.min.css" rel="stylesheet">
	<link href="<?php echo base_url(); ?>assets/css/style.css" rel="stylesheet">
	<link href="<?php echo base_url(); ?>assets/css/bootstrap-datepicker.standalone.min.css" rel="stylesheet">
	<link href="<?php echo base_url(); ?>assets/DataTables/datatables.min.css" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="<?= base_url('assets/css/bootstrap.min.css') ?>">
	<link rel="stylesheet" type="text/css" href="<?= base_url('assets/css/font-awesome.min.css') ?>">
	<link rel="stylesheet" type="text/css" href="<?= base_url('assets/css/style.css') ?>">
	<link rel="stylesheet" type="text/css" href="<?= base_url('assets/datatables/datatables.min.css') ?>">
  <link rel="stylesheet" type="text/css" href="<?= base_url('assets/css/bootstrap-datepicker.standalone.min.css') ?>">
	<link rel="stylesheet" type="text/css" href="<?= base_url('assets/css/select2.min.css') ?>">

	<script src="<?= base_url('assets') ?>/plugins/jQuery/jquery-2.2.3.min.js"></script>
	<script src="https://code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>
	<script>
	  $.widget.bridge('uibutton', $.ui.button);
    $(function(){
      $("#priceList").DataTable();
    });

    $('#loader')
    .hide()  // Hide it initially
    .ajaxStart(function() {
        $(this).show();
    })
    .ajaxStop(function() {
        $(this).hide();
    });
	</script>
	<script src="<?= base_url('assets') ?>/bootstrap/js/bootstrap.min.js"></script>

	<script src="<?= base_url('assets/datatables/datatables.min.js') ?>"></script>
	<script src="<?= base_url('assets/js/jquery-validation/dist/jquery.validate.min.js') ?>"></script>
	<script src="<?= base_url('assets/js/bootstrap-filestyle.min.js') ?>"></script>
	<script type="text/javascript" src="<?= base_url('assets') ?>/js/jquery.uploadPreview.js"></script>
  <script type="text/javascript" src="<?= base_url('assets') ?>/js/bootstrap-datepicker.min.js"></script>
	<script type="text/javascript" src="<?= base_url('assets') ?>/js/select2.min.js"></script>

	<!-- AdminLTE -->
	<link rel="stylesheet" href="<?= base_url('assets') ?>/dist/css/AdminLTE.min.css">
	<link rel="stylesheet" href="<?= base_url('assets') ?>/dist/css/skins/_all-skins.min.css">
	<link rel="stylesheet" href="<?= base_url('assets') ?>/plugins/iCheck/flat/blue.css">
	<link rel="stylesheet" href="<?= base_url('assets') ?>/plugins/morris/morris.css">
	<link rel="stylesheet" href="<?= base_url('assets') ?>/plugins/jvectormap/jquery-jvectormap-1.2.2.css">
	<link rel="stylesheet" href="<?= base_url('assets') ?>/plugins/datepicker/datepicker3.css">
	<link rel="stylesheet" href="<?= base_url('assets') ?>/plugins/daterangepicker/daterangepicker.css">
	<link rel="stylesheet" href="<?= base_url('assets') ?>/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">
	
	
</head>
<body class="hold-transition skin-blue sidebar-mini">
	<div class="wrapper">
<?php
	if ($this->ion_auth->logged_in())
	{
?>
	<header class="main-header">
    <!-- Logo -->
    <a href="index2.html" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>L</b>888</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>Lucky</b>888</span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- Notifications: style can be found in dropdown.less -->
          <li class="dropdown notifications-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <i class="fa fa-bell-o"></i>
              <span class="label label-warning">1</span>
            </a>
            <ul class="dropdown-menu">
              <li class="header">You have 1 notifications</li>
              <li>
                <!-- inner menu: contains the actual data -->
                <ul class="menu">
                  <li>
                    <a href="#">
                      <i class="fa fa-users text-aqua"></i> 5 new members joined today
                    </a>
                  </li>
                </ul>
              </li>
              <li class="footer"><a href="#">View all</a></li>
            </ul>
          </li>
          <!-- Tasks: style can be found in dropdown.less -->
          <li class="dropdown tasks-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <i class="fa fa-flag-o"></i>
              <span class="label label-danger">1</span>
            </a>
            <ul class="dropdown-menu">
              <li class="header">You have 1 tasks</li>
              <li>
                <!-- inner menu: contains the actual data -->
                <ul class="menu">
                  <li><!-- Task item -->
                    <a href="#">
                      <h3>
                        Design some buttons
                        <small class="pull-right">20%</small>
                      </h3>
                      <div class="progress xs">
                        <div class="progress-bar progress-bar-aqua" style="width: 20%" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
                          <span class="sr-only">20% Complete</span>
                        </div>
                      </div>
                    </a>
                  </li>
                </ul>
              </li>
              <li class="footer">
                <a href="#">View all tasks</a>
              </li>
            </ul>
          </li>
          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <img src="<?= base_url('assets') ?>/dist/img/user2-160x160.jpg" class="user-image" alt="User Image">
              <span class="hidden-xs"><?= $this->session->userdata('fullname') ?></span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <img src="<?= base_url('assets') ?>/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">

                <p>
                  <?= $this->session->userdata('fullname') ?> - System Developer
                  <small>Member since Nov. 2016</small>
                </p>
              </li>
              <li class="user-footer">
                <div class="pull-left">
                  <a href="#" class="btn btn-default btn-flat">Profile</a>
                </div>
                <div class="pull-right">
                  <a href="<?= base_url('auth/logout') ?>" class="btn btn-default btn-flat">Sign out</a>
                </div>
              </li>
            </ul>
          </li>
          <li>
            <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
          </li>
        </ul>
      </div>
    </nav>
  </header>
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="<?= base_url('assets') ?>/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p><?= $this->session->userdata('fullname') ?></p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
      <!-- search form -->
      <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="q" class="form-control" placeholder="Search...">
              <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
        </div>
      </form>
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu">
        <li class="header">MAIN NAVIGATION</li>
        <li class="active treeview">
          <a href="#">
            <i class="fa fa-dashboard"></i> <span>Dashboard</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="active"><a href="<?= base_url('auth') ?>"><i class="fa fa-circle-o"></i> Main Dashboard</a></li>
          </ul>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-users"></i> <span>Users</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="active"><a href="<?= base_url('auth') ?>"><i class="fa fa-circle-o"></i> List of Users</a></li>
            <li class="active"><a href="<?= base_url('auth/create_user') ?>"><i class="fa fa-user-plus"></i> Create User</a></li>
            <li class="active"><a href="<?= base_url('auth/create_group') ?>"><i class="fa fa-group"></i> Create Group</a></li>
          </ul>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-tasks"></i> <span>Sales Order</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="active"><a href="<?php echo base_url('salesorder'); ?>"><i class="fa fa-tags"></i> View Sales Order</a></li>
            <li class="active"><a href="<?php echo base_url('salesorder/new'); ?>"><i class="fa fa-plus"></i> Create New Sales Order</a></li>
          </ul>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-tasks"></i> <span>Raw Materials</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="active"><a href="<?php echo base_url('RawMaterials'); ?>"><i class="fa fa-tags"></i> List of Raw Mat</a></li>
            <li class="active"><a href="<?php echo base_url('RawMaterials/additional'); ?>"><i class="fa fa-plus"></i> Create New Raw Mat</a></li>
          </ul>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-shopping-cart"></i> <span>Products</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="active"><a href="<?php echo base_url('Products'); ?>"><i class="fa fa-cart-arrow-down"></i> List of Products</a></li>
            <li class="active"><a href="<?php echo base_url('Products/additional'); ?>"><i class="fa fa-cart-plus"></i> Create New Products</a></li>
          </ul>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-fax"></i> <span>Contacts</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="active"><a href="<?php echo base_url('Contact'); ?>"><i class="fa fa-file-archive-o"></i> List of Contacts</a></li>
            <li class="active"><a href="<?php echo base_url('Contact/add'); ?>"><i class="fa fa-plus-square"></i> Create New Contact</a></li>
          </ul>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-user-secret"></i> <span>Employee</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="active"><a href="<?php echo base_url('Employee/emp_list'); ?>"><i class="fa fa-file-archive-o"></i> List of Employees</a></li>
            <li class="active"><a href="<?php echo base_url('Employee'); ?>"><i class="fa fa-user-plus"></i> Create New Employee</a></li>
          </ul>
        </li>
         <li class="treeview">
          <a href="#">
            <i class="fa fa-money"></i> <span>Price Lists</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="active"><a href="<?php echo base_url('pricelist/cplist'); ?>"><i class="fa fa-file-archive-o"></i> Customer Price List</a></li>
            <li class="active"><a href="<?php echo base_url('pricelist/splist'); ?>"><i class="fa fa-file-archive-o"></i> Supplier Price List</a></li>
          </ul>
        </li>
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>
	<!-- Content Wrapper. Contains page content -->
	<div class="content-wrapper">
		<!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <?= (isset($title)) ? $title : ' '; ?>
        <small>Control panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active"><?= ($bcrumbs != '') ? $bcrumbs : 'Dashboard'; ?></li>
      </ol>
    </section>
    <!-- Main content -->
    <section class="content">
      <div id="loader"></div>
<?php
	}
?>


