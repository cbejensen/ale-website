/*
 * This is the main js file used by the admin module
 */


function showLoadTimer(msg)
{
	var msg 	= 	msg || 'Loading...';
	var body	=	document.getElementById('ale-body');
	var load	=	document.createElement('div');
	
	load.className	=	'load-notice material';
	load.setAttribute('id', 'loader');

	var p		=	document.createElement('p');
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
	var aleAsset	=	document.getElementById('ale-asset-num').dataset.asset;
	var data	=	getAssetData();	
	
	// Check each field for validity
	var numErrs 	=	0;
	var fieldErrs	=	[];
	Object.keys(data).forEach(function(i) {
		switch (i) {
			case 'ale_categories':
			case 'item_status':
				return;
		}
		var curItem		=	document.getElementById(i);
		if (i != 'aleAsset' && curItem.dataset.val == 'false') {
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
			message +=	e + ', ';
		});

		message		=	message.substr(0, message.length-2);
		buildAlert(title, message);
	} else {
		updateInvAsset(data);
	}
}

function checkInput(newVal, field)
{
	var	valid	=	validateInput(newVal, field);
	if (valid === 1) {
		markFieldValid(field);
	} else {
		markFieldInvalid(field);
	}
}

function closeAssetView(mode) 
{
	var mode	=	mode || 0;
	var main	=	document.getElementById('list-main');
	var view 	=	document.getElementById('asset-view');
	main.removeChild(view);
	if (mode === 1) {
		var url		=	getURI();
		history.pushState(null, null, url);
	}
}

function closeAssetViewAndPushState()
{
	closeAssetView(1);
}

function updateInvAsset(json)
{
	var url		=	'ajax_handler.php?controller=admin&action=updateInvItem';
	var json	=	encodeURIComponent(JSON.stringify(json));
	var callback	=	updateInvAssetResponse;
	makeRequest(url, json, callback);
}

function updateInvAssetResponse(response, nextField)
{
	//console.log(response);
	var res	=	JSON.parse(response);
	console.log(res);
	if (res[0] == 0)
	{
		alertUser(response);
	}
	if (res[0] === 1)
	{
		buildAlert(res[1], res[2]);
		updateListOptions(res[3]);
//		updateList('itm');
	}
	updateAssetView();
//	console.log('Done');
}

function updateListOptions(opts)
{
	listOptions	=	opts;
}

function getInvAssetView(evt, mode)
{
	var mode	=	mode || 0;
	var obj		=	new Object;
	var url		=	'ajax_handler.php?controller=admin&action=getInvAssetData';

	if (mode === 0) {
		asset	=	evt.target.parentNode.id;
	} else {
		asset	=	evt;
	}
	obj.aleAsset	=	asset;
	var json	=	encodeURIComponent(JSON.stringify(obj));
	makeRequest(url, json, getInvAssetViewResponse);
}

function getInvAssetViewResponse(res)
{
	var res		=	JSON.parse(res);
	var exists	=	document.getElementById('loader');
	if (exists != null){
		hideLoadTimer();
	}
	data		=	res.data;
	photos		=	res.photos;
	categories	=	res.categories;
	item_status	=	res.item_status;
	displayInvAsset();
}

function updateList(list)
{
	var final_url	=	'ajax_handler.php?controller=admin&action=updateList&ltype=' + list + '&lscp=' + url.lscp + '&srt_d=' + url.srt_d + '&srt_f=' + url.srt_f + '&rp=' + url.page;
	var json=	'';
	makeRequest(final_url, json, updateListResponse);
}

function updateListResponse(res)
{
//	console.log(res);
	var listTable	=	document.getElementById('list-table-body');
	while (listTable.hasChildNodes()) {
		listTable.removeChild(listTable.lastChild);
	}
	json		=	JSON.parse(res);
	console.log(json);
	tableRows	=	json.rows;
	totalResults=	json.results;
	renderList();
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
		case 'emp_subcategory':
			console.log('aeraet ' + val);
			if (isNaN(val) || val === 0) var result = 0;
			else var result = 1;
			break;
		default:
			var result = 1;
	}
	return result;
}

function markFieldInvalid(field)
{
	var fd		=	document.getElementById(field);
	fd.className 	+=	' invalid-input';
	fd.setAttribute('data-val', 'false');
}

function markFieldValid(field)
{
	var fd		=	document.getElementById(field);
	fd.className 	=	fd.className.replace('invalid-input', '');
	fd.setAttribute('data-val', 'true');
}

function makeRequest(url, json, callback, arg) 
{
	var arg	=	arg || 'null';
	req 	= 	new XMLHttpRequest();

	if (!req) {
		alert('Giving Up :( Cannot create an XMLHTTP instance');
		return false;
	}

	req.onreadystatechange	=	alertContents;
	req.open('POST', url);
	var params 		=	"json=" + json + "&reqIsAjax=1";
	req.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
	req.send(params);
		
	function alertContents()
	{
		if (req.readyState === XMLHttpRequest.DONE) {
			if (req.status === 200)	{
				console.log('Request Complete; Status 200');
				var rt				= req.responseText;
				if (arg != 'null') {
					callback(rt, arg);
				} else {
					callback(rt);
				}
			} 
			else {
				alert('There was a problem with the request.');
			}
		}
	}
}

function toggleUserInfo()
{
	var info	=	document.getElementById('user-data');
	if (info.style.display == 'block') {
		info.style.display	=	'none';
	} else {
		info.style.display	=	'block';
	}

}

function signOut()
{
	var obj		=	new Object;
	obj.logout	=	1;
	var url		=	'auth.php';
	var json	=	encodeURIComponent(JSON.stringify(obj));
	makeRequest(url, json, signOutResponse);
}

function signOutResponse(res)
{
	if (res !== '') {
		var res	=	JSON.parse(res);
		buildAlert('Logout Error', res.message);
	} else {
		window.location.href = '?controller=admin&action=home';
	}
}

function addToExportList()
{
	var table	=	document.getElementById('list-table-body');
	var selected	=	[];
	Object.keys(table.childNodes).forEach(function(i) {
		if (table.childNodes[i].id == 'list-header-row') {return;} // There may eventually be a select-all box here.
		if (table.childNodes[i].childNodes[0].childNodes[0].checked === true) {
			selected.push(tableRows[i-1].id); // The tableRows object doesn't include the header.
		};
	});

	var url		=	'ajax_handler.php?controller=admin&action=addToExportList';
	var json	=	encodeURIComponent(JSON.stringify(selected));
	makeRequest(url, json, addToExportResponse);
}

function addToExportResponse(res)
{
	console.log(res);
	var res	=	JSON.parse(res);
	if (res.result === 0) {
		buildAlert('Server Error', 'The server was unable to process your request at this time. Please try again.');
	}
	if (res.result === 1) {
		buildAlert('Complete', 'The selected items have been added to the export list. The list can be found under the inventory section, under \'Export to Spreadsheet\'');
	}
}

function exportToFile(format)
{
	window.location.href	=	'ajax_handler.php?controller=admin&action=getCSV&reqIsAjax=1&format=' + format;
}
