/*
 * This is a refactor of assetView.js
 *
 */

function displayInvAsset()
{
//	View's Parent
	var listMain	=	document.getElementById('list-main');

//	Initialization
	closeAssetViewIfExists(listMain);
	showLoadTimer();
	data	=	nullToEmptyStr(data);
	checkPhotos();

	var assetCont	=	createAssetViewContainer();
	var assetNav	=	createAssetViewNavBar();
	var assetTitle	=	createAssetTitle();
	var overview	=	createOverviewSection();
	var assetStatus	=	createStatusSection();
	var basicInfo	=	createBasicInfoSection();
	var accounting	=	createAccountingSection();
	var listingData	=	createListingSection();
	var assetCats	=	createCategoriesSection();
	
	assetCont.appendChild(assetNav);
	assetCont.appendChild(assetTitle);
	assetCont.appendChild(overview);
	assetCont.appendChild(assetStatus);
	assetCont.appendChild(basicInfo);
	assetCont.appendChild(accounting);
	assetCont.appendChild(listingData);
	assetCont.appendChild(assetCats);
	
	switch (data.track) 
	{
		case 'Novartis':
		case 'Novartis/ALOE':
		case 'EMP':
			var novartis	=	createNovartisSection();
			assetCont.appendChild(novartis);
			break;
	}

	hideLoadTimer();
	listMain.appendChild(assetCont);
	assetCont.style.right	=	'0%';
	filterModelsByMnfr();
	filterBrandsByMnfr();
}

function createAssetViewContainer()
{
	var cont	=	document.createElement('div');
	cont.className	=	'asset-view material';
	cont.setAttribute('id', 'asset-view');

	return cont;
}

function createAssetViewNavBar()
{
	var nav		=	document.createElement('nav');
	nav.className	=	'asset-view material window-header';
	
	var btns	=	document.createElement('span');
	btns.className	=	'btns-cont';

	var saveBtn	=	createButton({
		'className':	'gradient-button save-btn',
		'onclickEvent':	'saveAssetData()',
		'text':		'Save'
	});

	var exitBtn	=	createButton({
		'className':	'close-asset-view tertiary-button',
		'onclickEvent':	'closeAssetViewAndPushState()',
		'text':		'Close'
	});

	btns.appendChild(saveBtn);
	btns.appendChild(exitBtn);

	nav.appendChild(btns);
	return nav;
}

function createAssetTitle()
{
	var h1	=	document.createElement('h1');
	var txt	=	document.createTextNode(
		data.mnfr + ' ' + 
		data.brand + ' ' + 
		data.model + ' ' + 
		data.function_desc + ' ' + 
		data.title_extn
	);
	h1.appendChild(txt);
	h1.className	=	'asset-view';
	return h1;
}

function createOverviewSection()
{
	var ovr		=	document.createElement('div');
	ovr.className	=	'asset-section overview';
	var imgGallery	=	createAssetImgGallery();
	var info	=	createOverviewDataView();
	ovr.appendChild(imgGallery);
	ovr.appendChild(info);
	return ovr;
}

function createAssetImgGallery()
{
	var imGal	=	document.createElement('div');
	imGal.className	=	'asset-gallery';

	var mainImgCont		=	document.createElement('div');
	mainImgCont.className	=	'main-img-cont material';

	var mainImg		=	document.createElement('img');
	mainImg.className	=	'main-img';
	mainImg.src		=	photos[0].url;
	mainImg.dataset.added	=	photos[0].added;
	mainImg.dataset.update	=	photos[0].update;
	mainImgCont.appendChild(mainImg);

	var smImgReel		=	document.createElement('div');
	smImgReel.className	=	'img-reel-container';

	var reelWrap		=	document.createElement('span');
	reelWrap.className	=	'reel-wrap';
	for (i=1 ; i<photos.length ; i++)
	{
		var wrap	=	document.createElement('div');
		wrap.className	=	'smImg-wrap material';

		var img			=	document.createElement('img');
		img.className		=	'smImg';
		img.src			=	photos[i].url;
		img.dataset.added	=	photos[i].added;
		img.dataset.update	=	photos[i].update;
		wrap.appendChild(img);
		reelWrap.appendChild(wrap);
	}

	var btns		=	document.createElement('div');
	var editBtn		=	createButton({
		'className':	'gradient-button',
		'onclickEvent':	'editAssetPhotoDialog()',
		'text':		'Add/Edit'
	});
	var clearBtn		=	createButton({
		'className':	'tertiary-button',
		'onclickEvent':	'clearAssetPhotos()',
		'text':		'Clear All'
	});
	btns.className	=	'img-gallery-btn-wrap';
	btns.appendChild(editBtn);
	btns.appendChild(clearBtn);

	smImgReel.appendChild(reelWrap);
	imGal.appendChild(mainImgCont);
	imGal.appendChild(smImgReel);
	imGal.appendChild(btns);
	return imGal;
}

