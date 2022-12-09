<?php
require "dbinfo.php";
include("header.php");

$query = "SELECT * FROM aliens_abduction ORDER BY id ASC";

if ($results = mysqli_query($connection, $query)){

	$count = mysqli_num_rows($results);
	echo "Number of Abductions : ($count)<br>";


	print <<<HERE
    <h2>Reported Abductions</h2>
    Select a record to edit or delete or <a href="addform.php">add new contacts</a>.
    <table id="home">
HERE;

		//loop to get all the records
	while ($row = mysqli_fetch_array($results)){
        $id=$row['id'];
        $firstname=$row['first_name'];
        $lastname=$row['last_name'];
        $emailaddr=$row['email'];
        $thewhen=$row['when_it_happened'];
        $howlong=$row['how_long'];
        $howmany=$row['how_many'];
        $description=$row['alien_description'];
        $whatdo=$row['what_they_did'];
        $seenfluffy=$row['fluffy_spotted'];
        $anythingelse=$row['other'];





		print <<<HERE
        <tr>
            <td>
            <form method="post" action="aldelete.php">
            <input type="hidden" name="sel_record" value="$id">
            <input type="submit" name="delete" value=" Delete ">
            </form>

            <form method="post" action="alupdate.php">
            <input type="hidden" name="sel_record" value="$id">
            <input type="submit" name="update" value=" Update "></form>
            </td>   
            <td><strong>$firstname $lastname</strong><br />
            <a href="mailto: $emailaddr">$emailaddr</a><br />
            When it happened: $thewhen<br />
            How long gone: $howlong<br />
            How many there were: $howmany<br />
            What they looked like: $description<br />
            What they did: $whatdo<br />
            Did you see fluffy?: $seenfluffy<br />
            Anything Else: $anythingelse<br />
            ID : $id<br />
            
            </td></tr>
HERE;
	}
}else{
	echo "There was a problem with the query";
}	
print "</tr></table></body></html>";
?>