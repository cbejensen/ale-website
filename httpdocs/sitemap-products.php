<?php 
	header('Content-type: application/xml');
	
	require_once '../resources/config.php';
	
	$q		=	"SELECT id, last_update FROM general_listings;";
	$url	=	"http://atlanticlabequipment.com/?controller=public&action=listing&section=store";
	$conn	=	db_connect(AL_DB);
	$r		=	db_query($q, $conn);
	$data	=	array(	'url' => array(), 
						'date' => array()
						);
	for ($j = 0 ; $j < $r->num_rows ; $j++)
	{
		$r->data_seek($j);
		$row	=	$r->fetch_array(MYSQLI_NUM);
		$id		=	$row[0];
		$date	=	$row[1];
		$title	=	str_replace(' ', '%20', getGenListingTitle($id));
		if (empty($title)) {
			// send warning to log
			ini_set('error_log', LOG_PATH . '/app-errors.log');
			error_log('WARNING - No Title for General Listing id#' . $id);
			$title = 'Equipment Listing';
		}
		$data['url'][]	=	$url . "&title=$title&ltype=general&id=$id";
		$data['date'][]	=	substr($date, 0, 9);
	}
	// PHP may attempt to parse <? as a short tag for <?php
	$output	=	'<?xml version="1.0" encoding="UTF-8"?>' . "\n";
	echo $output;
?>
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
<?php for ($j = 0 ; $j < $r->num_rows ; $j++) : ?>
<url>
	<loc><?php echo $data['url'][$j]; ?></loc>
	<lastmod><?php echo $data['date'][$j]; ?></lastmod>
	<changefreq>weekly</changefreq>
	<priority>0.8</priority>
</url>
<?php endfor; ?>
</urlset>
