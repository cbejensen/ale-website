# ale-website
ALE's Main Website

This is a restructuring of the current site. We're dropping WordPress as our CMS in favor of a custom system that we can use to integrate the site with our existing web-based inventory database. The marriage of these systems is prerequisite for the eventual addition of a webstore, where we'll be able to sell our equipment without having to pay eBay's fees. Channel Advisor could also be removed from the equation as well, since we pay them for the ability to post listings en masse on eBay.

The new web application's structure is based on the MVC architecture. It takes all (non-ajax) requests at /index.php, and routes them based on data in the URL. Ajax requests are routed in a very similar manner.


As of this writing, there are several branches in this repository. I've taken some suggestions from the Git community: new features begin life in local task branches before 'graduating' to the proposed updates branch (pu) or 'next' branch. The 'Next' branch is for features to be added to the next stable version of the app. Maint is for maintenance of the last stable version. I've been loose with this system so far, as the first stable version has yet to be completed.


The structure of the site is still evolving, but as of 2017 March 15, I've employed two main directories. 'public_html' is to be the document root where all public files are accessed. The 'resources' directory is intended for all custom and third-party libraries, the config file(s), and other resources used by the application. NOTE: I'm considering moving the majority of files outside the public webroot, since index.php and the AJAX handler are the only files called through the browser.
