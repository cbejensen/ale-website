/**
 * 
 */
function createArrow(section) {
	var downArrow	=	document.createElement('div');
	var parent		=	document.getElementById('navBtn_home');
	downArrow.className = 'arrow-down';
	downArrow.id	= 'dwn';
	positionArrow(section, downArrow);
	parent.appendChild(downArrow);
	console.log('done?');
}

function moveArrow(section) {
	var downArrow	=	document.getElementById('dwn');
	positionArrow(section, downArrow);
}

function positionArrow(section, arrow)
{
	switch (section)
	{
		case 'home':
			arrow.style.left	=	'50%'; // Magic Numbers :(
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