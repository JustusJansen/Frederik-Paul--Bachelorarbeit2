<?php
include_once 'includes/db_connect.php';
include_once 'includes/functions.php';
 
sec_session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Kunden erstellen | Janßen Bauelemente e.K.</title>
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
  <div class="panel-heading"><div align="center"><a href="dashboard.php">Zurück zur Startseite</a></div></div>
  <div class="panel-body">
	<form class="form-horizontal" action="includes/process_newcustomer.php" method="post">
	  <div class="form-group">
		<label class="control-label col-sm-2" for="kunde">Kunde:</label>
		<div class="col-sm-10">
		  <input type="text" class="form-control" name="kunde" id="kunde" placeholder="Kunde">
		</div>
	  </div>
	  <div class="form-group">
		<label class="control-label col-sm-2" for="novahueppe">Nova Hüppe:</label>
		<div class="col-sm-10">
		  <input type="text" class="form-control" name="novahueppe" id="novahueppe" placeholder="Nova Hüppe">
		</div>
	  </div>
	  <div class="form-group">
		<label class="control-label col-sm-2" for="sunparadise">Sun Paradise:</label>
		<div class="col-sm-10">
		  <input type="text" class="form-control" name="sunparadise" id="sunparadise" placeholder="Sun Paradise">
		</div>
	  </div>
	  <div class="form-group">
		<label class="control-label col-sm-2" for="glasnowak">Glas Nowak:</label>
		<div class="col-sm-10">
		  <input type="text" class="form-control" name="glasnowak" id="glasnowak" placeholder="Glas Nowak">
		</div>
	  </div>
	  <div class="form-group">
		<label class="control-label col-sm-2" for="solarmagic">Solar Magic:</label>
		<div class="col-sm-10">
		  <input type="text" class="form-control" name="solarmagic" id="solarmagic" placeholder="Solar Magic">
		</div>
	  </div>
	  <div class="form-group">
		<label class="control-label col-sm-2" for="corradi">Corradi:</label>
		<div class="col-sm-10">
		  <input type="text" class="form-control" name="corradi" id="corradi" placeholder="Corradi">
		</div>
	  </div>
	  <div class="form-group">
		<label class="control-label col-sm-2" for="egen">Egen:</label>
		<div class="col-sm-10">
		  <input type="text" class="form-control" name="egen" id="egen" placeholder="Egen">
		</div>
	  </div>
	  <div class="form-group">
		<label class="control-label col-sm-2" for="trittec">Trittec:</label>
		<div class="col-sm-10">
		  <input type="text" class="form-control" name="trittec" id="trittec" placeholder="Trittec">
		</div>
	  </div>
	  <div class="form-group">
		<label class="control-label col-sm-2" for="somfi">Somfi:</label>
		<div class="col-sm-10">
		  <input type="text" class="form-control" name="somfi" id="somfi" placeholder="Somfi">
		</div>
	  </div>
	  <div class="form-group">
		<label class="control-label col-sm-2" for="sonstiges">Sonstiges:</label>
		<div class="col-sm-10">
		  <input type="text" class="form-control" name="sonstiges" id="sonstiges" placeholder="Sonstiges">
		</div>
	  </div>
	  <div class="form-group"> 
		<div class="col-sm-offset-2 col-sm-10">
		  <button type="submit" class="btn btn-default">Kunden eintragen</button>
		</div>
	  </div>
	</form>
  </div>
  <div class="panel-footer"><center>© Wolf-Applications e.K. 2017 | <a href="logout.php">LogOut</a></center></div>
</div>
</div>
<?php } ?>
</body>
</html>
