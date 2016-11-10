<!-- Temporary file, worked along with the week 6 HTML for project video lecture - DZ -->

<?php
// turn on error reporting
ini_set('display_errors', 'On');
// and connect to the database
$mysqli = new mysqli("oniddb.cws.oregonstate.edu", "zourasd-db", " 	iJgcL1t1tTT2Gv2B", "zourasd-db");
if($mysqli->connect_errno){
  echo "Connection error " . $mysqli->connect_errno . " " . $mysqli->connect_error;
}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html>
<head>
  <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>

<div>
  <table>
    <tr>
      <th>Characters</th>
    </tr>
    <tr>
      <th>Name</th>
      <th>Race or Species</th>
      <th>Homeland</th>
    </tr>
    <tr>
      <td>NAME TEST</td>
      <td>RACE TEST</td>
      <td>HOMELAND TEST</td>
    </tr>
  </table>
</div>
<br /><br />

<div>
  <table>
    <tr>
      <th>Locations</th>
    </tr>
    <tr>
      <th>Name</th>
      <th>Environment</th>
    </tr>
    <tr>
      <td>NAME TEST</td>
      <td>ENVIRONMENT TEST</td>
    </tr>
  </table>
</div>
<br /><br />

<div>
  <table>
    <tr>
      <th>Games</th>
    </tr>
    <tr>
      <th>Title</th>
      <th>USA Release Date</th>
      <th>Original System</th>
    </tr>
    <tr>
      <td>TITLE TEST</td>
      <td>RELEASE TEST</td>
      <td>SYSTEM TEST</td>
    </tr>
  </table>
</div>
<br /><br />

<div>
  <table>
    <tr>
      <th>System</th>
    </tr>
    <tr>
      <th>Name</th>
      <th>USA Release Date</th>
      <th>Introductory Price</th>
      <th>Units Sold</th>
    </tr>
    <tr>
      <td>NAME TEST</td>
      <td>RELEASE TEST</td>
      <td>PRICE TEST </td>
      <td>SOLD TEST</td>
    </tr>
  </table>
</div>
<br /><br />

<div>
  <form method="post" action="temp_tables.html">
    <!-- CHANGE THIS LATER, post this to the page handling the form data!!! -->
    <fieldset>
      <legend>Add a Character</legend>
      <p>Name: <input type="text" name="cName" /></p>
      <p>Race or Species: <input type="text" name="raceOrSpecies" /></p>
      <p>Homeland:
        <select>
          <!-- placeholder for now- this will be dynamically generated
          the value will hold the id!!!!-->
          <option value="test1">Test world1</option>
          <option value="test2">Test world2</option>
        </select>
      </p>
      <p><input type="submit" /></p>
    </fieldset>
  </form>
</div>

<div>
  <form method="post" action="temp_tables.html">
    <!-- CHANGE THIS LATER, post this to the page handling the form data!!! -->
    <fieldset>
      <legend>Add a Location</legend>
      <p>Name: <input type="text" name="lName" /></p>
      <p>Environment: <input type="text" name="environment" /></p>
      <p><input type="submit" /></p>
    </fieldset>
  </form>
</div>
<br />

<div>
  <form method="post" action="temp_tables.html">
    <!-- CHANGE THIS LATER, post this to the page handling the form data!!! -->
    <fieldset>
      <legend>Add a Game</legend>
      <p>Name: <input type="text" name="gName" /></p>
      <p>USA Release Date: <input type="date" name="gDate" /></p>
      <p>Original System:
        <select>
          <!-- placeholder for now- this will be dynamically generated
          the value will hold the id!!!!-->
          <option value="test1">Test system1</option>
          <option value="test2">Test system2</option>
        </select>
      </p>
      <p><input type="submit" /></p>
    </fieldset>
  </form>
</div>
<br />

<div>
  <form method="post" action="temp_tables.html">
    <!-- CHANGE THIS LATER, post this to the page handling the form data!!! -->
    <fieldset>
      <legend>Add a Game System</legend>
      <p>Name: </input type="text" name="consName" /></p>
      <p>USA Release Date: <input type="date" name="cDate" /></p>
      <p>Original Price: <input type="text" name="price" /></p>
      <p>Units Sold: <input type="text" name="unitsSold" /></p>
      <p><input type="submit" /></p>
    </fieldset>
  </form>
</body>
</html>
