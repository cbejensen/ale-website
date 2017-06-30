function displayInvAsset(data, photos, categories, status, options)
{
// Initialization
	showLoadTimer();
	//ar data	=	data.replace('\u0022', '\\u0022');
	
	console.log(data);
	console.log(options);
	console.log('PHOTOS:');
	console.log(photos);
	//var data		=	JSON.parse(data);
	//var photos		=	JSON.parse(photos);
	//var categories	=	JSON.parse(categories);
	//var status		=	JSON.parse(status);
	//var options		=	JSON.parse(options);	
	var vendors		=	options.vendors;
	var mnfrs		=	options.mnfrs;
	var models		=	options.models;
	var brands		=	options.brands;
	var batch		=	options.batch;
	var prevOwners	=	options.prev_owner;
	var statuses	=	status;
	var statOpt		=	options.status;
	var model_mnfr	=	options.model_mnfr;
	
	// Convert NULL to empty string
	Object.keys(data).forEach(function(cv) {
		if (data[cv] == null) data[cv] = '';
	});
	
//	Convert NULL url to placeholder
//	Object.keys(photos).forEach(function(cv) {
//		if (photos[cv] == null) photos[cv] = 'fix me!';
//	});
	
	// Check for empty photos array:
	if (Object.keys(photos).length === 0) {
		console.log('NO PHOTOS!');
		for (j = 1 ; j <= 6 ; j++)
		{
			var img	=	new Object;
			img.url	=	'img/interface/image_needed.png';
			photos.push(img);
		}
		console.log('PHOTOS:');
		console.log(photos);
	}
	
	
	
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
	var elemExists	=	document.getElementById('asset-view');
	if (elemExists != null) {
		listMain.removeChild(elemExists);
	}
	var assetView	=	document.createElement('div');
	assetView.setAttribute('class', 'asset-view material');
	assetView.setAttribute('id', 'asset-view');
//	assetView.style.left = '0%';
	
	/*
	 * Create the nav/task bar
	 * Class = asset-view
	 */ 
	var navBar	=	document.createElement('nav');
	navBar.setAttribute('class', 'asset-view material window-header');
	var btns	=	document.createElement('span');
	btns.setAttribute('class', 'btns-cont');
	// Save button
	var saveBtn	=	document.createElement('span');
	saveBtn.setAttribute('onclick', 'saveAssetData()');
	saveBtn.setAttribute('class', 'gradient-button save-btn');
	var sbtn	=	document.createTextNode('Save');
	saveBtn.appendChild(sbtn);
	btns.appendChild(saveBtn);
	// Close Button
	var exitBtn	=	document.createElement('span');
	exitBtn.setAttribute('onclick', 'closeAssetViewAndPushState()');
	exitBtn.setAttribute('class', 'close-asset-view tertiary-button');//close-asset-view
	var ebtn	=	document.createTextNode('Close');
	exitBtn.appendChild(ebtn);
	btns.appendChild(exitBtn);
	
	// Append Buttons
	navBar.appendChild(btns);
	
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
	var statusSect		=	document.createElement('div');
	statusSect.setAttribute('class', 'asset-section basic-sect');
	var h2 				=	document.createElement('h2');
	var header			=	document.createTextNode('Item Status');
	h2.appendChild(header);
	var status			=	document.createElement('div');
	status.setAttribute('class', 'table-wrap status-table material');
//	var h2 				=	document.createElement('h2');
//	var header			=	document.createTextNode('Item Status');
//	h2.appendChild(header);
//	status.appendChild(h2);
	var detailTable		=	document.createElement('table');
	detailTable.setAttribute('class', 'dataTable');
	createHeadRow(detailTable, 'Status', 'Description');
	//Header Rows
	// HEADER ROWS GO HERE!
	// Rows
	Object.keys(statuses).forEach(function(cv) {
		console.log('this ' + statuses[cv]);
		createStatusRow(detailTable, statuses[cv].status, statuses[cv].description);
	});
	status.appendChild(detailTable);
	//var addStatus	=	document.createElement('select');
//	createDataFormRow(detailTable, 'Add Status', '', 'mnfr', 'select', statOpt);
	// BUTTONS
	var btnWrap	=	document.createElement('div');
	var add	=	document.createElement('span');
	var clear	=	document.createElement('span');
	var addNode=	document.createTextNode('Add');
	var clrNode	=	document.createTextNode('Clear');
	btnWrap.setAttribute('class', 'status-btn-wrap');
	add.setAttribute('class', 'gradient-button');
	add.setAttribute('onclick', 'addStatusDialog()');
	clear.setAttribute('class', 'tertiary-button');
	add.appendChild(addNode);
	clear.appendChild(clrNode);
	btnWrap.appendChild(add);
	btnWrap.appendChild(clear);
	statusSect.appendChild(h2);
	statusSect.appendChild(status);
	statusSect.appendChild(btnWrap);
	
	
	// Basic Data
	var basicInfo	=	document.createElement('div');
	basicInfo.setAttribute('class', 'asset-section basic-sect');
	var basic			=	getBasicInfo(data, mnfrs, models, brands);
//	var itemStatusListing	=	createItemStatusListing(data, status, cate);
	// Compile Children
	basicInfo.appendChild(basic);
//	detailedInfo.appendChild(itemStatusListing);
	
	
	// Accounting Data
	var accountingInfo	=	document.createElement('div');
	accountingInfo.setAttribute('class', 'asset-section accounting-sect');
	var acc			=	createAccountingInfo(data, vendors);
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
	var cat			=	createNovartis(data, prevOwners);
	novartis.appendChild(cat);
	hideLoadTimer()
	// Assemble Sections
	assetView.appendChild(navBar);
	assetView.appendChild(h1);
	assetView.appendChild(overview);
	assetView.appendChild(statusSect);
	assetView.appendChild(basicInfo);
	assetView.appendChild(accountingInfo);
	assetView.appendChild(listingInfo);
	assetView.appendChild(categ);
	assetView.appendChild(novartis);
	listMain.appendChild(assetView);
//	assetView.style.left = '100%';
	assetView.style.right = '0%';
	
	// Listen for Changes to model
	var model	=	document.getElementById('model');
	model.addEventListener('change', function(e) {
		//if (e.target != e.currentTarget)
		//console.log(e.target); // Returns the whole select element
		//console.log(e.currentTarget);
	}, false);
	
	// Filter Models
	filterModelsByMnfr()
	filterBrandsByMnfr()
	
	var mnfr	=	document.getElementById('mnfr');
	mnfr.setAttribute('onchange', 'updateModelList(this.value); updateBrandList(this.value)');
	
	var model	=	document.getElementById('model');
	model.setAttribute('onchange', 'updateFunctionDesc(this.value)');
	
//	var model	=	document.getElementById('model');
//	model.setAttribute('onchange', 'updateBrandList(this.value)')
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
	mainImg.setAttribute('src', phot[0].url);
	mainImg.setAttribute('data-added', phot[0].added);
	mainImg.setAttribute('data-update', phot[0].update);
	mainImgCont.appendChild(mainImg);
	// Small-Image Reel
	var smImgReel	=	document.createElement('div');
	smImgReel.setAttribute('class', 'img-reel-container');
	var reelWrap	=	document.createElement('span');
	reelWrap.setAttribute('class', 'reel-wrap');
	// For each photo, create an img, with wrapper, and append to reelWrap
	Object.keys(phot).forEach(function(cv) {
		if (cv == 0) return;
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
	// Buttons
	var btnWrap	=	document.createElement('div');
	var edit	=	document.createElement('span');
	var clear	=	document.createElement('span');
	var editNode=	document.createTextNode('Add/Edit');
	var clrNode	=	document.createTextNode('Clear');
	btnWrap.setAttribute('class', 'img-gallery-btn-wrap');
	edit.setAttribute('class', 'gradient-button');
	edit.setAttribute('onclick', 'photoEditDialog('+JSON.stringify(phot)+')');
	clear.setAttribute('class', 'tertiary-button');
	edit.appendChild(editNode);
	clear.appendChild(clrNode);
	btnWrap.appendChild(edit);
	btnWrap.appendChild(clear);
	//Complete Gallery
	smImgReel.appendChild(reelWrap);
	imgGallery.appendChild(mainImgCont);
	imgGallery.appendChild(smImgReel);
	imgGallery.appendChild(btnWrap);
	return imgGallery;
}

function photoEditDialog(photos)
{
//	var photos = JSON.parse(photos);
	console.log(photos);
	// Define the view's parent container (the list's main element)
	var body	=	document.getElementById('ale-body');
	
	// Define the container, elements
	var container	=	document.createElement('div');
	var h2			=	document.createElement('h2');
	var h2Text		=	document.createTextNode('Add/Edit Photos');
	var inputWrap	=	document.createElement('div');
	var input		=	document.createElement('input');
	var tableWrap	=	document.createElement('div');
	var imgTable	=	document.createElement('table');
	var btnWrap		=	document.createElement('div');
	var update		=	document.createElement('span');
	
	container.setAttribute('id', 'photo-editor');
	container.setAttribute('class', 'photo-editor material');
	inputWrap.setAttribute('class', 'file-drop-wrap');
	input.setAttribute('class', 'file-drop');
	input.setAttribute('id', 'file-drop');
	input.setAttribute('onchange', 'imgPreprocess()');
	tableWrap.setAttribute('class', 'img-list-wrap material');
	imgTable.setAttribute('class', 'img-list');
	imgTable.setAttribute('id', 'img-list');
	
	// Header
	h2.appendChild(h2Text);
	
	// Input
	input.multiple = 'true';
	input.setAttribute('type', 'file');
	
	// Image Table
	Object.keys(photos).forEach(function(cv){
		if (photos[cv].url != 'img/interface/image_needed.png') {
			createImageDetailRow(photos, cv, imgTable);
		}
}); // End Image Table Loop
	
	// Btns
	var txt		=	document.createTextNode('Update');
	update.appendChild(txt);
	update.className	=	'gradient-button';
	update.setAttribute('onclick', 'updatePhotos()');
	btnWrap.appendChild(update);
	btnWrap.className	=	'img-edit-btns';
	
	// Complete
	inputWrap.appendChild(input);
	tableWrap.appendChild(imgTable);
	addCloseButton(container, 'photo-editor');
	container.appendChild(h2);
	container.appendChild(inputWrap);
	container.appendChild(tableWrap);
	container.appendChild(btnWrap);
	body.appendChild(container);
	
}

function removePhoto(id)
{
	var table	=	document.getElementById('img-list');
	var row		=	document.getElementById(id);
	table.removeChild(row);
}

function updatePhotos()
{
	var obj		=	new Object;
	obj.aleAsset=	document.getElementById('ale-asset-num').dataset.asset;
	var imgs	=	[];
	
	// Get photo data
	for (j = 0 ; j < 7 ; j++)
	{
		var row	=	document.getElementById('img' + j);
		if (row) {
			// Get the data
			var img		=	new Object;
			img.url		=	row.dataset.url;
			img.id		=	row.dataset.rowid;
			img.order	=	row.dataset.order;
			console.log(img);
			imgs.push(img);
		} else {
			// Do something if there's no row? Photo never existed or was removed.
		}
	}
	
	// Validate data
	var fail	=	false;
	Object.keys(imgs).forEach(function(cv){
		if (imgs[cv].order == ''){
//			console.log('OHNO');
			console.log('No order supplied.');
			fail	=	true;
		}
	});
	
	if (fail === false){
		console.log(imgs);
		obj.imgs	=	imgs;
//		console.log(imgs[1].url)
		var url		=	'ajax_handler.php?controller=admin&action=updateItemPhotos';
		var json		=	encodeURIComponent(JSON.stringify(obj));
		showLoadTimer();
		makeRequest(url, json, updatePhotoResponse)
	} else {
		var title	=	'Photo Update Fail';
		var message	=	'Please ensure each photo has been assigned a valid Order.';
		buildAlert(title, message);
	}
}

function updatePhotoResponse(req)
{
	console.log('Update Photo Response');
	updateAssetView();
	closeDialog('photo-editor');
	console.log(req);
}

function updateAssetView()
{
	var obj		=	new Object;
	obj.aleAsset=	document.getElementById('ale-asset-num').dataset.asset;
	var url		=	'ajax_handler.php?controller=admin&action=getInvAssetData';
	var json		=	encodeURIComponent(JSON.stringify(obj));
	makeRequest(url, json, updateAssetViewResponse);
}

function updateAssetViewResponse(res)
{
	var res	=	JSON.parse(res);
	console.log(res);
	console.log(listOptions);
	var exists	=	document.getElementById('loader');
	if (exists != null){
		hideLoadTimer();
	}
	data		=	res.data;
	photos		=	res.photos;
	categories	=	res.categories;
	item_status	=	res.status;
	testThis()
}

function testThis()
{
	displayInvAsset(data, photos, categories, item_status, listOptions);
}

function changeOrder(rowID, newVal)
{
	var row	=	document.getElementById(rowID);
//	console.log(newVal);
	row.dataset.order	=	newVal;
}

function createOverviewInfo(data, batch)
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
	labelSpan.appendChild(label);
	labelSpan.style.fontWeight = 'bold';
	
	var noteSpan	=	document.createElement('span');
	noteSpan.setAttribute('id', 'condition_note');
	noteSpan.setAttribute('data-value', data.condition_note);
	var condNote	=	document.createTextNode( data.condition_note);
	noteSpan.appendChild(condNote);

	p.appendChild(labelSpan);
	p.appendChild(noteSpan);
	condNoteBox.appendChild(p);
	
	// Left Table Wrap
	var leftTableWrap	=	document.createElement('div');
	leftTableWrap.setAttribute('class', 'table-wrap');
	// Top Left Table
	var leftTable		=	document.createElement('table');
	leftTable.setAttribute('class', 'dataTable');
	//createDataTableRow(leftTable, 'ALE Asset', data.prefix + data.aleAsset, 'aleAsset');
	
		// Create AleAsset View
		var row			=	document.createElement('tr');
		//row.setAttribute('onclick', 'getUpdateDialog(\'' + id + '\'');
		var td1			=	document.createElement('td');
		var tn1			=	document.createTextNode('ALE Asset');
		td1.appendChild(tn1);
		td1.style.fontWeight = 'bold';
		var td2			=	document.createElement('td');
		var tn2			=	document.createTextNode(data.prefix);
		td2.appendChild(tn2);
		var span		=	document.createElement('span');
		span.setAttribute('id', 'ale-asset-num');
		span.setAttribute('data-asset', data.aleAsset);
		var tn3			=	document.createTextNode(data.aleAsset);
		span.appendChild(tn3);
		td2.appendChild(span);
		row.appendChild(td1);
		row.appendChild(td2);
		leftTable.appendChild(row);
		// END

		
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
							05:	'Novartis/ALOE',
							06:	'Consignment',
							08:	'ALE'
	};
	createDataFormRow(leftTable, 'Track', data.track, 'track', 'select', trackArray);
	createDataFormRow(leftTable, 'Batch', data.batch_name, 'batch_name', 'select', listOptions.batch);
	createDataFormRow(leftTable, 'Received', data.date_received, 'date_received');
	createDataTableRow(leftTable, 'Added', data.date_added, 'date_added');
	createDataTableRow(leftTable, 'Completed', data.date_completed, 'date_completed');
	createDataTableRow(leftTable, 'Modified', data.last_update, 'last_update');
	createDataTableRow(leftTable, 'Modified By', data.modified_by, 'modified_by');
	leftTableWrap.appendChild(leftTable);
	
// Finish Basic Info Box
	infoWrap.appendChild(condNoteBox);
	infoWrap.appendChild(leftTableWrap);
	//infoWrap.appendChild(rightTableWrap);	
	//infoWrap.appendChild(subWrap);
	return infoWrap;
}