function createOverviewDataView()
{
	var info	=	document.createElement('div');
	info.className	=	'overview-info';

	var condNote		=	document.createElement('div');
	condNote.className	=	'condition-note';
	var p		=	document.createElement('p');
	var span	=	document.createElement('span');
	var label	=	document.createTextNode('Condition Note: ');
	var note	=	document.createElement('span');
	var text	=	document.createTextNode(data.condition_note);
	note.dataset.value	=	data.condition_note;
	note.setAttribute('id', 'condition_note');
	note.appendChild(text);
	span.style.fontWeight	=	'bold';
	span.appendChild(label);
	p.appendChild(span);
	p.appendChild(note);
	condNote.appendChild(p);

	var wrap	=	document.createElement('div');
	wrap.className	=	'table-wrap';

	var table1	=	document.createElement('table');
	table1.className=	'dataTable';

	var aleAssetRow	=	createAleAssetRow();
	var locationRow	=	createDataFormRow({
		'fieldLabel':	'Location',
		'curVal':	data.wh_location,
		'dataName':	'wh_location'
	});
	table1.appendChild(aleAssetRow);
	table1.appendChild(locationRow);

	var table2	=	document.createElement('table');
	table2.className=	'dataTable';
	var rows	=	[
		createDataFormRow({
			'fieldLabel':	'Track',
			'curVal':	data.track,
			'dataName':	'track',
			'inputType':	'select',
			'options':	listOptions.tracks
		}),
		createDataFormRow({
			'fieldLabel':	'Batch',
			'curVal':	data.batch_name,
			'dataName':	'batch_name',
			'inputType':	'select',
			'options':	listOptions.batch

		}),
		createDataFormRow({
			'fieldLabel':	'Received',
			'curVal':	data.date_received,
			'dataName':	'date_received'
	
		}),
		createDataTableRow({
			'fieldLabel':	'Added',
			'curVal':	data.date_added,
			'dataName':	'date_added',
		}),
		createDataTableRow({
			'fieldLabel':	'Completed',
			'curVal':	data.date_completed,
			'dataName':	'date_completed'
		}),
		createDataTableRow({
			'fieldLabel':	'Last Update',
			'curVal':	data.last_update,
			'dataName':	'last_update'
		}),
		createDataTableRow({
			'fieldLabel':	'Modified By',
			'curVal':	listOptions.users[data.modified_by],
			'dataName':	'modified_by'
		})
	];
	Object.keys(rows).forEach(function(i){
		table2.appendChild(rows[i]);
	});
	wrap.appendChild(table1);
	wrap.appendChild(table2);
	info.appendChild(condNote);
	info.appendChild(wrap);
	return info;
}

function createStatusSection()
{
	var section	=	document.createElement('div');
	var h2		=	document.createElement('h2');
	var h2Txt	=	document.createTextNode('Item Status');
	var tableWrap	=	document.createElement('div');
	var table	=	document.createElement('table');
	var tableHeads	=	createTableHeadRow(['Status','Description','']);
	var btnWrap	=	document.createElement('div');
	var addBtn	=	createButton({
		'className':		'gradient-button',
		'onclickEvent':		'addStatusDialog()',
		'text':			'Add'
	});
	var clearBtn	=	createButton({
		'className':		'tertiary-button',
		'onclickEvent':		'clearAssetStatuses()',
		'text':			'Clear All'
	});

	section.className	=	'asset-section basic-sect';
	tableWrap.className	=	'table-wrap status-table material';
	table.className		=	'dataTable';
	btnWrap.className	=	'status-btn-wrap';
	
	h2.appendChild(h2Txt);

	table.appendChild(tableHeads);
	Object.keys(item_status).forEach(function(i){
		var row	=	createStatusTableRow([
			item_status[i].statusName,
			item_status[i].description,
			createButton({
				'className':	'status-rm warning-button',
				'onClickEvent':	'removeStatus()',
				'text':		'Remove'
			})
		]);
		table.appendChild(row);
	});

	tableWrap.appendChild(table);
	btnWrap.appendChild(addBtn);
	btnWrap.appendChild(clearBtn);
	section.appendChild(h2);
	section.appendChild(tableWrap);
	section.appendChild(btnWrap);
	return section;
}

