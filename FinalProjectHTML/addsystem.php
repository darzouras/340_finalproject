<?php
//Turn on error reporting
ini_set('display_errors', 'On');
//Connects to the database
$mysqli = new mysqli("oniddb.cws.oregonstate.edu", "moyerjo-db", "EpoJM8FxtVi7AW2d", "moyerjo-db");
// $mysqli = new mysqli("localhost", "root", "root", "nintendoDB");

if(!$mysqli || $mysqli->connect_errno){
	echo "Connection error " . $mysqli->connect_errno . " " . $mysqli->connect_error;
	}

if(!($stmt = $mysqli->prepare("INSERT INTO systems(systemName, releaseMonth, releaseDay, releaseYear, unitsSold, introPriceUS) VALUES (?,?,?,?,?,?)"))){
	echo "Prepare failed: "  . $stmt->errno . " " . $stmt->error;
}
if(!($stmt->bind_param("siiiid",$_POST['consName'],$_POST['cMonth'],$_POST['cDay'],$_POST['cYear'],$_POST['unitsSold'],$_POST['price']))){
	echo "Bind failed: "  . $stmt->errno . " " . $stmt->error;
}
if(!$stmt->execute()){
	echo "Execute failed: "  . $stmt->errno . " " . $stmt->error;
} else {
	echo "Added " . $stmt->affected_rows . " rows to systems.";
}
?>