function updateFunctionDesc(newVal)
{
	data.modelID	=	newVal;
	
	var funcDesc	=	document.getElementById('function_desc');
	funcDesc.value	=	listOptions.functions[newVal];
}

function updateBrandList(newVal)
{
	data.mnfrID	=	newVal;
	filterBrandsByMnfr();
}

function updateModelList(newVal)
{
	console.log(newVal); // New mnfr ID
	data.mnfrID	=	newVal;
	filterModelsByMnfr();
}

function filterModelsByMnfr()
{
	var modelSelect 	=	document.getElementById('model');
	var models			=	[];
	Object.keys(listOptions.model_mnfr).forEach(function(cv){
		if (listOptions.model_mnfr[cv].mnfr == data.mnfrID) {
//			console.log(listOptions.model_mnfr[cv].model)
			models.push(listOptions.model_mnfr[cv].model)
		}
	});	
	
	
	console.log(models);
	
	while (modelSelect.hasChildNodes()) {
		modelSelect.removeChild(modelSelect.lastChild);
	}
	
	// Default
	var option	=	document.createElement('option');
	option.selected = true;
	option.disabled = true;
	var tn		=	document.createTextNode('Select a Model or Add a New Record');
	option.appendChild(tn);
	modelSelect.appendChild(option);
	
	Object.keys(models).forEach(function(curVal) {
//		// Create Options
		var id	=	models[curVal];
		console.log(id);
		console.log(listOptions.models[id]);
		var option	=	document.createElement('option');
		option.setAttribute('value', models[curVal]);
		if (id == data.modelID) {
			option.selected = true;
		}// else {
//			if (curVal == Number(cv) && dataName == 'model') {
//				option.selected = true;
//			}
//		}
		var tn		=	document.createTextNode(listOptions.models[id]);
		option.appendChild(tn);
		modelSelect.appendChild(option);
	});
}