function createBasicInfoSection()
{
	var section	=	document.createElement('div');
	var h2		=	document.createElement('h2');
	var h2Txt	=	document.createTextNode('Basic Info');
	var topTable	=	document.createElement('table');
	var btmTable	=	document.createElement('table');

	h2.appendChild(h2Txt);
	topTable.className	=	'dataTable';
	btmTable.className	=	'dataTable';
	section.className	=	'item-detail-wrap asset-section';

	var rows	=	[
		createDataFormRow({
			'fieldLabel':	'Mnfr.',
			'curVal':	data.mnfr,
			'dataName':	'mnfr',
			'inputType':	'select',
			'options':	listOptions.mnfrs,
			'onchangeEvent':'updateModelList(this.value); updateBrandList(this.value)'
		}),
		createDataFormRow({
			'fieldLabel':	'Brand',
			'curVal':	data.brand,
			'dataName':	'brand',
			'inputType':	'select',
			'options':	listOptions.brands
		}),
		createDataFormRow({
			'fieldLabel':	'Model',
			'curVal':	data.modelID,
			'dataName':	'model',
			'inputType':	'select',
			'options':	listOptions.models,
			'onchangeEvent':'updateFunctionDesc(this.value)'
		}),
		createDataFormRow({
			'fieldLabel':	'Function',
			'curVal':	data.function_desc,
			'dataName':	'function_desc'
		}),
		createDataFormRow({
			'fieldLabel':	'Title Extn.',
			'curVal':	data.title_extn,
			'dataName':	'title_extn'
		})
	];
	Object.keys(rows).forEach(function(i){
		topTable.appendChild(rows[i]);
	});

	var rows	=	[
		createDataFormRow({
			'fieldLabel':	'Serial No.',
			'curVal':	data.serial_num,
			'dataName':	'serial_num'
		}),
		createDataFormRow({
			'fieldLabel':	'Model No.',
			'curVal':	data.addtl_model,
			'dataName':	'addtl_model',
		}),
		createDataFormRow({
			'fieldLabel':	'Mnfr. Part No.',
			'curVal':	data.mpn,
			'dataName':	'mpn',
		}),
		createDataFormRow({
			'fieldLabel':	'Year of Mnfr.',
			'curVal':	data.yom,
			'dataName':	'yom',
		}),
		createDataFormRow({
			'fieldLabel':	'Weight',
			'curVal':	data.weight,
			'dataName':	'weight',
		})
	];
	Object.keys(rows).forEach(function(i){
		btmTable.appendChild(rows[i]);
	});

	section.appendChild(h2);
	section.appendChild(topTable);
	section.appendChild(btmTable);
	return section;
}

function createAccountingSection()
{
	var section	=	document.createElement('div');
	var h2		=	document.createElement('h2');
	var h2Txt	=	document.createTextNode('Accounting Data');
	var table	=	document.createElement('table');

	section.className	=	'item-detail-wrap asset-section';
	table.className		=	'dataTable';
	h2.appendChild(h2Txt);

	var rows	=	[
		createDataFormRow({
			'fieldLabel':	'Price',
			'curVal':	data.price,
			'dataName':	'price'
		}),
		createDataFormRow({
			'fieldLabel':	'Cost',
			'curVal':	data.cost,
			'dataName':	'cost'
		}),
		createDataFormRow({
			'fieldLabel':	'Qty.',
			'curVal':	data.quantity,
			'dataName':	'quantity'
		}),
		createDataFormRow({
			'fieldLabel':	'Vendor',
			'curVal':	data.vendor,
			'dataName':	'vendor',
			'inputType':	'select',
			'options':	listOptions.vendors
		})
	];
	Object.keys(rows).forEach(function(i){
		table.appendChild(rows[i]);
	});

	section.appendChild(h2);
	section.appendChild(table);
	return section;
}

function createListingSection()
{
	var section	=	document.createElement('div');
	var h2		=	document.createElement('h2');
	var h2Txt	=	document.createTextNode('Listing Data');
	var table	=	document.createElement('table');

	section.className	=	'item-detail-wrap asset-section';
	table.className		=	'dataTable';
	h2.appendChild(h2Txt);

	var rows	=	[
		createDataFormRow({
			'fieldLabel':	'Condition',
			'curVal':	data.item_condition,
			'dataName':	'item_condition',
			'inputType':	'select',
			'options':	listOptions.item_condition
		}),
		createDataFormRow({
			'fieldLabel':	'Cosmetic',
			'curVal':	data.cosmetic,
			'dataName':	'cosmetic',
			'inputType':	'select',
			'options':	listOptions.cosmetic
		}),
		createDataFormRow({
			'fieldLabel':	'Testing',
			'curVal':	data.testing,
			'dataName':	'testing',
			'inputType':	'select',
			'options':	listOptions.testing
		}),
		createDataFormRow({
			'fieldLabel':	'Components',
			'curVal':	data.components,
			'dataName':	'components',
			'inputType':	'textarea'
		}),
		createDataFormRow({
			'fieldLabel':	'Shipping Class',
			'curVal':	data.shipping_class,
			'dataName':	'shipping_class',
			'inputType':	'select',
			'options':	listOptions.shipping_class
		}),
		createDataFormRow({
			'fieldLabel':	'Description',
			'curVal':	data.m_desc,
			'dataName':	'm_desc',
			'inputType':	'textarea'
		})
	];
	Object.keys(rows).forEach(function(i){
		table.appendChild(rows[i]);
	});
	section.appendChild(h2);
	section.appendChild(table);
	return section;
}

