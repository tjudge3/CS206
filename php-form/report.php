//This was the page that would take the inputs, generate the email/output and send them. 
<!DOCTYPE html>
<html lang = "en">
<head>
	<meta charset="utf-8">
    <title>Aliens Abducted Me - Report an Abduction</title>
    <link href="test.css" rel="stylesheet" type="text/css" />
</head>
<body>
<h2>Aliens Abducted Me - Report an Abduction</h2>
<?php 
// get variables from submission form
$firstname = $_POST["firstname"];
$lastname = $_POST["lastname"];
$emailaddr = $_POST["emailaddr"];
$thewhen = $_POST["thewhen"];
$howlong = $_POST["howlong"];
$howmany = $_POST["howmany"];
$description = $_POST["description"];
$whatdo = $_POST["whatdo"];
$seenfluffy = $_POST["seenfluffy"];
$anythingelse = $_POST["anythingelse"];


print "<p>"."You were abducted on <span class=\"answer\">$thewhen</span> and gone for <span class=\"answer\">$howlong</span>."."\r\n"."</p>";

print "<p>"."Thanks for submitting the form <span class=\"answer\">$firstname $lastname</span>"."\r\n"."</p>";

print "<p>"."<span class=\"answer\">$emailaddr</span>"."\r\n"."</p>";

print "<p>"."You said there was <span class=\"answer\">$howmany</span> of them"."\r\n"."</p>";

print "<p>"."And they <span class=\"answer\">$whatdo</span>"."\r\n"."</p>";

print "<p>"."You described them as <span class=\"answer\">$description</span>"."\r\n"."</p>";

print "<p>"."Did you see Fluffy? You answered: <span class=\"answer\">$seenfluffy</span>"."\r\n"."</p>";

print "<p>"."Your additional comments were <span class=\"answer\">$anythingelse</span>"."\r\n"."</p>";

$to = 'example@example.com'; //Change this to the address you want to send it to
$subject = "Aliens Abducted Me Form Submission";
$body = "$firstname $lastname - $emailaddr \n They were abducted $thewhen and gone $howlong \n How Many: $howmany \n What they did: $whatdo \n Description: $description \n Did they see fluffy: $seenfluffy additional comments: $anythingelse";

//Since there is a very good chance that the php generated email will get stuck in some spam filter, I made a small if to just print out whether it does send correctly or not. I guess I could have used the error_log to check as well, but I figured this was just easier. 

$diditsend = mail($to, $subject, $body);
if(!$diditsend) {   
     echo "Error in sending";   
} else {
    echo "Sent Correctly";
}

?>

</body>
</html>
