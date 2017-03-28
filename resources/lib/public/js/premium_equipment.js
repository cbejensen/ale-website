/*
 * This file facilitates the browsing of the content of the Premium
 * Equipment page. When a category from the 4x2 grid is clicked,
 * this file retreives the content data and alters the broswer URL.
 * 
 * It can also handle back/forward navigation between the categories.
 * 
 */

var container = document.querySelector('.equipment-array');

container.addEventListener('click', function(e) 
{
	if (e.target != e.currentTarget)
	{
		e.preventDefault();
		// e.target is the image inside the link we just clicked.
		
		var data = e.target.getAttribute('data-name'),
		url = 'index.php?controller=public&action=products_services&page=premium_equipment&title=Premium%20Equipemnt&section=products&subsection=' + data;
		history.pushState(data, null, url);
		  
		// here we can fix the current classes for the images, to make it obvious which category was selected.
		// We can also update text with the data variable
		// and make an Ajax request for the #content element
		// finally we can manually update the document’s title
		
		requestContent(data);
	}
	
	
	
	e.stopPropagation();
}, false);


window.addEventListener('popstate', function(e) {
	var category	=	e.state;
	var content		=	document.getElementById('content');
	//alert(category);
	if (category == null) {
		//removeCurrentClass();
		//textWrapper.innerHTML	=	" ";
		content.innerHTML		=	" ";
		document.title			=	'Premium Equipemnt | ALE: Premium Lab Equipment & Automation';//defaultTitle;
	} else {
		//updateText(category);
		requestContent(category)
		//addCurrentClass(category);
		//document.title = "Equipment | " + category
	}
});


function requestContent(data)
{
	(function()
	{
		var req;
		makeRequest('ajax_handler.php?controller=public&action=products_services&subsection=' + data);

		function makeRequest(url)
		{
			req = new XMLHttpRequest();

				if (!req)
				{
					alert('Sorry! We couldn\'t connect you to the server right now, please try submitting the form again.');
					return false;
				}
				req.onreadystatechange = alertContents;
				req.open('POST', url);
				req.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
				req.send('reqIsAjax=1');
				console.log("Request sent.")
		}

		function alertContents()
		{
			if (req.readyState === XMLHttpRequest.DONE)
			{
				if (req.status === 200)
				{
					//alert(req.responseText);
					// If success, alert the user.
					var content	=	document.getElementById('content');
					content.innerHTML = req.responseText;
					content.scrollIntoView(false);
					
				}
				else
				{
				alert('We\'re sorry! There was a problem with the request. Please try your submission again. If the problem persists, please report this bug.');
				}
			}
		}
	})();
}