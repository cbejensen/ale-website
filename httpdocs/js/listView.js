/*
 * Name:		listView.js
 * Description:		This file builds the table on each list interface.
 *
 */

var listTable	=	document.getElementById('list-table-body');
var dataFields	=	[];

function renderList()
{
	var headerRow	=	createHeaderRow();
	var rows	=	[];
	Object.keys(tableRows).forEach(function(curRow){
		var row	=	createTableRow(tableRows[curRow]);
		//rows.push(row);
		dataFields.push(row);
	});

	// Add the list to the DOM
	listTable.appendChild(headerRow);
	Object.keys(dataFields).forEach(function(cv){
		listTable.appendChild(dataFields[cv]);
	});
}

function insertListData()
{

}

function createTableRow(row)
{
	var tr	=	document.createElement('tr');
	tr.setAttribute('id', row.num_asset);
	Object.keys(fieldMeta).forEach(function(cv){
		var td		=	document.createElement('td');
		td.setAttribute('id', row.num_asset + '_' + fieldMeta[cv].field);
		var field	=	fieldMeta[cv].field;
		switch (field)
		{
			case 'select':
				var cb	=	document.createElement('');
				break;
			case 'status':

				break;
			default:
				var content	=	document.createTextNode(row[field]);
		}
		td.appendChild(content);
		tr.appendChild(td);
	});
	return tr;
}

function createHeaderRow()
{
	var tr		=	document.createElement('tr');
	tr.className	=	'list-header-row';
	Object.keys(fieldMeta).forEach(function(cv){
		var td		=	document.createElement('th');
		var text	=	document.createTextNode(fieldMeta[cv].label);
		td.appendChild(text);
		tr.appendChild(td);
	});
	return tr;
}
