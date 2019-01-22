<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Admin Add Vendor</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <?php $this->view('admin/Admin_style'); ?>
  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

   <?php $this->view('admin/Admin_header'); ?>

  <?php $this->view('admin/Admin_sidebar'); ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Add Vendor
        <small>Control panel</small>
      </h1>
 
    </section>

    <!-- Main content -->
    <section class="content">
         <button id="addbtn" type="button" class="btn btn-success btn-md" data-toggle="modal" data-target="#myModal" onclick="Launch_insertmodal()">Add Vendor</button><br><br>
      <!-- Small boxes (Stat box) -->
       <div class="box-body">
       <table  id="tablevendor" class="table table-hover">
        <thead>
        <tr>
         <th>ID</th>
         <th>ID LOGIN</th>
         <th>FIRSTNAME</th>
         <th>LASTNAME</th>
         <th>CONTACT</th>
         <th>ADDRESS</th>
         <th>ID LOCALITY</th>
         <th>LONGITUDE</th>
         <th>LATITUDE</th>
         <th>STATUS</th>
         <th>CHANGE STATUS</th>
        </tr>
      </thead>



<tbody>
    <?php

      foreach ($userArray as $value) { ?>
        <tr>
          <td><?php echo $value->id; ?></td>
          <td><?php echo $value->id_login; ?></td>
          <td><?php echo $value->firstname; ?></td>
          <td><?php echo $value->lastname;?></td>
          <td><?php echo $value->contact;?></td>
          <td><?php echo $value->address; ?></td>
          <td><?php echo $value->id_locality; ?></td>
          <td><?php echo $value->longitude;?></td>
          <td><?php echo $value->latitude; ?></td>
          <td><?php echo $value->activeStatus; ?></td>
          <td class="<?php echo $value->id; ?>"><button id="<?php echo $value->id; ?>" type="button">Change</button></td>
          <!--<td><a href="<?php// echo base_url('/update'); ?>" >Change</a></td>-->
        </tr>  
  <?php } ?>
</tbody>
      </table>
    </div>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <?php $this->view('admin/Admin_footer'); ?>

  <!-- Control Sidebar -->
  
  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->

<!-- jQuery 3 -->
 <?php $this->view('admin/Admin_script'); ?>
</body>
  <script type="text/javascript">
    $(document).ready(function(){

        var table1 = $('#tablevendor').DataTable({
        
        responsive: true
    });
      $('button').click(function(){
        var id=this.id;
       
        $.ajax({
          method: 'POST',
          data:{id:id},
          url:"<?php echo base_url('/update'); ?>",
          success:function(data){
            var x='.'+id;
            $(x).prev().html (data);
            
          
            
          }

        });

      });

    });
    </script>
</html>
