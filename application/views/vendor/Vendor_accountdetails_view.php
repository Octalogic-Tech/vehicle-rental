<!DOCTYPE html>
<html>

<head>
    

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Vendor Add Vehicle</title>
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

    <?php $this->view('admin/Admin_style'); ?>
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
          Your Profile Details
          <small>Control panel</small>
        </h1>
                    </section>
                    <section class="content">

                        <button id="addbtn" type="button" class="btn btn-success btn-md" data-toggle="modal" data-target="#myModal" onclick="Launch_insertmodal()">Add Brand</button>
                        <br><br>

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
                                          
                                                <button type="submit">UPDATE</button>
                                        </form>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
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

                        <table id="tableaccount" class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th id="id">ID</th>
                                    <th id="brand_name">BRAND NAME</th>
                                    <th id="delete">DELETE</th>
                                    <th id="update">UPDATE</th>
                                    <!-- <th>STATUS</th>-->
                                </tr>
                            </thead>
                            <tbody>
                               
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
    <script type="text/javascript">

    $(document).ready(function() {

        if(location.pathname=="/vehicle-rental/Display_accountdetails")
        {
            $("#l3").addClass("active");
     
        }
        var table1 = $('#tableaccount').DataTable({
        
        responsive: true
    });
    });
   
</script>
</body>


</html>