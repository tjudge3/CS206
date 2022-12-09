//In this lab assignment we validated the inputs and gave error messages
<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Alien Abduction</title>
    <link href="test.css" rel="stylesheet" type="text/css" />
</head>
<body>
<h2>Aliens Abducted Me - Report an Abduction!</h2>

<h3>Share your story of alien abduction:</h3>

<form action="report.php" method="post">
<div class='FlexContainerRow'>
            <div><label for="fname">*First Name</label></div>
            <div><input type="text" id="fname" name="firstname" placeholder="Your First name.." value="<?php print $firstname; ?>"><span class="error"><?php print $firstNameError; ?></span></div>
</div>
<div class='FlexContainerRow'>
            <div><label for="lname">*Last name:</label></div>
            <div><input type="text" id="lname" name="lastname" placeholder="Your Last name.." value="<?php print $lastname; ?>"><span class="error"><?php print $lastNameError; ?></span></div>
</div>
<div class='FlexContainerRow'>
            <div><label for="email">*What is your email address?</label></div>
            <div><input type="email" id="email" name="emailaddr" placeholder="Your Email Address.." value="<?php print $emailaddr; ?>"><br /><span class="error"><?php print $emailAddrError; ?></span></div>
</div>
<div class='FlexContainerRow'>
            <div><label for="when">When did it happen?</label></div>
            <div><input type="date" id="when" name="thewhen" placeholder="When did it happen?.." value="<?php print $thewhen; ?>"></div>
</div>
<div class='FlexContainerRow'>
            <div><label for="hlong">How long were you gone?</label></div>
            <div><input type="text" id="hlong" name="howlong" placeholder="How long were you gone?.." value="<?php print $howlong; ?>"></div>
</div>
<div class='FlexContainerRow'>
            <div><label for="hmany">How many did you see?</label></div>
            <div><input type="number" id="hmany" name="howmany" placeholder="How many did you see?.." value="<?php print $howmany; ?>"></div>
</div>
<div class='FlexContainerRow'>
            <div><label for="describe">Describe them:</label></div>
            <div><textarea id="describe" name="description" rows="4" cols="50" placeholder="Please Describe the Aliens"><?php print $description; ?></textarea></div>
</div>
<div class='FlexContainerRow'>
            <div><label for="what">What did they do to you?</label></div>
            <div><input type="text" id="what" name="whatdo" placeholder="What did they do to you?.." value="<?php print $whatdo; ?>"></div>
</div>
<div class='FlexContainerRow'>
            <div>*Have you seen my dog Fluffy?</div>
            <div>  
<input type="radio" id="seenfluffy_yes" name="seenfluffy" value="Yes" <?php if ($seenfluffy == 'Yes') {print 'checked'; } ?>><label for="seenfluffy_yes">Yes</label>
  	<input type="radio" id="seenfluffy_no" name="seenfluffy" value="No" <?php if ($seenfluffy == 'No') {print 'checked'; } ?>><label for="seenfluffy_no">No</label><br /><span class="error"><?php print $seenFluffyError; ?></span></div>
</div>
<div class='FlexContainerRow'>
            <div><img src="fluffy.jpg" alt="Picture of my amazing dog fluffy who is missing"></div>
            <div></div>
</div>
<div class='FlexContainerRow'>
            <div><label for="anything">Anything else you want to add?</label></div>
            <div><input type="text" id="anything" name="anythingelse" placeholder="Anything else you want to add?.." value="<?php print $anythingelse; ?>"></div>
</div>
<h3>*Required Fields</h3>

<input type="submit" value="Report Abduction">

</form>

</body>
</html>

