/*
 * Name:		listView.js
 * Description:		This file builds the table on each list interface.
 *
 */

var listTable	=	document.getElementById('list-table-body');
var dataFields	=	new Object;

function renderList()
{
	var headerRow	=	createHeaderRow();
	var rows	=	[];
	Object.keys(tableRows).forEach(function(curRow){
		console.log('Current Iteration: '+ curRow);
		console.log(tableRows[curRow]);
		var row	=	createTableRow(tableRows[curRow]);
		rows.push(row);
		//dataFields.push(row);
		dataFields[tableRows[curRow].id]	=	row;
	});

	// Add the list to the DOM
	listTable.appendChild(headerRow);
	Object.keys(rows).forEach(function(cv){
		listTable.appendChild(rows[cv]);
	});
}

function insertListData()
{

}

function createTableRow(row)
{
	var tr	=	document.createElement('tr');
	tr.setAttribute('id', row.id);
	Object.keys(fieldMeta).forEach(function(cv){
		var td		=	document.createElement('td');
		td.setAttribute('id', row.id + '_' + fieldMeta[cv].field);
		var field	=	fieldMeta[cv].field;
		switch (field)
		{
			case 'select':
				var cb		=	document.createElement('input');
				cb.className	=	'item-select';
				cb.type		=	'checkbox';
				cb.value	=	row.id;
				var content	=	cb;
				break;
			case 'item_status':
				var span	=	document.createElement('span');
				Object.keys(row.item_status).forEach(function(itSt){
					var img	=	document.createElement('img');
					img.src	=	row.item_status[itSt].src;
					img.alt	=	row.item_status[itSt].alt;
					span.appendChild(img);
				});
				var content	=	span;
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
