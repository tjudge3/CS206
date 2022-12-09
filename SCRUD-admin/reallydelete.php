<?php
require "dbinfo.php";

if(isset($_POST['reallydelete']) && $_POST['reallydelete'] == "really truly delete") {
    $id = $_POST['id'];

    $sql = "DELETE FROM aliens_abduction WHERE id = '$id'";

    if ($result = mysqli_query($connection, $sql)) {

        $pageTitle = "Abduction Record Deleted";
        include "header.php";
        print "<p> Abduction Record has been permanently deleted.</p>";
    }
    else {
        print "<h1>Something has gone wrong!</h1>";
    }
}
?>

