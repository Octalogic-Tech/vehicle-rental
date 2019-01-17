<!DOCTYPE html>
<html>
  <head>  
     <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">

     <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Admin Add Brand</title>
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

    <?php $this->view('admin/Admin_style'); ?>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
    <title>Admin Add Brand</title>
     <?php $this->view('admin/Admin_script'); ?>
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

         <button id="addbtn" type="button" class="btn btn-success btn-md" data-toggle="modal" data-target="#myModal" onclick="Launch_insertmodal()">Add Brand</button>

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
            <button type="submit">ADD</button>
          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>

  <div class="modal fade" id="myModal2" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">UPDATE BRAND</h4>
        </div>
        <div class="modal-body">
          <form id="Upbrand" class="form-inline">
            <input type="hidden" id="id" placeholder="id" name="id">
            <label for="brandname">Brand Name:</label>
            <input type="text" id="brandname1" placeholder="Enter New Brand Name" name="brandname">
            <?php echo form_error("brandname"); ?>
          
            <button type="submit" >UPDATE</button>
          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>

        <table id="tablebrand" class="table table-hover">
          <thead>
        <tr>
         <th id="id"  >ID</th>
         <th  id="brand_name" >BRAND NAME</th>
         <th id="delete" >DELETE</th>
         <th id="update" >UPDATE</th>
        <!-- <th>STATUS</th>-->
        </tr>
      </thead>
      <tbody>
        <?php
        foreach ($userArray as $value) { ?>
         <tr id="<?php echo "t";echo $value->id; ?>">
            <td id="<?php echo "id";echo $value->id; ?>"><?php echo $value->id; ?></td>

            <td id="<?php echo "n";echo $value->id; ?>"><?php echo $value->name; ?></td>

            <td  class="<?php echo $value->id; ?>"><button id="<?php echo $value->id; ?>" type="button" class="btn btn-danger" onclick="Deletebrand('<?php echo $value->id; ?>')">Delete</button></td>

            <td " class="<?php echo $value->id; ?>"><button id="<?php echo $value->id; ?>" type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal2" onclick=" Launch_updatemodal('<?php echo $value->id; ?>')">Update</button></td>
         <!-- <td><?php //echo $value->status; ?></td>--> 
          <!--<td><a href="<?php// echo base_url('/update'); ?>" >Change</a></td>-->
        </tr>  
        <?php } ?>
      </tbody>
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


  function Launch_insertmodal(){


             $(".modal-body #brandname").val(null);
            
          }

  function Launch_updatemodal(id){


            var a="#n"+id;
            var nam=$(a).text();
            //var nam1=$('#id').text();
            //$(".modal-body #brandname").val( id );
            $(".modal-body #id").val( id );
            $(".modal-body #brandname1").val( nam );
         // $('#addBookDialog').modal('show');
            
          }
          function toggleAlert(){
    $(".alert").toggleClass('in out'); 
    return false; // Keep close.bs.alert event from removing from DOM
}


      
  

  $(document).ready(function(){

   $('#tablebrand').DataTable();

    $("#addbrand").submit(function(){
      var brandname = $('#brandname').val();
      //alert(brandname);
       $.ajax({
          method:'POST',
          data:{'brandname':brandname},
          url:"<?php echo base_url('/insert_brand'); ?>",
          success:function(data){
            
           // $(x).prev().html (data);
          // $("#myModal").modal("hide");
            var obj=JSON.parse(data);
           alert("Brand Name: "+obj.name+ ". Added Successfully");
           /*var idr="t"+obj.id;
            var idi="id"+obj.id;
            var idn="n"+obj.id;
            var markup = '<tr id="'+idr+'"><td id="'+idi+'">'+obj.id+'</td><td id="'+idn+'">'+obj.name+'</td><td class="'+obj.id+'"><button id="'+obj.id+'" type="button" class="btn btn-danger" onclick="Deletebrand('+obj.id+')">Delete</buttton></td><td class="'+obj.id+'"><button id="'+obj.id+'" type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal2" onclick=" Launch_updatemodal('+obj.id+')">Update</buttton></td></tr>';

             $('#tablebrand tbody').append(markup);*/
             var iq=obj.id;
             var table1 = $('#tablebrand').DataTable();
 
/*table1.row.add( {
        "id":       "T",
        "brand_name":   "System Architect",
        "delete":     "$3,120",
        "update": "2011/04/25",
    } ).draw();*/
         table1.row.add(['asdsa34id', 'asdsa34id', 'asdsa34id', 'asdsa34id']);
 

          }
        });


      return false;
    }); 


//-------------------------------------- UPDATE BRAND------------------------------->

$("#Upbrand").submit(function(){ 
      var id=$('#id').val();
      var brandname = $('#brandname1').val();
    //  alert(haha);
       $.ajax({
          method:'POST',
          data:{'id':id,'brandname':brandname},
          url:"<?php echo base_url('/Change_brandname'); ?>",
          success:function(data){
            var obj=JSON.parse(data);
            $("#myModal2").modal("toggle");
            alert("Update Successful");
            var idn="#n"+obj.id;
            var n=obj.name;
            $(idn).html(n);
            toggleAlert("Update Successful");
            //alert(data);
            
          }
        });


       return false;
    }); 



  });







  </script>
 

</html>





