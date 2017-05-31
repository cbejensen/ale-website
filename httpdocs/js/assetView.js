function displayInvAsset(data, photos, categories, status)
{
// Initialization
	showLoadTimer();
	
	var data		=	JSON.parse(data);
	var photos		=	JSON.parse(photos);
	var categories	=	JSON.parse(categories);
	var status		=	JSON.parse(status);
	
	// Convert NULL to empty string
	Object.keys(data).forEach(function(cv) {
		if (data[cv] == null) data[cv] = '';
	});
	
	// Convert NULL url to placeholder
	Object.keys(photos).forEach(function(cv) {
		if (photos[cv] == null) photos[cv] = 'fix me!';
	});
	
	console.log('JSON parsed.');
	console.log('Constructing Asset View.');
// Initialization Complete.
	
	
	// Define the view's parent container (the list's main element)
	var listMain	=	document.getElementById('list-main');
	
	/*
	 * Create the container of the view.
	 * Class/ID	=	asset-view
	 * begins @ 100% to left
	 */ 
	var assetView	=	document.createElement('div');
	assetView.setAttribute('class', 'asset-view material');
	assetView.setAttribute('id', 'asset-view');
//	assetView.style.left = '0%';
	
	/*
	 * Create the nav/task bar
	 * Class = asset-view
	 */ 
	var navBar	=	document.createElement('nav');
	navBar.setAttribute('class', 'asset-view material');
	// Close Button
	var exitBtn	=	document.createElement('div');
	exitBtn.setAttribute('onclick', 'closeAssetView()');
	exitBtn.setAttribute('class', 'close-asset-view');
	navBar.appendChild(exitBtn);
	
	// Create the title
	var h1		= document.createElement('h1');
	var title	= document.createTextNode(data.mnfr + ' ' + data.brand + ' ' + data.model + ' ' + data.function_desc + ' ' + data.title_extn);
	h1.appendChild(title);
	h1.setAttribute('class', 'asset-view');
	
	/*
	 * Begin Overview Box.
	 * Contains photo overview, very basic identifying data, 
	 * and the item's transavtion log.
	 */
	var overview	=	document.createElement('div');
	overview.setAttribute('class', 'asset-section overview');
	var imgGallery	=	createImgGallery(photos);
	var info		=	createOverviewInfo(data);
	overview.appendChild(imgGallery);
	overview.appendChild(info);
	
	//Statuses
	var status			=	document.createElement('div');
	status.setAttribute('class', 'table-wrap status-table material');
	var h2 				=	document.createElement('h2');
	var header			=	document.createTextNode('Item Status');
	h2.appendChild(header);
	status.appendChild(h2);
	var detailTable		=	document.createElement('table');
	detailTable.setAttribute('class', 'dataTable');
	Object.keys(status).forEach(function(cv) {
		//console.log(cv, status[cv]);
		createStatusRow(detailTable, status[cv].status, status[cv].description);
	});
	status.appendChild(detailTable);
	
	
	// Basic Data
	var basicInfo	=	document.createElement('div');
	basicInfo.setAttribute('class', 'asset-section basic-sect');
	var basic			=	getBasicInfo(data);
//	var itemStatusListing	=	createItemStatusListing(data, status, cate);
	// Compile Children
	basicInfo.appendChild(basic);
//	detailedInfo.appendChild(itemStatusListing);
	
	
	// Accounting Data
	var accountingInfo	=	document.createElement('div');
	accountingInfo.setAttribute('class', 'asset-section accounting-sect');
	var acc			=	createAccountingInfo(data);
	accountingInfo.appendChild(acc);
	
	// Listing Data
	var listingInfo	=	document.createElement('div');
	listingInfo.setAttribute('class', 'asset-section listing-sect');
	var acc			=	createListingInfo(data);
	listingInfo.appendChild(acc);
	
	// Categories
	var categ	=	document.createElement('div');
	categ.setAttribute('class', 'asset-section category-sect');
	var cat			=	createCategoriesSection(categories);
	categ.appendChild(cat);
	
	// Novartis
	var novartis	=	document.createElement('div');
	novartis.setAttribute('class', 'asset-section category-sect');
	var cat			=	createNovartis(data);
	novartis.appendChild(cat);
	
	// Assemble Sections
	assetView.appendChild(navBar);
	assetView.appendChild(h1);
	assetView.appendChild(overview);
	assetView.appendChild(status);
	assetView.appendChild(basicInfo);
	assetView.appendChild(accountingInfo);
	assetView.appendChild(listingInfo);
	assetView.appendChild(categ);
	assetView.appendChild(novartis);
	listMain.appendChild(assetView);
//	assetView.style.left = '100%';
	assetView.style.right = '0%';
}

