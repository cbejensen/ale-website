/*
 *
 *
 */

function changeNavArrows(mode)
{
	var leftArrow	=	document.getElementById('leftArrow');
	var rightArrow	=	document.getElementById('rightArrow');
	
	switch (mode)
	{
		case 0:
		case 'shrink':
			console.log('Shrinking Nav Arrows');
			leftArrow.className		=	'left-arrow';
			rightArrow.className	=	'right-arrow';
			break;
		case 1:
		case 'enlarge':
			console.log('Enlarging Nav Arrows');
			leftArrow.className 	=	'left-arrow material';
			rightArrow.className	=	'right-arrow material';
			break;
	}
}

function moveFeaturedAds(mode)
{
	// Change each ad such that it moves down one ad-length
	var i = 0;
	while (document.getElementById('featAd_' + i))
	{
		console.log('Moving Ad #' + i);
		var ad			=	document.getElementById('featAd_' + i);
		var curPos		=	ad.style.left || '0rem';
		console.log(ad.style.left);
		console.log(curPos);
		i++;
		ad.style.left		=	curPos;
		switch (mode)
		{
			case 0:
			case 'left':
				ad.style.left	=	'calc(' + curPos + ' + 15rem)';
				break;
			case 1:
			case 'right':
				ad.style.left	=	'calc(' + curPos + ' - 15rem)';
				break;
		}
	}
}