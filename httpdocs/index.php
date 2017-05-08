<?php
/*
 * This is the index of the application.
 * Given a url containing valid arguments, this
 * file initializes the request. If no arguments are present,
 * the script defaults to the site's homepage.
 */

require_once '../resources/config.php';
require_once '../resources/user_init.php';

// Define the controller/action
if (isset($_GET['controller']) && isset($_GET['action']))
{
	$controller	= htmlentities($_GET['controller'], ENT_QUOTES);
	$action		= htmlentities($_GET['action'], ENT_QUOTES);
}
else
{
	$controller	= 'public';
	$action		= 'home';
}


// Set the page title
if (isset($_GET['title']))
{
	$title = htmlentities($_GET['title'], ENT_QUOTES);
}
elseif (isset($_GET['action']) && $_GET['action'] == 'listing')
{
	$id		=	htmlentities($_GET['id'], ENT_QUOTES);
	$title	=	getGenListingTitle($id);
	if (empty($title)) {
		// send warning to log
		$title = 'Bum';
	}
}
else $title = 'Home';


// Define the site section
if (isset($_GET['section']))
{
	$section = htmlentities($_GET['section'], ENT_QUOTES);
}
else
{
	// Determine if admin
	switch ($controller)
	{
		case 'admin_pages':
		case 'admin_lists':
		case 'admin_inventory':
		case 'admin_qb':
			$section = 'al_db';
			break;
		default:
			$section = 'home';
			break;
	}
}


// Assign Meta Description
if ($_GET['action'] == 'listing')
{
	$meta 	=	$title . ' for sale by Atlantic Lab Equipment.';
}
elseif (isset($_GET['subsection']))
{
	switch ($_GET['subsection'])
	{
		case 'tecan':
			$meta	=	'Tecan Liquid Handlers: Atlantic Lab Equipment specializes in providing Premium Automation Solutions for the Tecan platform.';
			break;
		case 'other_lh':
			$meta	=	'Atlantic Lab Equipment carries a variety of Liquid Handling platforms, including those by Beckman-Coulter, Hamilton, Agilent, and Eppendorf.';
			break;
		case 'analytical':
			$meta	=	'ALE carries an array of Mass Spectrometers, HPLC, GC, and LC/MS Systems.';
			break;
		case 'dna_seq':
			$meta	=	'ALE has a large selection of DNA sequencers. Manufacturers include Illumina and ABI.';
			break;
		case 'readers':
			$meta	=	'ALE carries a selection of automation-ready plate readers for integration with your liquid handling platform.';
			break;
		case 'washers':
			$meta	=	'ALE carries a selection of automation-ready plate washers for integration with your liquid handling platform.';
			break;
		case 'sealers':
			$meta	=	'ALE carries a selection of automation-ready plate sealers for integration with your liquid handling platform.';
			break;
		case 'centrifuges':
			$meta	=	'ALE carries a selection of automation-ready centrifuges for integration with your liquid handling platform.';
			break;
	}
}
elseif (isset($_GET['page']))
{
	switch ($_GET['page'])
	{
		case 'premium_equipment':
			$meta	=	'A Selection of ALE\'s Premium Equipment. This instrumentation is automation-enabled and ready to be integrated with your lab\'s liquid handing platform.';
		case 'new_arrivals':
			$meta	=	'Our newest collection of equipment. We\'re always bringing in new instruments to help labs with automation.';
	}
} else {
	switch ($section)
	{
		case 'contact':
			$meta	=	'We want to hear from you! Ask us a question, make a service request, or leave us a comment!';
			break;
		case 'estimates':
			$meta	=	'Need an Instrument? Request a Quote on Equipment today!';
			break;
		case 'store':
			$meta	=	'ALE\'s Equipment catalog. Browse through our selection of Tecan Liquid Handlers, automation equipment, analytical systems, and DNA Sequencers.';
			break;
		case 'services':
			$meta	=	'ALE provides Premium Automation Solutions - A service for laboratories to improve their throughput, efficiency, and reproducibility.';
			break;
		case 'home':
			$meta	=	'Atlantic Lab Equipment: Specializing in Laboratory Automation and providing Premium Automation Solutions.';
			break;
		default:
			$meta = 'ALE: Atlantic Lab Equipment. Premium Automation Solutions.';
			break;
	}
}

// Call appropriate layout
if ($section != 'al_db')
{
	require_once PUBLIC_PATH . '/public_model.php';
	require_once TEMPLATE_PATH . '/layout.php';
}
else
{
	require_once TEMPLATE_PATH . '/layout_aldb.php';
}

