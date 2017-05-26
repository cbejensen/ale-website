/*
 * This is the main js file used by the admin module
 */
function displayInvItem(data, photos, categories)
{
	showLoadTimer();
	
	var data	=	JSON.parse(data);
	var phot	=	JSON.parse(photos);
	var cate	=	JSON.parse(categories);
	
	console.log('JSON parsed.');
	console.log('Building Asset View.');
	
	// Define the view's parent
	var listMain	=	document.getElementById('list-main');
	
	// Create the container
	var assetView	=	document.createElement('div');
	assetView.setAttribute('class', 'assetView');
	
	// Create the title
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