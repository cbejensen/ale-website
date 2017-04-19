<ul class="<?php echo $list_class; ?>">
	
	<li class="<?php echo $class; ?>">
		<a href="?limit=<?php echo $this->_limit; ?>&page=<?php echo ($this->_page - 1); ?>">&laquo;</a>
	</li>
	
	<?php if ($start > 1) : ?>
		<li>
			<a href="?limit=<?php echo $this->_limit; ?>&page=1">1</a>
		</li>
		<li class="page_disabled">
			<span>...</span>
		</li>
	<?php endif; ?>
	
	<?php for ($i = $start ; $i <= $end ; $i++) : ?>
		<?php $class = ($this->_page == $i) ? "active" : ''; ?>
		<li class="<?php echo $class; ?>">
			<a href="?limit=<?php echo $this->_limit; ?>&page=<?php echo $i; ?>"><?php echo $i; ?></a>
		</li>
	<?php endfor; ?>
	
	<?php if ($end < $last) : ?>
		<li class="page_disabled">
			<span>...</span>
		</li>
		<li class="<?php echo $class; ?>">
			<a href="?limit=<?php echo $this->_limit; ?>&page=<?php echo ($this->_page + 1); ?>">&raquo;</a>
		</li>
	<?php endif; ?>
</ul>