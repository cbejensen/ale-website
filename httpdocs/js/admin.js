/*
 * This is the main js file used by the admin module
 */
function closeAssetView() 
{
	var assetView	=	document.getElementById('asset-view');
	assetView.style.left = '101%';
	
//	var data 	=	'test';
//	//url = window.location.href;
//	var url		=	'http://localhost/atlanticlabequipment/ale-website/httpdocs/?controller=admin&action=showList&subsect=inventory&title=List%20Test&ltype=itm&lscp=complete&limit=20&rp=1&srt_f=019&srt_d=desc';
//	history.pushState(data, null, url);
//	console.log(window.location.href);
}
function displayInvItem(data, photos, categories, status)
{
	showLoadTimer();
	
	var data	=	JSON.parse(data);
	var phot	=	JSON.parse(photos);
	var cate	=	JSON.parse(categories);
	var status	=	JSON.parse(status);
	
	// Convert NULL to empty string
	Object.keys(data).forEach(function(cv) {
		if (data[cv] == null) data[cv] = '';
	});
	
	// Convert NULL url to placeholder
	Object.keys(phot).forEach(function(cv) {
		if (phot[cv] == null) phot[cv] = 'fix me!';
	});
	
	console.log('JSON parsed.');
	console.log('Building Asset View.');
	//console.log(phot);
	
	// Define the view's parent
	var listMain	=	document.getElementById('list-main');
	
	// Create the container
	var assetView	=	document.createElement('div');
	assetView.setAttribute('class', 'asset-view material');
	assetView.setAttribute('id', 'asset-view');
	assetView.style.left = '100%';
	
	// Create the nav/task bar
	var navBar	=	document.createElement('nav');
	navBar.setAttribute('class', 'asset-view material');
	var exitBtn	=	document.createElement('div');
	exitBtn.setAttribute('onclick', 'closeAssetView()');
	exitBtn.setAttribute('class', 'close-asset-view');
	navBar.appendChild(exitBtn);
	
	// Create the title
	var h1		= document.createElement('h1');
	var title	= document.createTextNode(data.mnfr + ' ' + data.brand + ' ' + data.model + ' ' + data.function_desc + ' ' + data.title_extn);
	h1.appendChild(title);
	h1.setAttribute('class', 'asset-view');
	
	// Basic Info Box
	var basicInfo	=	document.createElement('div');
	basicInfo.setAttribute('class', 'asset-section basic-info');
	var imgGallery	=	createImgGallery(phot);
	var infoWrap	=	createBasicInfo(data);
	// Compile Children	
	basicInfo.appendChild(imgGallery);
	basicInfo.appendChild(infoWrap);
	
	// Detailed Info Box (contains "Item Details," "Item Status," and "Listing Info"
	var detailedInfo	=	document.createElement('div');
	detailedInfo.setAttribute('class', 'asset-section detailed-sect');
	var itemDetails			=	createItemDetails(data);
	var itemStatusListing	=	createItemStatusListing(data, status, cate);
	// Compile Children
	detailedInfo.appendChild(itemDetails);
	detailedInfo.appendChild(itemStatusListing);
	
	// Desc/Specs Box
	var descSpecs	=	document.createElement('div');
	descSpecs.setAttribute('class', 'asset-section');
	// Desc
	var descWrap	=	document.createElement('div');
	var h2			=	document.createElement('h2');
	var head		=	document.createTextNode('Item Description');
	h2.appendChild(head);
	descWrap.appendChild(h2);
	var	p			=	document.createElement('p');
	var text		=	document.createTextNode(data.m_desc);
	p.appendChild(text);
	descWrap.appendChild(p);
	// Specs
	var specWrap	=	document.createElement('div');
	var h2			=	document.createElement('h2');
	var head		=	document.createTextNode('Specifications');
	h2.appendChild(head);
	specWrap.appendChild(h2);
	//var	p			=	document.createElement('p');
	//var text		=	document.createTextNode(specs);
	//p.appendChild(text);
	//specWrap.appendChild(p);
	// Compile Children
	descSpecs.appendChild(descWrap);
	descSpecs.appendChild(specWrap);
	
	// Novartis Box
	var novartis	=	document.createElement('div');
	novartis.setAttribute('class', 'asset-section');
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
	createDataTableRow(detailTable, 'EMP Status', data.emp_status);
	createDataTableRow(detailTable, 'EMP Category', data.emp_category + '/' + data.emp_subcategory);
	createDataTableRow(detailTable, 'Prev. Owner', data.prev_owner);
	createDataTableRow(detailTable, 'NBV', data.nbv);
	section.appendChild(detailTable);
	novartis.appendChild(section);
	// Middle Nov Section
	var section		=	document.createElement('div');
	section.setAttribute('class', 'nov-sect');
	var detailTable		=	document.createElement('table');
	detailTable.setAttribute('class', 'dataTable');
	createDataTableRow(detailTable, 'NIBR', data.nibr);
	createDataTableRow(detailTable, 'TM0', data.tm0);
	createDataTableRow(detailTable, 'SAP', data.sap);
	section.appendChild(detailTable);
	novartis.appendChild(section);
	// Right Nov Section
	var section		=	document.createElement('div');
	section.setAttribute('class', 'nov-sect');
	var detailTable		=	document.createElement('table');
	detailTable.setAttribute('class', 'dataTable');
	createDataTableRow(detailTable, 'Src. Building', data.src_building);
	createDataTableRow(detailTable, 'Src. Floor', data.src_floor);
	createDataTableRow(detailTable, 'Src. Room', data.src_room);
	section.appendChild(detailTable);
	novartis.appendChild(section);
	
	// Assemble Sections
	assetView.appendChild(navBar);
	assetView.appendChild(h1);
	assetView.appendChild(basicInfo);
	assetView.appendChild(detailedInfo);
	assetView.appendChild(descSpecs);
	assetView.appendChild(novartis);
	listMain.appendChild(assetView);
//	assetView.style.left = '100%';
	assetView.style.left = '32%';
		
}