function createCategoriesSection()
{
	var section	=	document.createElement('div');
	var h2		=	document.createElement('h2');
	var h2Txt	=	document.createTextNode('ALE Store Categories');
	var tableWrap	=	document.createElement('div');
	var table	=	document.createElement('table');
	var tableHeads	=	createTableHeadRow(['Category','Subcategory','']);
	var btnWrap	=	document.createElement('div');
	var addBtn	=	createButton({
		'className':		'gradient-button',
		'onclickEvent':		'addCategoryDialog()',
		'text':			'Add'
	});
	var clearBtn	=	createButton({
		'className':		'tertiary-button',
		'onclickEvent':		'clearAssetCategories()',
		'text':			'Clear All'
	});

	section.className	=	'asset-section basic-sect';
	tableWrap.className	=	'table-wrap status-table material';
	table.className		=	'dataTable';
	btnWrap.className	=	'status-btn-wrap';
	
	h2.appendChild(h2Txt);

	table.appendChild(tableHeads);
	Object.keys(categories).forEach(function(i){
		var row	=	createStatusTableRow([
			categories[i].category,
			categories[i].subcategory,
			createButton({
				'className':	'status-rm warning-button',
				'onClickEvent':	'removeCategory()',
				'text':		'Remove'
			})
		]);
		table.appendChild(row);
	});

	tableWrap.appendChild(table);
	btnWrap.appendChild(addBtn);
	btnWrap.appendChild(clearBtn);
	section.appendChild(h2);
	section.appendChild(tableWrap);
	section.appendChild(btnWrap);
	return section;
}

function createNovartisSection()
{
	var section	=	document.createElement('div');
	var h2		=	document.createElement('h2');
	var h2Txt	=	document.createTextNode('Novartis Data');
	var table	=	document.createElement('table');

	section.className	=	'asset-section novartis-section';
	table.className		=	'dataTable';
	table.dataset.empCatId	=	data.emp_cat_id;
	h2.appendChild(h2Txt);

	var emp_categories	=	new Object();
	Object.keys(listOptions.emp_category).forEach(function(i){
		var exists	=	false;
		Object.keys(emp_categories).forEach(function(j){
			if (emp_categories[j] == listOptions.emp_category[i].category) {
				exists = true;
			}
		});
		if (exists === false) {
			emp_categories[i]	=	listOptions.emp_category[i].category
		}
	});

	var rows	=	[
		createDataFormRow({
			'fieldLabel':	'EMP Status',
			'curVal':	data.emp_status,
			'dataName':	'emp_status',
			'inputType':	'select',
			'options':	listOptions.emp_status
		}),
		createDataFormRow({
			'fieldLabel':	'EMP Category',
			'curVal':	data.emp_category,
			'dataName':	'emp_category',
			'inputType':	'select',
			'options':	emp_categories,
			'onblurEvent':	'getEmpSubcategories()'
		}),
		createDataFormRow({
			'fieldLabel':	'EMP Subcategory',
			'curVal':	data.emp_category,
			'dataName':	'emp_subcategory',
			'inputType':	'select',
			'options':	listOptions.emp_category
		}),
		createDataFormRow({
			'fieldLabel':	'Prev. Owner',
			'curVal':	data.prev_owner,
			'dataName':	'prev_owner',
			'inputType':	'select',
			'options':	listOptions.prev_owner
		}),
		createDataFormRow({
			'fieldLabel':	'NBV',
			'curVal':	data.nbv,
			'dataName':	'nbv',
		}),
		createDataFormRow({
			'fieldLabel':	'NIBR',
			'curVal':	data.nibr,
			'dataName':	'nibr',
		}),
		createDataFormRow({
			'fieldLabel':	'TM0',
			'curVal':	data.tm0,
			'dataName':	'tm0',
		}),
		createDataFormRow({
			'fieldLabel':	'SAP',
			'curVal':	data.sap,
			'dataName':	'sap',
		}),
		createDataFormRow({
			'fieldLabel':	'Src. Building',
			'curVal':	data.src_building,
			'dataName':	'src_building',
		}),
		createDataFormRow({
			'fieldLabel':	'Src. Floor',
			'curVal':	data.src_floor,
			'dataName':	'src_floor',
		}),
		createDataFormRow({
			'fieldLabel':	'Src. Room',
			'curVal':	data.src_room,
			'dataName':	'src_room',
		})
	];
	Object.keys(rows).forEach(function(i){
		table.appendChild(rows[i]);
	});

	section.append(h2);
	section.append(table);
	return section;
}

function editAssetPhotoDialog()
{
	var body	=	document.getElementById('ale-body');
	var box		=	document.createElement('div');
	var h2		=	document.createElement('h2');
	var h2Txt	=	document.createTextNode('Add/Edit Photos');
	var inputWrap	=	document.createElement('div');
	var input	=	document.createElement('input');
	var tableWrap	=	document.createElement('div');
	var imgTable	=	document.createElement('table');
	var btnWrap	=	document.createElement('div');
	var update	=	createButton({
		"className":	"gradient-button",
		"onclickEvent":	"updatePhotos()",
		"text":		"Update"
	});

	box.className		=	'photo-editor material';
	box.setAttribute('id', 'photo-editor');

	inputWrap.className	=	'file-drop-wrap';

	input.className		=	'file-drop';
	input.setAttribute('id', 'file-drop');
	input.setAttribute('onchange', 'imgPreprocess()');
	input.setAttribute('type', 'file');
	input.multiple		=	true;

	tableWrap.className	=	'img-list-wrap material';

	imgTable.className	=	'img-list';
	imgTable.setAttribute('id', 'img-list');

	btnWrap.className	=	'img-edit-btns';

	h2.appendChild(h2Txt);

	Object.keys(photos).forEach(function(i){
		if (photos[i].url != 'img/interface/image_needed.png') {
			var row	=	createImageDetailRow(photos, i);
			imgTable.appendChild(row);
		}
	});

	btnWrap.appendChild(update);

	inputWrap.appendChild(input);
	tableWrap.appendChild(imgTable);
	addCloseButton(box, 'photo-editor');
	box.appendChild(h2);
	box.appendChild(inputWrap);
	box.appendChild(tableWrap);
	box.appendChild(btnWrap);
	body.appendChild(box);
}

