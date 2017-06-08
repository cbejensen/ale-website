<main class="list-main" id="list-main">
	<div class="list-toolbar material">
	<?php 
// 		foreach ($list->tools as $tool)
// 		{
// 			require ADMIN_PATH . '/list/toolbar_button.php';
// 		}
	?>
	</div>
	<div class="list-wrap material">
		<table class="list-table" id="list-table">
			<script>var listOptions	=	<?php echo json_encode($list->options); ?>;</script>
			<tbody>
			<?php
				$list->getHeaders();
				$list->getRows();
				
			?>
			</tbody>
		</table>
		<div class="list-pagination">
			<?php $list->createLinks(5); ?>
		</div>
	</div>
</main>