function filterBrandsByMnfr()
{
	var brandSelect 	=	document.getElementById('brand');
	var brands			=	[];
	Object.keys(listOptions.mnfr_brand).forEach(function(cv){
		if (listOptions.mnfr_brand[cv].mnfr == data.mnfrID) {
//			console.log(listOptions.model_mnfr[cv].model)
			brands.push(listOptions.mnfr_brand[cv].brand)
		}
	});
	
	while (brandSelect.hasChildNodes()) {
		brandSelect.removeChild(brandSelect.lastChild);
	}
	
	// Default
	var option	=	document.createElement('option');
	option.selected = true;
	option.disabled = true;
	var tn		=	document.createTextNode('Select a Brand or Add a New Record');
	option.appendChild(tn);
	brandSelect.appendChild(option);
	
	// NA
	var option	=	document.createElement('option');
	option.setAttribute('value', '');
	if (data.brandID == '') option.selected = true;
	var tn		=	document.createTextNode('N/A');
	option.appendChild(tn);
	brandSelect.appendChild(option);
	
	Object.keys(brands).forEach(function(curVal) {
//		// Create Options
		var id	=	brands[curVal];
		console.log(id);
		console.log(listOptions.brands[id]);
		var option	=	document.createElement('option');
		option.setAttribute('value', brands[curVal]);
		if (id == data.brandID) {
			option.selected = true;
		}// else {
//			if (curVal == Number(cv) && dataName == 'model') {
//				option.selected = true;
//			}
//		}
		var tn		=	document.createTextNode(listOptions.brands[id]);
		option.appendChild(tn);
		brandSelect.appendChild(option);
	});
}

