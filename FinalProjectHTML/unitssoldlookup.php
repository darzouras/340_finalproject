<?php
// turn on error reporting
ini_set('display_errors', 'On');
// and connect to the database
$mysqli = new mysqli("oniddb.cws.oregonstate.edu", "moyerjo-db", "EpoJM8FxtVi7AW2d", "moyerjo-db");
if($mysqli->connect_errno){
  echo "Connection error " . $mysqli->connect_errno . " " . $mysqli->connect_error;
}
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Nintendo Database Queries</title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
   		<nav class="navbar navbar-default">
		<div class="container-fluid">
			<div class="navbar-header">
			<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
			</button>
			<a class="navbar-brand" href="index.php">CS340 Nintendo Database</a> 
			</div>
			<div class="collapse navbar-collapse" id="myNavbar">
				<ul class="nav navbar-nav">
					<li><a href="index.php">Home</a></li>
					<li><a href="locations.php">Locations</a></li> 
					<li><a href="systems.php">Systems</a></li> 
					<li><a href="characters.php">Characters</a></li> 
					<li><a href="games.php">Games</a></li> 
					<li><a href="gamecharacters.php">Game Characters</a></li> 
					<li class="active"><a href="queries.php">General Queries</a></li> 
				</ul>
			</div>
		</div>
		</nav>

  <div class = "container-fluid">
   
   
       <div class="row">
		<div class = "col-xs-12 col-md-12">
			<div class="row row-eq-height">
				<div class="col-xs-2 col-md-2"></div>
				<div class="col-xs-8 col-md-8 content-background">
						<h2>Systems With Sufficient Units Sold</h2>
						<!-- CHANGE THIS LATER, mention the selected environment!!! -->
						<table class ="table table-striped">
							<tr>
								<th>System Name</th>
								<th>Release Year</th>
								<th>Units Sold</th>
							</tr>
							<?php
							
							if(!($stmt = $mysqli->prepare("SELECT systemName, releaseYear, unitsSold FROM systems WHERE unitsSold>? ORDER BY unitsSold DESC"))){
								echo "Prepare failed: "  . $stmt->errno . " " . $stmt->error;
							}
							
							if(!($stmt->bind_param("i",$_POST['minUnitsSold']))){
								echo "Bind failed: "  . $stmt->errno . " " . $stmt->error;
							}

							if(!$stmt->execute()){
								echo "Execute failed: "  . $mysqli->connect_errno . " " . $mysqli->connect_error;
							}
							if(!$stmt->bind_result($systems, $relYear, $unitsSold)){
								echo "Bind failed: "  . $mysqli->connect_errno . " " . $mysqli->connect_error;
							}
							
							while($stmt->fetch()){
							 echo "<tr>\n<td>\n" . $systems . "\n</td>\n<td>\n" . $relYear ."\n</td>\n<td>\n" . $unitsSold ."\n</td>\n</tr>";
							}
							$stmt->close();
							?>
						</table>
				</div>
				<div class="col-xs-2 col-md-2"></div>
			</div>
		</div>
   </div>
   


   
   </div>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>