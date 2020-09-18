<?php
include_once 'includes/db_connect.php';
include_once 'includes/functions.php';
 
sec_session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Kundenliste | Janßen Bauelemente e.K.</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link rel="stylesheet" href="css/project.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body> 
<?php if (!login_check($mysqli) == true){ MSGSystem("1"); } else { ?>
<div class="container">
  <h2><center>Kundenverzeichnis</center></h2>
  <div class="panel panel-default">
  <div class="panel-heading"><div align="center"><a href="create_customer.php">Neuen Eintrag hinzufügen</a></div></div>
  <div class="panel-body">
	<?php 
	if(isset($_GET['erfolg'])) { MSGSystem("4"); } 
	if(isset($_GET['erfolgedit'])) { MSGSystem("5"); } 
	if(isset($_GET['deleteaccess'])) { MSGSystem("3"); } 
	if(isset($_GET['delete'])) { $kunde = $_GET["delete"]; deleteCustomer($kunde, $mysqli);  } ?>
	<form class="navbar-form" action="search.php" method="post"><div style="display:table;" class="input-group"><span style="width: 1%;" class="input-group-addon"><span class="glyphicon glyphicon-search"></span></span><input type="text" autofocus="autofocus" autocomplete="off" placeholder="Kunden durchsuchen..." name="search" id="search" style="" class="form-control"></div></form>
	<?php getCustomers($mysqli); ?>
  </div>
  <div class="panel-footer"><center>© Wolf-Applications e.K. 2017 | <a href="logout.php">LogOut</a></center></div>
</div>
</div>
<?php } ?>
</body>
</html>
