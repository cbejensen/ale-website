<?php 

use Cartalyst\Sentinel\Native\Facades\Sentinel;

class Exporter
{	
	protected	$conn,
				$date,
				$format,
				$labels,
				$fileName,
				$output;
	protected	$assets		=	array();
	protected	$rows		=	array();
	
	public function __construct($conn) {
		if (empty($conn) || !isset($conn)) {
			throw new Exception('No database connection provided.');
		}
		$this->conn	=	$conn;
		$this->setDate();
		$this->setFormat();
		$this->setFileName();
		$this->setHeaders();
		$this->setOutput();
		$this->setLabels();
		$this->setAssets();
		$this->setRows();
	}
	
	public function getCSV()
	{
		if (empty($this->output) || empty($this->labels) || empty($this->rows)) {
			throw new Exception('Missing Data');
		}
		fputcsv($this->output, $this->labels);
		foreach ($this->rows as $row)
		{
			fputcsv($this->output, $row);
		}
	}
	
	protected function setDate()
	{
		$this->date	=	date('Y_m_d');
	}
	
	protected function setFileName()
	{
		if (!isset($this->date)) {
			throw new Exception('No Date Given.');
		}
		if (!isset($this->format)) {
			throw new Exception('No Format Given.');
		}
		$this->fileName	=	$this->date . ' ' . $this->format;
	}
	
	protected function setHeaders()
	{
		header('Content-Type: text/csv; charset=utf-8');
		header("Content-Disposition: attachment; filename=$this->fileName.csv");
	}
	
	protected function setOutput()
	{
		$this->output	=	fopen("php://output", 'w');
	}
	
	protected function setAssets()
	{
		if (!isset($_SESSION['item_export']) || empty($_SESSION['item_export'])) {
			throw new Exception('No items to export.');
		}
		foreach ($_SESSION['item_export'] as $asset)
		{
			$this->assets[]	=	new InvItem($asset, $this->conn);
		}
		error_log(print_r($this->assets, true));
	}
}

class ChAdvExporter extends Exporter
{
	protected function setFormat() 
	{
		$this->format	=	'ChannelAdvisor';
	}
	
	protected function setLabels()
	{
		$this->labels	=	array(
				'Auction Title',
				'Inventory Number',
				'Model Name',
				'Model Number',
				'Quantity',
				'Starting Price',
				'Buy It Now Price',
				'Weight',
				'Shipping',
				'Manufacturer',
				'Brand',
				'Brand 2',
				'Condition',
				'Condition Is',
				'Supplier Code',
				'Testing Done',
				'Cosmetic',
				'Components Included',
				'Serial Number',
				'Condition Note',
				'Column Intentionally Left Blank',
				'MPN'
		);
	}

	protected function setRows()
	{
		if (empty($this->assets)) {
			throw new Exception('No items found to export.');
		}
		foreach ($this->assets as $asset)
		{
			($asset->data['brand'] != '') ? $b = $asset->data['brand'] . ' ' : $b = '';
			$outRow	= array(
					$asset->data['mnfr'] . ' ' . $b . $asset->data['model'] . ' ' . $asset->data['function_desc'] . ' ' . $asset->data['title_extn'],
					$asset->data['aleAsset'],
					$asset->data['model'],
					$asset->data['addtl_model'],
					$asset->data['quantity'],
					$asset->data['price'],
					$asset->data['price'],
					$asset->data['weight'],
					$asset->data['shipping_class'],
					$asset->data['mnfr'],
					$asset->data['brand'],
					$asset->data['brand'],
					$asset->data['item_condition'],
					$asset->data['item_condition'],
					'',
					$asset->data['testing'],
					$asset->data['cosmetic'],
					$asset->data['components'],
					$asset->data['serial_num'],
					$asset->data['condition_note'],
					'',
					$asset->data['mpn']
			);
			$this->rows[]	=	$outRow;
		}
	}
}

class AleQbExporter extends Exporter
{
	protected function setFormat()
	{
		$this->format	=	'ALE_quickbooks';
	}
	
