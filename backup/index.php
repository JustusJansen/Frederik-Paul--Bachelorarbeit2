<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body> 
 
<div class="container">
  <h2><center>Kundenverzeichnis</center></h2>
  <div class="panel panel-default">
  <div class="panel-heading"><div align="center"><a href="new.php">Neuen Eintrag hinzufügen</a></div></div>
  <div class="panel-body">
	<?php 
	if(isset($_GET["erfolg"])){
		$status = $_GET["erfolg"];
		if($status = 1){
			echo '<div class="alert alert-success"><strong>Erfolgreich!</strong> Der Kunde wurde hinzugefügt.</div>';
		}
	}
	?>
	<table class="table">
    <thead>
      <tr>
        <th>Kunde</th>
        <th>Nova Hüppe</th>
        <th>Kadeco</th>
		<th>Sun Paradise</th>
		<th>Sonstige</th>
      </tr>
    </thead>
    <tbody>
	<?php
		$mysqli = new mysqli("db702253885.db.1and1.com", "dbo702253885", "dNPXhrgz133.", "db702253885");
		$sql = "SELECT * FROM auflistung ORDER BY kunde ASC";
		foreach ($mysqli->query($sql) as $row) {
		   echo '<tr>';
		   
		   echo '<td>';
		   echo $row['kunde'];
		   echo '</td><td>';
		   echo $row['hueppe'];
		   echo '</td><td>';
		   echo $row['kadeco'];
		   echo '</td><td>';
		   echo $row['sunparadise'];
		   echo '</td><td>';
		   echo $row['sonstiges'];
		   echo '</td>';
		   
		   echo '</tr>';
		}
	?>
    </tbody>
	</table>
  </div>
</div>
</div>

</body>
</html>
