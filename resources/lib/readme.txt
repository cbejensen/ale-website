resources/lib/

This directory contains all custom and third-party libraries.

Contents:

admin		-	This library contains a number of modules related to the 
			administration of the website, inventory, etc. You'll
			find more in-depth descriptions of these modules in
			the readme within this directory.

controllers	-	This directory will be phased out soon. The current
			inventory management system keeps all controllers in
			a single directory. This will change as we
			re-implement the system to integrate it with the
			website.

public		-	This library contains all files specific to the public
			web pages and their content and layout, excluding 
			system-wide code.

qb_integration	-	This is a 3rd-Party library used to provide an interface
			between this application and the QuickBooks Web Connector,
			which Intuit provides for communication with desktop
			versions of QuickBooks.

functions.php	-	Lacking a better place, I've put this file in the lib
			root. It contains a collection of common, system-wide
			functions, such as those for connecting to the database(s),
			handling errors, processing queries, sanitizing inputs,
			etc.
