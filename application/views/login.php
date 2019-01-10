<!DOCTYPE html>
<html>
	<head>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
	    <link rel="stylesheet" href= "<?php echo base_url('/public/login_page.css'); ?>">
	    <link href='https://fonts.googleapis.com/css?family=Passion One' rel='stylesheet'>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
	</head>

	<title>Vehicle Rental</title>
	<body>

		<div id="div1" class="shadow p-3 mb-5 rounded">
			<div id="divimg">
				<img id="logo" src="<?php echo base_url('/public/weblogo.png'); ?>"/>
			</div>
			<div id="div2">
				<span>Vehicle Rental 2</span>
			</div>
		</div>

   		<div id="form_login">
			<div class="container">
  				<form action="/action_page.php">
    				<div class="form-group">
      					<label for="email">Email:</label>
      					<input type="email" class="form-control" id="email" placeholder="Enter email" name="email">
    				</div>
    				<div class="form-group">
    					 <label for="pwd">Password:</label>
     					 <input type="password" class="form-control" id="pwd" placeholder="Enter password" name="pwd">
   					</div>
    				<div class="checkbox">
     					 <label><input type="checkbox" name="remember"> Remember me</label>
   					</div>
   			 		<div id="SubmitBtn">
    					<button  id="SubmitBtn1" type="submit" class="btn btn-default">Submit</button>
 					</div> 
 		 		</form>
			</div>
		</div>
	</body>
</html>