<?php
include_once 'includes/db_connect.php';
include_once 'includes/functions.php';
 
sec_session_start();
 
if (login_check($mysqli) == true) {
    $logged = 'in';
} else {
    $logged = 'out';
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>LogIn | Janßen Bauelemente e.K.</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link rel="stylesheet" href="css/project.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <script type="text/JavaScript" src="js/sha512.js"></script> 
  <script type="text/JavaScript" src="js/forms.js"></script>
</head>
<body> 
<div class="container">
  <h2><center>Kundenverzeichnis</center></h2>
  <div class="panel panel-default">
  <div class="panel-body">
	<form class="form-horizontal" action="includes/process_login.php" method="post" name="login_form">
	  <div class="form-group">
		<label class="control-label col-sm-2" for="kunde">E-Mail-Adresse:</label>
		<div class="col-sm-10">
		  <input type="text" class="form-control" name="email" id="email" placeholder="E-Mail-Adresse">
		</div>
	  </div>
	  <div class="form-group">
		<label class="control-label col-sm-2" for="novahueppe">Password:</label>
		<div class="col-sm-10">
		  <input type="password" class="form-control" name="password" id="password" placeholder="Password">
		</div>
	  </div>
	  <div class="form-group"> 
		<div class="col-sm-offset-2 col-sm-10">
		  <button type="submit" value="Login" onclick="formhash(this.form, this.form.password);" class="btn btn-default">Kunden eintragen</button>
		</div>
	  </div>
	</form>
  </div>
  <div class="panel-footer"><center>© Wolf-Applications e.K. 2017</center></div>
</div>
</div>
</body>
</html>
