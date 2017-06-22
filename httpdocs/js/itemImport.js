/*
 * Name:	itemImport.js
 * Description:	Facilitates the inventory item bulk import.
 *
 */

uploadCount	=	0;

function handleFiles(files) {
	if (window.FileReader) {
		getAsText(files[0]);
	} else {
		alert('File Reading is not supported in this browser!');
	}
}

function getAsText(fileToRead) {
	var reader	=	new FileReader();
	reader.readAsText(fileToRead);
	reader.onload	=	loadHandler;
	reader.onerror	=	errorHandler;
}

function loadHandler(event) {
	var csv		=	event.target.result;
	itemData	=	processData(csv);
	displayData();
}

function processData(csv) {
	var allTextLines	=	csv.split(/\r\n|\n/);
	var lines		=	[];
	labels			=	[
		'aleAsset',	'track',	'mnfr',
		'model',	'brand',
		'addtl_model',	'mpn',
		'serial',	'yom',
		'nibr',		'tm0',
		'sap',		'vendor',
		'cost',
		'quantity',	'weight',
		'shipping',	'price',
		'wh_location',	'emp_status',
		'building',	'floor',
		'room'
	];
	headers			=	[];
	for (var i=0; i<allTextLines.length-1; i++) {
		var data	=	allTextLines[i].split(/,(?=(?:(?:[^"]*"){2})*[^"]*$)/);
		//console.log(data);
		var tarr	=	new Object;
		for (var j=0; j<data.length; j++) {
			if (i === 0) {
				headers.push(data[j]);
			}
			tarr[labels[j]]	=	new Object //data[j];//.push(data[j]);
			tarr[labels[j]].value	=	data[j];
			tarr[labels[j]].valid	=	'';
		}
		//console.log(headers);
		lines.push(tarr);
	}
	console.log(lines);
	return lines;
}

function errorHandler(evt) {
	if (evt.target.error.name == "NotReadableError") {
		alert("Cannot read file!");
	} else {
		alert("An error has occurred!");
	}
}

function displayData()
{
	var body	=	document.getElementById('ale-body');
	var dialog	=	document.getElementById('new-import-dialog');
	dialog.style.display	=	'none';
	var table	=	document.getElementById('list-table-body');//.createElement('table');
	Object.keys(itemData).forEach(function(i) {
		var tr	=	document.createElement('tr');
		tr.setAttribute('id', i);
		if (i==0) {
			if (uploadCount==0) {
				Object.keys(headers).forEach(function(k) {
					var td	=	document.createElement('th');
					var txt	=	document.createTextNode(headers[k]);
					td.appendChild(txt);
					tr.appendChild(td);
				});
				table.appendChild(tr);
			}
			return;
		}
		var item	=	itemData[i];
		//console.log(item);
		//console.log(itemData[i]);
		Object.keys(item).forEach(function(j) {
			var td		=	document.createElement('td');
			var input	=	document.createElement('input');  //TextNode(item[headers[j]]);
			input.addEventListener('keyup', updateItemData);
			input.addEventListener('change', updateItemData);
			input.name	=	j;
			input.value	=	item[j].value;
			input.type	=	'text';
			switch ()
			{
				case '':
				case '':
				case '':
				case '':
				case '':

					break;
			}
			var pass	=	validateInput(input.name, input.value);
			if (pass != true) {
				input.className	=	'invalid-input';
				itemData[i][j].valid	=	false;
			} else {
				itemData[i][j].valid	=	true;
			}
			td.appendChild(input);
			tr.appendChild(td);
		});
		table.appendChild(tr);
	});
//	body.appendChild(table);
	uploadCount++;
}

function updateItemData(evt) {
	//console.log(evt.target.value);
	var id		=	evt.target.parentNode.parentNode.id;
	var name	=	evt.target.name;
	itemData[id][name].value=	evt.target.value;
	var pass	=	validateInput(name, evt.target.value);
	if (pass != true) {
		evt.target.className	=	'invalid-input';
		itemData[id][name].valid=	false;
	} else {
		evt.target.className	=	'';
		itemData[id][name].valid=	true;
	}
	//console.log(itemData[id][name]);
}

function validateInput(name, value)
{
	//console.log('Validating ' + name +', '+ value);
	switch (name)
	{
		case 'track':
			if (tracks.hasOwnProperty(value)) {
				//console.log('Track returns true');
				var res	=	true;
			} else var res	=	false;
			break;
		case 'aleAsset':
			if (usedAssets.includes(value)) {
				//console.log('Asset returns false');
				var res	=	false;
				break;
			} 
			var x	=	Number(value);
			var re	=	new RegExp(/^\d{5}$/);
			var res	=	re.test(x);
			break;
		case 'yom':
			var x	=	Number(value);
			var re	=	new RegExp(/^(19|20)\d{2}$/);
			var res	=	re.test(x);
			break;
		case 'shipping':
			if (shipping.hasOwnProperty(value)) {
				var res	=	true;
			} else var res	=	false;
			break;
		case 'emp_status':
			if (emp_stat.hasOwnProperty(value)) {
				var res	=	true;
			} else var res	=	false;
			break;
		case 'vendor':
			if (vendors.hasOwnProperty(value)) {
				var res	=	true;
			} else var res	=	false;
			break;
		case 'quantity':
		case 'cost':
		case 'nibr':
		case 'tm0':
		case 'sap':
		case 'weight':
		case 'price':
			if (isNaN(value)) var res	=	false;
			else var res	=	true;
			break;
		case 'mnfr':
		case 'model':
			if (value === "") var res	=	false;
			else var res	=	true;
			break;
		case 'brand':
		case 'addtl_model':
		case 'mpn':
		case 'serial':
		case 'wh_location':
		case 'building':
		case 'floor':
		case 'room':
			var res	=	true;

	}
	return res;
}

function errorCheck()
{
	errorCount	=	0;
	for (var i=1 ; i<itemData.length ; i++) {
		Object.keys(itemData[i]).forEach(function(j) {
			if (itemData[i][j].valid == false) {
				errorCount++;
			}
		});
	}
	if (errorCount !== 0) {
		var res	=	false;
	} else var res	=	true;
	return res;
}

function convertStrToId()
{
	for (var i=1 ; i<itemData.length ; i++) {
		Object.keys(itemData[i]).forEach(function(j) {
			switch (j) {
				case 'track':
					if (isNaN(itemData[i][j])) {
						console.log(itemData[i][j]);
						itemData[i][j].value	=	tracks[itemData[i][j].value];
					}
					break;
				case 'vendor':	
					if (isNaN(itemData[i][j])) {
						itemData[i][j].value	=	vendors[itemData[i][j].value];
					}
					break;
				case 'emp_status':
					if (isNaN(itemData[i][j])) {
						itemData[i][j].value	=	emp_stat[itemData[i][j].value];
					}
					break;
				case 'shipping':
					if (isNaN(itemData[i][j])) {
						itemData[i][j].value	=	shipping[itemData[i][j].value];
					}
					break;
			}
		});
	}
}

function submitNewEquipment()
{
	if (errorCheck()) {
		convertStrToId();
		console.log(itemData);
		var url	=	'ajax_handler.php?controller=admin&action=submitItemImport';
		var json=	encodeURIComponent(JSON.stringify(itemData));
		makeRequest(url, json, submitEquipResponse);
	} else {
		buildAlert(errorCount + ' Errors Found', 'Please ensure all errors have been corrected.');
	}
}

function submitEquipResponse(res)
{
	// PHP will return a response containing a report of the results.
	// Display those results:
	// 	Which items were accepted, which failed.
	// 	What errors were triggered for the failed items?
	// LASTLY, get rid of the accepted entries, update the global variables, re-validate the remaining cells.
	
	/*
	 * Update:
	 * -----------------------
	 *  Upon receipt of response, mark each accepted row with a check
	 *  and each rejected row with an x.
	 *
	 *  Change the submitter to ignore any rows marked as completed.
	 *
	 *  Update the relevant globals, revalidate the remaining cells.
	 *
	 */
	console.log(res);
	if (res !== '') {
		var res	=	JSON.parse(res);
		response= 	res;
		console.log(res);
		displayImportResults();
		
	} else {
		// If no errors were found
		displayImportResults(1);
	}
}

function displayImportResults(mode)
{
	var mode	=	mode || 0;
	var table	=	document.getElementById('list-table-body');
	var th		=	document.createElement('th');
	th.style.width	=	'1rem';
	var txt		=	document.createTextNode('Pass?');
	th.appendChild(txt);
	table.childNodes[0].insertBefore(th, table.childNodes[0].children[0]);
	
	if (mode === 1) {
		// All items passed

	} else {
		for (var i=1 ; i<table.children.length ; i++)
		{
			var td	=	document.createElement('td');
			var img	=	document.createElement('img');
			td.style.width	=	'1rem';
			img.className	=	'import-result';
			switch (response.error.hasOwnProperty(table.childNodes[i].children[0].children[0].value))
			{
				case true:
					img.src	=	'img/interface/nostop.png';
					break;
				case false:
					img.src	=	'img/interface/okaygo.png';
					break;
			}
			td.appendChild(img);
			table.childNodes[i].insertBefore(td, table.childNodes[i].children[0]);
		}
	}
}