function createImageDetailRow(photos, i)
{
	var tr		=	document.createElement('tr');
	var picTd	=	document.createElement('td');
	var infoTd	=	document.createElement('td');
	var actTd	=	document.createElement('td');
	var img		=	document.createElement('img');
	var select	=	document.createElement('select');
	var subTable	=	document.createElement('table');
	var rowId	=	i;
	var rmBtn	=	createButton({
		"className":	"status-rm warning-button",
		"onclickEvent":	"removePhoto('img"+i+"')",
		"text":		"Remove"
	});


	tr.className		=	'img-row';
	tr.setAttribute('id', 'img'+rowId);
	subTable.className	=	'info-table';
	img.className		=	'material';
	img.src			=	photos[i].url;
	select.setAttribute('onchange', "changeOrder('"+tr.id+"', this.value)");

	while (document.getElementById('img' + rowId) != null) {
		rowId++;
	}

	tr.setAttribute('id', 'img'+rowId);
	tr.dataset.url	=	photos[i].url;
	tr.dataset.rowid=	photos[i].id;
	tr.dataset.order=	photos[i].order;
	
	var options	=	[
		'Select Image Order',1,2,3,4,5,6
	];
	
	var count	=	0;

	Object.keys(options).forEach(function(j) {
		var opt		=	document.createElement('option');
		var txt		=	document.createTextNode(options[j]);
		opt.value	=	options[j];
		if (j == 0) {
			opt.id		=	'default-opt';
			opt.selected	=	true;
			opt.disabled	=	true;
			opt.value	=	null;
		}
		if (j == photos[i].order) {
			opt.selected	=	true;
			count++;
		}
		opt.appendChild(txt);
		select.appendChild(opt);
	});

	subTable.appendChild(createStatusTableRow([
		'Order',
		select
	]));
	subTable.appendChild(createStatusTableRow([
		'Date Added',
		photos[i].added
	]));
	subTable.appendChild(createStatusTableRow([
		'Date Updated',
		photos[i].update
	]));

	picTd.appendChild(img);
	infoTd.appendChild(subTable);
	actTd.appendChild(rmBtn);

	tr.appendChild(picTd);
	tr.appendChild(infoTd);
	tr.appendChild(actTd);

	return tr;
}

function imgPreprocess()
{
	showLoadTimer('The server is processing your images. This may take a few moments.');
	var aleAsset	=	document.getElementById('ale-asset-num').dataset.asset;
	var inputElement=	document.getElementById('file-drop');
	var imgTable	=	document.getElementById('img-list');
	var fileList	=	inputElement.files;
	var phot	=	new Object;
	phot.count	=	0;

	for (i=0 ; i<6 ; i++)
	{
		var row	=	document.getElementById('img'+i);
		if (row) phot.count++;
	}

// 	Validate
	if (fileList.length > 6 - phot.count) {
		hideLoadTimer();
		buildAlert('User Error', 'You\'ve added too many photos. Maximum 6 per item.');
		inputElement.value	=	'';
	} else {
		var formData	=	new FormData();
		for (i=0 ; i<fileList.length ; i++)
		{
			var file	=	fileList[i];
			if (!file.type.match('image.*')) continue;
			formData.append('image[]', file, file.name);
		}
		formData.append('asset', aleAsset);
		formData.append('reqIsAjax', 'true');

		req	=	new XMLHttpRequest();
		req.onreadystatechange	=	alertContents;
		req.open('POST', 'ajax_handler.php?controller=admin&action=imagePreprocess', true);
		req.send(formData);

		function alertContents()
		{
			if (req.readyState === XMLHttpRequest.DONE)
			{
				if (req.status === 200)
				{
					hideLoadTimer();
					var data	=	JSON.parse(req.responseText);
					var imgTable	=	document.getElementById('img-list');
					var phot	=	data[1];
					if (data[0] === 1) {
						Object.keys(phot).forEach(function(j){
							var row	=	createImageDetailRow(phot, j);
							imgTable.appendChild(row);
						});
					}
				} else {
					hideLoadTimer();
					buildAlert('Connection Error', 'An error occurred while trying to process your image(s). Please try again');
				}
			}
		}
	}
	
}