function createItemDetails(data)
{
	var itemDetails		=	document.createElement('div');
	itemDetails.setAttribute('class', 'item-detail-wrap');
	var h2 				=	document.createElement('h2');
	var header			=	document.createTextNode('Item Details');
	h2.appendChild(header);
	itemDetails.appendChild(h2);
	var detailTable		=	document.createElement('table');
	detailTable.setAttribute('class', 'dataTable');
	createDataTableRow(detailTable, 'Mnfr.', data.mnfr);
	createDataTableRow(detailTable, 'Brand', data.brand);
	createDataTableRow(detailTable, 'Model', data.model);
	createDataTableRow(detailTable, 'Function', data.function_desc);
	createDataTableRow(detailTable, 'Title Extn.', data.title_extn);
	itemDetails.appendChild(detailTable);
	var detailTable		=	document.createElement('table');
	detailTable.setAttribute('class', 'dataTable');
	createDataTableRow(detailTable, 'Serial No.', data.serial_num);
	createDataTableRow(detailTable, 'Model No.', data.addtl_model);
	createDataTableRow(detailTable, 'Mnfr. Part No.', data.mpn);
	createDataTableRow(detailTable, 'Year of Mnfr.', data.yom);
	createDataTableRow(detailTable, 'Weight', data.weight);
	itemDetails.appendChild(detailTable);
	return itemDetails;
}