function createImgGallery(phot)
{
	// Img Gallery Container
	var imgGallery	=	document.createElement('div');
	imgGallery.setAttribute('class', 'asset-gallery');
	// Main Image Container
	var mainImgCont		=	document.createElement('div');
	mainImgCont.setAttribute('class', 'main-img-cont material');
	// Main Image
	var mainImg			=	document.createElement('img');
	mainImg.setAttribute('class', 'main-img');
	mainImg.setAttribute('src', phot[1].url);
	mainImg.setAttribute('data-added', phot[1].added);
	mainImg.setAttribute('data-update', phot[1].update);
	mainImgCont.appendChild(mainImg);
	// Small-Image Reel
	var smImgReel	=	document.createElement('div');
	smImgReel.setAttribute('class', 'img-reel-container');
	var reelWrap	=	document.createElement('span');
	reelWrap.setAttribute('class', 'reel-wrap');
	// For each photo, create an img, with wrapper, and append to reelWrap
	Object.keys(phot).forEach(function(cv) {
		if (cv == 1) return;
		//console.log(cv, phot[cv]);
		//console.log(cv);
		//console.log(phot[cv].url); // Prints each url
		var wrap	=	document.createElement('div');
		wrap.setAttribute('class', 'smImg-wrap material');
		var smImg	=	document.createElement('img');
		smImg.setAttribute('class', 'smImg');
		smImg.setAttribute('src', phot[cv].url);
		smImg.setAttribute('data-added', phot[cv].added)
		smImg.setAttribute('data-update', phot[cv].update)
		wrap.appendChild(smImg);
		reelWrap.appendChild(wrap);
	});
	//Complete Gallery
	smImgReel.appendChild(reelWrap);
	imgGallery.appendChild(mainImgCont);
	imgGallery.appendChild(smImgReel);
	return imgGallery;
}

function createOverviewInfo(data)
{
	// Info Wrapper
	var infoWrap	=	document.createElement('div');
	infoWrap.setAttribute('class', 'overview-info');
	
	// Condition Note Wrap/Content
	var condNoteBox	=	document.createElement('div');
	condNoteBox.setAttribute('class', 'condition-note');
	var p			=	document.createElement('p');
	var label		=	document.createTextNode('Condition Note: ');
	var labelSpan	=	document.createElement('span');
	labelSpan.style.fontWeight = 'bold';
	var condNote	=	document.createTextNode( data.condition_note);
	labelSpan.appendChild(label);
	p.appendChild(labelSpan);
	p.appendChild(condNote);
	condNoteBox.appendChild(p);
	
	// Left Table Wrap
	var leftTableWrap	=	document.createElement('div');
	leftTableWrap.setAttribute('class', 'table-wrap');
	// Top Left Table
	var leftTable		=	document.createElement('table');
	leftTable.setAttribute('class', 'dataTable');
	createDataTableRow(leftTable, 'ALE Asset', data.prefix + data.aleAsset, 'aleAsset');
	createDataFormRow(leftTable, 'Location', data.wh_location, 'wh_location');
				//createDataTableRow(leftTable, 'ALE Asset', data.prefix + data.aleAsset, 'aleAsset');
				//createDataTableRow(leftTable, 'Location', data.wh_location, 'wh_location');
	leftTableWrap.appendChild(leftTable);
	// Bottom Left Table
	var leftTable		=	document.createElement('table');
	leftTable.setAttribute('class', 'dataTable');
	var trackArray	=	{	
							01:	'ALOE',
							02:	'Novartis',
							04:	'EMP',
							05:	'Novartis/EMP',
							06:	'Consignment',
							08:	'ALE'
	};
	createDataFormRow(leftTable, 'Track', data.track, 'track', 'select', trackArray);
	createDataFormRow(leftTable, 'Batch', data.batch_name, 'batch_name');
	createDataFormRow(leftTable, 'Received', data.date_received, 'date_received');
	createDataTableRow(leftTable, 'Added', data.date_added, 'date_added');
	createDataTableRow(leftTable, 'Completed', data.date_completed, 'date_completed');
	createDataTableRow(leftTable, 'Modified', data.last_update, 'last_update');
	createDataTableRow(leftTable, 'Modified By', data.modified_by, 'modified_by');
	leftTableWrap.appendChild(leftTable);
	
	// Right Table Wrap
//	var rightTableWrap	=	document.createElement('div');
//	rightTableWrap.setAttribute('class', 'table-wrap');
	// Top Right Table
//	var rightTable		=	document.createElement('table');
//	rightTable.setAttribute('class', 'dataTable');
//	createDataTableRow(rightTable, 'Track', data.track, 'track');
//	createDataTableRow(rightTable, 'Batch', data.batch_name, 'batch_name');
//	createDataTableRow(rightTable, 'Vendor', data.vendor, 'vendor');
//	rightTableWrap.appendChild(rightTable);
	// Bottom Right Table
//	var rightTable		=	document.createElement('table');
//	rightTable.setAttribute('class', 'dataTable');
//	createDataTableRow(rightTable, 'Added', data.date_added, 'date_added');
//	createDataTableRow(rightTable, 'Received', data.date_received, 'date_received');
//	createDataTableRow(rightTable, 'Completed', data.date_completed, 'date_completed');
//	createDataTableRow(rightTable, 'Modified', data.last_update, 'last_update');
//	createDataTableRow(rightTable, 'Modified By', data.modified_by, 'modified_by');
//	rightTableWrap.appendChild(rightTable);
	// Status Table
//	var subWrap			=	document.createElement('div');
//	subWrap.setAttribute('class', 'sub-wrap status-table material');
//	var h2 				=	document.createElement('h2');
//	var header			=	document.createTextNode('Item Status');
//	h2.appendChild(header);
//	subWrap.appendChild(h2);
//	var detailTable		=	document.createElement('table');
//	detailTable.setAttribute('class', 'dataTable');
//	Object.keys(status).forEach(function(cv) {
//		//console.log(cv, status[cv]);
//		createStatusRow(detailTable, status[cv].status, status[cv].description);
//	});
//	subWrap.appendChild(detailTable);
	
// Finish Basic Info Box
	infoWrap.appendChild(condNoteBox);
	infoWrap.appendChild(leftTableWrap);
	//infoWrap.appendChild(rightTableWrap);	
	//infoWrap.appendChild(subWrap);
	return infoWrap;
}

