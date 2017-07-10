<main class="list-main" id="list-main">
	<div class="list-toolbar material">
		<div class="page-info" id="page-info">
		<?php 
// 			$bc	=	'';
// 			foreach ($list->breadcrumbs as $b)
// 			{
// 				$bc .=	$b . ' > ';
// 			}
// 			$bc	=	substr($bc, 0, -2);
// 			echo $bc . "<br>";
// 			echo 'Page ' . $list->page . ' of ' . $list->total . ' results.';
	// 		foreach ($list->tools as $tool)
	// 		{
	// 			require ADMIN_PATH . '/list/toolbar_button.php';
	// 		}
		?>
		</div>
		<div class="admin-search-bar" id="search-bar">
			<input type="text" placeholder="Search" id="search-input" class="">
			<span class="tertiary-button" onclick="searchList()"><span style="vertical-align: middle; line-height: 0.5rem; height: 0; cursor: default;">Go</span></span>
		</div>
		<div class="toolbar-btns" id="toolbar-btns"></div>
	</div>
	<div class="list-wrap material">
		<script>
			var listOptions	=	<?php echo json_encode($list->options); ?>;
		</script>
		<table class="list-table" id="list-table">
			<tbody id="list-table-body">
			<?php
				//$list->getHeaders();
				//$list->getRows();
				
			?>
			</tbody>
		</table>
		<script src="js/listView.js"></script>
		<script>
			var fields			=	<?php echo json_encode($list->fields); ?>;
			var tableRows		=	<?php echo json_encode($list->rows); ?>;
			var totalResults	=	<?php echo json_encode($list->total); ?>;
			var fieldMeta		=	<?php echo json_encode($list->fieldMeta); ?>;
			var crumbs			=	<?php echo json_encode($list->breadcrumbs); ?>;
			var url				=	<?php echo json_encode($list->url); ?>;
			var tools			=	<?php echo json_encode($list->tools); ?>;
			var list_type		=	<?php echo json_encode($list->ltype); ?>;
			var list_scope		=	<?php echo json_encode($list->lscope); ?>;
			var listInfo		=	<?php echo json_encode(array(
					'scope'		=>	$list->lscope,
					'type'		=>	$list->ltype,
					'sortBy'	=>	$list->srt_f,
					'sortDir'	=>	$list->sortOrder,
					'rp'		=>	$list->page
			)); ?>;
			var current_page	=	<?php echo json_encode($list->page); ?>;
			renderList();
			buildBreadcrumbs();
			renderTools();
		</script>
	</div>
	<div class="list-pagination">
		<?php echo $list->links; ?>
	</div>
</main>