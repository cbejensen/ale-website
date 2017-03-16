/*
 *	inventory.js
 *	
 *	Methods for inventory-related tasks
 *
 */

function addManufacturerPrompt()
{
	
}

function addManufacturer()
{
	var mnfr	=	document.getElementById('mnfr').value;
	var sub_id	=	document.getElementById('subitem_of').value;
	
	(function() 
	{
		var req;
		makeRequest('ajax_handler.php?controller=inventory&action=addManufacturer', mnfr, sub_id);

		function makeRequest(url, mnfr, sub_id) 
		{
			req = new XMLHttpRequest();
		
				if (!req) 
				{
					alert('Cannot create an XMLHTTP instance');
					return false;
				}
			req.onreadystatechange = alertContents;
			req.open('POST', url);
			req.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
			
			var params = "mnfr=" + mnfr + "&subitem_of=" + sub_id + "&reqIsAjax=1";
			req.send(params);
		}
	
		function alertContents() 
		{
			if (req.readyState === XMLHttpRequest.DONE) 
			{
				if (req.status === 200)
				{
					//console.log(req.responseText);
					// Doesn't matter if request failed or succeeded, always alerts the user.
					alertUser(req.responseText);					
				}
				else
				{
					alert('There was a problem with the request.');
				}
			}
		}
	})();
}