function getBasicInfo(data)
{
	var itemDetails		=	document.createElement('div');
	itemDetails.setAttribute('class', 'item-detail-wrap');
	var h2 				=	document.createElement('h2');
	var header			=	document.createTextNode('Basic Info');
	h2.appendChild(header);
	itemDetails.appendChild(h2);
	var detailTable		=	document.createElement('table');
	detailTable.setAttribute('class', 'dataTable');
	createDataFormRow(detailTable, 'Mnfr.', data.mnfr, 'mnfr');
	createDataFormRow(detailTable, 'Brand', data.brand, 'brand');
	createDataFormRow(detailTable, 'Model', data.model, 'model');
	createDataFormRow(detailTable, 'Function', data.function_desc, 'function_desc');
	createDataFormRow(detailTable, 'Title Extn.', data.title_extn, 'title_extn');
	itemDetails.appendChild(detailTable);
	var detailTable		=	document.createElement('table');
	detailTable.setAttribute('class', 'dataTable');
	createDataFormRow(detailTable, 'Serial No.', data.serial_num, 'serial_num');
	createDataFormRow(detailTable, 'Model No.', data.addtl_model, 'addtl_model');
	createDataFormRow(detailTable, 'Mnfr. Part No.', data.mpn, 'mpn');
	createDataFormRow(detailTable, 'Year of Mnfr.', data.yom, 'yom');
	createDataFormRow(detailTable, 'Weight', data.weight, 'weight');
	itemDetails.appendChild(detailTable);
	return itemDetails;
}

function createAccountingInfo(data)
{
	var itemDetails		=	document.createElement('div');
	itemDetails.setAttribute('class', 'item-detail-wrap');
	var h2 				=	document.createElement('h2');
	var header			=	document.createTextNode('Accounting Data');
	h2.appendChild(header);
	itemDetails.appendChild(h2);
	var detailTable		=	document.createElement('table');
	detailTable.setAttribute('class', 'dataTable');
	createDataFormRow(detailTable, 'Price', data.price, 'price');
	createDataFormRow(detailTable, 'Cost', data.cost, 'cost');
	createDataFormRow(detailTable, 'Quantity', data.quantity, 'quantity');
	itemDetails.appendChild(detailTable);
	return itemDetails;
}

