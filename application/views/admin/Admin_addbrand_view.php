<!DOCTYPE html>
<html>
  <head>  
    <?php $this->view('admin/Admin_style'); ?>
    <title>Admin Add Brand</title>
  </head>

  <body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">
      <?php $this->view('admin/Admin_header'); ?>
      <?php $this->view('admin/Admin_sidebar'); ?>
      <div class="content-wrapper">

      <section class="content-header">
        <h1>
          Brand Details
          <small>Control panel</small>
        </h1>

         <form id="addbrand" class="form-inline">
            <label for="brandname">Brand Name:</label>
            <input type="text" id="brandname" placeholder="Enter Brand Name" name="brandname">
            <?php echo form_error("brandname"); ?>
            <button type="submit">Submit</button>
          </form>

        <table id="tablebrand" class="table table-hover">
        <tr>
         <th>ID</th>
         <th>BRAND NAME</th>
         <th>DELETE</th>
        <!-- <th>STATUS</th>-->
        </tr>
        <?php
        foreach ($userArray as $value) { ?>
         <tr id="<?php echo "t";echo $value->id; ?>">
            <td><?php echo $value->id; ?></td>
            <td><?php echo $value->name; ?></td>
            <td class="<?php echo $value->id; ?>"><button id="<?php echo $value->id; ?>" type="button" onclick="clickfn('<?php echo $value->id; ?>')">Delete</button></td>
         <!-- <td><?php //echo $value->status; ?></td>--> 
          <!--<td><a href="<?php// echo base_url('/update'); ?>" >Change</a></td>-->
        </tr>  
        <?php } ?>
        </table>

        </section>
      </div>
    <?php $this->view('admin/Admin_footer'); ?>
    <div class="control-sidebar-bg"></div>
    <?php $this->view('admin/Admin_script'); ?>
    </div>
  </body>
  <script type="text/javascript">
  
  function clickfn(id){
    $.ajax({
          method: 'POST',
          data:{id:id},
          url:"<?php echo base_url('/Change_brandstatus'); ?>",
          success:function(data){
            var x="#t"+id;
           // $(x).prev().html (data);
           alert("Delete Successful");
            $(x).remove();

          }
        });
      
  }
  $(document).ready(function(){

    $("#addbrand").submit(function(){
      var brandname = $('#brandname').val();
      //alert(brandname);
       $.ajax({
          method:'POST',
          data:{'brandname':brandname},
          url:"<?php echo base_url('/insert_brand'); ?>",
          success:function(data){
            
           // $(x).prev().html (data);
           alert(data);
           

          }
        });


       return false;
    }); 
  });

  </script>
 

</html>





