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
	}
	e.stopPropagation();
}, false);

/*
window.addEventListener('popstate', function(e) {
	var category	=	e.state;
	
	if (category == null) {
		removeCurrentClass();
		textWrapper.innerHTML	=	" ";
		content.innerHTML		=	" ";
		document.title			=	defaultTitle;
	} else {
		updateText(category);
		//requestContent()
		//addCurrentClass(category);
		//document.title = "Equipment | " + category
	}
});

function requestContent*/