function createListingInfo(data)
{
	var conditions	=	{
							01: 'Used',
							02:	'New',
							03:	'Like-New'
	};
	var cosmetics	=	{
							1:	'Used',
							2:	'Like-New',
							3:	'Refurbished',
							4:	'New',
							5:	'Original Packaging'
	};
	var testings	=	{
							01:	'Tested',
							02:	'Not Tested',
							03:	'Powers Up',
							04:	'AS-IS'
	};
	var	shipClasses	=	{
							1:	'LAB-SM',
							2:	'LAB-MED',
							3:	'LAB-LG',
							4:	'LAB-XL',
							5:	'LAB-LTL'
	};
	var itemDetails		=	document.createElement('div');
	itemDetails.setAttribute('class', 'item-detail-wrap');
	var h2 				=	document.createElement('h2');
	var header			=	document.createTextNode('Listing Data');
	h2.appendChild(header);
	itemDetails.appendChild(h2);
	var detailTable		=	document.createElement('table');
	detailTable.setAttribute('class', 'dataTable');
	createDataFormRow(detailTable, 'Condition', data.item_condition, 'item_condition', 'select', conditions);
	createDataFormRow(detailTable, 'Cosmetic', data.cosmetic, 'cosmetic', 'select', cosmetics);
	createDataFormRow(detailTable, 'Testing', data.testing, 'testing', 'select', testings);
	createDataFormRow(detailTable, 'Components', data.components, 'components', 'textarea');
	createDataFormRow(detailTable, 'Shipping Class', data.shipping_class, 'shipping_class', 'select', shipClasses);
	itemDetails.appendChild(detailTable);
	var detailTable		=	document.createElement('table');
	detailTable.setAttribute('class', 'dataTable');
	createDataFormRow(detailTable, 'Description', data.m_desc, 'm_desc', 'textarea');
	//createDataFormRow(detailTable, 'Specifications', '', 'specs', 'textarea');
	itemDetails.appendChild(detailTable);
	return itemDetails;
}

function createCategoriesSection(cate)
{
//	console.log('building categories...')
	var subWrap			=	document.createElement('div');
	subWrap.setAttribute('class', 'info-wrap');
	var h2 				=	document.createElement('h2');
	var header			=	document.createTextNode('ALE Catalog Categories');
	h2.appendChild(header);
	subWrap.appendChild(h2);
	var detailTable		=	document.createElement('table');
	detailTable.setAttribute('class', 'cat-dataTable');
	createHeadRow(detailTable, 'Category', 'Subcategory');
//	console.log(cate);
	Object.keys(cate).forEach(function(cv) {
//		console.log(cv, cate[cv]);
		createStatusRow(detailTable, cate[cv].category, cate[cv].subcategory);
	});
	subWrap.appendChild(detailTable);
	return subWrap;
}

function createNovartis(data) 
{
	var empStatus	=	{
							01: 'Available for Purchase',
							02:	'Ready for Upload',
							03:	'Requires Testing for EMP',
							04:	'Not an EMP Item'
	};
	var novartis	=	document.createElement('div');
	novartis.setAttribute('class', 'asset-section novartis-section');
	var h2			=	document.createElement('h2');
	var head		=	document.createTextNode('Novartis Data');
	h2.appendChild(head);
	novartis.appendChild(h2);
	// Left Nov Section
	var section		=	document.createElement('div');
	section.setAttribute('class', 'nov-sect');
	var detailTable		=	document.createElement('table');
	detailTable.setAttribute('class', 'dataTable');
	detailTable.setAttribute('data-empCatId', data.emp_cat_id);
	createDataFormRow(detailTable, 'EMP Status', data.emp_status, 'emp_status', 'select', empStatus);
	createDataTableRow(detailTable, 'EMP Category', data.emp_category + '/' + data.emp_subcategory, 'emp_category');
	createDataFormRow(detailTable, 'Prev. Owner', data.prev_owner, 'prev_owner');
	createDataFormRow(detailTable, 'NBV', data.nbv, 'nbv');
	section.appendChild(detailTable);
	novartis.appendChild(section);
	// Middle Nov Section
	var section		=	document.createElement('div');
	section.setAttribute('class', 'nov-sect');
	var detailTable		=	document.createElement('table');
	detailTable.setAttribute('class', 'dataTable');
	createDataFormRow(detailTable, 'NIBR', data.nibr, 'nibr');
	createDataFormRow(detailTable, 'TM0', data.tm0, 'tm0');
	createDataFormRow(detailTable, 'SAP', data.sap, 'sap');
	section.appendChild(detailTable);
	novartis.appendChild(section);
	// Right Nov Section
	var section		=	document.createElement('div');
	section.setAttribute('class', 'nov-sect');
	var detailTable		=	document.createElement('table');
	detailTable.setAttribute('class', 'dataTable');
	createDataFormRow(detailTable, 'Src. Building', data.src_building, 'src_building');
	createDataFormRow(detailTable, 'Src. Floor', data.src_floor, 'src_floor');
	createDataFormRow(detailTable, 'Src. Room', data.src_room, 'src_room');
	section.appendChild(detailTable);
	novartis.appendChild(section);
	return novartis;
}

