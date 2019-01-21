
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
        
        <li class="treeview">
          <a href="#">
            <i class="fa fa-files-o"></i>
            <span>Vendor Details</span>
            <span class="pull-right-container">
              <span class="label label-primary pull-right">2</span>
              <i class="fa fa-angle-left pull-right"></i>
            </span>

          </a>
          <ul class="treeview-menu">
            <li><a href="pages/layout/top-nav.html"><i class="fa fa-circle-o"></i> Add Vendors</a></li>
            <li><a href="pages/layout/boxed.html"><i class="fa fa-circle-o"></i> View Vendors</a></li>
          </ul>
        </li>
        <li>
          <a href="pages/widgets.html">
            <i class="fa fa-th"></i> <span>View Vehicle Details</span>
            
          </a>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-pie-chart"></i>
            <span>Add Vehicle Details</span>
            <span class="pull-right-container">
              <span class="pull-right-container">
              <span class="label label-primary pull-right">4</span>
            </span>
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?php echo base_url('/Display_vehiclebrand'); ?>"><i class="fa fa-circle-o"></i> Vehicle Brands</a></li>
             <li><a href="<?php echo base_url('/Display_vehiclecategory'); ?>"><i class="fa fa-circle-o"></i> Vehicle Categories</a></li>
            <li><a href="<?php echo base_url('/Display_vehicletype'); ?>"><i class="fa fa-circle-o"></i> Vehicle Type </a></li>     
            <li><a href="<?php echo base_url('/Display_vehiclename'); ?>"><i class="fa fa-circle-o"></i> Vehicle Name</a></li>
          </ul>
        </li>

        <li class="header">LABELS</li>
        <li><a href="#"><i class="fa fa-circle-o text-aqua"></i> <span>Information</span></a></li>
        <li><a href="#"><i class="fa fa-circle-o text-red"></i> <span>Log Out</span></a></li>
      </ul>
    </section>
  </aside>
