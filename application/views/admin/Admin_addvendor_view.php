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
         <button id="addbtn" type="button" class="btn btn-success btn-md" data-toggle="modal" data-target="#myModal" onclick="Launch_addmodal()">Add Vendor</button><br><br>

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
                  <label>Locality</label>
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
          <h4 class="modal-title">Update Vendor</h4>
        </div>
        <div class="modal-body">
                    <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Enter Vendor Details Here</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form id="updateVendor" role="form">
              <div class="box-body">
                <div class="form-group">
                  <input type="hidden" id="id" placeholder="id" name="id">
                  <label>First Name</label>
                  <input id="vendor_fname1" type="text" class="form-control" placeholder="Enter Name" required>
                </div>
                <div class="form-group">
                  <label>Last Name</label>
                  <input id="vendor_sname1" type="text" class="form-control" placeholder="Enter Name" required>
                </div>
                <div class="form-group">
                  <label>Address</label>
                  <input id="vendor_address1" type="text" class="form-control" placeholder="Enter Number" required>
                </div>
                <div class="form-group">
                  <label>Contact Number</label>
                  <input id="vendor_number1" type="text" class="form-control" placeholder="Enter Number"
                  pattern="[0-9]{7,10}" title="Enter Valid Contact Number of 7 or 10 Digit" required>
                </div>
                <div class="form-group">
                  <label>Loacality</label>
                  <select class="form-control" id="locality_id1" required>
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
                  <input id="vendor_email1" type="email" class="form-control" placeholder="Enter Vaild Email" required>
                </div>
                <div class="form-group">
                  <label>Latitude</label>
                  <input id="vendor_latitude1" type="text" class="form-control" placeholder="Enter Number"
                  pattern="[0-9]{7,10}" title="Enter Valid Contact Number of 7 or 10 Digit" required>
                </div>
                <div class="form-group">
                  <label>Longitude</label>
                  <input id="vendor_longitude1" type="text" class="form-control" placeholder="Enter Number"
                  pattern="[0-9]{7,10}" title="Enter Valid Contact Number of 7 or 10 Digit" required>
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
         <!--<th>ID LOGIN</th>-->
         <th>FIRSTNAME</th>
         <th>LASTNAME</th>
         <th>CONTACT</th>
         <th>EMAIL</th>
         <th>ADDRESS</th>
         <th>LOCALITY</th>
         <th>LONGITUDE</th>
         <th>LATITUDE</th>
         <!--<th>STATUS</th>-->
         <th>DELETE</th>
         <th>UPDATE</th>
        </tr>
      </thead>



