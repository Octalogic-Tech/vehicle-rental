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
          Locality Details
          <small>Control panel</small>
        </h1>
                    </section>
                    <section class="content">

                        <button id="addbtn" type="button" class="btn btn-success btn-md" data-toggle="modal" data-target="#myModal" onclick="Launch_insertmodal()">Add Locality</button>
                        <br><br>

                        <!-- Modal -->
                        <div class="modal fade" id="myModal" role="dialog">
                            <div class="modal-dialog">

                                <!-- Modal content-->
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        <h4 class="modal-title">ADD LOCALITY</h4>
                                    </div>

                                    <div class="modal-body">
                                        <form id="addlocality" class="form-inline">
                                            <label for="locality">Locality:</label>
                                            <input type="text" id="locality" placeholder="Enter Locality" name="locality">
         
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
                                        <h4 class="modal-title">UPDATE LOCALITY</h4>
                                    </div>
                                    <div class="modal-body">
                                        <form id="Upbrand" class="form-inline">
                                            <input type="hidden" id="id" placeholder="id" name="id">
                                            <label for="locality1">Locality:</label>
                                            <input type="text" id="locality1" placeholder="Enter New locality" name="locality1">
                                          
                                                <button type="submit">UPDATE</button>
                                        </form>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                    </div>
                                </div>

                            </div>
                        </div>
  
            <div class="box-body">

                        <table id="tablebrand" class="table table-hover">
                            <thead>
                                <tr>
                                    <th id="id">ID</th>
                                    <th id="place_name">PLACE</th>
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

                                        <td id="<?php echo "p";echo $value->id; ?>">
                                            <?php echo $value->place; ?>
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

                    </section>
                </div>
                <?php $this->view('admin/Admin_footer'); ?>
                    <div class="control-sidebar-bg"></div>

    </div>
    <?php $this->view('admin/Admin_script'); ?>
</body>
<script type="text/javascript">
    function Deletebrand(id) {
        $.ajax({
            method: 'POST',
            data: {
                id: id
            },
            url: "<?php echo base_url('/Change_localitystatus'); ?>",
            success: function(data) {
                var x = "#t" + id;

                alert(id);
                alert("Delete Successful");

var table = $('#tablebrand').DataTable();
                table
        .row( $(x))
        .remove()
        .draw();

         }
        });

    }

    function Launch_insertmodal() {

        $(".modal-body #locality").val(null);

    }

    function Launch_updatemodal(id) {
      alert(id);

        var a ="#p"+id;
        alert(a);
        var nam = $(a).text().replace(/\s+/g,' ').trim();;
        alert(nam);
        $(".modal-body #id").val(id);
        $(".modal-body #locality1").val(nam);
        

    }

    function toggleAlert() {
        $(".alert").toggleClass('in out');
        return false; // Keep close.bs.alert event from removing from DOM
    }

    $(document).ready(function() {

        var table1 = $('#tablebrand').DataTable({
        
        responsive: true
    });
          
 

        $("#addlocality").submit(function() {
            var locality_place = $('#locality').val();
            //alert(brandname);
            $.ajax({
                method: 'POST',
                data: {
                    'locality_place': locality_place
                },
                url: "<?php echo base_url('/Insert_locality'); ?>",
                success: function(data) {

                    // $(x).prev().html (data);
                    $("#myModal").modal("toggle");
                    var obj = JSON.parse(data);
                    alert("Locality: " + obj.place + ". Added Successfully");
                    /*var idr="t"+obj.id;
                     var idi="id"+obj.id;
                     var idn="n"+obj.id;
                     var markup = '<tr id="'+idr+'"><td id="'+idi+'">'+obj.id+'</td><td id="'+idn+'">'+obj.name+'</td><td class="'+obj.id+'"><button id="'+obj.id+'" type="button" class="btn btn-danger" onclick="Deletebrand('+obj.id+')">Delete</buttton></td><td class="'+obj.id+'"><button id="'+obj.id+'" type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal2" onclick=" Launch_updatemodal('+obj.id+')">Update</buttton></td></tr>';

                      $('#tablebrand tbody').append(markup);*/
                     var idr="t"+obj.id;
                    var idi="id"+obj.id;
                    var idn="p"+obj.id;
                    var idid = '<td id="'+idi+'">'+obj.id+'</td>';
                    var idname='<td id="'+idn+'">'+obj.place+'</td>';

                    var deletebtn = '<button id="' + obj.id + '" type="button" class="btn btn-danger" onclick="Deletebrand(' + obj.id + ')">Delete</buttton>';
                    var updatebtn ='<button id="'+obj.id+'" type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal2" onclick=" Launch_updatemodal('+obj.id+')">Update</buttton>';

                    var row= table1.row.add([idid, idname, deletebtn, updatebtn]).draw().node();
                     $(row).attr("id", "t"+obj.id);
                  
                      $(row).find('td').eq(0).attr('id', "id"+obj.id);
                      $(row).find('td').eq(1).attr('id', "p"+obj.id);
                      $(row).find('td').eq(2).attr('class', +obj.id);
                      $(row).find('td').eq(3).attr('class', +obj.id);

                }
            });

            return false;
        });

        //-------------------------------------- UPDATE BRAND------------------------------->

        $("#Upbrand").submit(function() {
            var id = $('#id').val();
            var place = $('#locality1').val();
            //  alert(haha);
            $.ajax({
                method: 'POST',
                data: {
                    'id': id,
                    'place': place
                },
                url: "<?php echo base_url('/Change_locality'); ?>",
                success: function(data) {
                    var obj = JSON.parse(data);
                    $("#myModal2").modal("toggle");
                    alert("Update Successful");
                    var idn = "#p" + obj.id;
                    var n = obj.place;
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