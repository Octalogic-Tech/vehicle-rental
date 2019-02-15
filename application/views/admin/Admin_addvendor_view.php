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
         <button id="addbtn" type="button" class="btn btn-success btn-md" data-toggle="modal" data-target="#myModal">Add Vendor</button><br><br>

          <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Add Vendor</h4>
        </div>
        <div class="modal-body">
                    <div class="box box-success">
            <div class="box-header with-border">
              <h3 class="box-title">Enter Vendor Details Here</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form id="addVendor" role="form">
              <div class="box-body">
                <div class="form-group">
                  <label>First Name</label>
                  <input id="vendor_fname" type="text" class="form-control" placeholder="Enter Name" required>
                </div>
                <div class="form-group">
                  <label>Second Name</label>
                  <input id="vendor_sname" type="text" class="form-control" placeholder="Enter Name" required>
                </div>
                <div class="form-group">
                  <label>Address</label>
                  <input id="vendor_address" type="text" class="form-control" placeholder="Enter Number" required>
                </div>
                <div class="form-group">
                  <label>Contact Number</label>
                  <input id="vendor_number" type="text" class="form-control" placeholder="Enter Number"
                  pattern="[0-9]{7,10}" title="Enter Valid Contact Number of 7 or 10 Digit" required>
                </div>
                <div class="form-group">
                  <label>Product</label>
                  <select class="form-control" id="locality_id" required>
                    <?php 
                    foreach ($localityArray as $value) {
                    ?>
                    <option value="<?php echo $value->id ?>"><?php echo $value->place; ?></option>
                    <?php
                    } 
                    ?>
                  </select>
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Email address / Username</label>
                  <input id="vendor_email" type="email" class="form-control" placeholder="Enter Vaild Email" required>
                </div>
                <div class="form-group">
                  <label>Latitude</label>
                  <input id="vendor_latitude" type="text" class="form-control" placeholder="Enter Number"
                  pattern="[0-9]{7,10}" title="Enter Valid Contact Number of 7 or 10 Digit" required>
                </div>
                <div class="form-group">
                  <label>Longitude</label>
                  <input id="vendor_longitude" type="text" class="form-control" placeholder="Enter Number"
                  pattern="[0-9]{7,10}" title="Enter Valid Contact Number of 7 or 10 Digit" required>
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Password</label>
                  <input id="vendor_password" type="password" class="form-control" i name="password" placeholder="Password" required="true" minlength="6">
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Confirm Password</label>
                  <input type="password" class="form-control" id="confirm_password" name="confirm_password" placeholder=" Retype Password" required="true">
                </div>
                <span id='message'></span>
          
    
              </div>
              <!-- /.box-body -->

              <div class="box-footer">
                <button id="addBtn" type="submit" class="btn btn-success" disabled>Add</button>
              </div>
            </form>
          </div>
        </div>
        <div class="modal-footer">
          <button  type="button" class="btn btn-default" data-dismiss="modal">Close</button>
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
          <h4 class="modal-title">Update Distributor</h4>
        </div>
        <div class="modal-body">
                    <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Enter Details Here</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form id="updateDistributor" role="form">
              <div class="box-body">
                <div class="form-group">
                  <input type="hidden" id="id" placeholder="id" name="id">
                  <label>Distributor Name</label>
                  <input id="dist_name1" type="text" class="form-control" placeholder="Enter New Name" required>
                </div>
                <div class="form-group">
                  <label>Address</label>
                  <input id="dist_address1" type="text" class="form-control" placeholder="Enter New Number" required>
                </div>
                <div class="form-group">
                  <label>Contact Number</label>
                  <input id="dist_number1" type="text" class="form-control" placeholder="Enter  New Number" pattern="[0-9]{10,10}" title="Enter Valid Contact Number of 10 Digit" required>
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Email address / Username</label>
                  <input id="dist_email1" type="email" class="form-control" id="exampleInputEmail1" placeholder="Enter Valid Email" required>
                </div>
      
          
    
              </div>
              <!-- /.box-body -->

              <div class="box-footer">
                <button type="submit" class="btn btn-primary">Update</button>
              </div>
            </form>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>
      <!-- Small boxes (Stat box) -->
         <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              
            </div>
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
         <th>DELETE</th>
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
          <td class="<?php echo $value->id; ?>"><button id="<?php echo $value->id; ?>" type="button" class="btn btn-danger">Delete</button></td>
          <!--<td><a href="<?php// echo base_url('/update'); ?>" >Change</a></td>-->
        </tr>  
  <?php } ?>