<tbody>
    <?php

      foreach ($userArray as $value) { ?>
        <tr id="<?php echo "t";echo $value->id; ?>">
          <td id="<?php echo "i";echo $value->id; ?>"><?php echo $value->id; ?></td>
          <!--<td><?php //echo $value->id_login; ?></td>-->
          <td id="<?php echo "fn";echo $value->id; ?>"><?php echo $value->firstname; ?></td>
          <td id="<?php echo "ln";echo $value->id; ?>"><?php echo $value->lastname;?></td>
          <td id="<?php echo "c";echo $value->id; ?>"><?php echo $value->contact;?></td>
          <td id="<?php echo "e";echo $value->id; ?>"><?php echo $value->email_id;?></td>
          <td id="<?php echo "a";echo $value->id; ?>"><?php echo $value->address; ?></td>
          <td id="<?php echo "loc";echo $value->id; ?>"><?php echo $value->locality_name; ?></td>
          <td id="<?php echo "lon";echo $value->id; ?>"><?php echo $value->longitude;?></td>
          <td id="<?php echo "lat";echo $value->id; ?>"><?php echo $value->latitude; ?></td>
          <!--<td><?php //echo $value->activeStatus; ?></td>-->
          <td class="<?php echo $value->id; ?>"><button id="<?php echo $value->id; ?>" type="button" class="btn btn-danger" onclick="ConfirmDeleteVendor('<?php echo $value->id; ?>')">Delete</button></td>
          <td class="<?php echo $value->id; ?>"><button id="<?php echo $value->id; ?>" type="button" class="btn btn-primary"data-toggle="modal" data-target="#myModal2" onclick=" Launch_updatemodal('<?php echo $value->id; ?>')">Update</button></td>
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


  function ConfirmDeleteVendor(id){
          var id1=id;
          swal({
          title: "Are you sure?",
          text: "Once deleted, you will not be able to recover this Distributor!",
          icon: "warning",
          buttons: true,
          dangerMode: true,
        })
        .then((willDelete) => {
          if (willDelete) {
            //swal("Poof! Your imaginary file has been deleted!", {
             // icon: "success",
            //});
            swal("Delete Successful!", "Product was Deleted Successfully", {
              icon: "success",
            });
            DeleteVendor(id1);
          } else {
            swal("Distributor was not Deleted!");
          }
        });
}

   function DeleteVendor(id) {
        $.ajax({
            method: 'POST',
            data: {
                id: id
            },
            url: "<?php echo base_url('/Change_Vendorstatus'); ?>",
            success: function(data) {
                var x = "#t" + id;

                var table = $('#tablevendor').DataTable();
                table
                .row( $(x))
                .remove()
                .draw();
                swal("Delete Successful!", "Distributor was Deleted Successfully", "success");

                }
              });

            }

  function toggleAlert() {
        $(".alert").toggleClass('in out');
        return false; // Keep close.bs.alert event from removing from DOM
    }

  function Launch_addmodal(){
        $('#vendor_fname').val(null);
        $('#vendor_sname').val(null);
        $('#vendor_address').val(null);
        $('#vendor_number').val(null);
        $('#vendor_latitude').val(null);
        $('#vendor_longitude').val(null);
        $('#vendor_email').val(null);
        $('#vendor_password').val(null);
        $('#locality_id').val();    
        $('#message').html('').css('color', 'red');
        $('#addBtn').attr('disabled','True');
  }

  function Launch_updatemodal(id){
                      

        var fn="#fn"+id;
        var ln="#ln"+id;
        var c="#c"+id;
        var e="#e"+id;
        var a="#a"+id;
        var l="#loc"+id;
        var lon="#lon"+id;
        var lat="#lat"+id;
        var index=null;

        var v_fname = $(fn).text().replace(/\s+/g,' ').trim();
        var v_lname = $(ln).text().replace(/\s+/g,' ').trim();
        var v_contact = $(c).text().replace(/\s+/g,' ').trim();
        var v_email = $(e).text().replace(/\s+/g,' ').trim();
        var v_address = $(a).text().replace(/\s+/g,' ').trim();
        var v_locality = $(l).text().replace(/\s+/g,' ').trim();
        var v_lon = $(lon).text().replace(/\s+/g,' ').trim();
        var v_lat = $(lat).text().replace(/\s+/g,' ').trim();
        //alert(v_locality);

        $(".modal-body #id").val(id);
        $(".modal-body #vendor_fname1").val(v_fname);
        $(".modal-body #vendor_sname1").val(v_lname);
        $(".modal-body #vendor_address1").val(v_address);
        $(".modal-body #vendor_number1").val(v_contact);
        $(".modal-body #vendor_latitude1").val(v_lat);
        $(".modal-body #vendor_longitude1").val(v_lon);
        $(".modal-body #vendor_email1").val(v_email);
      
        <?php 
          foreach ($localityArray as $value) {
                  ?>
                 if(v_locality=='<?php echo $value->place; ?>'){
                    index= <?php echo $value->id; ?>; 
                 }
                    <?php
                    } 
                    ?>
        $(".modal-body #locality_id1").val(index); 

        

  }
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
                  
                    //alert(data);
                    var obj = JSON.parse(data);
                   // alert(obj);
                    if(obj.flag==true){


                    //alert("Success");
                    //alert("Distributor Name: " + obj.id + ". Added Successfully");
                   swal("Success!", "Distributor "+obj.firstname+" "+obj.lastname+" was Successfully Added!", "success");
                     

                    var oid=obj.id;
                    var ofname=obj.firstname;
                    var olname=obj.lastname;
                    var ocontact=obj.contact;
                    var oaddress=obj.address;
                    var olatitude=obj.latitude;
                    var olongitude=obj.longitude;
                    var oemail=obj.email_id;
                    var olocality=obj.place;


                    var deletebtn = '<button id="' + obj.id + '" type="button" class="btn btn-danger" onclick="ConfirmDeleteVendor(' + obj.id + ')">Delete</buttton>';
                    var updatebtn ='<button id="'+obj.id+'" type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal2" onclick=" Launch_updatemodal('+obj.id+')">Update</buttton>';

                    var row= table1.row.add([oid,ofname,olname, ocontact, oemail, oaddress,olocality,olatitude,olongitude, deletebtn, updatebtn]).draw().node();
                     $(row).attr("id", "t"+obj.id);
                  
                      $(row).find('td').eq(0).attr('id', "i"+obj.id);
                      $(row).find('td').eq(1).attr('id', "fn"+obj.id);
                      $(row).find('td').eq(2).attr('id', "ln"+obj.id);
                      $(row).find('td').eq(3).attr('id', "c"+obj.id);
                      $(row).find('td').eq(4).attr('id', "e"+obj.id);
                      $(row).find('td').eq(5).attr('id', "a"+obj.id);
                      $(row).find('td').eq(6).attr('id', "loc"+obj.id);
                      $(row).find('td').eq(7).attr('id', "lon"+obj.id);
                      $(row).find('td').eq(8).attr('id', "lat"+obj.id);
                      $(row).find('td').eq(9).attr('class', +obj.id);
                      $(row).find('td').eq(10).attr('class', +obj.id);
                    }
                    else{
                      swal("Oops!", "Something went wrong. Distributor was not added, Try Again!", "error");

                    }

                }
            });

            return false;
        });




              $("#updateVendor").submit(function() {
             var id = $('#id').val();

             
             var v_fname1=$("#vendor_fname1").val();
             var v_sname1=$("#vendor_sname1").val();
             alert(v_fname1);
              alert(v_sname1);
             var v_address1=$("#vendor_address1").val();
             var v_number1 = $("#vendor_number1").val();
             var v_latitude1  =   $("#vendor_latitude1").val();
             var v_longitude1 =   $("#vendor_longitude1").val();
             var v_email1  = $("#vendor_email1").val();
             var loc_id1  = $("#locality_id1").val(); 
            //  alert(haha);
            $.ajax({
                method: 'POST',
                data: {
                    'id': id,
                    'vfname1': v_fname1,
                    'vsname1': v_sname1,
                    'vaddress1': v_address1,
                    'vnumber1': v_number1,
                    'vlatitude1':v_latitude1,
                    'vlongitude1':v_longitude1,
                    'vemail1':v_email1,
                    'locid1':loc_id1

                },
                url: "<?php echo base_url('/Update_vendor'); ?>",
                success: function(data) {
                  alert(data);
                    var obj = JSON.parse(data);
                    $("#myModal2").modal("toggle");
                      alert(obj.firstname);
                      var i_id="#i"+obj.id;
                      var fid="#fn"+obj.id;
                      var sid="#ln"+obj.id;
                      var cid="#c"+obj.id;
                      var eid="#e"+obj.id;
                      var aid="#a"+obj.id;
                      var lid="#loc"+obj.id;
                      var lonid="#lon"+obj.id;
                      var latid="#lat"+obj.id;
                    var oid=obj.id;
                    var ofname1=obj.firstname;
                    var olname1=obj.lastname;
                    var ocontact1=obj.contact;
                    var oaddress1=obj.address;
                    var olatitude1=obj.latitude;
                    var olongitude1=obj.longitude;
                    var oemail1=obj.email_id;
                    var olocality1=obj.locality_name;
                    $(i_id).html(oid);
                    $(fid).html(ofname1);
                    $(sid).html(olname1);
                    $(cid).html(ocontact1);
                    $(eid).html(oemail1);
                    $(aid).html(oaddress1);
                    $(lid).html(olocality1);
                    $(lonid).html(olongitude1);
                    $(latid).html(olatitude1);
                    toggleAlert("Update Successful");
                    swal("Update Successful!", "Vendor was Update Successfully", "success");
                    
                    //alert(data);

                }
            });

            return false;
        });

    });
    </script>
</body>
  
</html>
