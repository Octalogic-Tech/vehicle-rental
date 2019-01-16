<!DOCTYPE html>
<html>
<head>  
  <?php $this->view('admin/Admin_style'); ?>
<title></title>
</head>

<body class="hold-transition skin-blue sidebar-mini">
  <?php $this->view('admin/Admin_header'); ?>
  <?php $this->view('admin/Admin_sidebar'); ?>

  <div class="content-wrapper">
      <section class="content-header">
          <h1>
            Add Brand
            <small>Control panel</small>
          </h1>
  
    <form method="post" class="form-inline" action="<?php echo base_url('Mycontroller/insert_brand');?>">
  <label for="brandname">Brand Name:</label>
  <input type="text" id="brandname" placeholder="Enter Brand Name" name="brandname">
  <?php echo form_error("brandname"); ?>
  
  <button type="submit">Submit</button>
</form>
      </section>
  </div>

  <?php $this->view('admin/Admin_footer'); ?>

</body>

  <?php $this->view('admin/Admin_script'); ?>

</html>





