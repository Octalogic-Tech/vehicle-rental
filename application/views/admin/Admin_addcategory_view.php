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
          Category Details
          <small>Control panel</small>
        </h1>
                    </section>

                    <section class="content">



                        <button id="addbtn" type="button" class="btn btn-success btn-md" data-toggle="modal" data-target="#myModal" onclick="Launch_insertmodal()">Add Category</button>
                        <br><br>

                        <!-- Modal -->
                        <div class="modal fade" id="myModal" role="dialog">
                            <div class="modal-dialog">

                                <!-- Modal content-->
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        <h4 class="modal-title">ADD CATEGORY</h4>
                                    </div>

                                    <div class="modal-body">
                                        <form id="addcategory" class="form-inline">
                                            <label for="Category">Category:</label>
                                            <input type="text" id="category" placeholder="Enter Category" name="category">
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
                                        <h4 class="modal-title">UPDATE CATEGORY</h4>
                                    </div>
                                    <div class="modal-body">
                                        <form id="Upcategory" class="form-inline">
                                            <input type="hidden" id="id" placeholder="id" name="id">
                                            <label for="category1">Brand Name:</label>
                                            <input type="text" id="category1" placeholder="Enter New Category" name="category1">
                                          
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
                                    <th id="category">CATEGORY</th>
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

                                        <td id="<?php echo "n";echo $value->id; ?>">
                                            <?php echo $value->name; ?>
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
            url: "<?php echo base_url('/Change_categorystatus'); ?>",
            success: function(data) {
                var x = "#t" + id;
                // $(x).prev().html (data);
                alert(id);
                alert("Delete Successful");
                //$(x).remove();
                // var i="button#"+id;
                // alert(i);
                // var table1 = $('#tablebrand').DataTable();
                //               $('#tablebrand tbody').on( 'click', "button#"+id, function () {
                //                 alert("done");

                //             table1
                //                 .row( $(this).closest('tr') )
                //                 .remove()
                //                 .draw();
                // });
                var table = $('#tablebrand').DataTable();
                table .row( $(x))  .remove() .draw();

         }
                    
         }
        );
}

    function Launch_insertmodal() {

        $(".modal-body #category").val(null);

    }

    function Launch_updatemodal(id) {
      alert(id);

        var a ="#n"+id;
        alert(a);
        var nam = $(a).text().replace(/\s+/g,' ').trim();;
        alert(nam);


        /*var table = $('#tablebrand').DataTable();
        var x = "#t" + id;
        var info = $(x).find('td').eq(1).text();
        alert(info);*/
 
      /*var cellval=$('#tablebrand tbody').on( 'click', 'tr', function () {
          alert( 'Row index: '+table.row( this ).index() );
           d='Row index: '+table.row( this ).index();
           alert(d);
           return cellval;
        } );*/
     // console.log( table.rows(cellval).columns(1).html() );
        //var nam1=$('#id').text();
        //$(".modal-body #brandname").val( id );
        $(".modal-body #id").val(id);
        $(".modal-body #category1").val(nam);
        // $('#addBookDialog').modal('show');

    }

    function toggleAlert() {
        $(".alert").toggleClass('in out');
        return false; // Keep close.bs.alert event from removing from DOM
    }

    $(document).ready(function() {


     if(location.pathname=="/vehicle-rental/Display_vehiclecategory")
    {
      $("#l12").addClass("active");
      $("#l1").addClass("active");
    }

        var table1 = $('#tablebrand').DataTable({
        
        responsive: true
    });
          
 

        $("#addcategory").submit(function() {
            var category = $('#category').val();
            //alert(brandname);
            $.ajax({
                method: 'POST',
                data: {
                    'category': category
                },
                url: "<?php echo base_url('/Insert_category'); ?>",
                success: function(data) {

                    // $(x).prev().html (data);
                    $("#myModal").modal("toggle");
                    var obj = JSON.parse(data);
                    alert("Category: " + obj.name + ". Added Successfully");
                    /*var idr="t"+obj.id;
                     var idi="id"+obj.id;
                     var idn="n"+obj.id;
                     var markup = '<tr id="'+idr+'"><td id="'+idi+'">'+obj.id+'</td><td id="'+idn+'">'+obj.name+'</td><td class="'+obj.id+'"><button id="'+obj.id+'" type="button" class="btn btn-danger" onclick="Deletebrand('+obj.id+')">Delete</buttton></td><td class="'+obj.id+'"><button id="'+obj.id+'" type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal2" onclick=" Launch_updatemodal('+obj.id+')">Update</buttton></td></tr>';

                      $('#tablebrand tbody').append(markup);*/
                      var idr="t"+obj.id;
                     var idi="id"+obj.id;
                     var idn="n"+obj.id;
                    var idid = '<td id="'+idi+'">'+obj.id+'</td>';
                    var idname='<td id="'+idn+'">'+obj.name+'</td>';

                    var deletebtn = '<button id="' + obj.id + '" type="button" class="btn btn-danger" onclick="Deletebrand(' + obj.id + ')">Delete</buttton>';
                    var updatebtn ='<button id="'+obj.id+'" type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal2" onclick=" Launch_updatemodal('+obj.id+')">Update</buttton>';

                    var row= table1.row.add([idid, idname, deletebtn, updatebtn]).draw().node();
                     $(row).attr("id", "t"+obj.id);
                  
                      $(row).find('td').eq(0).attr('id', "id"+obj.id);
                      $(row).find('td').eq(1).attr('id', "n"+obj.id);
                      $(row).find('td').eq(2).attr('class', +obj.id);
                      $(row).find('td').eq(3).attr('class', +obj.id);

                }
            });

            return false;
        });

        //-------------------------------------- UPDATE BRAND------------------------------->

        $("#Upcategory").submit(function() {
            var id = $('#id').val();
            var category = $('#category1').val();
            //  alert(haha);
            $.ajax({
                method: 'POST',
                data: {
                    'id': id,
                    'category': category
                },
                url: "<?php echo base_url('/Change_category'); ?>",
                success: function(data) {
                    var obj = JSON.parse(data);
                    $("#myModal2").modal("toggle");
                    alert("Update Successful");
                    var idn = "#n" + obj.id;
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