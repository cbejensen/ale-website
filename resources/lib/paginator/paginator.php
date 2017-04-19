<?php

class Paginator {
	
	private $_conn;
	private $_limit;
	private $_page;
	private $_query;
	private $_total;

	public function __construct($conn, $query)
	{
		$this->_conn	=	$conn;
		$this->_query	=	$query;
		$r		=	db_query($this->_query, $this->_conn);
		$this->_total	=	$r->num_rows;
	}

	public function getPageData($limit = 10, $page = 1)
	{
		$this->_limit	=	$limit;
		$this->_page	=	$page;
		if ($this->_limit == 'all')
		{
			$query	=	$this->_query;
		} else {
			$query	=	$this->_query . " LIMIT " . (($this->_page - 1) * $this->_limit) . ", $this->_limit";
		}
		$r		=	db_query($query, $this->_conn);
		$results	=	array();
		while ($row = $r->fetch_array(MYSQLI_ASSOC))
		{
			$results[]	=	$row;
		}
		$result		=	new stdClass();
		$result->page	=	$this->_page;
		$result->limit	=	$this->_limit;
		$result->total	=	$this->_total;
		$result->data	=	$results;

		return $result;
	}

	public function createLinks($num_links, $list_class)
	{
		if ($this->_limit == 'all') {
			return '';
		}
		$last	=	ceil($this->_total / $this->_limit);
		$start	=	(($this->_page - $num_links) > 0) ? $this->_page - $num_links: 1;
		$end	=	(($this->_page + $num_links) < $last) ? $this->_page + $num_links: $last;
		$class	=	($this->_page	== 1) ? "disabled" : '';
		ob_start();
		require LIB_PATH . '/paginator/paginator_view.php';
		$html	=	ob_get_contents();
		ob_end_clean();
		return $html;
	}	
}