function updatePhotos()
{
	var imgs	=	[];
	var obj		=	new Object;
	obj.aleAsset	=	document.getElementById('ale-asset-num').dataset.asset;

//	Get Photo Data
	for (j=0 ; j<7 ; j++)
	{
		var row	=	document.getElementById('img' + j);
		if (row) {
			var img	=	{
				"url":	row.dataset.url,
				"id":	row.dataset.rowid,
				"order":row.dataset.order
			};
			imgs.push(img);
		} else {
			// Do something if there's no row? Photo never existed or was removed.
		}
	}

//	Validate Data
	var fail	=	false;
	Object.keys(imgs).forEach(function(i) {
		if (imgs[i].order == '') {
			fail	=	true;
		}
	});

	if (fail === false) {
		obj.imgs	=	imgs;
		var url		=	'ajax_handler.php?controller=admin&action=updateItemPhotos';
		var json	=	encodeURIComponent(JSON.stringify(obj));
		showLoadTimer();
		makeRequest(url, json, updatePhotoResponse);
	} else {
		buildAlert(
			'Photo Update Fail',
			'Please ensure each photo has been assigned a valid order.'
		);
	}
}

function updatePhotoResponse(res)
{
	updateAssetView();
	closeDialog('photo-editor');
}

function changeOrder(rowID, newVal)
{
	var row			=	document.getElementById(rowID);
	row.dataset.order	=	newVal;
}

function removePhoto(id)
{
	var table	=	document.getElementById('img-list');
	var row		=	document.getElementById(id);
	table.removeChild(row);
}

function createTableHeadRow(labels)
{
	var row		=	document.createElement('tr');
	Object.keys(labels).forEach(function(i){
		var th	=	document.createElement('th');
		var txt	=	document.createTextNode(labels[i]);
		th.appendChild(txt);
		row.appendChild(th);
	});
	return row;
}

function createStatusTableRow(contents)
{
	var row		=	document.createElement('tr');
	Object.keys(contents).forEach(function(i){
		var td	=	document.createElement('td');
		switch (typeof contents[i])
		{
			case 'string':
			case 'number':
				var txt	=	document.createTextNode(contents[i]);
				td.appendChild(txt);
				break;
			case 'object':
				td.appendChild(contents[i]);
				break;
		}
		row.appendChild(td);
	});
	return row;
}

/*
 * createDataFormRow() requires a specs object as an argument:
 * 
 * specs	=	{
 *	'fieldLabel':		'The label for the field',
 *	'curVal':		'The item's current value for the field',
 *	'dataName':		'The name of the property',
 *	'inputType':		'The type of input field (defaults to 'text'),
 *	'options':		'For select type: provides the list of options',
 *	'addOptBtnEvent':	'The action to perform when the user clicks the 'Add Option' button, if applicable'
 * };
 *
 */
function createDataFormRow(specs)
{
	specs.inputType	=	specs.inputType || 'text';
	specs.options	=	specs.options	|| 0;

	var row		=	document.createElement('tr');
	var td1		=	document.createElement('td');
	var td2		=	document.createElement('td');
	var label	=	document.createTextNode(specs.fieldLabel);
	td1.appendChild(label);

	switch (specs.inputType)
	{
		case 'text':
			var input		=	document.createElement('input');
			input.type		=	'text';
			input.dataset.name	=	specs.fieldLabel;
			input.value		=	specs.curVal;
			input.setAttribute('id', specs.dataName);
			input.setAttribute('onblur', 'checkInput(this.value, \''+specs.dataName+'\')');
			td2.appendChild(input);
			break;
		case 'select':
			var select		=	document.createElement('select');
			select.dataset.name	=	specs.fieldLabel;
			select.setAttribute('onblur', 'checkInput(this.value, \''+specs.dataName+'\')');
			if (specs.hasOwnProperty('onblurEvent')) {
				select.setAttribute('onblur', specs.onblurEvent);
			}
			if (specs.hasOwnProperty('onchangeEvent')) {
				select.setAttribute('onchange', specs.onchangeEvent);
			}
			select.setAttribute('id', specs.dataName);
//			For creating 'N/A' option for fields that allow NULL values
			switch (specs.dataName)
			{
				case 'brand':
				case 'batch_name':
					var option	=	document.createElement('option');
					var txt		=	document.createTextNode('N/A');
					option.appendChild(txt);
					option.value	=	'';
					if (specs.curVal == '') option.selected = true;
					select.appendChild(option);
					break;
			}
			Object.keys(specs.options).forEach(function(i){
				var option	=	document.createElement('option');
				var txt		=	document.createTextNode(specs.options[i]);
				option.value	=	i;
				if (specs.options[i] == specs.curVal) {
					option.selected	= true;
				} else {
					if (i == Number(specs.curVal) && specs.dataName == 'model') {
						option.selected = true;
					}
				}
				option.appendChild(txt);
				select.appendChild(option);
			});
//			For determining whether to add an 'Add New Option' button to the select field
			switch (specs.dataName)
			{
				case 'batch_name':
				case 'brand':
				case 'model':
				case 'mnfr':
				case 'prev_owner':
					select.className	=	'select-add-opt';
					var btn			=	createButton({
						'className':	'add-opt-btn gradient-button',
						'onclickEvent':	specs.addOptBtnEvent,
						'img':		{
							'className':	'',
							'src':		'img/interface/add-g8a.png'
						}
					});
					td2.appendChild(select);
					td2.appendChild(btn);
					break;
				default:
					td2.appendChild(select);
			}
			break;
		case 'textarea':
			var textarea	=	document.createElement('textarea');
			var txt		=	document.createTextNode(specs.curVal);
			textarea.appendChild(txt);
			textarea.setAttribute('id', specs.dataName);
			textarea.setAttribute('rows', '10');
			textarea.setAttribute('onblur', 'checkInput(this.value, \''+specs.dataName+'\')');
			textarea.dataset.name	=	specs.fieldLabel;
			td2.appendChild(textarea);
			break;
	}
	row.appendChild(td1);
	row.appendChild(td2);
	return row;
}

