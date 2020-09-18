<?php
include_once 'db_connect.php';
include_once 'functions.php';
 
sec_session_start();

if(isset($_POST['id'], $_POST['kunde'], $_POST['novahueppe'], $_POST['sunparadise'], $_POST['glasnowak'], $_POST['solarmagic'], $_POST['corradi'], $_POST['egen'], $_POST['trittec'], $_POST['somfi'], $_POST['sonstiges'])){
	$id = $_POST["id"];
	$kunde = $_POST["kunde"];
	$novahueppe = $_POST["novahueppe"];
	$sunparadise = $_POST["sunparadise"];
	$glasnowak = $_POST["glasnowak"];
	$solarmagic = $_POST["solarmagic"];
	$corradi = $_POST["corradi"];
	$egen = $_POST["egen"];
	$trittec = $_POST["trittec"];
	$somfi = $_POST["somfi"];
	$sonstiges = $_POST["sonstiges"];
	
	if (empty($id)) { $id = "/"; }
	if (empty($kunde)) { $kunde = "/"; }
	if (empty($novahueppe)) { $novahueppe = "/"; }
	if (empty($sunparadise)) { $sunparadise = "/"; }
	if (empty($glasnowak)) { $glasnowak = "/"; }
	if (empty($solarmagic)) { $solarmagic = "/"; }
	if (empty($corradi)) { $corradi = "/"; }
	if (empty($egen)) { $egen = "/"; }
	if (empty($trittec)) { $trittec = "/"; }
	if (empty($somfi)) { $somfi = "/"; }
	if (empty($sonstiges)) { $sonstiges = "/"; }
	
	date_default_timezone_set("Europe/Berlin");
	$timestamp = time(); 
	$datum = date("d.m.Y",$timestamp);
	$uhrzeit = date("H:i",$timestamp);
	$vollesdatum = $datum . " " . $uhrzeit;
	
	$prep_stmt = "UPDATE customers SET kunde='$kunde', date='$vollesdatum', novahueppe='$novahueppe', sunparadise='$sunparadise', glasnowak='$glasnowak', solarmagic='$solarmagic', corradi='$corradi', egen='$egen', trittec='$trittec', somfi='$somfi', sonstiges='$sonstiges' WHERE id='$id'";
	$stmt = $mysqli->prepare($prep_stmt);
	
	if($stmt){      
		if(!$stmt->execute()){
			echo "!nicht erfolgreich!";
		}
		header("Location: ../dashboard.php?erfolgedit=1");
	}
} else {
	echo "Die Parameter wurden nicht übergeben.";
}

echo '<a href="../dashboard.php">Zurück</a>';
?> 