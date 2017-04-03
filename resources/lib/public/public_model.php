<?php
/*
 * The Public model manipulates the state of the application as it relates 
 * to the public webpages.
 */

class PublicModel
{	
	//private static $adBarIteration = 0;
	
	public function getAds($userData, $adType, $dspType)
	{
		$conn	=	db_connect(AL_DB, $userData);
			
		require	PUBLIC_PATH . '/inc/ad_query.php';
						
		$r		=	db_query($q, $conn);
		($r->num_rows < 10) ? $count = $r->num_rows : $count = 10;
		$i = 0;
		static $ad_i = 0;
		for ($j = 0 ; $j < $count ; $j++)
		{
			$r->data_seek($j);
			$ad		=	$r->fetch_array(MYSQLI_ASSOC);
			$title	=	"{$ad['mnfr']} {$ad['brand']} {$ad['model']} {$ad['function_desc']} {$ad['title_extn']}";
			$url	=	"?controller=public&action=listing&section=products&title=$title&id={$ad['id']}";
			if (!isset($ad['url'])) continue;
			switch ($dspType)
			{
				case 'banner':
					include PUBLIC_PATH . '/view/inc/ads/featured_ad.php';
					break;
				case 'list':
					include PUBLIC_PATH . '/view/inc/ads/list_item.php';
					break;
			}
			$i++;
		}
		$ad_i++;
		$conn->close();
	}
	
	public static function get_metaDesc($pageTitle)
	{	
		$conn	=	db_connect(AL_DB);
		$q		=	"SELECT description FROM meta_desc WHERE page='$pageTitle';";
	}
}