<?php
// getumbrella.php

//Retrieves the zipcode that was entered by the user
$q=sanitize_string($_GET['q']);

// A bit of security against injection
function sanitize_string($var) {
$var = intval($var);
$var = strip_tags($var);
$var = htmlentities($var);
return stripslashes($var);
}


// The weather information used for this application comes from Weather Underground's Weather API
// The zip code (q) is used to retrieve the appropriate XML file
$weather = file_get_contents('http://api.wunderground.com/api/f95e4cc651898ec8/conditions/q/'.$q.'.xml');
$xml = new SimpleXMLElement($weather);


// Works through the XML tree to find how much precipitation is expected today
$result = $xml->xpath('/response/current_observation/weather');

// If the zip is valid, the path will return data to work with
if ($result != FALSE) {
	while(list( , $node) = each($result)) {
		if (strpos($node,"Rain") !== FALSE ||
			strpos($node,"Drizzle") !== FALSE ||
			strpos($node,"Mist") !== FALSE ||
			strpos($node,"Hail") !== FALSE ||
			strpos($node,"Thunderstorm") !== FALSE) { 

			echo <<<END
			<img src="bring.gif" alt="Umbrella" style="float: left; margin-left: -25px;"/>
			<div id="forecast">
			Today's Forecast: <span style="color: #92ae01;">$node</span>. <br/>You'd better bring an umbrella.
			</div>
END;
    		}
		else {
			echo <<<END
			<img src="dontbring.gif" alt="No Umbrella" style="float: left; margin-left: -25px;"/>
			<div id="forecast">
			Today's Forecast: <span style="color: #92ae01;">$node</span>. <br/>No need to bring your umbrella.
			</div>
END;
		}
	}
}

// If the zip isn't valid, the xpath will return false
else {
	echo <<<END
	<img src="error.gif" alt="Error" style="float: left; margin-left: -25px;"/>
	<div id="forecast">
	Please enter a <span style="color: #92ae01;">valid zip code</span> and try again to find out if you should bring an umbrella to work today.
	</div>
END;
}

?>