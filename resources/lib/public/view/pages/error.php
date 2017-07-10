<main class="error-main">
	<?php if (isset($error)) { ?>
	<h1 class="section-head">Oops, something went wrong.</h1>
	<h2><?php echo $error['title']; ?></h2>
	<?php } else { ?>
	<h1>404: Page Not Found</h1>
	<?php } 
	if (isset($error['message'])) {
	?>
	<p class="error-msg pageContent"><?php echo $error['message']; ?></p>
	<?php } else { ?>
	<p class="error-msg pageContent">The page you were looking for was moved, removed, renamed, or might never have existed.</p>
	<?php } ?>
</main>
