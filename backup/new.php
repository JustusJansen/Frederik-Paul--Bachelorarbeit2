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
	<form action="includes/post_db.php" method="post"/>
	Kunde: <input type="text" name="kunde" id="kunde"/><br/>
	Nova Hüppe: <input type="text" name="hueppe" "id="hueppe"/><br/>
	Kadeco: <input type="text" name="kadeco" id="kadeco"/><br/>
	Sun Paradise:<input type="text" name="sunparadise" id="sunparadise"/><br/>
	Sonstiges:<input type="text" name="sonstiges" id="sonstiges"/><br/>
	<input type="submit"/>
	</form>

  </div>
</div>
</div>

</body>
</html>
