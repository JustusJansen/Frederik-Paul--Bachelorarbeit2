<?php
$mysqli = new mysqli("localhost", "root", "", "kundendb");
$sql = "SELECT * FROM auflistung";
foreach ($mysqli->query($sql) as $row) {
   echo $row['kunde']." ".$row['firma']." ".$row['nummer']."<br />";
}
?>