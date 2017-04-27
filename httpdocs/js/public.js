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

function moveFeaturedAds(mode, ad_iteration)
{
	// Change each ad such that it moves down one ad-length
	var i 		=	0;
	var ad_i	=	ad_iteration;
	if (document.getElementById('featAd_' + ad_i + '_0').style.left == '0em' && mode == 0) 
	{
		// don't browse left if the left-most ad is displayed
	} else {
		while (document.getElementById('featAd_' + ad_i + '_' + i))
		{
			var ad			=	document.getElementById('featAd_' + ad_i + '_' + i);
			var curPos		=	ad.style.left || '0em';
			curPos			=	curPos.slice(0, curPos.length - 2);
			i++;
			ad.style.left		=	curPos.toString() + 'em';
			switch (mode)
			{
				case 0:
				case 'left':
					var newPos		=	Number(curPos) + 15;
					newPos			=	newPos.toString() + 'em';
					ad.style.left	=	newPos;
					console.log("New Position " + newPos);
					break;
				case 1:
				case 'right':
					var newPos		=	Number(curPos) - 15;
					newPos			=	newPos.toString() + 'em';
					ad.style.left	=	newPos;
					console.log("New Position " + newPos);
					break;
			}
		}
	}
}

function submitNewsletterForm()
{
	var firstName	=	document.getElementById('fname').value;
	var lastName	=	document.getElementById('lname').value;
	var email		=	document.getElementById('email').value;
	var phone		=	document.getElementById('f-phone').value;
	//console.log(phone);
	
	var fail		=	validateNewsletterForm(firstName, lastName, email);
	
	if (fail.length != 0)
	{
		var title	=	'Missing Information';
		var message	=	'Please enter your ';
		for (j = 1 ; j <= fail.length ; j++)
		{
			if (j != 1 && j != fail.length) message += ', ';
			if (j == fail.length) message += ' and ';
			message += fail[(j - 1)];
		}
		buildAlert(title, message)
	} else {
		(function()
		{
			var req;
			makeRequest('ajax_handler.php?controller=public&action=submitForm', firstName, lastName, email, phone);
	
			function makeRequest(url, firstName, lastName, email, phone)
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
					req.send('fname=' + firstName + "&lname=" + lastName + '&email=' + email + '&phone=' + phone + '&reqIsAjax=true&formType=newsletter');
					console.log("Request sent.")
			}
	
			function alertContents()
			{
				if (req.readyState === XMLHttpRequest.DONE)
				{
					if (req.status === 200)
					{
						// If success, alert the user.
						console.log(req.responseText);
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
}

function validateNewsletterForm(firstName, lastName, email)
{
	var fail = [];
	if (firstName == '')	fail.push('first name');
	if (lastName == '') 	fail.push('last name');
	if (email == '')		fail.push('email');
	return fail;
}

function submitQuestion()
{
	var firstName	=	document.getElementById('fname').value;
	var lastName	=	document.getElementById('lname').value;
	var email		=	document.getElementById('email').value;
	var msg			=	document.getElementById('msg').value;
	var phone		=	document.getElementById('f-phone').value;
	//console.log(phone);
	
	var fail		=	validateQuestion(firstName, lastName, email, msg);
	
	if (fail.length != 0)
	{
		var title	=	'Missing Information';
		var message	=	'Please enter your ';
		for (j = 1 ; j <= fail.length ; j++)
		{
			if (j != 1 && j != fail.length) message += ', ';
			if (j == fail.length) message += ' and ';
			message += fail[(j - 1)];
		}
		buildAlert(title, message)
	} else {
		(function()
		{
			var req;
			makeRequest('ajax_handler.php?controller=public&action=submitForm', firstName, lastName, email, msg, phone);
	
			function makeRequest(url, firstName, lastName, email, msg, phone)
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
					req.send('fname=' + firstName + "&lname=" + lastName + '&email=' + email + '&message=' + msg + '&phone=' + phone + '&reqIsAjax=true&formType=question');
					console.log("Request sent.")
			}
	
			function alertContents()
			{
				if (req.readyState === XMLHttpRequest.DONE)
				{
					if (req.status === 200)
					{
						// If success, alert the user.
						console.log(req.responseText);
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
}

function validateQuestion(firstName, lastName, email, msg)
{
	var fail = [];
	if (firstName == '')	fail.push('first name');
	if (lastName == '') 	fail.push('last name');
	if (email == '')		fail.push('email');
	if (msg == '')			fail.push('message');
	return fail;
}

function submitEstimateForm()
{
	var firstName	=	document.getElementById('fname').value;
	var lastName	=	document.getElementById('lname').value;
	var email		=	document.getElementById('email').value;
	var msg			=	document.getElementById('msg').value;
	var phone		=	document.getElementById('phone').value;
	var inst		=	document.getElementById('instrument').value;
	var info		=	document.getElementById('info_req').value;
	var referrer	=	document.getElementById('referrer').value;
	var newsletter	=	document.getElementById('newsletter').value;
	var website		=	document.getElementById('website').value;
	
	var fail		=	validateEstimateForm(firstName, lastName, email, inst, info);
	
	if (fail.length != 0)
	{
		var title	=	'Missing Information';
		var message	=	'Please enter your ';
		for (j = 1 ; j <= fail.length ; j++)
		{
			if (j != 1 && j != fail.length) message += ', ';
			if (j == fail.length) message += ' and ';
			message += fail[(j - 1)];
		}
		buildAlert(title, message)
	} else {
		(function()
		{
			var req;
			makeRequest('ajax_handler.php?controller=public&action=submitForm', firstName, lastName, email, msg, phone, inst, info, referrer, newsletter, website);
	
			function makeRequest(url, firstName, lastName, email, msg, phone, inst, info, referrer, newsletter, website)
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
					req.send('fname=' + firstName + "&lname=" + lastName + '&email=' + email + '&message=' + msg + '&phone=' + phone + '&instrument=' + inst + '&info_req=' + info + '&referrer=' + referrer + '&newsletter=' + newsletter + '&website=' + website + '&reqIsAjax=true&formType=estimate');
					console.log("Request sent.")
			}
	
			function alertContents()
			{
				if (req.readyState === XMLHttpRequest.DONE)
				{
					if (req.status === 200)
					{
						// If success, alert the user.
						console.log(req.responseText);
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
}

function validateEstimateForm(firstName, lastName, email, inst, info)
{
	var fail = [];
	if (firstName == '')	fail.push('first name');
	if (lastName == '') 	fail.push('last name');
	if (email == '')		fail.push('email');
	if (inst == '')			fail.push('instrument of interest');
	if (info == 'Please select an option')	fail.push('requested information type');
	return fail;
}

function showStoreCategories()
{
	var dropdown			=	document.getElementById('s_categories');
	if (dropdown.style.display == '' || dropdown.style.display	== 'none')
	{
		dropdown.style.display	=	'block';
	} else {
		dropdown.style.display	=	'none';
	}
}

function switchCategory(category)
{
//	console.log('running');
//	console.log(event.target.dataset.name);
	var name		=	category || event.target.dataset.name;
	var label		=	mapCategories(name);
	var button		=	document.getElementById('category-label');
	var goBtn		=	document.getElementById('searchBtn');
	var searchField	=	document.getElementById('search-input');
	while (button.firstChild) {
		button.removeChild(button.firstChild);
	}
	var text	=	document.createTextNode(label);
	button.appendChild(text);
	button.dataset.name	=	name;
	goBtn.setAttribute('onclick', 'searchSite(\''+name+'\')');
	searchField.setAttribute('onKeydown', "if (event.keyCode==13) searchSite('"+name+"')");
}

function mapCategories(dataName, ret)
{
	var r		=	ret || 'catName';
	var catName	=	'';
	switch (dataName)
	{
		case 'all':
			catName	=	'All';
			//num 	=	'oh no';
			break;
		case 'analytical':
			catName	=	'Analytical Instruments';
			num		=	'3,1';
			break;
		case 'automation':
			catName	=	'Automation & Robotics';
			num		=	'1,1';
			break;
		case 'centrifuges':
			catName	=	'Centrifuges';
			num		=	'12,1';
			break;
		case 'cooling':
			catName	=	'Cooling Devices';
			num		=	'17,1';
			break;
		case 'electrophoresis':
			catName	=	'Electrophoresis';
			num		=	'46,1';
			break;
		case 'heating':
			catName	=	'Heating Devices';
			num		=	'22,1';
			break;
		case 'imaging':
			catName	=	'Imaging';
			num		=	'29,1';
			break;
		case 'supplies':
			catName	=	'Lab Supplies';
			num		=	'61,1';
			break;
		case 'microscopes':
			catName	=	'Microscopes';
			num		=	'32,1';
			break;
		case 'mixers':
			catName	=	'Mixers & Stirrers';
			num		=	'36,1';
			break;
		case 'other':
			catName	=	'Other Lab Equipment';
			//num		=	'what happens here?';
			break;
		case 'pcr':
			catName	=	'PCR DNA Thermal Cyclers';
			num		=	'43,1';
			break;
		case 'pumps':
			catName	=	'Pumps';
			num		=	'49,1';
			break;
		case 'scales':
			catName	=	'Scales & Balances';
			num		=	'55,1';
			break;
		case 'dna-seq':
			catName =	'DNA Sequencers';
			num		=	'67,1';
	}
	switch (r)
	{
		case 'catName':
			var result = catName;
			break;
		case 'num':
			var result	=	num;
			break;
	}
	return result;
}

function expandCategory(id)
{
	var a	=	document.getElementById(id);
	var div	=	document.getElementById(id + '-d');
	console.log(a.className)
	switch (a.className)
	{
		case 'pa':
			a.className		=	'pa menu-expand';
			div.className	=	'bbc-dropdown';
			break;
		case 'pa menu-expand':
			a.className		=	'pa';
			div.className	=	'bbc-dropdown bbc-hidden';
			break;
		default:
			a.className		=	'pa menu-expand';
			div.className	=	'bbc-dropdown';
	}
}

function searchSite(sb)
{
	console.log('searching.....');
	var searchBar	=	sb 	|| 0;
	var category	=	document.getElementById('category-label').dataset.name;
	var	key			=	document.getElementById('search-input').value;
	if (category == 'all') {
		if (searchBar != 0) {
			window.location	=	'?controller=public&action=store&section=store&title=Search&q=' + key + '&sb=' + searchBar;
		} else {
			window.location	=	'?controller=public&action=store&section=store&title=Search&q=' + key;
		}
	} else {
		var num			=	mapCategories(category, 'num');
		if (searchBar != 0) {
			window.location	=	'?controller=public&action=store&section=store&title=Search&category=' + num + '&q=' + key + '&sb=' + searchBar;
		} else {
			window.location	=	'?controller=public&action=store&section=store&title=Search&category=' + num + '&q=' + key;
		}
	}
	
}