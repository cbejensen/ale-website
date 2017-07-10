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
		//console.log('Current Iteration: '+ curRow);
		//console.log(tableRows[curRow]);
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

function buildBreadcrumbs()
{
	var div		=	document.getElementById('page-info');
	var span	=	document.createElement('span');
	Object.keys(crumbs).forEach(function(j){
		if (j != 0) {
			var carat	=	document.createElement('span');
			var txt		=	document.createTextNode('>');
			carat.appendChild(txt);
			span.appendChild(carat);
		}
		if (crumbs[j].src == '') {
			var crumb	=	document.createElement('span');
		} else {
			var crumb	=	document.createElement('a');
			crumb.href	=	crumbs[j].src;
		}
		crumb.className	=	'breadcrumb';
		var txt		=	document.createTextNode(crumbs[j].anchor);
		crumb.appendChild(txt);
		span.appendChild(crumb);
	});
	div.appendChild(span);

	// Begin Page Num/# of Results
	var span	=	document.createElement('span');
	span.className	=	'serp-info';
	var txt		=	document.createTextNode('Page '+current_page+' of '+totalResults+' results.');
	span.appendChild(txt);
	div.appendChild(span);
}

function getURI()
{
	var url		=	'?controller=admin&action=showList&lscp=' + listInfo.scope + '&rp=' + listInfo.rp + '&srt_f=' + listInfo.sortBy + '&srt_d=' + listInfo.sortDir;
	url		+=	'&title=' + encodeURIComponent(window.document.title.substring(0, window.document.title.length - 8));
	switch (listInfo.type)
	{
		case 'items':
			url		+=	'&ltype=itm&subsect=inventory';
	}
	return url;
}

function updatePageState(evt)
{
	console.log(evt.target.parentNode);
	console.log(evt.currentTarget);
	var data	=	evt.target.parentNode.id;
	var url		=	getURI();
	url		+=	'&inv=' + data;
	history.pushState(data, null, url);
}

window.addEventListener('popstate', function(e) {
	console.log(e.state);
	var asset	=	e.state;
	if (asset == null) {
		var title	=	'';
		switch (listInfo.scope)
		{
			case 'all':
				title += 'All ';
				break;
			case 'complete':
				title += 'Completed ';
				break;
			case 'review':
				title += 'New ';
				break;
		}
		switch (listInfo.type)
		{
			case 'items':
				title += 'Inventory';
				break;
		}
		closeAssetView();
		document.title	=	title + ' | al.db';
	} else {
		getInvAssetView(asset, 1);
	}
});

function createTableRow(row)
{
	var tr			=	document.createElement('tr');
	var recordGetter	=	getRecordGetter();
	tr.setAttribute('id', row.id);
	//switch (list_type) {
	//	case 'items':
	//		tr.setAttribute('onclick', 'getInvAssetView('+row.id+')');
	//		break;
	//}
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
				td.addEventListener('click', recordGetter);
				td.addEventListener('click', updatePageState);
				var span	=	document.createElement('span');
				Object.keys(row.item_status).forEach(function(itSt){
					switch (row.item_status[itSt].name)
					{
						case 'Pending Review':
							tr.className += ' inv-complete';
							return;
						case 'Reassess':
							tr.className =	'inv-reassess';
							return;
						case 'Incomplete':
					//		return;
					}
					var img	=	document.createElement('img');
					img.src	=	row.item_status[itSt].src;
					img.alt	=	row.item_status[itSt].alt;
					img.className	=	'status-flag';
					span.appendChild(img);
				});
				var content	=	span;
				break;
			default:
				var content	=	document.createTextNode(row[field]);
				td.addEventListener('click', recordGetter);
				td.addEventListener('click', updatePageState);
		}
		td.appendChild(content);
		tr.appendChild(td);
	});
	return tr;
}

function getRecordGetter()
{
	switch (list_type) {
		case 'items':
			var getter	=	getInvAssetView;
			break;
	}
	return getter;
}

function createHeaderRow()
{
	var tr		=	document.createElement('tr');
	tr.className	=	'list-header-row';
	Object.keys(fieldMeta).forEach(function(cv){
		var td		=	document.createElement('th');
		var text	=	document.createTextNode(fieldMeta[cv].label);
		td.setAttribute('onclick', 'sortList(\''+fieldMeta[cv].table+'\')');
		td.appendChild(text);
		tr.appendChild(td);
	});
	return tr;
}

function renderTools()
{
	var div		=	document.getElementById('toolbar-btns');
	Object.keys(tools).forEach(function(j){
		var span	=	document.createElement('span');
		span.className	=	'tertiary-button toolbar-btn material';
		span.setAttribute('onclick', tools[j].action);
		var txt		=	document.createTextNode(tools[j].name);
		span.appendChild(txt);
		div.appendChild(span);
	});
}

function deleteInvItems()
{
	var obj		=	new Object;
	obj.selected	=	getSelectedRows();
	obj.action	=	'deleteItem';
	var url		=	'ajax_handler.php?controller=admin&action=invAction';
	var json	=	encodeURIComponent(JSON.stringify(obj));
	makeRequest(url, json, deleteInvItemsResponse);
}

function deleteInvItemsResponse(req)
{
//	console.log(req);
	if (req !== '') {
		res	=	JSON.parse(req);
//		console.log(res);
		buildAlert(res[1], res[2]);
	} else {
		updateList('itm');
	}
}

function commitInvItems()
{
	var obj		=	new Object;
	obj.selected	=	getSelectedRows();
	obj.action	=	'commitItem';
	var url		=	'ajax_handler.php?controller=admin&action=invAction';
	var json	=	encodeURIComponent(JSON.stringify(obj));
	makeRequest(url, json, commitInvItemsResponse);
}

function commitInvItemsResponse(req)
{
	console.log(req);
	updateList('itm');
}

function getSelectedRows()
{
	var selected	=	[];
	Object.keys(dataFields).forEach(function(j){
		if (dataFields[j].children[j+'_select'].children[0].checked == true) {
			selected.push(j);
		}
	});
	return selected;
}

function sortList(field)
{
	var fId;
	var newURL	=	'';
	Object.keys(listOptions.field_map).forEach(function(i) {
		if (listOptions.field_map[i] == field) {
			fId	=	i;
		}
	});
	if (typeof fId == 'undefined') {
		return;
	}

	//console.log(fId);
	Object.keys(url).forEach(function(i) {
		if (i == 'srt_f') return;
		newURL	+=	'&'+i+'='+url[i];
	});
	newURL	=	'?' + newURL.substring(1) + '&srt_f=' + fId;
	console.log(newURL);
	window.location.href	=	newURL;
}

function searchList()
{
	var query	=	document.getElementById('search-input').value;
	var newURL	=	'';
	Object.keys(url).forEach(function(i) {
		if (i == 'q') return;
		newURL	+=	'&'+i+'='+url[i];
	});
	newURL	=	'?' + newURL.substring(1) + '&q=' + query;
	window.location.href	=	newURL;
}
