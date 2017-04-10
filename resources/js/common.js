/*
 * 
 * Site-wide js methods
 */

function closeDialog(elementID)
{
	var body	= document.getElementById('ale-body');
	var id		= elementID;
	var dialog	= document.getElementById(id);
	
	body.removeChild(dialog);
}

function createArrow(section)
{
	var downArrow		=	document.createElement('div');
	var parent			=	document.getElementById('navBtn_home');
	downArrow.className = 'arrow-down';
	downArrow.id		= 'dwn';
	positionArrow(section, downArrow);
	parent.appendChild(downArrow);
	//console.log('done?');
}

function moveArrow(section)
{
	var downArrow	=	document.getElementById('dwn');
	positionArrow(section, downArrow);
}

function positionArrow(section, arrow)
{
	switch (section)
	{
		case 'home':
			arrow.style.left	=	'50%'; // Using magic numbers for now.
			break;
		case 'products':
			arrow.style.left	=	'225%';
			break;
		case 'contact':
			arrow.style.left	=	'420%';
			break;
		case 'estimates':
			arrow.style.left	=	'600%';
			break;
	}
}

function alertUser(reqResponse) 
{
	var response 	= JSON.parse(reqResponse);
	var count		= response.length;
	var result		= response[0];
	var header		= response[1];
	var message		= response[2];
	if (count - 3 > 0) 
	{
		// If there are predefined actions
		var actions		= [];
		for (j = 0 ; j < count - 3 ; j++)
		{
			actions[j]	=	response[3][j];
		}
		buildAlert(header, message, actions);
	} else {
		// Go with the default action: Accept
		buildAlert(header, message);
	}
}

function buildAlert(title, message, actions)
{
	// Currently does not support additional user actions, other than 'Accept'
	
	var actions		= 	actions || 0;
	var body		=	document.getElementById('ale-body');
	
	// Create Alert Box
	var alertBox	=	document.createElement('div');
	alertBox.setAttribute('id', 'alertBox');
	alertBox.setAttribute('class', 'alertBox material');
	
	// Add Close Button
	var closeButton	= document.createElement('span');
	closeButton.setAttribute('class', 'closeBtn');
	closeButton.setAttribute('id', 'modal-close');
	closeButton.setAttribute('onclick', "closeDialog('alertBox')");
	var x = document.createTextNode('x');
	closeButton.appendChild(x);
	alertBox.appendChild(closeButton);
	
	// Add Title
	var head		=	document.createElement('h2');
	var t			=	document.createTextNode(title);
	head.appendChild(t);
	alertBox.appendChild(head);
	
	// Add Message
	var msg			=	document.createElement('p');
	var m			=	document.createTextNode(message);
	msg.appendChild(m);
	alertBox.appendChild(msg);
	
	// Add Button(s)
	var input		=	document.createElement('input');
	input.setAttribute('class', 'gradient-button');
	input.setAttribute('type', 'button');
	input.setAttribute('id', 'acceptBtn');
	input.setAttribute('value', 'Accept');
	input.setAttribute('onclick', "closeDialog('alertBox')");
	alertBox.appendChild(input);
	
	body.appendChild(alertBox);
}

function toggleMenu()
{
	var menu		=	document.getElementById('ale-main-menu');
	if (menu.className == 'topNavBar topNavBar-hide') 
	{
		menu.className	=	'topNavBar topNavBar-show';
	} else {
		menu.className	=	'topNavBar topNavBar-hide';
	}
}