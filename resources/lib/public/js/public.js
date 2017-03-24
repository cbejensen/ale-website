/*
 *
 *
 */
function changeNavArrows(mode)
{
	var leftArrow	=	document.getElementById('leftArrow');
	var rightArrow	=	document.getElementById('rightArrow');
	
	switch (mode)
	{
		case 0:
		case 'shrink':
			console.log('Shrinking Nav Arrows');
			leftArrow.className		=	'left-arrow';
			rightArrow.className	=	'right-arrow';
			break;
		case 1:
		case 'enlarge':
			console.log('Enlarging Nav Arrows');
			leftArrow.className 	=	'left-arrow material';
			rightArrow.className	=	'right-arrow material';
			break;
	}
}

function moveFeaturedAds(mode)
{
	// Change each ad such that it moves down one ad-length
	var i = 0;
	while (document.getElementById('featAd_' + i))
	{
		console.log('Moving Ad #' + i);
		var ad			=	document.getElementById('featAd_' + i);
		var curPos		=	ad.style.left || '0rem';
		console.log(ad.style.left);
		console.log(curPos);
		i++;
		ad.style.left		=	curPos;
		switch (mode)
		{
			case 0:
			case 'left':
				ad.style.left	=	'calc(' + curPos + ' + 15rem)';
				break;
			case 1:
			case 'right':
				ad.style.left	=	'calc(' + curPos + ' - 15rem)';
				break;
		}
	}
}

function submitQuestion()
{
	var firstName	=	document.getElementById('fname').value;
	var lastName	=	document.getElementById('lname').value;
	var email		=	document.getElementById('email').value;
	var msg			=	document.getElementById('msg').value;
	
	(function()
	{
		var req;
		makeRequest('ajax_handler.php?controller=public&action=submitQuestion', firstName, lastName, email, msg);

		function makeRequest(url, firstName, lastName, email, msg)
		{
			req = new XMLHttpRequest();

				if (!req)
				{
					alert('Sorry! We couldn\'t connect you to the server right now, please try submitting the form again.');
					return false;
				}
				req.onreadystatechange = alertContents;
				req.open('POST', url);
				req.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
				req.send('fname=' + firstName + "&lname=" + lastName + '&email=' + email + '&msg=' + msg);
				console.log("Request sent.")
		}

		function alertContents()
		{
			if (req.readyState === XMLHttpRequest.DONE)
			{
				if (req.status === 200)
				{
					// If success, alert the user.
					alertUser(req.responseText);
				}
				else
				{
				alert('We\'re sorry! There was a problem with the request. Please try your submission again. If the problem persists, please report this bug.');
				}
			}
		}
	})();
}