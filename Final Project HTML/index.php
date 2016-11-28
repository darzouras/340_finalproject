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
    <title>Nintendo Database Home</title>

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
					<li class="active"><a href="index.php">Home</a></li>
					<li><a href="locations.php">Locations</a></li> 
					<li><a href="systems.php">Systems</a></li> 
					<li><a href="characters.php">Characters</a></li> 
					<li><a href="games.php">Games</a></li> 
					<li><a href="gamecharacters.php">Game Characters</a></li> 
					<li><a href="queries.php">General Queries</a></li> 
				</ul>
			</div>
		</div>
		</nav>

  <div class = "container-fluid">
<div class="row">
		<div class = "col-xs-12 col-md-12">
			<div class="row row-eq-height">
				<div class="col-xs-2 col-md-2"></div>
				<div class="col-xs-1 col-md-1 content-background"></div>
				<div class="col-xs-6 col-md-6 content-background">
					<a href="images/nintendologo.jpg"><img class="img-responsive center-block" src="images/nintendologo.jpg" alt="Nintendo Logo" /></a>
				</div>
				<div class="col-xs-1 col-md-1 content-background"></div>
				<div class="col-xs-2 col-md-2"></div>
			</div>
		</div>
   </div>
   
    <div class="row">
		<div class = "col-xs-12 col-md-12">
			<div class="row row-eq-height">
				<div class="col-xs-2 col-md-2"></div>
				<div class="col-xs-8 col-md-8 content-background">
					<p>This database focuses on the products of Nintendo, a Japanese gaming company originally known for producing playing cards.  As the company expanded further into the toy and game industry, it began
					delving into electronic home games in the 1970s, embarking on a quest for the cutting edge of entertainment that would cement its legacy as one of the most durable, prolific, and beloved video game
					companies.</p>
					The database represents the various Nintendo products, both video game systems and games, as well as some thematic concepts related to the games themselves.  Nintendo released a number of video game
					consoles and mobile systems dating back to the late 70s, each with a wide variety of games available.  The creativity of game developers spawned all sorts of games,  games where you jump around
					squashing enemies to games where you shoot at aliens or create music.  Many games prominently feature characters or settings that the player can play as or interact with in other ways.</p>
					<p>Whether it’s for general reference, getting a leg up in a game, or searching for the next game to play, there are all manner of databases devoted to video games.  The Minecraft Wiki features a
					plethora of information about how to play the games and what one might expect to encounter, gamefaqs hosts a huge collection of games with cheats, hints, and walkthroughs to help gamers play, and
					the Entertainment Software Rating Board maintains resources on video game content ratings to help consumers make good purchasing decisions.  All of these video game resources are supported by
					databases behind the scenes.  This Nintendo database would function as the precursor to a more full archive on Nintendo products, whether for reference or nostalgia, and would serve as a resource
					for people interested in video games, or specifically Nintendo games.</p>

					
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