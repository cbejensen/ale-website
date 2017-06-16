<?php
	(isset($_GET['ltype'])) ? $list	= $_GET['ltype'] : $list = null;  
	if ($list != null)
	{
// 		print_r($this->url);
		$url	=	'?';
		foreach ($this->url as $key => $value)
		{
			static $count	=	0;
			if ($count === 0) {
				$url	.=	"$key=$value";
				$count++;
			} else {
				$url	.=	"&$key=$value";
			}
		}
// 		echo $url;
// 		if (isset($_GET['limit'])) 
// 		{
// 			$url	.=	'&limit=' . $_GET['limit'];
// 		} else {
// 			$url	.=	'&limit=' .	$_COOKIE['serp-limit'];
// 		}
	} else {
			$url	=	'?controller=public&action=store&section=store&title=Search%20Results';
			$url	.=	(isset($_GET['category'])) ? '&category=' . htmlspecialchars($_GET['category'], ENT_QUOTES) : '';
			$url	.=	(isset($_GET['q'])) ? '&q=' . htmlspecialchars($_GET['q'], ENT_QUOTES) : '';
			$url	.=	'&limit=' . $this->limit;
			//$url	.=	'&rp=' . ($this->_page - 1);
			$url	.=	(isset($_GET['lc'])) ? '&lc=' . htmlspecialchars($_GET['lc'], ENT_QUOTES) : '';
			$url	.=	(isset($_GET['lo'])) ? '&lo=' . htmlspecialchars($_GET['lo'], ENT_QUOTES) : '';
	}
?>

<ul class="<?php echo $list_class; ?>">
	
	<li class="<?php echo $class; ?> material">
		<a href="<?php echo $url . '&rp=' . ($this->page - 1); ?>">&laquo;</a>
	</li>
	
	<?php if ($start > 1) : ?>
		<li class="material">
			<a href="<?php echo $url . '&rp=1'; ?>">1</a>
		</li>
	<?php endif; ?>
	<?php if ($start > 2) : ?>
		<li class="pg_disabled material">
			<span>...</span>
		</li>
	<?php endif; ?>
	
	<?php for ($i = $start ; $i <= $end ; $i++) : ?>
		<?php $class = ($this->page == $i) ? "pg-active" : ''; ?>
		<li class="<?php echo $class; ?> material">
			<a href="<?php echo $url . '&rp=' . $i; ?>"><?php echo $i; ?></a>
		</li>
	<?php endfor; ?>
	
	<?php if ($end < ($last-1)) : ?>
		<li class="pg_disabled material">
			<span>...</span>
		</li>
	<?php endif; ?>
	<?php if ($end < $last) : ?>
		<li class="material">
			<a href="<?php echo $url . '&rp=' . $last; ?>"><?php echo $last; ?></a>
		</li>
	<?php endif; ?>
		<?php $class = ($this->page >= $last) ? "pg-disabled" : ''; ?>
		<li class="<?php echo $class; ?> material">
			<a href="<?php echo $url . '&rp=' . ($this->page + 1); ?>">&raquo;</a>
		</li>
</ul>