</tbody>
      </table>
    </div>
 
    <!-- /.content -->
  </div>
</div></div>
   </section>
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
 <script type="text/javascript">
    $(document).ready(function(){


  if((location.pathname=="/vehicle-rental/Display_vendor")||(location.pathname=="/vehicle-rental/"))
    {
      $("#l4").addClass("active");
    }

        var table1 = $('#tablevendor').DataTable({
        
        responsive: true
    });


        $('#vendor_password, #confirm_password').on('keyup', function () {

      if(($('#vendor_password').val() =="")||($('#confirm_password').val() ==""))
      {
        $('#message').html('Password Cannot be Empty').css('color', 'red');
        $('#addBtn').attr('disabled','True');
      }
 
      else if ($('#vendor_password').val() == $('#confirm_password').val()) 
      {
         $('#message').html('Password Matching').css('color', 'green');
         $('#addBtn').removeAttr('disabled');
      }

      else 
      {
        $('#message').html('Password Not Matching').css('color', 'red');
        $('#addBtn').attr('disabled','True');
      }
      
    });
    /*  $('button').click(function(){
        var id=this.id;
       
        $.ajax({
          method: 'POST',
          data:{id:id},
          url:"<?php// echo base_url('/update'); ?>",
          success:function(data){
            var x='.'+id;
            $(x).prev().html (data);
            
          
            
          }

        });

      });*/



      $("#addVendor").submit(function() {
            var vfname = $('#vendor_fname').val();
            var vsname = $('#vendor_sname').val();
            var vaddress = $('#vendor_address').val();
            var vnumber = $('#vendor_number').val();
            var vlatitude = $('#vendor_latitude').val();
            var vlongitude = $('#vendor_longitude').val();
            var vemail = $('#vendor_email').val();
            var vpassword =$('#vendor_password').val();
            var vlocality =$('#locality_id').val();
            
            //alert(brandname);
            $.ajax({
                method: 'POST',
                data: {
                    'vfname': vfname,
                    'vsname': vsname,
                    'vaddress': vaddress,
                    'vnumber': vnumber,
                    'vlatitude': vlatitude,
                    'vlongitude': vlongitude,
                    'vemail': vemail,
                    'vpassword':vpassword,
                    'vlocality':vlocality
                },
                url: "<?php echo base_url('/Add_vendor'); ?>",
                success: function(data) {

                    
                    $("#myModal").modal("toggle");
                    alert(data);
                    var obj = JSON.parse(data);
                    if(obj.flag==true){

                    //alert("Success");
                    //alert("Distributor Name: " + obj.id + ". Added Successfully");
                   swal("Success!", "Distributor "+obj.name+" was Successfully Added!", "success");
                   

                    
                    var oname=obj.name;
                    var ocontact=obj.contact;
                    var oaddress=obj.address;
                    var oemail=obj.email_id;


                    var deletebtn = '<button id="' + obj.id + '" type="button" class="btn btn-danger" onclick="ConfirmDeleteDistributor(' + obj.id + ')">Delete</buttton>';
                    var updatebtn ='<button id="'+obj.id+'" type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal2" onclick=" Launch_updatemodal('+obj.id+')">Update</buttton>';

                    var row= table1.row.add([oname, ocontact,oaddress,oemail, deletebtn, updatebtn]).draw().node();
                     $(row).attr("id", "t"+obj.id);
                  
                      $(row).find('td').eq(0).attr('id', "n"+obj.id);
                      $(row).find('td').eq(1).attr('id', "c"+obj.id);
                      $(row).find('td').eq(2).attr('id', "a"+obj.id);
                      $(row).find('td').eq(3).attr('id', "e"+obj.id);
                      $(row).find('td').eq(4).attr('class', +obj.id);
                      $(row).find('td').eq(5).attr('class', +obj.id);
                    }
                    else{
                      swal("Oops!", "Something went wrong. Distributor was not added, Try Again!", "error");

                    }

                }
            });

            return false;
        });

    });
    </script>
</body>
  
</html>
