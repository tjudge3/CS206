<?php
//This assignment was about using regex for some of the input validation
//get the data from the form, filter it
//$firstname = filter_input(INPUT_POST, 'firstname');
$firstname = $_POST["firstname"];
if (!preg_match("/^[a-zA-Z ]*$/",$firstname)) {
  $fnameErr = "Only letters and white space allowed";
}
$lastname = filter_input(INPUT_POST, 'lastname');
if (!preg_match("/^[a-zA-Z ]*$/",$lastname)) {
    $lnameErr = "Only letters and white space allowed";
  }
$seenfluffy = filter_input(INPUT_POST, 'seenfluffy');
$emailaddr = filter_input(INPUT_POST, 'emailaddr', FILTER_VALIDATE_EMAIL);
$thewhen = $_POST["thewhen"];
$howlong = $_POST["howlong"];
$howmany = $_POST["howmany"];
$description = $_POST["description"];
$whatdo = $_POST["whatdo"];
$anythingelse = $_POST["anythingelse"];
if ($firstname == NULL) {
$firstNameError = 'Please enter your first name.';
 }

 if ($lastname == NULL) {
 $lastNameError = 'Please enter your last name'; }

 if ($seenfluffy==NULL) {
 $seenFluffyError = 'Please select a radio button.'; }

 if ($emailaddr==NULL) {
 $emailAddrError = 'Please enter a valid email address.'; }

if (($firstNameError != '') || ($lastNameError != '') || ($seenFluffyError != '')
 || ($emailAddrError != '') || ($fnameErr != '')  || ($lnameErr != '')) {
include('index.php');
exit();
}else{
print <<<MESSAGE
    <!DOCTYPE html>
    <html lang = "en">
    <head>
    <title>Aliens Abducted Me - Report an Abduction</title>
    <link href="test.css" rel="stylesheet" type="text/css" />
    </head>
    <body>
    <h2>Aliens Abducted Me - Report an Abduction</h2>
    <p>You were abducted on <span class="answer">$thewhen</span> and gone for <span class="answer">$howlong</span></p>
    <p>Thanks for submitting the form <span class="answer">$firstname $lastname</span></p>
    <p><span class="answer">$emailaddr</span></p>
    <p>You said there was <span class="answer">$howmany</span> of them</p>
    <p>And they <span class="answer">$whatdo</span></p>
    <p>You described them as <span class="answer">$description</span></p>
    <p>Did you see Fluffy? You answered: <span class="answer">$seenfluffy</span></p>
    <p>Your additional comments were <span class="answer">$anythingelse</span></p>
    </body>
    </html>

 MESSAGE;

 }


?>
