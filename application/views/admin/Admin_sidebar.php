
<aside class="main-sidebar">
    <section class="sidebar">
      <div class="user-panel">
        <div class="pull-left image">
          <img src="public/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p>Alexander Pierce</p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
     
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MAIN NAVIGATION</li>
        <li  id="l5">
          <a href="<?php echo base_url('/Display_booking'); ?>">
            <i class="glyphicon glyphicon-user"></i> <span>Booking Details</span>
            
          </a>
        </li>

        <li  id="l4">
          <a href="<?php echo base_url('/Display_vendor'); ?>">
            <i class="glyphicon glyphicon-user"></i> <span>Vendor Details</span>
            
          </a>
        </li>
        

        
        <li id="l1" class="treeview">
          <a href="#">
            <i class="fa fa-pie-chart"></i>
            <span>Add Vehicle Details</span>
            <span class="pull-right-container">
              <span class="pull-right-container">
              <span class="label label-primary pull-right">5</span>
            </span>
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li id="l11"><a href="<?php echo base_url('/Display_vehiclebrand'); ?>"><i class="fa fa-circle-o"></i> Vehicle Brands</a></li>
             <li id="l12"><a href="<?php echo base_url('/Display_vehiclecategory'); ?>"><i class="fa fa-circle-o"></i> Vehicle Categories</a></li>
            <li id="l13"><a href="<?php echo base_url('/Display_vehicletype'); ?>"><i class="fa fa-circle-o"></i> Vehicle Type </a></li>     
            <li id="l14"><a href="<?php echo base_url('/Display_vehiclename'); ?>"><i class="fa fa-circle-o"></i> Vehicle Name</a></li>
            <li id="l15"><a href="<?php echo base_url('/Display_vehiclecolor'); ?>"><i class="fa fa-circle-o"></i> Vehicle Color</a></li>
          </ul>
        </li>
        <li  id="l2">
          <a href="<?php echo base_url('/Display_locality'); ?>">
            <i class="fa fa-th"></i> <span>Add Locality</span>
            
          </a>
        </li>

        <li class="header">LABELS</li>
        <li><a href="#"><i class="fa fa-circle-o text-aqua"></i> <span>Information</span></a></li>
        <li><a href="#"><i class="  glyphicon glyphicon-off text-red"></i> <span>LOG OUT</span></a></li>
      </ul>
    </section>
  </aside>
