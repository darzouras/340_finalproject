<?php
// turn on error reporting
ini_set('display_errors', 'On');
// and connect to the database
$mysqli = new mysqli("oniddb.cws.oregonstate.edu", "moyerjo-db", "EpoJM8FxtVi7AW2d", "moyerjo-db");
// $mysqli = new mysqli("localhost", "root", "root", "nintendoDB");

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

<!-- LOOK UP LOCATIONS BASED ON ENVIRONMENT -->
       <div class="row">
		<div class = "col-xs-12 col-md-12">
			<div class="row row-eq-height">
				<div class="col-xs-2 col-md-2"></div>
				<div class="col-xs-8 col-md-8 content-background">
				<br>
					  <form class="form-inline" method="post" action="envlookup.php">
						<div class='form-group'>
						<fieldset>
						  <legend>Find Locations With a Certain Environment</legend>
						  <p>Environment: <input type="text" class="form-control" name="environment" /></p>
						  <p><input type="submit" class="btn btn-default" /></p>
						</fieldset>
						</div>
					  </form>
				</div>
				<div class="col-xs-2 col-md-2"></div>
			</div>
		</div>
   </div>


<!-- LOOK UP SYSTEMS ON MINIMUM UNITS SOLD -->
          <div class="row">
		<div class = "col-xs-12 col-md-12">
			<div class="row row-eq-height">
				<div class="col-xs-2 col-md-2"></div>
				<div class="col-xs-8 col-md-8 content-background">
				<br>
					  <form class="form-inline" method="post" action="unitssoldlookup.php">
						<div class='form-group'>
						<fieldset>
						  <legend>Look Up Systems Based on Units Sold</legend>
						  <p>Min Units Sold: <input type="text" class="form-control" name="minUnitsSold" /></p>
						  <p><input type="submit" class="btn btn-default" /></p>
						</fieldset>
						</div>
					  </form>
				</div>
				<div class="col-xs-2 col-md-2"></div>
			</div>
		</div>
   </div>


<!-- LOOK UP CHARACTERS BY HOMELAND -->
             <div class="row">
		<div class = "col-xs-12 col-md-12">
			<div class="row row-eq-height">
				<div class="col-xs-2 col-md-2"></div>
				<div class="col-xs-8 col-md-8 content-background">
				<br>
					  <form class="form-inline" method="post" action="homelookup.php">
						<div class='form-group'>
						<fieldset>
						  <legend>Look Up Characters By Homeland</legend>
						  <p>Homeland:
                              <select name="homeland">

                              <?php
                              if(!($stmt = $mysqli->prepare("SELECT locationID, locationName FROM locations"))){
                                  echo "Prepare failed: "  . $stmt->errno . " " . $stmt->error;
                              }

                              if(!$stmt->execute()){
                                  echo "Execute failed: "  . $mysqli->connect_errno . " " . $mysqli->connect_error;
                              }
                              if(!$stmt->bind_result($id, $lname)){
                                  echo "Bind failed: "  . $mysqli->connect_errno . " " . $mysqli->connect_error;
                              }
                              echo '<option value="NULL"></option>\n';
                              while($stmt->fetch()){
                                  echo '<option value=" '. $id . ' "> ' . $lname . '</option>\n';
                              }
                              $stmt->close();
                              ?>
                              </select>
						  <p><input type="submit" class="btn btn-default" /></p>
						</fieldset>
					  </form>
				</div>
				<div class="col-xs-2 col-md-2"></div>
			</div>
		</div>
   </div>
   </div>


<!-- LOOK UP GAMES BY SYSTEM -->
             <div class="row">
		<div class = "col-xs-12 col-md-12">
			<div class="row row-eq-height">
				<div class="col-xs-2 col-md-2"></div>
				<div class="col-xs-8 col-md-8 content-background">
				<br>
					  <form class="form-inline" method="post" action="systemlookup.php">
						<div class='form-group'>
						<fieldset>
						  <legend>Find Games Released for a System</legend>
						  <p>System:

                          <select name="system">
                          <?php
                          if(!($stmt = $mysqli->prepare("SELECT systemID, systemName FROM systems"))){
                              echo "Prepare failed: "  . $stmt->errno . " " . $stmt->error;
                          }

                          if(!$stmt->execute()){
                              echo "Execute failed: "  . $mysqli->connect_errno . " " . $mysqli->connect_error;
                          }
                          if(!$stmt->bind_result($id, $sname)){
                              echo "Bind failed: "  . $mysqli->connect_errno . " " . $mysqli->connect_error;
                          }
                          echo '<option value="NULL"></option>\n';
                          while($stmt->fetch()){
                              echo '<option value=" '. $id . ' "> ' . $sname . '</option>\n';
                          }
                          $stmt->close();
                          ?>
                          </select>
                          </p>
                          <p><input type="submit" class="btn btn-default" /></p>
						</fieldset>
					  </form>
				</div>
				<div class="col-xs-2 col-md-2"></div>
			</div>
		</div>
   </div>
   </div>

<!-- LOOK UP CHARACTERS BASED ON GAME -->
                <div class="row">
		<div class = "col-xs-12 col-md-12">
			<div class="row row-eq-height">
				<div class="col-xs-2 col-md-2"></div>
				<div class="col-xs-8 col-md-8 content-background">
				<br>
					  <form class="form-inline" method="post" action="gamelookup.php">
						<div class='form-group'>
						<fieldset>
						  <legend>Find Characters by Game</legend>
						  <p>Game:
                              <select name="gameTitle">
                              <?php
                              if(!($stmt = $mysqli->prepare("SELECT gameID, gameTitle FROM games"))){
                                  echo "Prepare failed: "  . $stmt->errno . " " . $stmt->error;
                              }

                              if(!$stmt->execute()){
                                  echo "Execute failed: "  . $mysqli->connect_errno . " " . $mysqli->connect_error;
                              }
                              if(!$stmt->bind_result($id, $gname)){
                                  echo "Bind failed: "  . $mysqli->connect_errno . " " . $mysqli->connect_error;
                              }
                              echo '<option value="NULL"></option>\n';
                              while($stmt->fetch()){
                                  echo '<option value=" '. $id . ' "> ' . $gname . '</option>\n';
                              }
                              $stmt->close();
                              ?>
                          </select></p>

						  <p><input type="submit" class="btn btn-default" /></p>
						</fieldset>
						</div>
					  </form>
				</div>
				<div class="col-xs-2 col-md-2"></div>
			</div>
		</div>
   </div>

<!-- TODO: LOOK UP GAMES BASED ON CHARACTERS -->
                   <div class="row">
		<div class = "col-xs-12 col-md-12">
			<div class="row row-eq-height">
				<div class="col-xs-2 col-md-2"></div>
				<div class="col-xs-8 col-md-8 content-background">
				<br>
					  <form class="form-inline" method="post" action="featurecharlookup.php">
						<!-- CHANGE THIS LATER, post this to the page handling the form data!!! -->
						<div class='form-group'>
						<fieldset>
						  <legend>Find Games With a Character</legend>
						  <p>Character: <input type="text" class="form-control" name="charName" /></p>
						  <p><input type="submit" class="btn btn-default" /></p>
						</fieldset>
						</div>
					  </form>
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
