<?php
require "dbinfo.php";
$sel_record = $_POST[sel_record];


//SQL statement to select information
$sql = "SELECT * FROM aliens_abduction WHERE id = $sel_record";

   // execute SQL query and get result
   if ($result = mysqli_query($connection, $sql)) {
        //loop through record and get values
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

        $pageTitle = "Delete a Contact";
        include "header.php";

    print <<<HERE
<h2>Are you sure you want to delete this record?
It will be permanently removed:</h2>
<ul>
<li>ID: $id</li>
<li>Name: $firstname $lastname</li>
<li>E-mail: $emailaddr</li>
<li>When it happened: $thewhen</li>
<li>How long you were gone: $howlong</li>
<li>How many there were: $howmany</li>
<li>What they looked like: $description</li>
<li>What they did: $whatdo</li>
<li>Did you see fluffy: $seenfluffy</li>
<li>Other Comments: $anythingelse</li>
</ul>
<p><br />
<form method="post" action="reallydelete.php">
<input type="hidden" name="id" value="$id">
<input type="submit" name="reallydelete" value="really truly delete" />
<input type="button" name="cancel" value="cancel"
onClick="location.href='viewsummary.php'" /></a>
</p></form>
HERE;
}//end if
else{
        print "<h1>Something has gone wrong!</h1>";
}// end else

?>