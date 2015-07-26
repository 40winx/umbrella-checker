// uc.js

// This funciton is called when the form is submitted 
// It retrieves the user-supplied zip code and checks its validity
// If the zip is a 5-digit number, it is passed on to umbrellaCheck(),
// if not, an error is reported.
function submitform(serverpage, objID) {
	var zip = document.getElementById('zipcode').value;
	obj = document.getElementById(objID);
	var re = new RegExp(/^\d\d\d\d\d$/);
	if (zip.match(re)){
		umbrellaCheck(serverpage, obj, zip);
	}
	else {
		obj.innerHTML = '<img src="error.gif" alt="Error" style="float: left; margin-left: -25px;"/><div id="forecast">Please enter a <span style="color: #92ae01;">valid zip code</span> and try again to find out if you should bring an umbrella to work today.</div>';
	}
	
}

// This function creates the XMLHttpRequest object needed for this AJAX application.
// It receives the response from the server (getumbrella.php) with the supplied zip code
// and uses it to update the results div. It is also cross-browser compatible.
function umbrellaCheck(serverpage, obj, zip)
{
if (window.XMLHttpRequest) { // code for IE7+, Firefox, Chrome, Opera, Safari
	xmlhttp=new XMLHttpRequest();
	}
else { // code for IE6 and IE5
	xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
	}
//xmlhttp.open("GET", serverpage+zip, true)
xmlhttp.open("GET", serverpage+zip, true)
xmlhttp.onreadystatechange = function() {
	if (xmlhttp.readyState==4 && xmlhttp.status==200) {
		obj.innerHTML = xmlhttp.responseText;
	}
}
xmlhttp.send()
}
