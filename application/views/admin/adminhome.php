<!DOCTYPE html>
<html>
<head>	
	<?php $this->view('admin/style'); ?>
<title></title>
</head>

<body class="hold-transition skin-blue sidebar-mini">
	<?php $this->view('admin/header'); ?>
	<?php $this->view('admin/sidebar'); ?>

	<div class="content-wrapper">
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
  </div>

	<?php $this->view('admin/footer'); ?>

</body>

	<?php $this->view('admin/script'); ?>

</html>





