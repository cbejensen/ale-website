/*
 * Name:	auth.js
 * Description:	Facilitates communication with the server to authenticate users of the system.
 *
 */

function authenticateUser()
{
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
		window.location.href	=	requestURI;
	} else {
		showLoginError(res.message);
	}

}

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
