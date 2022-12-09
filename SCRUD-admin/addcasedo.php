<?php
//get the data from the form, filter it
    $firstname = filter_input(INPUT_POST, 'firstname');
    $lastname = filter_input(INPUT_POST, 'lastname');
    $seenfluffy = filter_input(INPUT_POST, 'seenfluffy');
    $emailaddr = filter_input(INPUT_POST, 'emailaddr', FILTER_VALIDATE_EMAIL);
    $thewhen = $_POST["thewhen"];
    $howlong = $_POST["howlong"];
    $howmany = $_POST["howmany"];
    $description = $_POST["description"];
    $whatdo = $_POST["whatdo"];
    $anythingelse = $_POST["anythingelse"];
    validateForm($firstname, $lastname, $emailaddr, $thewhen, $howlong, $howmany, $description, $whatdo, $seenfluffy, $anythingelse);

    function validateForm($firstname, $lastname, $emailaddr, $thewhen, $howlong, $howmany, $description, $whatdo, $seenfluffy, $anythingelse){
        if ($firstname == NULL) {
            $firstNameError = 'Please enter your first name.';
             }
            
             if ($lastname == NULL) {
             $lastNameError = 'Please enter your last name'; }
            
             if ($seenfluffy==NULL) {
             $seenFluffyError = 'Please select a radio button.'; }
            
             if ($emailaddr==NULL) {
             $emailAddrError = 'Please enter a valid email address.'; }
            
            if (($firstNameError != '') || ($lastNameError != '')
            || ($seenFluffyError != '') || ($emailAddrError != '')) {
            include('addcase.php');
            exit();
            }else{
            addData($firstname, $lastname, $emailaddr, $thewhen, $howlong, $howmany, $description, $whatdo, $seenfluffy, $anythingelse);
        }    
    }//end validateForm

    function addData($firstname, $lastname, $emailaddr, $thewhen, $howlong, $howmany, $description, $whatdo, $seenfluffy, $anythingelse)
    {
        require "dbinfo.php";
    
        $query = "INSERT INTO aliens_abduction VALUES (NULL, '$firstname', '$lastname', '$emailaddr', '$thewhen', '$howlong', '$howmany', '$description', '$whatdo', '$seenfluffy', '$anythingelse')";
    
        if ($results = mysqli_query($connection, $query)){
    
            include "header.php";
            print <<<MESSAGE
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
        }else {
            echo "Unable to add record";
        }
    
    }//end addData

?>