	protected function setLabels()
	{
		$this->labels	=	array(
				'ITEM NAME',
				'SUBITEM OF',
				'COST',
				'PREFERRED VENDOR',
				'COGS ACCOUNT',
				'ASSET ACCOUNT',
				'INCOME ACCOUNT',
				'PURCHASE DESCRIPTION',
				'SALES DESCRIPTION',
				'ALE ASSET',
				'SERIAL NUMBER',
				'WH LOCATION',
				'SALES TAX CODE',
				'YOM',
				'MANUFACTURER\'S PART NUMBER'
		);
	}

	protected function setRows()
	{
		if (empty($this->assets)) {
			throw new Exception('No items found to export.');
		}
		foreach ($this->assets as $asset)
		{
			$item	=	substr($asset->data['model'] . ' ' . $asset->data['function_desc'], 0, 18);
			($asset->data['brand'] != '') ? $b = $asset->data['brand'] . ' ' : $b = '';
			try {
				$accounts	=	AleQbExporter::setAccounts($asset);
			} catch (Exception $e) {
				continue;
			}
			$outRow	= array(
					$item . ' ' . $asset->data['aleAsset'],
					$asset->data['mnfr'],
					$asset->data['cost'],
					$asset->data['vendor'],
					$accounts['cogs'],
					$accounts['asset'],
					$accounts['income'],
					$b.$asset->data['model'].' '.$asset->data['function_desc'].' '.$asset->data['title_extn'].' '.$asset->data['aleAsset'],
					$b.$asset->data['model'].' '.$asset->data['function_desc'].' '.$asset->data['title_extn'].' '.$asset->data['aleAsset'],
					$asset->data['aleAsset'],
					$asset->data['serial_num'],
					$asset->data['wh_location'],
					'Tax',
					$asset->data['yom'],
					$asset->data['mpn'],
			);
			$this->rows[]	=	$outRow;
		}
	}

	private static function setAccounts($asset)
	{
		switch ($asset->data['track'])
		{
			case 'ALOE':
			case 'Novartis/ALOE':
				$accounts	=	array(
					'cogs'	=>	'1225000.2-COGS-INVENTORY',
					'asset'	=>	'1001105.INVENTORY-ALOE',
					'income'=>	'1104005.SALES-ALOE'
				);
				break;
			case 'Novartis':
			case 'EMP':
				throw new Exception('Invalid Track');
				break;
			case 'Consignment':
				throw new Exception('This track is not currently supported.');
				break;
			case 'ALE':
				$accounts	=	array(
				'cogs'	=>	'1205000.1-COGS-INVENTORY',
				'asset'	=>	'1001100.INVENTORY-ALE',
				'income'=>	'1104000.SALES -ALE'
				);
				break;
			default: 
				throw new Exception('No Track found.');
		}
		return $accounts;
	}
}

class NovQbExporter extends Exporter
{
	protected function setFormat() 
	{
		$this->format	=	'Novartis_quickbooks';
	}
	
	protected function setLabels()
	{
		$this->labels	=	array(
				'ITEM NAME',
				'SUBITEM OF',
				'COGS ACCOUNT',
				'INCOME ACCOUNT',
				'ASSET ACCOUNT',
				'Manufacturer\'s Part Number',
				'PURCHASE DESCRIPTION',
				'SALES DESCRIPTION',
				'ALE ASSET',
				'WH Loc / $NBV',
				'SERIAL NUMBER',
				'YOM',
				'MODEL',
				'STATUS',
				'NIBR # (Gold Tag)',
				'TM0 #',
				'SAP/NIBRI Asset #',
				'SOURCE Building/Floor/Location',
				'WEIGHT - LBS',
				'Previous Owner',
				'Category / Subcategory',
				'',
				'Notes'
		);
	}