/*
 * See arg specs for createDataFormRow()
 * Only requires 'fieldLabel', 'dataName', and 'curVal'
 */
function createDataTableRow(specs)
{
	var row		=	document.createElement('tr');
	var td1		=	document.createElement('td');
	var td2		=	document.createElement('td');
	var label	=	document.createTextNode(specs.fieldLabel);
	var content	=	document.createTextNode(specs.curVal);
	td2.setAttribute('id', specs.dataName);
	td1.appendChild(label);
	td2.appendChild(content);
	row.appendChild(td1);
	row.appendChild(td2);
	return row;
}

function createAleAssetRow()
{
	var row		=	document.createElement('tr');
	var td1		=	document.createElement('td');
	var td2		=	document.createElement('td');
	var txt1	=	document.createTextNode('ALE Asset');
	var txt2	=	document.createTextNode(data.prefix);
	var span	=	document.createElement('span');
	var txt3	=	document.createTextNode(data.aleAsset);
	span.dataset.asset	=	data.aleAsset;
	span.setAttribute('id', 'ale-asset-num');
	span.appendChild(txt3);
	td2.appendChild(txt2);
	td2.appendChild(span);
	td1.appendChild(txt1);
	row.appendChild(td1);
	row.appendChild(td2);
	return row;
}

function createButton(specs)
{
	var btn		=	document.createElement('span');
	btn.className	=	specs.className;
	if (specs.onclickEvent !== null) {
		btn.setAttribute('onclick', specs.onclickEvent);
	}
	if (specs.hasOwnProperty('text')) {
		var txt		=	document.createTextNode(specs.text);
		btn.appendChild(txt);
	}
	if ((specs.hasOwnProperty('img')) && !specs.hasOwnProperty('text'))
	{
		var img		=	document.createElement('img');
		img.className	=	specs.img.className;
		img.src		=	specs.img.src;
		btn.appendChild(img);
	}
	return btn;
}

function updateModelList(newVal)
{
	data.mnfrID	=	newVal;
	filterModelsByMnfr();
}

function updateBrandList(newVal)
{
	data.mnfrID	=	newVal;
	filterBrandsByMnfr();
}

function filterModelsByMnfr()
{
	var select	=	document.getElementById('model');
	var models	=	[];
	var defOp	=	document.createElement('option');
	var defOpTxt	=	document.createTextNode('Select a Model or Add a New Record');

	defOp.selected	=	true;
	defOp.disabled	=	true;
	defOp.value	=	'';
	defOp.appendChild(defOpTxt);

	Object.keys(listOptions.model_mnfr).forEach(function(i){
		if (listOptions.model_mnfr[i].mnfr == data.mnfrID) {
			models.push(listOptions.model_mnfr[i].model);
		}
	});

	while (select.hasChildNodes()) {
		select.removeChild(select.lastChild);
	}

	select.appendChild(defOp);
	Object.keys(models).forEach(function(i){
		var id		=	models[i];
		var option	=	document.createElement('option');
		var txt		=	document.createTextNode(listOptions.models[id]);
		option.appendChild(txt);
		option.value	=	id;
		if (id == data.modelID) {
			option.selected = true;
		}
		select.appendChild(option);
	});
}

function filterBrandsByMnfr()
{
	var select	=	document.getElementById('brand');
	var brands	=	[];
	var defOp	=	document.createElement('option');
	var defOpTxt	=	document.createTextNode('Select a Brand or Add a New Record');

	defOp.selected	=	true;
	defOp.disabled	=	true;
	defOp.value	=	'';
	defOp.appendChild(defOpTxt);

	Object.keys(listOptions.mnfr_brand).forEach(function(i){
		if (listOptions.mnfr_brand[i].mnfr == data.mnfrID) {
			brands.push(listOptions.mnfr_brand[i].brand);
		}
	});
	
	while (select.hasChildNodes()) {
		select.removeChild(select.lastChild);
	}

	select.appendChild(defOp);
	Object.keys(brands).forEach(function(i){
		var id		=	brands[i];
		var option	=	document.createElement('option');
		var txt		=	document.createTextNode(listOptions.brands[id]);
		option.appendChild(txt);
		option.value	=	id;
		if (id == data.brandID) {
			option.selected = true;
		}
		select.appendChild(option);
	});
}

