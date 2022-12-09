<?php
//search.php
//database connection info
include "dbinfo.php";
$search=$_POST['search'];

//SQL statement to select what to search
$query="SELECT * FROM aliens_abduction
WHERE first_name like '%$search%' OR
last_name like '%$search%'  OR
email like '%$search%' OR
when_it_happened like '%$search%' OR
how_long like '%$search%' OR
how_many like '%$search%' OR
alien_description like '%$search%' OR
what_they_did like '%$search%' OR
fluffy_spotted like '%$search%' OR
other like '%$search%'
ORDER BY last_name ASC";


// run sql statement
if ($result = mysqli_query($connection, $query)){
    // find out how many matches
    $count = mysqli_num_rows($result);
    $pageTitle="Search Results";
    include "header.php";
print <<<HERE
<h2>Search Results</h2>
<h3>$count results found seaching for "$search"</h3>
<table cellpadding="15">
HERE;
//loop through results and get variables
    while ($row=mysqli_fetch_array($result)){
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
            <input type="submit" name="update" value=" Edit "></form>
            </td>   
            <td><strong>$firstname $lastname</strong><br />
            <a href="mailto: $emailaddr">$emailaddr</a>
            <ul>
            <li>When it happened: $thewhen</li>
            <li>How long you were gone: $howlong</li>
            <li>How many there were: $howmany</li>
            <li>What they looked like: $description</li>
            <li>What they did: $whatdo</li>
            <li>Did you see fluffy: $seenfluffy</li>
            <li>Other Comments: $anythingelse</li>
            </ul>
            </td></tr>
HERE;
    } //end while
}else{
    echo "There was a problem with the query.";
}
print "</tr></table></body></html>";
?>

