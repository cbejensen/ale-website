<main class="list-main" id="list-main">
	<div class="list-toolbar material">
		<div class="page-info" id="page-info"></div>
	<?php 
// 		foreach ($list->tools as $tool)
// 		{
// 			require ADMIN_PATH . '/list/toolbar_button.php';
// 		}
	?>
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
			var tableRows		=	<?php echo json_encode($list->rows); ?>;
			var totalResults	=	<?php echo json_encode($list->total); ?>;
			var fieldMeta		=	<?php echo json_encode($list->fieldMeta); ?>;
			renderList();
			insertListData();
		</script>
	</div>
	<div class="list-pagination">
		<?php echo $list->links; ?>
	</div>
</main>