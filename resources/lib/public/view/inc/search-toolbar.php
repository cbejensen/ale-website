<?php 
if (isset($_GET['limit']) && is_numeric($_GET['limit']))
{
	$limit	=	$_GET['limit'];
} elseif (isset($_COOKIE['serp-limit'])) {
	$limit	=	$_COOKIE['serp-limit'];
} else {
	$limit	=	20;
}

if (isset($_GET['lo']))
{
	$layout	=	htmlspecialchars($_GET['lo'], ENT_QUOTES);
} elseif (isset($_COOKIE['serp-format'])) {
	$layout	=	$_COOKIE['serp-format'];
} else {
	$layout	=	'grid';
}

$url		=	'?controller=public&action=store&section=store&title=Search&20Results';
$url		.=	(isset($_GET['category'])) ? '&category=' . htmlspecialchars($_GET['category'], ENT_QUOTES) : '';
$url		.=	(isset($_GET['q'])) ? '&q=' . htmlspecialchars($_GET['q'], ENT_QUOTES) : '';
?>

<div class="search-toolbar material">
	<!-- <div style="display: inline-block; width: 50%;" class="breadcrumbs">-->
<!-- 		<p>Home > Products > Analytical > Search</p> -->
<!-- 	</div> -->
	<div class="stb-btn-wrap">
		<div class="stb-btn rpp" id="">
			<label>Results Per Page:</label>
			<select id="rpp" oninput="location.assign('<?php echo $url; ?>&limit=' + this.value);">
				<option selected disabled value="<?php echo $limit; ?>"><?php echo $limit; ?></option>
				<option value="5">5</option>
				<option value="10">10</option>
				<option value="15">15</option>
				<option value="20">20</option>
				<option value="25">25</option>
				<option value="50">50</option>
				<option value="100">100</option>
			</select>
		</div>
		<div class="stb-btn lo">
			<label>Layout:</label>
			<select id="layout"oninput="location.assign('<?php echo $url; ?>&lo=' + this.value);">
				<option selected disabled value="<?php echo $layout; ?>"><?php echo ucfirst($layout); ?></option>
				<option value="grid">Grid</option>
				<option value="list">List</option>
			</select>
		</div>
	</div>
</div>