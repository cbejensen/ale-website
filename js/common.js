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
	console.log('done?');
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
	var header		= response[0];
	var message		= response[1];
	if (count - 2 > 0) 
	{
		// If there are predefined actions
		var actions		= [];
		for (j = 0 ; j < count - 2 ; j++)
		{
			actions[j]	=	response[2][j];
		}
		buildAlert(header, message, actions);
	} else {
		// Go with the default action: Accept
		buildAlert(header, message);
	}
}

function buildAlert(title, message, actions)
{
	var actions		= 	actions || 0;
	var body		=	document.getElementById('ale-body');
	
	// Create Alert Box
	var alertBox	=	document.createElement('div');
	alertBox.setAttribute('id', 'alertBox');
	alertBox.setAttribute('class', 'alertBox');
	
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
	input.setAttribute('type', 'button');
	input.setAttribute('id', 'acceptBtn');
	input.setAttribute('value', 'Accept');
	input.setAttribute('onclick', "closeDialog('alertBox')");
	alertBox.appendChild(input);
	
	body.appendChild(alertBox);
}