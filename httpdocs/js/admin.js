/*
 * This is the main js file used by the admin module
 */


function showLoadTimer()
{
	console.log('Loading...');
}

function hideLoadTimer()
{
	//var fas = 'as';
}

function updateInvAsset(newVal, field)
{
	var	valid	=	validateInput(newVal, field);
	
	if (valid === 1) {
		//console.log(newVal);
		markFieldValid(field);
		var aleAsset=	document.getElementById('ale-asset-num').dataset.asset;
		console.log(aleAsset);
		var url		=	'ajax_handler.php?controller=admin&action=updateInvItem';
		//var json	=	'{"aleAsset":"'+aleAsset+'","field":"'+field+'","newVal":"'+newVal+'"}';
		var array	=	new Object;
		array.aleAsset	=	aleAsset;
		array.field		=	field;
		array.newVal	=	newVal;
		var json		=	encodeURIComponent(JSON.stringify(array));
		console.log(json);
		var callback=	updateInvAssetResponse;
		makeRequest(url, json, callback);
	} else {
		markFieldInvalid(field);
	}
}

function updateInvAssetResponse(response)
{
	console.log(response);
	var res	=	JSON.parse(response);
	if (res[0] == 0)
	{
		console.log('fail');
		alertUser(response);
	}
	if (res.result === 1)
	{
		console.log('success');
	}
	updateInvAssetView();
	console.log('Done');
}

function updateInvAssetView()
{
	
}

function isValidDate(dateString) {
	  var regEx = /^\d{4}-\d{2}-\d{2}$/;
	  return dateString.match(regEx) != null;
	}

function validateInput(val, field)
{
	switch (field) 
	{
		case 'date_received':
			if (val == '') {
				var result = 1;
				break;
			}
			if (isValidDate(val)) var result = 1;
			else var result = 0;
			break;
		case 'yom':
			if (val == '') {
				var result = 1;
				break;
			}
			if (isNaN(val)) var result = 0;
			else {
				if (val.length != 4) var result = 0;
				if (val < 1901 || val > 2099) var result = 0;
				else var result = 1;
			}
			break;
		case 'weight':
		case 'price':
			if (isNaN(val)) var result	=	0;
			else var result	=	1;
			break;
		case 'quantity':
		case 'cost':
		case 'nbv':
			var val = Number(val);
			if (Number.isInteger(val)) var result	=	1;
			else var result	=	0;
			break;
		default:
			var result = 1;
	}
	return result;
}

function markFieldInvalid(field)
{
	var fd	=	document.getElementById(field);
	fd.setAttribute('class', 'invalid-input');
}

function markFieldValid(field)
{
	var fd	=	document.getElementById(field);
	fd.setAttribute('class', '');
}

function makeRequest(url, json, callback) 
{
	req = new XMLHttpRequest();

		if (!req) 
		{
			alert('Giving Up :( Cannot create an XMLHTTP instance');
			return false;
		}
		req.onreadystatechange = alertContents;
		req.open('POST', url);
		var params = "json=" + json + "&reqIsAjax=1";
		req.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');	// 
		req.send(params);
		
	function alertContents()
	{
		if (req.readyState === XMLHttpRequest.DONE) 
		{
			if (req.status === 200)
			{
				console.log('Request Complete; Status 200');
				var rt				= req.responseText;
				callback(rt);
			} 
			else 
			{
				alert('There was a problem with the request.');
			}
		}
	}
}

/*
 * The next 3 functions demonstrate CALLBACK FUNCTIONS
 */
function TESTupdateInvAsset(newVal, field)
{
	//console.log(newVal);
	test(otherTest, newVal);
}

function test(func, newVal)
{
	var res	=	func(newVal);
	console.log(res);
}

function otherTest(nv)
{
	return nv + ' This!';
}
/*
 * END CALLBACK DEMO
 */
