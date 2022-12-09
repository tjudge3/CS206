<?php
//update.php
//connect to the database
require "dbinfo.php";

//clean and sanitize the incoming data
if(isset($_POST['submit'])=="submit" && $_POST['submit']=="Modify Record") {
    $id = filter_var($_POST['id'], FILTER_SANITIZE_NUMBER_INT);
    $first = filter_var($_POST['first'], FILTER_SANITIZE_STRING);
    $last = filter_var($_POST['last'], FILTER_SANITIZE_STRING);
    $email = filter_var($_POST['email'], FILTER_SANITIZE_STRING);
    $howlong = filter_var($_POST['howlong'], FILTER_SANITIZE_STRING);
    $thewhen = filter_var($_POST['thewhen'], FILTER_SANITIZE_STRING);
    $howmany = filter_var($_POST['howmany'], FILTER_SANITIZE_NUMBER_INT);
    $description = filter_var($_POST['description'], FILTER_SANITIZE_STRING);
    $whatdo = filter_var($_POST['whatdo'], FILTER_SANITIZE_STRING);
    $seenfluffy = filter_var($_POST['seenfluffy'], FILTER_SANITIZE_STRING);
    $anythingelse = filter_var($_POST['anythingelse'], FILTER_SANITIZE_STRING);
}

$id;

//create a safe sql query
$query="UPDATE aliens_abduction SET
  first_name='$first', last_name='$last', email='$email', when_it_happened='$thewhen', how_long='$howlong', how_many='$howmany', alien_description='$description', what_they_did='$whatdo',
  fluffy_spotted='$seenfluffy', other='$anythingelse' where id='$id' ";

/*  print <<<MESSAGE
  <h1>The new record looks like this: $id</h1>
  <p><strong>First:</strong> $first</p>
  <p><strong>Last:</strong> $last</p>
  <p><strong>E-mail:</strong> $email</p>
  <p><strong>When it happened:</strong>  $thewhen</p>
  <p><strong>How long you were gone:</strong>  $howlong</p>
  <p><strong>How many there were:</strong>  $howmany</p>
  <p><strong>What they looked like:</strong>  $description</p>
  <p><strong>What they did:</strong>  $whatdo</p>
  <p><strong>Did you see fluffy:</strong>  $seenfluffy</p>
  <p><strong>Other Comments:</strong>  $anythingelse</p>

  MESSAGE;*/


if ($result = mysqli_query($connection, $query)) {
    //show confirmation
    print "<html><head><title>Update Results</title></head><body>";
    $pageTitle = "Record Updated";
    include "header.php";
    print <<<HERE
    <h1>The new record looks like this: </h1>
    <p><strong>First:</strong> $first</p>
    <p><strong>Last:</strong> $last</p>
    <p><strong>E-mail:</strong> $email</p>
    <p><strong>When it happened:</strong>  $thewhen</p>
    <p><strong>How long you were gone:</strong>  $howlong</p>
    <p><strong>How many there were:</strong>  $howmany</p>
    <p><strong>What they looked like:</strong>  $description</p>
    <p><strong>What they did:</strong>  $whatdo</p>
    <p><strong>Did you see fluffy:</strong>  $seenfluffy</p>
    <p><strong>Other Comments:</strong>  $anythingelse</p>

HERE;
}else{
    print "<h1>Something has gone wrong!</h1>";
    exit();
}//end else

?>