function getBasicInfo(data, mnfrs, models, brands)
{
	// Create list of models for the given manufacturer:
	
	
	
	
	
	var itemDetails		=	document.createElement('div');
	itemDetails.setAttribute('class', 'item-detail-wrap');
	var h2 				=	document.createElement('h2');
	var header			=	document.createTextNode('Basic Info');
	h2.appendChild(header);
	itemDetails.appendChild(h2);
	var detailTable		=	document.createElement('table');
	detailTable.setAttribute('class', 'dataTable');
	createDataFormRow(detailTable, 'Mnfr.', data.mnfr, 'mnfr', 'select', mnfrs);
	createDataFormRow(detailTable, 'Brand', data.brand, 'brand', 'select', brands);
	createDataFormRow(detailTable, 'Model', data.modelID, 'model', 'select', models);
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

function createAccountingInfo(data, vendors)
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
	createDataFormRow(detailTable, 'Vendor', data.vendor, 'vendor', 'select', vendors);
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

function createNovartis(data, prevOwners) 
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
	createDataFormRow(detailTable, 'Prev. Owner', data.prev_owner, 'prev_owner', 'select', prevOwners);
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
	//row.setAttribute('onclick', 'getUpdateDialog(\'' + id + '\'');
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
	console.log('OPT ARRAY:');
	console.log(optArray);
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
		input.setAttribute('data-name', fieldName);
		input.setAttribute('value', cv);
		input.setAttribute('id', dataName);
		input.setAttribute('onblur', 'checkInput(this.value, \''+dataName+'\')');
		td2.appendChild(input);
	}
	if (type == 'select') {
		var select	=	document.createElement('select');
		switch (dataName)
		{
			case 'brand':
			case 'batch_name':
				var option	=	document.createElement('option');
				option.setAttribute('value', '');
				if (cv == '') option.selected = true;
				var tn		=	document.createTextNode('N/A');
				option.appendChild(tn);
				select.appendChild(option);
				break;
		}
		Object.keys(optArray).forEach(function(curVal) {
			// Create Options
			var option	=	document.createElement('option');
			option.setAttribute('value', curVal);
			if (optArray[curVal] == cv) {
				option.selected = true;
			} else {
				if (curVal == Number(cv) && dataName == 'model') {
					option.selected = true;
				}
			}
			var tn		=	document.createTextNode(optArray[curVal]);
			option.appendChild(tn);
			select.appendChild(option);
		});
		select.setAttribute('onblur', 'checkInput(this.value, \''+dataName+'\')');
		select.setAttribute('data-name', fieldName);
		select.setAttribute('id', dataName);
		// Determines whether or not to add an "Add New Option" button to the select field
		switch (dataName)
		{
			case 'batch_name':
			case 'brand':
			case 'model':
			case 'mnfr':
			case 'prev_owner':
				select.setAttribute('class', 'select-add-opt');
				var btn	=	document.createElement('div');
				btn.setAttribute('class', 'add-opt-btn gradient-button');
				var img	=	document.createElement('img');
				img.setAttribute('src', 'img/interface/add-g8a.png');
				btn.appendChild(img);
				var i	=	1;
			default:
				// Append Select to Table Cell, as well as the button, if applicable
				td2.appendChild(select);
				if (i === 1) {
					td2.appendChild(btn);
				}
		}
		
	}
	if (type == 'textarea') {
		var textarea	=	document.createElement('textarea');
		var tn			=	document.createTextNode(cv);
		textarea.appendChild(tn);
		textarea.setAttribute('onblur', 'checkInput(this.value, \''+dataName+'\')');
		textarea.setAttribute('rows', '10');
		textarea.setAttribute('id', dataName);
		textarea.setAttribute('data-name', fieldName);
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
	tn3.setAttribute('class', 'status-rm warning-button');
	var tn4		=	document.createTextNode('Remove');
	tn3.appendChild(tn4);
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
	var bold = 0;
	var row		=	document.createElement('tr');
	var td1		=	document.createElement('th');
	var tn1		=	document.createTextNode(col1);
	td1.appendChild(tn1);
	var td2		=	document.createElement('th');
	var tn2		=	document.createTextNode(col2);
	td2.appendChild(tn2);
	var td3		=	document.createElement('th');
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

function createImageDetailRow(photos, cv, imgTable)
{
	// Add a Row for each table
	var tr		=	document.createElement('tr');
	var picTd	=	document.createElement('td');
	var infoTd	=	document.createElement('td');
	var actTd	=	document.createElement('td');
	var img		=	document.createElement('img');
	var rmBtn	=	document.createElement('span');
	var select	=	document.createElement('select');
	var subTable=	document.createElement('table');
	subTable.className	=	'info-table';
	
	// Row
	tr.setAttribute('class', 'img-row');
	
	var rowId	=	cv;
	while (document.getElementById('img' + rowId) != null)
	{
		rowId++;
	}
	tr.setAttribute('id', 'img' + rowId);
	
	
	tr.dataset.url	=	photos[cv].url;
	tr.dataset.rowid=	photos[cv].id;
	tr.dataset.order=	photos[cv].order;
	
	var options	=	[];
	var txt		=	document.createTextNode('Select Image Order');
	options.push('Select Image Order');
	
	// Select
	select.setAttribute('onchange', "changeOrder('"+tr.id+"', this.value)");
	for (j = 1 ; j<=6 ; j++)
	{
		options.push(j);
	}
//	console.log('OPT1: ' + options);
	
	var count	=	new Object;
	count.count	=	0;	
	
	// Create Options
	Object.keys(options).forEach(function(cvOpt) {
//		console.log(options[cvOpt]);
		var opt	=	document.createElement('option');
		var txt	=	document.createTextNode(options[cvOpt])
		opt.setAttribute('value', options[cvOpt]);
		if (cvOpt == 0) {
			opt.id			=	'default-opt';
			opt.selected	=	'true';
			opt.disabled	=	'true';
			opt.value		=	'null';
		}
		if (cvOpt == photos[cv].order)
		{
			opt.selected	=	'true';
			count.count++;
		}
		opt.appendChild(txt);
		select.appendChild(opt);
	});
	
	
	// Images
	img.setAttribute('src', photos[cv].url);
	img.setAttribute('class', 'material');
	
	// Info Table
	var ordTr	=	document.createElement('tr');
	var addTr	=	document.createElement('tr');
	var upTr	=	document.createElement('tr');
	var ord1	=	document.createElement('td');
	var ord2	=	document.createElement('td');
	var add1	=	document.createElement('td');
	var add2	=	document.createElement('td');
	var up1		=	document.createElement('td');
	var up2		=	document.createElement('td');
	
	var ordTn	=	document.createTextNode('Order');
	var addTn	=	document.createTextNode('Date Added');
	var upTn	=	document.createTextNode('Date Updated');
	
	var ordData	=	select;
	var addData	=	document.createTextNode(photos[cv].added);
	var upData	=	document.createTextNode(photos[cv].update);
	
	ord1.appendChild(ordTn);
	add1.appendChild(addTn);
	up1.appendChild(upTn);
	
	ord2.appendChild(ordData);
	add2.appendChild(addData);
	up2.appendChild(upData);
	
	ordTr.appendChild(ord1);
	ordTr.appendChild(ord2);
	addTr.appendChild(add1);
	addTr.appendChild(add2);
	upTr.appendChild(up1);
	upTr.appendChild(up2);
	subTable.appendChild(ordTr);
	subTable.appendChild(addTr);
	subTable.appendChild(upTr);
	// END INFO TABLE
	
	// Remove Btn
	rmBtn.className	=	'status-rm warning-button';
	rmBtn.setAttribute('onclick', "removePhoto('img"+cv+"')");
	var txt			=	document.createTextNode('Remove');
	rmBtn.appendChild(txt);
	
	
	// Assemble td's
	picTd.appendChild(img);
	infoTd.appendChild(subTable);
	actTd.appendChild(rmBtn);
	
	// Assemble tr
	tr.appendChild(picTd);
	tr.appendChild(infoTd);
	tr.appendChild(actTd);
	imgTable.appendChild(tr);
}

function imgPreprocess() {
	showLoadTimer('The server is processing your images. This may take a few moments.');
	var aleAsset		=	document.getElementById('ale-asset-num').dataset.asset;
	var inputElement	= 	document.getElementById('file-drop');
	var imgTable		=	document.getElementById('img-list');
	var photos			=	new Object;
	photos.count 		= 	0
	for (j = 0 ; j < 6 ; j++)
	{
		var row	=	document.getElementById('img' + j);
		if (row) photos.count++;
	}
	
	var fileList=	inputElement.files;
	console.log(photos.count);
	console.log('inputElement.files LENGTH (number of files submitted): ' + fileList.length);
	
	// Validate
	if (fileList.length > 6 - photos.count) {
		console.log('You\'ve added too many photos.');
		buildAlert('User Error', 'You\'ve added too many photos. Maximum 6 per Item.');
		inputElement.value = '';
	} else {
		var formData	=	new FormData();
		for (j = 0 ; j < fileList.length ; j++)
		{
			var file = fileList[j];
			// Check the file type.
			if (!file.type.match('image.*')) 
			{
				continue;
			}
			// Add the file to the request.
			formData.append('image[]', file, file.name);
		}
		formData.append('asset', aleAsset);
		formData.append('reqIsAjax', 'true');
		console.log('FORM DATA: ');
		console.log(formData);
		
		req = new XMLHttpRequest();
		req.onreadystatechange = alertContents;
		req.open('POST', 'ajax_handler.php?controller=admin&action=imagePreprocess', true);
		req.send(formData);
		
		function alertContents()
		{
			if (req.readyState === XMLHttpRequest.DONE) 
			{
				if (req.status === 200)
				{
					hideLoadTimer();
					console.log('File(s) pre-processed' + req.responseText);
					var data 		= 	JSON.parse(req.responseText);
					var imgTable	=	document.getElementById('img-list');
					var photos		=	data[1];
					console.log('DATA[0]: ' + data[0]);
					if (data[0] === 1) {
//						console.log('YESTES');
						Object.keys(photos).forEach(function(cv){
							createImageDetailRow(photos, cv, imgTable)
						});
					}
//					alertUser(data);
					//var div			= document.getElementById('photoDataArea');
					for (j = 0 ; j < data.length ; j++)
					{
//						console.log(j);
					}
					//upBut.value	= 'Upload';
					//document.getElementById("demo1").style.display = "none";
					//getData(asset, ord);
				}
				else
				{
					alert('An error occurred while trying to process your image(s). Please try again.');
					//upBut.value	= 'Upload';
				}
			}
		}
//		req.onload	= function() 
//		{
//			if (req.status === 200)
//			{
//				console.log('File(s) pre-processed' + req.responseText);
//				var data 		= req.responseText;
//				alertUser(data);
//				//var div			= document.getElementById('photoDataArea');
//				for (j = 0 ; j < data.length ; j++)
//				{
//					//div.innerHTML += data[j];
//				}
//				//upBut.value	= 'Upload';
//				//document.getElementById("demo1").style.display = "none";
//				//getData(asset, ord);
//			}
//			else
//			{
//				alert('An error occurred while trying to process your image(s). Please try again.');
//				//upBut.value	= 'Upload';
//			}
//		};	
//		var json		=	encodeURIComponent(JSON.stringify(formData))
//		createImageDetailRow(photos, cv, imgTable)
	} // END ELSE
}

function addStatusDialog()
{
	var body	=	document.getElementById('ale-body');
	var cont	=	document.createElement('div');
	cont.setAttribute('id', 'status-dialog');
	cont.className	=	'admin-dialog material';
	body.appendChild(cont);
	var h2		=	document.createElement('h2');
	var txt		=	document.createTextNode('Add a Status');
	h2.appendChild(txt);

	addCloseButton(cont, 'status-dialog');
	cont.appendChild(h2);
}
