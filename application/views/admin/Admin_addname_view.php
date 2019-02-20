<!DOCTYPE html>
<html>

<head>
    

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Admin Add Brand</title>
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

    <?php $this->view('admin/Admin_style'); ?>
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
        <title>Admin Add Category</title>


</head>

<body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">
        <?php $this->view('admin/Admin_header'); ?>
            <?php $this->view('admin/Admin_sidebar'); ?>
                <div class="content-wrapper">

                    <section class="content-header">
                        <h1>
          Vehicle Name Details
          <small>Control panel</small>
        </h1>
                    </section>
                    <section class="content">

                        <button id="addbtn" type="button" class="btn btn-success btn-md" data-toggle="modal" data-target="#myModal" onclick="Launch_insertmodal()">Add Name</button>
                        <br><br>

                        <!-- Modal -->
                        <div class="modal fade" id="myModal" role="dialog">
                            <div class="modal-dialog">

                                <!-- Modal content-->
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        <h4 class="modal-title">ADD NAME</h4>
                                    </div>

                                    <div class="modal-body">
                                        <div class="box-body">
                                        <form id="addname" role="form">
                                            <div class="form-group">
                                                <label for="name">NAME:</label>
                                                  <input type="text" id="name" class="form-control" placeholder="Enter NAME" name="name">
                                                </div>
                                                    <div class="form-group">
                                                      <label>Select Vehicle Brand</label>
                                                      <select  id="brandid" class="form-control">
                                                        <?php
                                                          foreach ($brandArray as $value) { ?>
                                                        <option value="<?php echo $value->id; ?>"><?php echo $value->brand_name; ?></option>
                                                      <?php } ?>
                                                      </select>
                                                    </div>

                                                    <div class="form-group">
                                                      <label>Select Vehicle Type</label>
                                                      <select  id="typeid" class="form-control">
                                                        <?php
                                                          foreach ($typeArray as $value) { ?>
                                                        <option value="<?php echo $value->id; ?>"><?php echo $value->type_name; ?></option>
                                                      <?php } ?>
                                                      </select>
                                                    </div>



                                            <button type="submit" class="btn btn-primary">ADD</button>
                                        </form>
                                    </div>
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
                                        <h4 class="modal-title">UPDATE NAME</h4>
                                    </div>
                                    <div class="modal-body">
                                        <form id="Upname" class="form-inline">
                                            <input type="hidden" id="id" placeholder="id" name="id">
                                            <label for="type1">TYPE:</label>
                                            <input type="text" id="name1" placeholder="Enter New Name" name="name1">
                                          
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

                        <table id="tablebrand" class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th id="id">ID</th>
                                    <th id="name">NAME</th>
                                    <th id="bname">BRAND NAME</th>
                                    <th id="category">CATEGORY</th>
                                    <th id="type">TYPE</th>
                                    <th id="delete">DELETE</th>
                                    <th id="update">UPDATE</th>
                                    <!-- <th>STATUS</th>-->
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                              
        foreach ($userArray as $value) { ?>
                                    <tr id="<?php echo "t";echo $value->id; ?>">
                                        <td id="<?php echo "id";echo $value->id; ?>">
                                            <?php echo $value->id; ?>
                                        </td>

                                        <td id="<?php echo "idn";echo $value->id; ?>">
                                            <?php echo $value->name; ?>
                                        </td>

                                        <td id="<?php echo "idb";echo $value->id; ?>">
                                            <?php echo $value->brand_name; ?>
                                        </td>

                                         <td id="<?php echo "idc";echo $value->id; ?>">
                                            <?php echo $value->category_name; ?>
                                        </td>

                                        <td id="<?php echo "idt";echo $value->id; ?>">
                                            <?php echo $value->type_name; ?>
                                        </td>
 
                                        <td class="<?php echo $value->id; ?>">
                                            <button id="<?php echo $value->id; ?>" type="button" class="btn btn-danger" onclick="Deletebrand('<?php echo $value->id; ?>')">Delete</button>
                                        </td>

                                        <td class="<?php echo $value->id; ?>">
                                            <button id="<?php echo $value->id; ?>" type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal2" onclick=" Launch_updatemodal('<?php echo $value->id; ?>')">Update</button>
                                        </td>
                                        <!-- <td><?php //echo $value->status; ?></td>-->
                                        <!--<td><a href="<?php// echo base_url('/update'); ?>" >Change</a></td>-->
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
    <script type="text/javascript">
    function Deletebrand(id) {
        $.ajax({
            method: 'POST',
            data: {
                id: id
            },
            url: "<?php echo base_url('/Change_namestatus'); ?>",
            success: function(data) {
                var x = "#t" + id;;
                alert(id);
                alert("Delete Successful");
                var table = $('#tablebrand').DataTable();
                table .row( $(x)).remove().draw();
         }
                    
         }
        );
}

    function Launch_insertmodal() {

        $(".modal-body #category").val(null);

    }

    function Launch_updatemodal(id) {
        alert(id);
        var a ="#idn"+id;
        alert(a);
        var nam = $(a).text().replace(/\s+/g,' ').trim();;
        alert(nam);
        $(".modal-body #id").val(id);
        $(".modal-body #name1").val(nam);
    }

    function toggleAlert() {
        $(".alert").toggleClass('in out');
        return false; // Keep close.bs.alert event from removing from DOM
    }

    $(document).ready(function() {

     if(location.pathname=="/vehicle-rental/Display_vehiclename")
    {
      $("#l14").addClass("active");
      $("#l1").addClass("active");
    }

        var table1 = $('#tablebrand').DataTable({
        
        responsive: true
    });
          
    $("#addname").submit(function() {
            var name = $('#name').val();
            var brandid = $('#brandid').val();
            var typeid = $('#typeid').val();
            alert(name);
            alert(brandid);
            alert(typeid);

            $.ajax({
                method: 'POST',
                data: {
                    'name': name,
                    'brandid': brandid,
                    'typeid': typeid
                },
                url: "<?php echo base_url('/Insert_name'); ?>",
                success: function(data) {

                     $("#myModal").modal("toggle");
                    
                    alert(data);
                    var obj = JSON.parse(data);
                    alert("Type: " + obj.name + ". Added Successfully");
                    var i="id"+obj.id;
                    var idn="n"+obj.id;
                    var idb="b"+obj.id;
                    var idc="c"+obj.id;
                    var idt="t"+obj.id;
                    var idid = '<td id="'+i+'">'+obj.id+'</td>';
                    var idname='<td id="'+idn+'">'+obj.name+'</td>';
                    var type_name=obj.type_name;
                    var brand_name=obj.brand_name;

                    var category_name=obj.category_name;

                    var deletebtn = '<button id="' + obj.id + '" type="button" class="btn btn-danger" onclick="Deletebrand(' + obj.id + ')">Delete</buttton>';
                    var updatebtn ='<button id="'+obj.id+'" type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal2" onclick=" Launch_updatemodal('+obj.id+')">Update</buttton>';

                    var row= table1.row.add([idid, idname,type_name,brand_name,category_name, deletebtn, updatebtn]).draw().node();
                      $(row).attr("id", "t"+obj.id);
                  
                      $(row).find('td').eq(0).attr('id', "idid"+obj.id);
                      $(row).find('td').eq(1).attr('id', "idn"+obj.id);
                      $(row).find('td').eq(2).attr('id', "idb"+obj.id);
                      $(row).find('td').eq(3).attr('id', "idc"+obj.id);
                      $(row).find('td').eq(4).attr('id', "idt"+obj.id);
                      $(row).find('td').eq(5).attr('class', +obj.id);
                      $(row).find('td').eq(6).attr('class', +obj.id);

                }
            });

            return false;
        });

        //-------------------------------------- UPDATE TYPE------------------------------->

        $("#Upname").submit(function() {
            var id = $('#id').val();
            var name = $('#name1').val();
            //  alert(haha);
            $.ajax({
                method: 'POST',
                data: {
                    'id': id,
                    'name': name
                },
                url: "<?php echo base_url('/Change_name'); ?>",
                success: function(data) {
                    var obj = JSON.parse(data);
                    $("#myModal2").modal("toggle");
                    alert("Update Successful");
                    var idn = "#idn" + obj.id;
                    var n = obj.name;
                    $(idn).html(n);
                    toggleAlert("Update Successful");
                    //alert(data);

                }
            });

            return false;
        });

        

    });
</script>
</body>


</html>