function createItemStatusListing(data, status, cate)
{
	var itemDetails		=	document.createElement('div');
	itemDetails.setAttribute('class', 'item-detail-wrap');
	// Status Info
	var subWrap			=	document.createElement('div');
	subWrap.setAttribute('class', 'sub-wrap status-table');
	var h2 				=	document.createElement('h2');
	var header			=	document.createTextNode('Item Status');
	h2.appendChild(header);
	subWrap.appendChild(h2);
	var detailTable		=	document.createElement('table');
	detailTable.setAttribute('class', 'dataTable');
	Object.keys(status).forEach(function(cv) {
		//console.log(cv, status[cv]);
		createStatusRow(detailTable, status[cv].status, status[cv].description);
	});
	subWrap.appendChild(detailTable);
	itemDetails.appendChild(subWrap);
	
	// Listing Info
	var subWrap			=	document.createElement('div');
	subWrap.setAttribute('class', 'sub-wrap');
	var h2 				=	document.createElement('h2');
	var header			=	document.createTextNode('Listing Data');
	h2.appendChild(header);
	subWrap.appendChild(h2);
	var detailTable		=	document.createElement('table');
	detailTable.setAttribute('class', 'dataTable');
	createDataTableRow(detailTable, 'Condition', data.item_condition);
	createDataTableRow(detailTable, 'Cosmetic', data.cosmetic);
	createDataTableRow(detailTable, 'Testing', data.testing);
	createDataTableRow(detailTable, 'Components', data.components);
	createDataTableRow(detailTable, 'Shipping Class', data.shipping_class);
	subWrap.appendChild(detailTable);
	var detailTable		=	document.createElement('table');
	detailTable.setAttribute('class', 'dataTable');
	Object.keys(cate).forEach(function(cv) {
		//console.log(cv, status[cv]);
		createStatusRow(detailTable, cate[cv].category, cate[cv].subcategory);
	});
	subWrap.appendChild(detailTable);
	itemDetails.appendChild(subWrap);
	return itemDetails;
	
}

function createBasicInfo(data)
{
	// Info Wrapper
	var infoWrap	=	document.createElement('div');
	infoWrap.setAttribute('class', 'info-wrap');
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
	createDataTableRow(leftTable, 'ALE Asset', data.prefix + data.aleAsset);
	createDataTableRow(leftTable, 'Location', data.wh_location);
	leftTableWrap.appendChild(leftTable);
	// Bottom Left Table
	var leftTable		=	document.createElement('table');
	leftTable.setAttribute('class', 'dataTable');
	createDataTableRow(leftTable, 'Price', data.price);
	createDataTableRow(leftTable, 'Quantity', data.quantity);
	createDataTableRow(leftTable, 'Cost', data.cost);
	leftTableWrap.appendChild(leftTable);
	// Right Table Wrap
	var rightTableWrap	=	document.createElement('div');
	rightTableWrap.setAttribute('class', 'table-wrap');
	// Top Right Table
	var rightTable		=	document.createElement('table');
	rightTable.setAttribute('class', 'dataTable');
	createDataTableRow(rightTable, 'Track', data.track);
	createDataTableRow(rightTable, 'Batch', data.batch_name);
	createDataTableRow(rightTable, 'Vendor', data.vendor);
	rightTableWrap.appendChild(rightTable);
	// Bottom Right Table
	var rightTable		=	document.createElement('table');
	rightTable.setAttribute('class', 'dataTable');
	createDataTableRow(rightTable, 'Added', data.date_added);
	createDataTableRow(rightTable, 'Received', data.date_received);
	createDataTableRow(rightTable, 'Completed', data.date_completed);
	createDataTableRow(rightTable, 'Modified', data.last_update);
	createDataTableRow(rightTable, 'Modified By', data.modified_by);
	rightTableWrap.appendChild(rightTable);
// Finish Basic Info Box
	infoWrap.appendChild(condNoteBox);
	infoWrap.appendChild(leftTableWrap);
	infoWrap.appendChild(rightTableWrap);	
	return infoWrap;
}

