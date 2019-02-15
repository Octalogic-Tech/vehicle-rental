<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>AdminLTE 2 | Dashboard</title>
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
  <!-- Left side column. contains the logo and sidebar -->
  <?php $this->view('admin/Admin_sidebar'); ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Dashboard
        <small>Control panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Dashboard</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
   <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              
            </div>
             <div class="box-body">
      <!-- Small boxes (Stat box) -->
       <table  class="table table-bordered table-hover">
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
      </table>
        </div>
    </div>
  </div>
</div>
    </section>
    <!-- /.content -->
  </div>
  </section>
</div>
  <!-- /.content-wrapper -->
  <?php $this->view('admin/Admin_footer'); ?>

  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->

 <?php $this->view('admin/Admin_script'); ?>
   <script type="text/javascript">
    $(document).ready(function(){
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
</body>

</html>
