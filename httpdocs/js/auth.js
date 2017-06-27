/*
 * Name:	auth.js
 * Description:	Facilitates communication with the server to authenticate users of the system.
 *
 */

function authenticateUser()
{
	//console.log(getParameterByName('controller'));
//	var test	=	getParameterByName('uri');
//	console.log(test);
//	getURIParams(test);
//	console.log(urlParams);
	var obj	=	new Object;
	obj.un	=	document.getElementById('username').value;
	obj.pw	=	document.getElementById('password').value;
	var url	=	'auth.php';
	var json=	encodeURIComponent(JSON.stringify(obj));
	makeRequest(url, json, authenticateUserResponse);
}

function authenticateUserResponse(res)
{
	var res	=	JSON.parse(res);
	console.log(res);
	if (res.result === 1) {
//		var addr		=	'index.php?';
//		Object.keys(urlParams).forEach(function(i){
//			addr	+=	i + '=' + urlParams[i] + '&';
//		});
//		console.log(addr);
		window.location.href	=	requestURI;//addr.substring(0, addr.length - 1);
	} else {
		showLoginError(res.message);
	}

}

//function getParameterByName(name, url) {
//	if (!url) url	=	window.location.href;
//	var name	=	name.replace(/[\[\]]/g, "\\$&");
//	var regex 	=	new RegExp(name + "(=([^#]*)|#|$)"),
//	results 	=	regex.exec(url);
//	if (!results) return null;
//	if (!results[2]) return '';
//	var newRes	=	decodeURIComponent(results[2].replace(/\+/g, " "));
//	var results	=	newRes.replace(/^[^\?]*\?/, '');
//	return results;
//}

//var urlParams;
//function getURIParams(testQ)
//{
//	var match,
//		pl	=	/\+/g,	// Regex for replacing addition symbol with a space
//		search	=	/([^&=]+)=?([^&]*)/g,
//		decode	=	function (s) { return decodeURIComponent(s.replace(pl, " ")); },
//		query	=	testQ//window.location.search.substring(1);
//
//	urlParams	=	{};
//	while (match = search.exec(query))
//		urlParams[decode(match[1])] = decode(match[2]);
//}

function showLoginError(message)
{
	var errBox	=	document.getElementById('login-error');
	var msg		=	document.getElementById('error-msg');
	while (msg.hasChildNodes()) {
		msg.removeChild(msg.lastChild);
	}
	var txt		=	document.createTextNode(message);
	msg.appendChild(txt);
	errBox.style.display	=	'block';
}
