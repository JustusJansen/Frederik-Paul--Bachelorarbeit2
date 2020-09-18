<?php
$mysqli = new mysqli("db702253885.db.1and1.com", "dbo702253885", "dNPXhrgz133.", "db702253885");

if(isset($_POST['kunde'], $_POST['hueppe'], $_POST['kadeco'], $_POST['sonstiges'])){
	$kunde = $_POST["kunde"];
	$hueppe = $_POST["hueppe"];
	$kadeco = $_POST["kadeco"];
	$sunparadise = $_POST["sunparadise"];
	$sonstiges = $_POST["sonstiges"];
	
	$prep_stmt = "INSERT INTO auflistung (kunde, hueppe, kadeco, sunparadise, sonstiges) VALUES ('$kunde', '$hueppe', '$kadeco', '$sunparadise', '$sonstiges')";
	$stmt = $mysqli->prepare($prep_stmt);
	
	if($stmt){      
		if(!$stmt->execute()){
			echo "!nicht erfolgreich!";
		}
		header("Location: ../index.php?erfolg=1");
	}
}

echo '<a href="../index.php">Zurück</a>';
?> 