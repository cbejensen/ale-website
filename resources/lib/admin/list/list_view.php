<main class="list-main">
	<div class="list-toolbar">
	<?php 
		foreach ($list->tools as $tool)
		{
			require ADMIN_PATH . '/list/toolbar_button.php';
		}
	?>
	</div>
	<div class="list-wrap">
		<table class="list-table">
			<tbody>
			<?php
				$list->getHeaders();
				$list->getRows();
				
			?>
			</tbody>
		</table>
		<div class="list-pagination">
			<?php $list->createLinks(); ?>
		</div>
	</div>
</main>