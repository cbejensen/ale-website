/*
 * This is the main js file used by the admin module
 */
function displayInvItem(data, photos, categories)
{
	var data	=	JSON.parse(data);
	var phot	=	JSON.parse(photos);
	var cate	=	JSON.parse(categories);
	
	alert(data.aleAsset);
}