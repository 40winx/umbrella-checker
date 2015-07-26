<?php
// umbrella.php

echo <<<END
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<title>Umbrella Check</title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<link rel="stylesheet" type="text/css" href="uc.css" />
	<link rel="icon" type="image/png" href="umbutton.gif"/>
	<script type="text/javascript" src="uc.js"></script>
</head>
<body>
<div id="wrapper">
<div id="container">

<!-- title -->
<img src="uctitle1.gif" alt="UMBRELLA CHECK" style="height: 100px;"/>
<br/><br/>

<!-- Begin form -->
<form action="" onSubmit="submitform('getumbrella.php?q=', 'results'); return false;">
<p>

<!-- user is asked to input zip code. Javascript provided to format textbox -->
<input id="zipcode" type="text" value="Please enter a zipcode." onFocus="this.value='';" onBlur="if(this.value==''){this.value='Please enter a zipcode.';}"/>
<input id="umbrellabutton" name="umbrellabutton" type="image" src="umbutton.gif" alt="Umbrella Button" />
</p>
</form> <!--end form -->

<!-- Results of the form submission will be displayed in the results div -->
<div id="results">
</div>
</div> <!-- end container -->
</div> <!-- end wrapper -->
<div id="footer" style="margin: 5px auto 5px auto; text-align: center; display: block; color: #121212; font-size: .6em">Umbrella Check Application -- Winx Goll</div>
</body>
</html>
END;
?>
