/*
 * This is the main js file used by the admin module
 */


function showLoadTimer(msg)
{
	var msg = msg || 'Loading...';
	console.log('Loading...');
	var body	=	document.getElementById('ale-body');
	var load	=	document.createElement('div');
	load.className	=	'load-notice material';
	load.setAttribute('id', 'loader');
	var	p		=	document.createElement('p');
	var t		=	document.createTextNode(msg);
	p.appendChild(t);
	load.appendChild(p)
	body.appendChild(load);
}

function hideLoadTimer()
{
	var body	=	document.getElementById('ale-body');
	var load	=	document.getElementById('loader');
	body.removeChild(load);
}

function saveAssetData()
{
	var aleAsset=	document.getElementById('ale-asset-num').dataset.asset;
	console.log(aleAsset);
	
	var cond_note	=	document.getElementById('condition_note');
	var location	=	document.getElementById('wh_location');
	var track		=	document.getElementById('track');
	var batch		=	document.getElementById('batch_name');
	var received	=	document.getElementById('date_received');
	var mnfr		=	document.getElementById('mnfr');
	var brand		=	document.getElementById('brand');
	var model		=	document.getElementById('model');
	var func		=	document.getElementById('function_desc');
	var title_x		=	document.getElementById('title_extn');
	var serial		=	document.getElementById('serial_num');
	var mod_no		=	document.getElementById('addtl_model');
	var mpn			=	document.getElementById('mpn');
	var yom			=	document.getElementById('yom');
	var weight		=	document.getElementById('weight');
	var price		=	document.getElementById('price');
	var cost		=	document.getElementById('cost');
	var quantity	=	document.getElementById('quantity');
	var vendor		=	document.getElementById('vendor');
	var condition	=	document.getElementById('item_condition');
	var cosmetic	=	document.getElementById('cosmetic');
	var testing		=	document.getElementById('testing');
	var components	=	document.getElementById('components');
	var shipping	=	document.getElementById('shipping_class');
	var desc		=	document.getElementById('m_desc');
	var emp_status	=	document.getElementById('emp_status');
//	var emp_cat		=	document.getElementById('vendor');
	var prev_owner	=	document.getElementById('prev_owner');
	var nbv			=	document.getElementById('nbv');
	var nibr		=	document.getElementById('nibr');
	var tm0			=	document.getElementById('tm0');
	var sap			=	document.getElementById('sap');
	var building	=	document.getElementById('src_building');
	var floor		=	document.getElementById('src_floor');
	var room		=	document.getElementById('src_room');
	
	var data	=	{	
						"aleAsset":			document.getElementById('ale-asset-num').dataset.asset,
						"condition_note": 	cond_note.dataset.value,
						"wh_location": 		location.value,
						"track": 			track.value,
						"batch_name":		batch.value,
						"date_received":	received.value,
						"mnfr":				mnfr.value,
						"brand":			brand.value,
						"model":			model.value,
						"function_desc":	func.value,
						"title_extn":		title_x.value,
						"serial_num":		serial.value,
						"addtl_model":		mod_no.value,
						"mpn":				mpn.value,
						"yom":				yom.value,
						"weight":			weight.value,
						"price":			price.value,
						"cost":				cost.value,
						"quantity":			quantity.value,
						"vendor":			vendor.value,
						"item_condition":	condition.value,
						"cosmetic":			cosmetic.value,
						"testing":			testing.value,
						"components":		components.value,
						"shipping_class":	shipping.value,
						"m_desc":			desc.value,
						"emp_status":		emp_status.value,
						//"emp_cat":		emp_cat.value,
						"prev_owner":		prev_owner.value,
						"nbv":				nbv.value,
						"nibr":				nibr.value,
						"tm0":				tm0.value,
						"sap":				sap.value,
						"src_building":		building.value,
						"src_floor":		floor.value,
						"src_room":			room.value
					};
//	console.log(data.condition_note);
	// Validity Check
//	Object.keys(data).forEach(function(curVal) {
//		var fff = data[curVal]
//		console.log(fff);
//	});
	
	// Check each field for validity
	var numErrs = 0;
	var fieldErrs	=	[];
	Object.keys(data).forEach(function(curVal) {
		var curItem		=	document.getElementById(curVal);
		console.log(curItem);
		if (curVal != 'aleAsset'&& curItem.dataset.val == 'false') {
			console.log(curItem.dataset.name + ' is INVALID!');
			fieldErrs.push(curItem.dataset.name);
			numErrs++;
		}
	});
	// If there are errors
	if (numErrs != 0) {
		var title 	=	'Notice: Invalid Fields';
		var message	=	'Please correct the following field(s): ';
		// Iterate through Error'd field names.
		fieldErrs.forEach(function(e) {
			//console.log(e);
			message += e + ', ';
		});
		message	=	message.substr(0, message.length-2);
		buildAlert(title, message)
	} else {
		updateInvAsset(data);
	}
}

function checkInput(newVal, field)
{
	var	valid	=	validateInput(newVal, field);
	
	if (valid === 1) {
		//console.log(newVal);
		markFieldValid(field);
	} else {
		markFieldInvalid(field);
	}
}

function updateInvAsset(json)
{
	//console.log(newVal);
	//var aleAsset=	document.getElementById('ale-asset-num').dataset.asset;
	//console.log(aleAsset);
	var url		=	'ajax_handler.php?controller=admin&action=updateInvItem';
	//var json	=	'{"aleAsset":"'+aleAsset+'","field":"'+field+'","newVal":"'+newVal+'"}';
	var json		=	encodeURIComponent(JSON.stringify(json));
	console.log(json);
	var callback=	updateInvAssetResponse;
	makeRequest(url, json, callback);
	
}

function updateInvAssetResponse(response, nextField)
{
	console.log(response);
	var res	=	JSON.parse(response);
	if (res[0] == 0)
	{
		console.log('fail');
		alertUser(response);
	}
	if (res[0] === 1)
	{
		console.log('success');
		alertUser(response);
	}
	updateAssetView();
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
	fd.className += ' invalid-input';
	fd.setAttribute('data-val', 'false');
}

function markFieldValid(field)
{
	var fd	=	document.getElementById(field);
	fd.className = fd.className.replace('invalid-input', '');
	fd.setAttribute('data-val', 'true');
}

function makeRequest(url, json, callback, arg) 
{
	var arg	=	arg || 'null';
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
				if (arg != 'null') {
					callback(rt, arg);
				} else {
					callback(rt);
				}
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
