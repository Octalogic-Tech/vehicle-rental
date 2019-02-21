<!DOCTYPE html>
<html>

<head>
    

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Vendor Add Vehicle</title>
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

    <?php $this->view('admin/Admin_style'); ?>
     <link href="public/lightbox/lightbox.css" rel="stylesheet">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
        <title>Vendor Add Vehicle</title>


</head>

<body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">
        <?php $this->view('admin/Admin_header'); ?>
            <?php $this->view('vendor/Vendor_sidebar'); ?>
                <div class="content-wrapper">

                    <section class="content-header">
                        <h1>
          Your Rental Vehicle Details
          <small>Control panel</small>
        </h1>
                    </section>
                    <section class="content">

                        <button id="addbtn" type="button" class="btn btn-success btn-md" data-toggle="modal" data-target="#myModal" onclick="Launch_insertmodal()">Add Vehicle</button>
                        <br><br>

                        <!-- Modal -->
<div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Add Vehicle</h4>
        </div>
        <div class="modal-body">
                    <div class="box box-success">
            <div class="box-header with-border">
              <h3 class="box-title">Enter Details Here</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form id="addVehicle" role="form">
              <div class="box-body">
                
                <div class="form-group">
                    <label>Select Vehicle</label>
                        <select  id="nameid" name="nameid" class="form-control">
                            <?php
                                foreach ($nameArray as $value) { ?>
                                    <option value="<?php echo $value->vn_id; ?>"><?php echo $value->vehicle_name; ?></option>
                                    <?php } ?>
                        </select>
                </div>
                <div class="form-group">
                    <label>Select Vehicle Color</label>
                        <select  id="colorid" name="colorid" class="form-control">
                            <?php
                                foreach ($colorArray as $value) { ?>
                                    <option value="<?php echo $value->c_id; ?>"><?php echo $value->colorName; ?></option>
                                    <?php } ?>
                        </select>
                </div>

                <div class="form-group">
                  <label for="exampleInputFile">File input</label>
                  <input type="file" name="image_file" id="image_file" required>
                  <p class="help-block">Add Single Image</p>
                </div>
    

                <div class="form-group">
                  <label>Rate per Day</label>
                  <input id="rate" name="rate" type="text" class="form-control" placeholder="Enter Rate" required>
                </div>

          
    
              </div>
              <!-- /.box-body -->

              <div class="box-footer">
                <button id="addBtn" type="submit" class="btn btn-success">Add</button>
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
          <h4 class="modal-title">Update Vehicle</h4>
        </div>
        <div class="modal-body">
                    <div class="box box-success">
            <div class="box-header with-border">
              <h3 class="box-title">Enter Details Here</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form id="updateVehicle" role="form">
              <div class="box-body">
                
                <div class="form-group">
                    <input type="hidden" id="id" placeholder="id" name="id">
                    <label>Select Vehicle</label>
                        <select  id="nameid1" name="nameid1" class="form-control">
                            <?php
                                foreach ($nameArray as $value) { ?>
                                    <option value="<?php echo $value->vn_id; ?>"><?php echo $value->vehicle_name; ?></option>
                                    <?php } ?>
                        </select>
                </div>
                <div class="form-group">
                    <label>Select Vehicle Color</label>
                        <select  id="colorid1" name="colorid1" class="form-control">
                            <?php
                                foreach ($colorArray as $value) { ?>
                                    <option value="<?php echo $value->c_id; ?>"><?php echo $value->colorName; ?></option>
                                    <?php } ?>
                        </select>
                </div>

                <!--<div class="form-group">
                  <label for="exampleInputFile">File input</label>
                  <input type="file" name="image_file" id="image_file" required>
                  <p class="help-block">Add Single Image</p>
                </div>-->
    

                <div class="form-group">
                  <label>Rate per Day</label>
                  <input id="rate1" name="rate1" type="text" class="form-control" placeholder="Enter Rate" required>
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
          <button  type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>
                        

     <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              
            </div>

  
            <div class="box-body">

                        <table id="tablevehicle" class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>VEHCILE NAME</th>
                                    <th>COLOR</th>
                                    <th>IMAGE</th>
                                    <th>RATE PER DAY</th>
                                    <th>DELETE</th>
                                    <th>UPDATE</th>
                                    <!-- <th>STATUS</th>-->
                                </tr>
                            </thead>
                            <tbody>

                                 <?php
        foreach ($vehicleArray as $value) { ?>
                                    <tr id="<?php echo "t";echo $value->vehicle_id; ?>">
                                        <td id="<?php echo "id";echo $value->vehicle_id; ?>">
                                            <?php echo $value->vehicle_id; ?>
                                        </td>

                                        <td id="<?php echo "vn";echo $value->vehicle_id; ?>">
                                            <?php echo $value->vehicle_name; ?>
                                        </td>
                                        <td id="<?php echo "vc";echo $value->vehicle_id; ?>">
                                            <?php echo $value->colorName; ?>
                                        </td>
                                        <td id="<?php echo "i";echo $value->vehicle_id; ?>">
                                          <a class="example-image-link" href="<?php echo base_url();echo $value->image; ?>" data-lightbox="example-1">
                                            <i class="glyphicon glyphicon-picture example-image" alt="image-1"></i> </a>
                                          <!--<img src="<?php// echo base_url();echo $value->image; ?>"/>-->
                                        </td>

                                        <td id="<?php echo "r";echo $value->vehicle_id; ?>">
                                            <?php echo $value->rate; ?>
                                        </td>



                                        <td class="<?php echo $value->vehicle_id; ?>">
                                            <button id="<?php echo $value->vehicle_id; ?>" type="button" class="btn btn-danger" onclick="DeleteVehicle('<?php echo $value->vehicle_id; ?>')">Delete</button>
                                        </td>

                                        <td class="<?php echo $value->vehicle_id; ?>">
                                            <button id="<?php echo $value->vehicle_id; ?>" type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal2" onclick=" Launch_updatemodal('<?php echo $value->vehicle_id; ?>')">Update</button>
                                        </td>
                                    </tr>
                                    <?php } ?>
                               
                            </tbody>
                        </table>
                </div>
            <!-- /.box-body -->

        </div></div></div>

                    </section>
                </div>
                <?php $this->view('admin/Admin_footer'); ?>
                    <div class="control-sidebar-bg"></div>

    </div>
    <?php $this->view('admin/Admin_script'); ?>
    <script src="public/lightbox/lightbox.js"></script>
    <script type="text/javascript">

        function DeleteVehicle(id){
          var id1=id;
          swal({
          title: "Are you sure?",
          text: "Once deleted, you will not be able to recover this Product!",
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
            AjaxDelete(id1);
          } else {
            swal("Product was not Deleted!");
          }
        });
}

  function AjaxDelete(id) {
        $.ajax({
            method: 'POST',
            data: {
                id: id
            },
            url: "<?php echo base_url('/Change_Vehiclestatus'); ?>",
            success: function(data) {
                var x = "#t" + id;
                // $(x).prev().html (data);


                var table = $('#tablevehicle').DataTable();
                table
                .row( $(x))
                .remove()
                .draw();
                swal("Delete Successful!", "Product was Deleted Successfully", "success");

                }
              });

    }

    function Launch_insertmodal(){

        $(".modal-body #rate").val(null);
        $(".modal-body #image_file").val(null);
            
    }
    function Launch_updatemodal(id){
        var vn="#vn"+id;
        var vc="#vc"+id;
        var r="#r"+id;

        var index=null;
        var index1=null;

        var vehicle_name1 = $(vn).text().replace(/\s+/g,' ').trim();
        var vehicle_color1 = $(vc).text().replace(/\s+/g,' ').trim();
        var vehicle_rate1 = $(r).text().replace(/\s+/g,' ').trim();

        //alert(v_locality);

        $(".modal-body #id").val(id);

        
      
        <?php 
          foreach ($nameArray as $value) {
                  ?>
                 if(vehicle_name1=='<?php echo $value->vehicle_name; ?>'){
                    index= <?php echo $value->vn_id; ?>; 
                 }
                    <?php
                    } 
                    ?>
        $(".modal-body #nameid1").val(index);

        <?php 
          foreach ($colorArray as $value) {
                  ?>
                 if(vehicle_color1=='<?php echo $value->colorName; ?>'){
                    index1= <?php echo $value->c_id; ?>; 
                 }
                    <?php
                    } 
                    ?>
        $(".modal-body #colorid1").val(index1);

        $(".modal-body #rate1").val(vehicle_rate1);
    }

    
    $(document).ready(function() {


        if(location.pathname=="/vehicle-rental/Display_addvehicle")
        {
            $("#l2").addClass("active");
        }

        var table1 = $('#tablevehicle').DataTable({
            responsive: true
        });

    $('#addVehicle').on('submit',function(e){

      e.preventDefault();
      if($('#image_file').val()=='')
      {
        alert("Select the file");
      }
      else
      {
        $.ajax({
          url: "<?php echo base_url('/Add_Vehicle'); ?>",
          method:"POST",
          data:new FormData(this),
          contentType:false,
          cache: false,
          processData:false,
          success:function(data)
          {


            $("#myModal").modal("toggle");

                    var obj = JSON.parse(data);
                    if(obj.flag==true){

                    //alert("Success");
                    //alert("Distributor Name: " + obj.id + ". Added Successfully");
                   swal("Success!", "Vehicle "+obj.vehicle_name+" was Successfully Added!", "success");
                   

                    var oid=obj.vehicle_id;
                    var oname=obj.vehicle_name;
                    var ocolor=obj.colorName;
                    var oimage='<a class="example-image-link" href="'+obj.image+'" data-lightbox="example-1"><i class="glyphicon glyphicon-picture example-image" alt="image-1"></i> </a>';
                     var orate=obj.rate;


                    var deletebtn = '<button id="' + obj.vehicle_id + '" type="button" class="btn btn-danger" onclick="DeleteVehicle(' + obj.vehicle_id + ')">Delete</buttton>';
                    var updatebtn ='<button id="'+obj.vehicle_id+'" type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal2" onclick=" Launch_updatemodal('+obj.vehicle_id+')">Update</buttton>';

                    var row= table1.row.add([oid, oname, ocolor,oimage, orate, deletebtn, updatebtn]).draw().node();
                     $(row).attr("id", "t"+obj.vehicle_id);
                  
                      $(row).find('td').eq(0).attr('id', "id"+obj.vehicle_id);
                      $(row).find('td').eq(1).attr('id', "vn"+obj.vehicle_id);
                      $(row).find('td').eq(2).attr('id', "vc"+obj.vehicle_id);
                      $(row).find('td').eq(3).attr('id', "i"+obj.vehicle_id);
                      $(row).find('td').eq(4).attr('id', "r"+obj.vehicle_id);
                      $(row).find('td').eq(5).attr('class', +obj.vehicle_id);
                      $(row).find('td').eq(6).attr('class', +obj.vehicle_id);
                    }
                    else{
                      swal("Oops!", "Something went wrong. Distributor was not added, Try Again!", "error");

                    }    
                      
                }
    
                });
            }
        });


    $("#updateVehicle").submit(function() {

            $.ajax({
                method: 'POST',
                data: new FormData(this),
                     contentType:false,
                     cache: false,
                     processData:false,
                
                url: "<?php echo base_url('/Update_vehicle'); ?>",
                success: function(data) {
                    var obj = JSON.parse(data);
                    $("#myModal2").modal("toggle");
                   //alert("Distributor Id: " + obj.id + ". Updated Successfully");
                   //here id of TD are generated accordingly
                    var idvn = "#vn"+obj.id;
                    var idvc = "#vc"+obj.id;
                    var idr = "#r"+obj.id;
                    alert(obj.vehicle_name)
                    var n = obj.vehicle_name;
                    var c = obj.colorName;
                    var r = obj.rate;
                    

                    //values in TD are set updated values
                    $(idvn).html(n);
                    $(idvc).html(c);
                    $(idr).html(r);
                    swal("Update Successful!", "Product was Updated Successfully", "success");
                    //toggleAlert("Update Successful");

                }
            });

            return false;
        });
    });
   
</script>
</body>


</html>