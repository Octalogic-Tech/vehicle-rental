<!DOCTYPE html>
<html>
<head>
<title>Display Vendor View</title>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<style>
      table {
               border-collapse: collapse;
               position: absolute;
               top: 100px;
               left: 200px;
            }

      table, td, th {
               border: 2px solid black;
               text-align: center;
               padding: 2px;
                   }
  </style>

</head>
<body>

  


<table>
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
   <th>CHANGE STATUS</th>
   </tr>




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
    <td><?php echo $value->status; ?></td>
    <td class="<?php echo $value->id; ?>"><button id="<?php echo $value->id; ?>" type="button">Change</button></td>
    <!--<td><a href="<?php// echo base_url('/update'); ?>" >Change</a></td>-->
  </tr>  
<?php } ?>
</table>

<script type="text/javascript">
  $(document).ready(function(){
    $('button').click(function(){
      var id=this.id;
     
      $.ajax({
        method: 'POST',
        data:{id:id},
        url:"<?php echo base_url('/update'); ?>",
        success:function(data){
          var x='.'+id;
        $(x).prev().html (data);
          
        
          
        }

      });

    });

  });

</script>
</body>
</html>

