<!DOCTYPE html>
<html>
  <head>  
     <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Admin Add Brand</title>
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <?php $this->view('admin/Admin_style'); ?>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
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
      </section>
      <section class="content">

         <button id="addbtn" type="button" class="btn btn-success btn-md" data-toggle="modal" data-target="#myModal">Add Brand</button>

  <!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">ADD BRAND</h4>
        </div>
        <div class="modal-body">
          <form id="addbrand" class="form-inline">
            <label for="brandname">Brand Name:</label>
            <input type="text" id="brandname" placeholder="Enter Brand Name" name="brandname">
            <?php echo form_error("brandname"); ?>
            <button type="submit">Submit</button>
          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>

        <table id="tablebrand" class="table table-hover">
        <tr>
         <th>ID</th>
         <th>BRAND NAME</th>
         <th>DELETE</th>
         <th>UPDATE</th>
        <!-- <th>STATUS</th>-->
        </tr>
        <?php
        foreach ($userArray as $value) { ?>
         <tr id="<?php echo "t";echo $value->id; ?>">
            <td><?php echo $value->id; ?></td>

            <td id="<?php echo "n";echo $value->id; ?>"><?php echo $value->name; ?></td>

            <td class="<?php echo $value->id; ?>"><button id="<?php echo $value->id; ?>" type="button" class="btn btn-danger" onclick="Deletebrand('<?php echo $value->id; ?>')">Delete</button></td>

            <td class="<?php echo $value->id; ?>"><button id="<?php echo $value->id; ?>" type="button" class="btn btn-primary" onclick="Updatebrand('<?php echo $value->id; ?>')">Update</button></td>
         <!-- <td><?php //echo $value->status; ?></td>--> 
          <!--<td><a href="<?php// echo base_url('/update'); ?>" >Change</a></td>-->
        </tr>  
        <?php } ?>
        </table>

        </section>
      </div>
    <?php $this->view('admin/Admin_footer'); ?>
    <div class="control-sidebar-bg"></div>
    
    </div>
    <?php $this->view('admin/Admin_script'); ?>
  </body>
  <script type="text/javascript">
  
  function Deletebrand(id){
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
            var obj=JSON.parse(data);
            alert(obj.name);
            var ida="t"+obj.id;
            var markup = '<tr id="'+ida+'"><td>'+obj.id+'</td><td>'+obj.name+'</td><td class="'+obj.id+'"><button id="'+obj.id+'" type="button" onclick="Deletebrand('+obj.id+')">Delete</buttton></td></tr>';

             $('#tablebrand tbody').append(markup);
           

          }
        });


       return false;
    }); 
  });

  </script>
 

</html>





