<?php

class Paginator {
	
	protected 	$conn;
	public	 	$limit;
	public		$page;
	protected 	$query;
	public	 	$total;

	public function __construct($conn, $query)
	{
		$this->conn		=	$conn;
		$this->query	=	$query;
		$r				=	db_query($this->query, $this->conn);
		$this->total	=	$r->num_rows;
	}

	public function getPageData($limit = null, $page = null)
	{
		if ($limit === null) $limit = 20;
		if ($page === null) $page = 1;
		$this->limit	=	$limit;
		$this->page		=	$page;
		if ($this->limit == 'all')
		{
			$query	=	$this->query;
		} else {
			$query	=	$this->query . " LIMIT " . (($this->page - 1) * $this->limit) . ", $this->limit";
		}
		$r			=	db_query($query, $this->conn);
		$results	=	array();
		while ($row = $r->fetch_array(MYSQLI_ASSOC))
		{
			$results[]	=	$row;
		}
		$result			=	new stdClass();
		$result->page	=	$this->page;
		$result->limit	=	$this->limit;
		$result->total	=	$this->total;
		$result->data	=	$results;

		return $result;
	}

	public function createLinks($num_links, $list_class = null)
	{
		if ($list_class === null) $list_class = 'std-pg';
		if ($this->limit == 'all') {
			return '';
		}
		$last	=	ceil($this->total / $this->limit);
		$start	=	(($this->page - $num_links) > 0) ? $this->page - $num_links: 1;
		$end	=	(($this->page + $num_links) < $last) ? $this->page + $num_links: $last;
		$class	=	($this->page	== 1) ? "pg-disabled" : '';
		ob_start();
		require LIB_PATH . '/paginator/paginator_view.php';
		$html	=	ob_get_contents();
		ob_end_clean();
		return $html;
	}	
	
	public static function getSearchToolbar()
	{
		require PUBLIC_PATH . '/view/inc/search-toolbar.php';
	}
}