function updateFunctionDesc(newVal)
{
	data.modelID	=	newVal;
	var funcDesc	=	document.getElementById('function_desc');
	funcDesc.value	=	listOptions.functions[newVal];
}

function updateAssetView()
{
	var obj		=	new Object;
	var url		=	'ajax_handler.php?controller=admin&action=getInvAssetData';
	obj.aleAsset	=	document.getElementById('ale-asset-num').dataset.asset;
	var json	=	encodeURIComponent(JSON.stringify(obj));
	makeRequest(url, json, updateAssetViewResponse);
}

function updateAssetViewResponse(res)
{
	var res		=	JSON.parse(res);
	var exists	=	document.getElementById('loader');
	if (exists != null) {
		hideLoadTimer();
	}
	data		=	res.data;
	photos		=	res.photos;
	categories	=	res.categories;
	item_status	=	res.item_status;
	displayInvAsset();
	updateList('itm');
}

function closeAssetViewIfExists(parentElem)
{
	var elemExists	=	document.getElementById('asset-view');
	if (elemExists != null) {
		parentElem.removeChild(elemExists);
	}
}

function nullToEmptyStr(obj) {
	Object.keys(obj).forEach(function(i) {
		if (obj[i] == null) obj[i] = '';
	});
	return obj;
}

function checkPhotos()
{
	if (Object.keys(photos).length === 0) {
		for (i=1 ; i<=6 ; i++) {
			var img	=	new Object;
			img.url	=	'img/interface/image_needed.png';
			photos.push(img);
		}

	}
}

function getAssetData()
{
	var data	=	{
		"aleAsset":		document.getElementById('ale-asset-num').dataset.asset,
		"condition_note":	document.getElementById('condition_note').value,
		"wh_location":		document.getElementById('wh_location').value,
		"track":		document.getElementById('track').value,
		"batch_name":		document.getElementById('batch_name').value,
		"date_received":	document.getElementById('date_received').value,
		"mnfr":			document.getElementById('mnfr').value,
		"brand":		document.getElementById('brand').value,
		"model":		document.getElementById('model').value,
		"function_desc":	document.getElementById('function_desc').value,
		"title_extn":		document.getElementById('title_extn').value,
		"serial_num":		document.getElementById('serial_num').value,
		"addtl_model":		document.getElementById('addtl_model').value,
		"mpn":			document.getElementById('mpn').value,
		"yom":			document.getElementById('yom').value,
		"weight":		document.getElementById('weight').value,
		"price":		document.getElementById('price').value,
		"cost":			document.getElementById('cost').value,
		"quantity":		document.getElementById('quantity').value,
		"vendor":		document.getElementById('vendor').value,
		"item_condition":	document.getElementById('item_condition').value,
		"cosmetic":		document.getElementById('cosmetic').value,
		"testing":		document.getElementById('testing').value,
		"components":		document.getElementById('components').value,
		"shipping_class":	document.getElementById('shipping_class').value,
		"m_desc":		document.getElementById('m_desc').value,
		"emp_status":		document.getElementById('emp_status').value,
//		"emp_cat":		document.getElementById('').value,
		"prev_owner":		document.getElementById('prev_owner').value,
		"nbv":			document.getElementById('nbv').value,
		"nibr":			document.getElementById('nibr').value,
		"tm0":			document.getElementById('tm0').value,
		"sap":			document.getElementById('sap').value,
		"src_building":		document.getElementById('src_building').value,
		"src_floor":		document.getElementById('src_floor').value,
		"src_room":		document.getElementById('src_room').value,
	};
	return data;
}

function addCategoryDialog()
{
	var body	=	document.getElementById('ale-body');
	var box		=	document.createElement('div');
	var h2		=	document.createElement('h2');
	var h2Txt	=	document.createTextNode('Add a Category');
	var table	=	document.createElement('table');
	var btns	=	document.createElement('btns');
	var accept	=	createButton({
		"className":	"gradient-button",
		"onclickEvent":	"addCategory()",
		"text":		"Accept"
	});

	h2.appendChild(h2Txt);
	h2.className	=	'section-head';
	box.className	=	'admin-dialog material';
	box.id		=	'category-dialog';
	table.className	=	'';
	btns.appendChild(accept);

	var rows	=	[
		createDataFormRow({
			'fieldLabel':	'ALE Category',
			'curVal':	'',
			'dataName':	'category',
			'inputType':	'select',
			'options':	listOptions.categories.category,
			'onblurEvent':	'getEmpSubcategories()'
		}),
		createDataFormRow({
			'fieldLabel':	'ALE Subcategory',
			'curVal':	'',
			'dataName':	'subcategory',
			'inputType':	'select',
			'options':	'',
			'onblurEvent':	'getEmpSubcategories()'
		})
	];
	Object.keys(rows).forEach(function(i){
		table.appendChild(rows[i]);
	});

	addCloseButton(box, 'category-dialog');
	box.appendChild(h2);
	box.appendChild(table);
	box.appendChild(btns);
	body.appendChild(box);
}
