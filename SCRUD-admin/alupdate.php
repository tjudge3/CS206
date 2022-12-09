<?php
//updateform.php
//connect to the database
require "dbinfo.php";
$sel_record = $_POST['sel_record'];

//SQL statement to select record to edit
$query = "SELECT * FROM aliens_abduction WHERE id = $sel_record";

// execute SQL query and get result
if ($result = mysqli_query($connection, $query)) {
    while ($record = mysqli_fetch_array($result)) {
        $id=$record['id'];
        $firstname=$record['first_name'];
        $lastname=$record['last_name'];
        $emailaddr=$record['email'];
        $thewhen=$record['when_it_happened'];
        $howlong=$record['how_long'];
        $howmany=$record['how_many'];
        $description=$record['alien_description'];
        $whatdo=$record['what_they_did'];
        $seenfluffy=$record['fluffy_spotted'];
        $anythingelse=$record['other'];

    }   
}else {
    print "<h1>Something has gone wrong!</h1>";
    exit();
}

$pageTitle = "Edit a Contact";
include "header.php";
print <<<HERE
	<h2>Modify this Contact</h2>
    <p>Change the values in the text boxes then click the "Modify Record" button.</p>

	<form id = "myForm" method="POST" action = "update.php">
        <input type="hidden" name="id" value="$id">
	<div>
	    <label for="first">First Name*:</label>
	    <input type="text" name="first" id="first" value="$firstname">
	</div>
	<div>
	    <label for="last">Last Name*:</label>
	    <input type="text" name="last" id="last" value="$lastname">
	</div>
	<div>
	    <label for="email">Email*:</label>
	    <input type="text" name="email" id="email" value="$emailaddr">
	</div>
	<div>
	    <label for="phone">When it happened:</label>
	    <input type="text" name="thewhen" id="thewhen" value="$thewhen">
	</div>
	<div>
	<label for="phone">How long were you gone:</label>
	<input type="text" name="howlong" id="howlong" value="$howlong">
	</div>
	<div>
	<label for="phone">How many were there:</label>
	<input type="text" name="howmany" id="howmany" value="$howmany">
	</div>
	<div>
	<label for="phone">What did they look like:</label>
    <textarea id="description" name="description" rows="4" cols="50" value="$description">$description</textarea>
	</div>
	<div>
	<label for="phone">What did they do:</label>
	<input type="text" name="whatdo" id="whatdo" value="$whatdo">
	</div>
	<div>
	<label for="phone">Did you see fluffy:</label>
	<input type="text" name="seenfluffy" id="seenfluffy" value="$seenfluffy">
	</div>
	<div>
	<label for="phone">Additional Comments</label>
	<textarea id="anythingelse" name="anythingelse" rows="4" cols="50" value="$anythingelse">$anythingelse</textarea>
	</div>
	<div id="mySubmit">
	    <input type="submit" name="submit" value="Modify Record">
	</div>
	</form>

HERE;
 
?>