function createImgGallery(phot)
{
	// Img Gallery Container
	var imgGallery	=	document.createElement('div');
	imgGallery.setAttribute('class', 'asset-gallery');
	// Main Image
	var mainImg		=	document.createElement('img');
	mainImg.setAttribute('class', 'mainImg material');
	mainImg.setAttribute('src', phot[1].url);
	mainImg.setAttribute('data-added', phot[1].added);
	mainImg.setAttribute('data-update', phot[1].update);
	// Small-Image Reel
	var smImgReel	=	document.createElement('div');
	smImgReel.setAttribute('class', 'imgReel');
	var reelWrap	=	document.createElement('span');
	reelWrap.setAttribute('class', 'reel-wrap');
	Object.keys(phot).forEach(function(cv) {
		if (cv == 1) return;
		//console.log(cv, phot[cv]);
		//console.log(cv);
		//console.log(phot[cv].url); // Prints each url
		var smImg	=	document.createElement('img');
		smImg.setAttribute('class', 'smImg material');
		smImg.setAttribute('src', phot[cv].url);
		smImg.setAttribute('data-added', phot[cv].added)
		smImg.setAttribute('data-update', phot[cv].update)
		reelWrap.appendChild(smImg);
	});
	//Complete Gallery
	smImgReel.appendChild(reelWrap);
	imgGallery.appendChild(mainImg);
	imgGallery.appendChild(smImgReel);
	return imgGallery;
}

function createDataTableRow(table, name, data)
{
	var row			=	document.createElement('tr');
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

function createStatusRow(table, status, desc)
{
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
	
	row.appendChild(td1);
	row.appendChild(td2);
	row.appendChild(td3);
	table.appendChild(row);
}

function showLoadTimer()
{
	console.log('Loading...');
}

function hideLoadTimer()
{
	
}

function thisIsNitReal() 
{
	// NEW method
	console.log('Building Modal Box: Add Manufacturer');
	var docBody = document.body;
	
	// Set up Modal Box
	var modalBox = document.getElementById('modal_addRecord');
	modalBox.style.display = 'block';
	while (modalBox.firstChild) {
		modalBox.removeChild(modalBox.firstChild);
	}
	
	// Add Close Button
	var closeButton	= document.createElement('span');
	closeButton.setAttribute('class', 'closeBtn');
	closeButton.setAttribute('id', 'modal-close');
	closeButton.setAttribute('onclick', "closeDialog('modal_addRecord')");
	var x = document.createTextNode('x');
	closeButton.appendChild(x);
	modalBox.appendChild(closeButton);
	
	// Add Header
	var h2		= document.createElement('h2');
	var heading	= document.createTextNode('Please provide the following information:');
	h2.appendChild(heading);
	modalBox.appendChild(h2);
	
	// Add Form
	var form			= document.createElement('form');
	var mnfrLabel		= document.createElement('label');
	var mnfrInput		= document.createElement('input');
	var subitemLabel	= document.createElement('label');
	var subitemInput	= document.createElement('input');
	var submit			= document.createElement('input');
	var mlt	= document.createTextNode('New Manufacturer');
	var slt = document.createTextNode('Subitem Of (refer to list)');
	mnfrLabel.appendChild(mlt);									// Append text nodes to labels
	subitemLabel.appendChild(slt);
	mnfrInput.setAttribute('type', 'text');						// Set attributes for inputs
	mnfrInput.setAttribute('id', 'mnfr_in');
	mnfrInput.setAttribute('name', 'mnfr');
	subitemInput.setAttribute('type', 'text');
	subitemInput.setAttribute('id', 'subitem_in');
	subitemInput.setAttribute('name', 'subitem');
	submit.setAttribute('type', 'button');
	submit.setAttribute('value', 'Submit');
	submit.setAttribute('onclick', "addMnfr(" + rowNum + ")");
	submit.setAttribute('id', 'newRecordSubmit');
	form.appendChild(mnfrLabel);
	form.appendChild(mnfrInput);
	form.appendChild(subitemLabel);
	form.appendChild(subitemInput);
	form.appendChild(submit);
	modalBox.appendChild(form);
}