	protected function setRows()
	{
		if (empty($this->assets)) {
			throw new Exception('No items found to export.');
		}
		foreach ($this->assets as $asset)
		{
			switch ($asset->data['track'])
			{
				case 'Novartis/ALOE':
				case 'Novartis':
				case 'EMP':
					break;
				case 'ALOE':
				case 'Consignment':	
				case 'ALE':
				default:
					$test	=	1;
			}
			if ($test === 1) continue;
			$item	=	substr($asset->data['model'] . ' ' . $asset->data['function_desc'], 0, 18);
			($asset->data['brand'] != '') ? $b = $asset->data['brand'] . ' ' : $b = '';
			$outRow	= array(
					$item . ' ' . $asset->data['aleAsset'],
					$asset->data['subitem_of'],
					'Inventory Asset',
					'Inventory Asset',
					'Inventory Asset',
					$asset->data['mpn'],
					$b.$asset->data['model'].' '.$asset->data['function_desc'].' '.$asset->data['title_extn'].' '.$asset->data['aleAsset'],
					$b.$asset->data['model'].' '.$asset->data['function_desc'].' '.$asset->data['title_extn'].' '.$asset->data['aleAsset'],
					$asset->data['aleAsset'],
					$asset->data['wh_location'],
					$asset->data['serial_num'],
					$asset->data['yom'],
					$asset->data['model'],
					$asset->data['emp_status'],
					$asset->data['nibr'],
					$asset->data['tm0'],
					$asset->data['sap'],
					$asset->data['src_building'].' / '.$asset->data['src_floor'].' / '.$asset->data['src_room'],
					$asset->data['weight'],
					$asset->data['prev_owner'],
					$asset->data['emp_category'].' / '.$asset->data['emp_subcategory'],
					'',
					''
			);
			$this->rows[]	=	$outRow;
		}
	}
}

class EmpExporter extends Exporter
{
	protected function setFormat() 
	{
		$this->format	=	'EMP_upload';
	}
	
	protected function setLabels()
	{
		$this->labels	=	array(
				'',
				'',
				'**Quantity (DO NOT INCLUDE)',
				'Title',
				'Article Status',
				'Asset Number',
				'Category',
				'Reserved By',
				'End Date',
				'Location',
				'Manufacturer',
				'PC ID Number',
				'Reservation Date',
				'Reserved For',
				'Start Date',
				'Status',
				'EDBId',
				'Building',
				'Floor',
				'Room',
				'PrevCostCenter',
				'Comments',
				'Acquisition Value',
				'Available Since',
				'Category-Subcategory',
				'CheckInDate',
				'CheckOutDate',
				'Content Type',
				'Customer_',
				'Depreciation StartDate',
				'Eingang',
				'EMPid',
				'Foster Child Count',
				'Former Status',
				'IAMUID',
				'NewCostCenter',
				'NewOwner',
				'NewOwnerImport',
				'NotesID',
				'Picture',
				'Previous Owner',
				'Rest Value',
				'Serial Number',
				'SubCategory',
				'Fair Market Value',
				'Item Type',
				'Path'
		);
	}

	protected function setRows()
	{
		if (empty($this->assets)) {
			throw new Exception('No items found to export.');
		}
		foreach ($this->assets as $asset)
		{
			($asset->data['brand'] != '') ? $b = $asset->data['brand'] . ' ' : $b = '';
			$outRow	= array(
					'',
					'',
					$asset->data['quantity'],			// C
					$asset->data['mnfr'] . ' ' . $b . $asset->data['model'] . ' ' . $asset->data['function_desc'] . ' ' . $asset->data['title_extn'],
					'available',
					$asset->data['nibr'],
					$asset->data['emp_category'],			// G
					'',
					'',
					'ALE',
					$asset->data['mnfr'],				// K
					'',
					'',
					'',
					date('m/d/Y'),
					'Available',				// P
					'',
					$asset->data['src_building'],
					$asset->data['src_floor'],
					$asset->data['src_room'],			// T
					'',
					'',
					'',
					date('m/d/Y'),
					$asset->data['emp_category'] . '-' . $asset->data['emp_subcategory'], // Y
					date('m/d/Y'),
					date('m/d/Y', time() + (90*24*60*60)),
					'Item',
					'',							// AC
					'',
					date('m/d/Y'),
					$asset->data['aleAsset'],
					0,
					'Available',
					'',							// AI
					'',
					'',
					'',
					'',							// AM
					'http://share.nibr.novartis.net/sites/ops/SO/LabOps/Apps/CA_EMP/SiteAssets/Lists/Equipments/EditAdmin/' . $asset->data['aleAsset'] . '.jpg',		// AN
					'',
					$asset->data['nbv'],
					$asset->data['serial_num'],		// AQ
					$asset->data['emp_subcategory'],
					'',
					'',
					''
			);
			$this->rows[]	=	$outRow;
		}
	}
}