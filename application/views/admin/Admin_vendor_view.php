<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>AdminLTE 2 | Dashboard</title>
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
  <!-- Left side column. contains the logo and sidebar -->
  <?php $this->view('admin/Admin_sidebar'); ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Dashboard
        <small>Control panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Dashboard</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->
       <table class="table table-hover">
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
          <td><?php echo $value->activeStatus; ?></td>
          <td class="<?php echo $value->id; ?>"><button id="<?php echo $value->id; ?>" type="button">Change</button></td>
          <!--<td><a href="<?php// echo base_url('/update'); ?>" >Change</a></td>-->
        </tr>  
  <?php } ?>
      </table>
       <span>
  Real Madrid
  Real Madrid CF.svg
  Full name Real Madrid Club de Fútbol[1]
  Nickname(s) Los Blancos (The Whites)
  Los Merengues (The Meringues)
  Los Vikingos (The Vikings)[2]
  Founded 6 March 1902; 116 years ago
  as Madrid Football Club[3]
  Ground  Santiago Bernabéu Stadium
  Capacity  81,044[4]
  President Florentino Pérez
  Head coach  Santiago Solari
  League  La Liga
  2017–18 3rd
  Website Club website

  Home colours

  Away colours

  Third colours
   Current season
  Active departments of Real Madrid
  Football pictogram.svg  Football pictogram.svg  Football pictogram.svg
  Football  Football B  Football U-19
  Basketball pictogram.svg  Basketball pictogram.svg  
  Basketball  Basketball B  
  Closed departments of Real Madrid
  Football pictogram.svg  Handball pictogram.svg
  Football C  Handball
  Rugby union pictogram.svg Volleyball (indoor) pictogram.svg
  Rugby Volleyball
  Real Madrid Club de Fútbol (Spanish pronunciation: [reˈal maˈðɾið ˈkluβ ðe ˈfuðβol]; "Royal Madrid Football Club"), commonly known as Real Madrid, is a professional football club based in Madrid, Spain.

  Founded on 6 March 1902 as the Madrid Football Club, the club has traditionally worn a white home kit since inception. The word real is Spanish for "royal" and was bestowed to the club by King Alfonso XIII in 1920 together with the royal crown in the emblem. The team has played its home matches in the 81,044-capacity Santiago Bernabéu Stadium in downtown Madrid since 1947. Unlike most European sporting entities, Real Madrid's members (socios) have owned and operated the club throughout its history.

  The club was estimated to be worth €3.47 billion ($4.1 billion) in 2018, and in the 2016–17 season it was the second highest-earning football club in the world, with an annual revenue of €674.6 million.[5][6][7] The club is one of the most widely supported teams in the world.[8] Real Madrid is one of three founding members of La Liga that have never been relegated from the top division since its inception in 1929, along with Athletic Bilbao and Barcelona. The club holds many long-standing rivalries, most notably El Clásico with Barcelona and El Derbi with Atlético Madrid.

  Real Madrid established itself as a major force in both Spanish and European football during the 1950s, winning five consecutive European Cups and reaching the final seven times. This success was replicated in the league, where the club won five times in the space of seven years. This team, which consisted of players such as Alfredo Di Stéfano, Ferenc Puskás, Francisco Gento and Raymond Kopa, is considered by some in the sport to be the greatest team of all time.[9][10][11] In domestic football, the club has won 64 trophies; a record 33 La Liga titles, 19 Copa del Rey, 10 Supercopa de España, a Copa Eva Duarte, and a Copa de la Liga.[12] In European and worldwide competitions, the club has won a record 26 trophies; a record 13 European Cup/UEFA Champions League titles, two UEFA Cups and four UEFA Super Cups. In international football, they have achieved a record seven club world championships.[note 1]
  Real Madrid
  Real Madrid CF.svg
  Full name Real Madrid Club de Fútbol[1]
  Nickname(s) Los Blancos (The Whites)
  Los Merengues (The Meringues)
  Los Vikingos (The Vikings)[2]
  Founded 6 March 1902; 116 years ago
  as Madrid Football Club[3]
  Ground  Santiago Bernabéu Stadium
  Capacity  81,044[4]
  President Florentino Pérez
  Head coach  Santiago Solari
  League  La Liga
  2017–18 3rd
  Website Club website

  Home colours

  Away colours

  Third colours
   Current season
  Active departments of Real Madrid
  Football pictogram.svg  Football pictogram.svg  Football pictogram.svg
  Football  Football B  Football U-19
  Basketball pictogram.svg  Basketball pictogram.svg  
  Basketball  Basketball B  
  Closed departments of Real Madrid
  Football pictogram.svg  Handball pictogram.svg
  Football C  Handball
  Rugby union pictogram.svg Volleyball (indoor) pictogram.svg
  Rugby Volleyball
  Real Madrid Club de Fútbol (Spanish pronunciation: [reˈal maˈðɾið ˈkluβ ðe ˈfuðβol]; "Royal Madrid Football Club"), commonly known as Real Madrid, is a professional football club based in Madrid, Spain.

  Founded on 6 March 1902 as the Madrid Football Club, the club has traditionally worn a white home kit since inception. The word real is Spanish for "royal" and was bestowed to the club by King Alfonso XIII in 1920 together with the royal crown in the emblem. The team has played its home matches in the 81,044-capacity Santiago Bernabéu Stadium in downtown Madrid since 1947. Unlike most European sporting entities, Real Madrid's members (socios) have owned and operated the club throughout its history.

  The club was estimated to be worth €3.47 billion ($4.1 billion) in 2018, and in the 2016–17 season it was the second highest-earning football club in the world, with an annual revenue of €674.6 million.[5][6][7] The club is one of the most widely supported teams in the world.[8] Real Madrid is one of three founding members of La Liga that have never been relegated from the top division since its inception in 1929, along with Athletic Bilbao and Barcelona. The club holds many long-standing rivalries, most notably El Clásico with Barcelona and El Derbi with Atlético Madrid.

  Real Madrid established itself as a major force in both Spanish and European football during the 1950s, winning five consecutive European Cups and reaching the final seven times. This success was replicated in the league, where the club won five times in the space of seven years. This team, which consisted of players such as Alfredo Di Stéfano, Ferenc Puskás, Francisco Gento and Raymond Kopa, is considered by some in the sport to be the greatest team of all time.[9][10][11] In domestic football, the club has won 64 trophies; a record 33 La Liga titles, 19 Copa del Rey, 10 Supercopa de España, a Copa Eva Duarte, and a Copa de la Liga.[12] In European and worldwide competitions, the club has won a record 26 trophies; a record 13 European Cup/UEFA Champions League titles, two UEFA Cups and four UEFA Super Cups. In international football, they have achieved a record seven club world championships.[note 1]
  Real Madrid
  Real Madrid CF.svg
  Full name Real Madrid Club de Fútbol[1]
  Nickname(s) Los Blancos (The Whites)
  Los Merengues (The Meringues)
  Los Vikingos (The Vikings)[2]
  Founded 6 March 1902; 116 years ago
  as Madrid Football Club[3]
  Ground  Santiago Bernabéu Stadium
  Capacity  81,044[4]
  President Florentino Pérez
  Head coach  Santiago Solari
  League  La Liga
  2017–18 3rd
  Website Club website

  Home colours

  Away colours

  Third colours
   Current season
  Active departments of Real Madrid
  Football pictogram.svg  Football pictogram.svg  Football pictogram.svg
  Football  Football B  Football U-19
  Basketball pictogram.svg  Basketball pictogram.svg  
  Basketball  Basketball B  
  Closed departments of Real Madrid
  Football pictogram.svg  Handball pictogram.svg
  Football C  Handball
  Rugby union pictogram.svg Volleyball (indoor) pictogram.svg
  Rugby Volleyball
  Real Madrid Club de Fútbol (Spanish pronunciation: [reˈal maˈðɾið ˈkluβ ðe ˈfuðβol]; "Royal Madrid Football Club"), commonly known as Real Madrid, is a professional football club based in Madrid, Spain.

  Founded on 6 March 1902 as the Madrid Football Club, the club has traditionally worn a white home kit since inception. The word real is Spanish for "royal" and was bestowed to the club by King Alfonso XIII in 1920 together with the royal crown in the emblem. The team has played its home matches in the 81,044-capacity Santiago Bernabéu Stadium in downtown Madrid since 1947. Unlike most European sporting entities, Real Madrid's members (socios) have owned and operated the club throughout its history.

  The club was estimated to be worth €3.47 billion ($4.1 billion) in 2018, and in the 2016–17 season it was the second highest-earning football club in the world, with an annual revenue of €674.6 million.[5][6][7] The club is one of the most widely supported teams in the world.[8] Real Madrid is one of three founding members of La Liga that have never been relegated from the top division since its inception in 1929, along with Athletic Bilbao and Barcelona. The club holds many long-standing rivalries, most notably El Clásico with Barcelona and El Derbi with Atlético Madrid.

  Real Madrid established itself as a major force in both Spanish and European football during the 1950s, winning five consecutive European Cups and reaching the final seven times. This success was replicated in the league, where the club won five times in the space of seven years. This team, which consisted of players such as Alfredo Di Stéfano, Ferenc Puskás, Francisco Gento and Raymond Kopa, is considered by some in the sport to be the greatest team of all time.[9][10][11] In domestic football, the club has won 64 trophies; a record 33 La Liga titles, 19 Copa del Rey, 10 Supercopa de España, a Copa Eva Duarte, and a Copa de la Liga.[12] In European and worldwide competitions, the club has won a record 26 trophies; a record 13 European Cup/UEFA Champions League titles, two UEFA Cups and four UEFA Super Cups. In international football, they have achieved a record seven club world championships.[note 1]
  Real Madrid
  Real Madrid CF.svg
  Full name Real Madrid Club de Fútbol[1]
  Nickname(s) Los Blancos (The Whites)
  Los Merengues (The Meringues)
  Los Vikingos (The Vikings)[2]
  Founded 6 March 1902; 116 years ago
  as Madrid Football Club[3]
  Ground  Santiago Bernabéu Stadium
  Capacity  81,044[4]
  President Florentino Pérez
  Head coach  Santiago Solari
  League  La Liga
  2017–18 3rd
  Website Club website

  Home colours

  Away colours

  Third colours
   Current season
  Active departments of Real Madrid
  Football pictogram.svg  Football pictogram.svg  Football pictogram.svg
  Football  Football B  Football U-19
  Basketball pictogram.svg  Basketball pictogram.svg  
  Basketball  Basketball B  
  Closed departments of Real Madrid
  Football pictogram.svg  Handball pictogram.svg
  Football C  Handball
  Rugby union pictogram.svg Volleyball (indoor) pictogram.svg
  Rugby Volleyball
  Real Madrid Club de Fútbol (Spanish pronunciation: [reˈal maˈðɾið ˈkluβ ðe ˈfuðβol]; "Royal Madrid Football Club"), commonly known as Real Madrid, is a professional football club based in Madrid, Spain.

  Founded on 6 March 1902 as the Madrid Football Club, the club has traditionally worn a white home kit since inception. The word real is Spanish for "royal" and was bestowed to the club by King Alfonso XIII in 1920 together with the royal crown in the emblem. The team has played its home matches in the 81,044-capacity Santiago Bernabéu Stadium in downtown Madrid since 1947. Unlike most European sporting entities, Real Madrid's members (socios) have owned and operated the club throughout its history.

  The club was estimated to be worth €3.47 billion ($4.1 billion) in 2018, and in the 2016–17 season it was the second highest-earning football club in the world, with an annual revenue of €674.6 million.[5][6][7] The club is one of the most widely supported teams in the world.[8] Real Madrid is one of three founding members of La Liga that have never been relegated from the top division since its inception in 1929, along with Athletic Bilbao and Barcelona. The club holds many long-standing rivalries, most notably El Clásico with Barcelona and El Derbi with Atlético Madrid.

  Real Madrid established itself as a major force in both Spanish and European football during the 1950s, winning five consecutive European Cups and reaching the final seven times. This success was replicated in the league, where the club won five times in the space of seven years. This team, which consisted of players such as Alfredo Di Stéfano, Ferenc Puskás, Francisco Gento and Raymond Kopa, is considered by some in the sport to be the greatest team of all time.[9][10][11] In domestic football, the club has won 64 trophies; a record 33 La Liga titles, 19 Copa del Rey, 10 Supercopa de España, a Copa Eva Duarte, and a Copa de la Liga.[12] In European and worldwide competitions, the club has won a record 26 trophies; a record 13 European Cup/UEFA Champions League titles, two UEFA Cups and four UEFA Super Cups. In international football, they have achieved a record seven club world championships.[note 1]



  </span>

    </section>
    <!-- /.content -->
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
</body>
</html>
