<?php
//Turn on error reporting
ini_set('display_errors', 'On');
//Connects to the database
$mysqli = new mysqli("oniddb.cws.oregonstate.edu", "moyerjo-db", "EpoJM8FxtVi7AW2d", "moyerjo-db");
// $mysqli = new mysqli("localhost", "root", "root", "nintendoDB");

if(!$mysqli || $mysqli->connect_errno){
	echo "Connection error " . $mysqli->connect_errno . " " . $mysqli->connect_error;
	}

if(!($stmt = $mysqli->prepare("INSERT INTO locations(locationName, environment) VALUES (?,?)"))){
	echo "Prepare failed: "  . $stmt->errno . " " . $stmt->error;
}
if(!($stmt->bind_param("ss",$_POST['lName'],$_POST['environment']))){
	echo "Bind failed: "  . $stmt->errno . " " . $stmt->error;
}
if(!$stmt->execute()){
	echo "Execute failed: "  . $stmt->errno . " " . $stmt->error;
} else {
	echo "Added " . $stmt->affected_rows . " rows to locations.";
}
?>
