<?php
//Turn on error reporting
ini_set('display_errors', 'On');
//Connects to the database
$mysqli = new mysqli("oniddb.cws.oregonstate.edu", "moyerjo-db", "EpoJM8FxtVi7AW2d", "moyerjo-db");
if(!$mysqli || $mysqli->connect_errno){
	echo "Connection error " . $mysqli->connect_errno . " " . $mysqli->connect_error;
	}
	
if($_POST['homeland'] >= 0){
	if(!($stmt = $mysqli->prepare("INSERT INTO characters(name, raceOrSpecies, homeland) VALUES (?,?,?)"))){
		echo "Prepare failed: "  . $stmt->errno . " " . $stmt->error;
	}
}
else{
	if(!($stmt = $mysqli->prepare("INSERT INTO characters(name, raceOrSpecies, homeland) VALUES (?,?,NULL)"))){
		echo "Prepare failed: "  . $stmt->errno . " " . $stmt->error;
	}
}
if(!($stmt->bind_param("ssi",$_POST['cName'],$_POST['raceOrSpecies'],$_POST['homeland']))){
	echo "Bind failed: "  . $stmt->errno . " " . $stmt->error;
}
if(!$stmt->execute()){
	echo "Execute failed: "  . $stmt->errno . " " . $stmt->error;
} else {
	echo "Added " . $stmt->affected_rows . " rows to characters.";
}
?>