function createDataTableRow(table, name, data, id)
{
	var row			=	document.createElement('tr');
	row.setAttribute('onclick', 'getUpdateDialog(\'' + id + '\'');
	var td1			=	document.createElement('td');
	var tn1			=	document.createTextNode(name);
	td1.appendChild(tn1);
	td1.style.fontWeight = 'bold';
	var td2			=	document.createElement('td');
	var tn2			=	document.createTextNode(data);
	td2.appendChild(tn2);
	row.appendChild(td1);
	row.appendChild(td2);
	table.appendChild(row);
}

function createDataFormRow(table, fieldName, cv, dataName, type, optArray)
{
	var type 		=	type || 'text';
	var optArray	=	optArray || 0;
	// Create Row
	var row		=	document.createElement('tr');
	// Create first cell, cell content
	var td1		=	document.createElement('td');
	var tn1		=	document.createTextNode(fieldName);
	// Append content to cell
	td1.style.fontWeight = 'bold';
	td1.appendChild(tn1);
	
	// Create second cell
	var td2		=	document.createElement('td');
	// Generate Inputs
	if (type == 'text') {
		var input	=	document.createElement('input');
		input.setAttribute('type', type);
		input.setAttribute('value', cv);
		input.setAttribute('onblur', 'updateInvAsset()');
		td2.appendChild(input);
	}
	if (type == 'select') {
		var select	=	document.createElement('select');
		Object.keys(optArray).forEach(function(curVal) {
			// Create Options
			var option	=	document.createElement('option');
			option.setAttribute('value', curVal);
			if (optArray[curVal] == cv) {
				option.selected = true;
			}
			var tn		=	document.createTextNode(optArray[curVal]);
			option.appendChild(tn);
			select.appendChild(option);
		});
		td2.appendChild(select);
	}
	if (type == 'textarea') {
		var textarea	=	document.createElement('textarea');
		var tn			=	document.createTextNode(cv);
		textarea.appendChild(tn);
		textarea.setAttribute('rows', '10');
		td2.appendChild(textarea);
	}
	row.appendChild(td1);
	row.appendChild(td2);
	table.appendChild(row);
	
}

function createStatusRow(table, status, desc, bold)
{
//	console.log('building categories!')
	var bold = bold || 0;
	var row		=	document.createElement('tr');
	var td1		=	document.createElement('td');
	var tn1		=	document.createTextNode(status);
	td1.appendChild(tn1);
	var td2		=	document.createElement('td');
	var tn2		=	document.createTextNode(desc);
	td2.appendChild(tn2);
	var td3		=	document.createElement('td');
	var tn3		=	document.createElement('span');
	tn3.setAttribute('class', 'status-rm');
	td3.appendChild(tn3);
	if (bold != 0) {
		td1.style.fontWeight = 'bold';
		td2.style.fontWeight = 'bold';
	}
	row.appendChild(td1);
	row.appendChild(td2);
	row.appendChild(td3);
	table.appendChild(row);
}

function createHeadRow(table, col1, col2)
{
	var bold = 1;
	var row		=	document.createElement('tr');
	var td1		=	document.createElement('td');
	var tn1		=	document.createTextNode(col1);
	td1.appendChild(tn1);
	var td2		=	document.createElement('td');
	var tn2		=	document.createTextNode(col2);
	td2.appendChild(tn2);
	var td3		=	document.createElement('td');
	var tn3		=	document.createElement('span');
	td3.appendChild(tn3);
	if (bold != 0) {
		td1.style.fontWeight = 'bold';
		td2.style.fontWeight = 'bold';
	}
	row.appendChild(td1);
	row.appendChild(td2);
	row.appendChild(td3);
	row.setAttribute('class', 'header');
	table.appendChild(row);
}
