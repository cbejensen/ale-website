<?php
/*
 * The Admin controller facilitates all administrative/content management 
 * interfaces.
 * 
 * Users must be logged in, and should be authorized and validated with each request.
 */
use Cartalyst\Sentinel\Native\Facades\Sentinel;

class AdminController
{	
	private	$conn;
	
	public function __construct()
	{
		$user			=	AdminController::getNewUser();
		$this->conn		=	db_connect(AL_DB, $user);
		if (!$this->conn) {
			throw new Exception('Could not establish database connection.');
		}
		
	}
	
	private static function getNewUser()
	{
		$user	=	array(
				'db'	=>	array(
						'user'	=>	'admin',
						'pass'	=>	'euphrates8@N@N@$'
				),
				'user'	=>	array(
// 						'first_name'	=>	Sentinel::getUser()->first_name,
// 						'last_name'		=>	Sentinel::getUser()->last_name,
// 						'email'			=>	Sentinel::getUser()->email,
// 						'id'			=>	Sentinel::getUser()->id
				)
		);
		return $user;
	}
	
	public function home()
	{
		
	}
	
	public function showList()
	{
		AdminController::loadList();
		AdminController::loadItemModel();
		$list	=	$this->getListModel();
		$list->setRows();
		require_once ADMIN_PATH . '/list/list_view.php';
		// If the 'inv' parameter is set, the user has requested an item's data
		if (isset($_GET['inv']))
		{
			try {
				$asset	=	new InvItem($_GET['inv'], $this->conn);
			} catch (Exception $e) {
				// Asset could not be created.
				// Find a way to alert the user, preferably in the view you're about to call.
				$errorData	=	array('title' => 'Could Not Get Item.', 'error' => $e->getMessage());
				handleError($errorData, $this->conn, 0, 0);
			}
			require_once ADMIN_PATH . '/inventory/show_invData.php';
		}
	}
	
	public function updateList()
	{
		/*
		 * For ajax requests.
		 */
		AdminController::loadList();
		AdminController::loadItemModel();
		$list	=	$this->getListModel();
		$list->setRows();
		$list->sendUpdates();
	}
	
	public function getInvAssetData()
	{
		AdminController::loadItemModel();
		try {
			$json	=	AdminController::decodeJSON();
			$asset	=	new InvItem($json['aleAsset'], $this->conn);
			$asset->getAssetData();
		} catch (Exception $e) {
			// If the request could not be decoded, alert the user with a message and error code.
			$errorData	=	array(	'title'		=>	'Item Update Failed',
									'message'	=>	'The server was unable to process your request.',
									'error' 	=>	$e->getMessage()
							);
			handleError($errorData, $this->conn, 0, 1);
		}
	}
	
	public function invAction()
	{
		AdminController::loadItemModel();
		try {
			$json	=	AdminController::decodeJSON();
			InvItem::{$json['action']}($json['selected'], $this->conn);
		} catch (Exception $e) {
			// If the request could not be decoded, alert the user with a message and error code.
			if ($e->getMessage() == 'Not Authorized') {
				$msg	=	$e->getMessage();
			} else $msg	=	'The server was unable to process your request.';
			handleError([
					'title'		=>	'Item Update Failed',
					'message'	=>	$msg,
					'error'		=>	$e->getMessage()
			], $this->conn, 0, 1);
		}
	}
	
	public function updateInvItem()
	{
		AdminController::loadItemModel();
		AdminController::loadList();
		try {
			$json	=	AdminController::decodeJSON();
			$asset	=	new InvItem($json['aleAsset'], $this->conn);
			$asset->update($json);
			require_once ADMIN_PATH . '/list/models/items.php';
			$title	=	'Update Complete';
			$message=	'This item has been updated successfully.';
			echo json_encode(array(1, $title, $message, ItemList::getOptions($this->conn)));
		} catch (Exception $e) {
			// If the request could not be decoded, alert the user with a message and error code.
			$errorData	=	array(	'title'		=>	'Item Update Failed',
									'message'	=>	'The server was unable to process your request.',
									'error' 	=>	$e->getMessage()
								);
			handleError($errorData, $this->conn, 0, 1);
		}
	}
	
	public function addRecord()
	{
		AdminController::loadList();
		try {
			$json	=	AdminController::decodeJSON();
			$id		=	DataList::addRecord($json['type'], $json['newVal'], $this->conn);
			echo json_encode([
					'result'	=>	1,
					'id'		=>	$id,
					'name'		=>	$json['newVal'],
					'type'		=>	$json['type']
			]);
		} catch (Exception $e) {
			// If the request could not be decoded, alert the user with a message and error code.
			handleError([
					'title'		=>	'Record Could Not Be Added',
					'message'	=>	'Please check that there is not a record with the same name.',
					'error' 	=>	$e->getMessage()
			], $this->conn, 0, 1);
		}
	}
	
	public function updateItemPhotos()
	{
		AdminController::loadItemModel();
		try {
			$json	=	AdminController::decodeJSON();
			$asset	=	new InvItem($json['aleAsset'], $this->conn);
			$asset->updatePhotos($json);
		} catch (Exception $e) {
			// If the request could not be decoded, alert the user with a message and error code.
			$errorData	=	array(	'title'		=>	'Photo Update Failed',
									'message'	=>	'The server was unable to process your request.' . "\n\n" . $e->getMessage(),
									'error' 	=>	$e->getMessage()
							);
			handleError($errorData, $this->conn, 0, 1);
		}
	}
	
	public function imagePreprocess()
	{
// 		ini_set('upload_max_filesize', '1000000000'); // set to 1 GB
		require_once ADMIN_PATH . '/photoHandler.php';
		$aleAsset		= htmlentities($_POST['asset'], ENT_QUOTES);
		try {
			$pH		=	new PhotoHandler($aleAsset, $this->conn);
			$pH->importPhotos();
			// Response
			$photos	=	array();
			foreach ($pH->temp_imgs as $img)
			{
				$photos[]	=	array(	'url'	=>	$img,
										'id'	=>	'',
										'order'	=>	'',
										'added'	=>	date('Y-m-d') . ' - Just Now',
										'update'=>	''
								);
			}
			$msg	=	array(1, $photos);
			echo json_encode($msg);
		} catch (Exception $e) {
			$errorData	=	array(	'title'		=>	'Image Processing Failed',
									'message'	=>	'Problem with uploaded image(s): ' . $e->getMessage(),
									'error' 	=>	$e->getMessage()
							);
			handleError($errorData, $this->conn, 0, 1);
		}
	}
	
	public function itemImport() 
	{
		require_once ADMIN_PATH . '/inventory/importer.php';
		require_once ADMIN_PATH . '/inventory/itemImport_view.php';
	}
	
	public function submitItemImport()
	{
		require_once ADMIN_PATH . '/inventory/importer.php';
		$imp	=	new ItemImporter($this->conn);
		$imp->setImportData(AdminController::decodeJSON());
		$imp->import();
		if ($imp->numErrors() !== 0) {
			echo json_encode($imp->getReport());
		}
	}
	
	public function createBatch()
	{
		try {
			$json	=	AdminController::decodeJSON();
			$q		=	"INSERT INTO inv_batch (batch_name, description) VALUES (?,?)";
			$stmt		=	$this->conn->prepare($q);
			if ($stmt === false)
			{
				throw new Exception('createBatch: prepare() failed: ' . htmlspecialchars($this->conn->error));
			}
			// Bind Parameters
			$rc		=	$stmt->bind_param('ss', $json['name'], $json['desc']);
			if ($rc === false)
			{
				throw new Exception('createBatch: bind_param() failed: ' . htmlspecialchars($stmt->error));
			}
			$rc		=	$stmt->execute();
			if ($rc === false)
			{
				throw new Exception('createBatch: execute() failed: ' . htmlspecialchars($stmt->error));
			}
			echo json_encode(array('result' => 'pass', 'id' => $this->conn->insert_id));
		} catch (Exception $e) {
			echo json_encode(array('result' => 'fail', 'error' => $e->getMessage()));
		}
	}
	
	public function addToExportList()
	{
		try {
			$_SESSION['item_export'] = AdminController::decodeJSON();
			echo json_encode(['result'=>1]);
		} catch (Exception $e) {
			echo json_encode(['result'=>0]);
		}
	}
	
	public function getCSV()
	{
		AdminController::loadItemModel();
		switch($_GET['format'])
		{
			case 'channelAdvisor':
				$filename = date('Y_m_d') . ' ChannelAdvisor';
				break;
			case 'quickbooks':
				$filename = date('Y_m_d') . ' ALE_quickbooks';
				break;
			case 'quickbooks_nov':
				$filename = date('Y_m_d') . ' Novartis_quickbooks';
				break;
			case 'emp':
				$filename = date('Y_m_d') . ' EMP_upload';
				break;
		}
		header('Content-Type: text/csv; charset=utf-8');
		header("Content-Disposition: attachment; filename=$filename.csv");
		$output	=	fopen("php://output", 'w'); //$base/../output_test
		
		switch ($_GET['format'])
		{
			case 'channelAdvisor':
				$labelRow 	= array(
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
				fputcsv($output, $labelRow);
				foreach ($_SESSION['item_export'] as $item)
				{
					$asset	=	new InvItem($item, $this->conn);
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
					fputcsv($output, $outRow);
					//markAsOnEbay($row);
				}
				break;
		}
	}
	
	private function getListModel()
	{
		if (isset($_GET['ltype']))
		{
			switch ($_GET['ltype'])
			{
				// Any exceptions thrown should be caught by the router by default.
				case 'itm':
					require_once ADMIN_PATH . '/list/models/items.php';
					$list		=	new ItemList($this->conn);
					break;
				case 'exp':
					require_once ADMIN_PATH . '/list/models/items.php';
					require_once ADMIN_PATH . '/list/models/export.php';
					$list		=	new ExportList($this->conn);
					break;
				case 'lis':
					require_once ADMIN_PATH . '/list/models/listings.php';
					$list		=	new ListingList($this->conn);
					break;
				case 'gl_ads':
					require_once ADMIN_PATH . '/list/models/gl_ads.php';
					$list		=	new GenListingAdList($this->conn);
					break;
					// 				case 'item_ads':
					// 					$list		=	new ItemListingAdList($this->conn);
					// 					break;
				case 'sub':
					require_once ADMIN_PATH . '/list/models/subitem_of.php';
					$list		=	new SubitemList($this->conn);
					break;
				case 'mnf':
					require_once ADMIN_PATH . '/list/models/mnfr.php';
					$list		=	new MnfrList($this->conn);
					break;
				case 'mod':
					require_once ADMIN_PATH . '/list/models/models.php';
					$list		=	new ModelList($this->conn);
					break;
				case 'brd':
					require_once ADMIN_PATH . '/list/models/brands.php';
					$list		=	new BrandList($this->conn);
					break;
				case 'lbl':
					require_once ADMIN_PATH . '/list/models/labels.php';
					$list		=	new LabelList($this->conn);
					break;
				case 'ven':
					require_once ADMIN_PATH . '/list/models/vendors.php';
					$list		=	new VendorList($this->conn);
					break;
				case 'bat':
					require_once ADMIN_PATH . '/list/models/batches.php';
					$list		=	new BatchList($this->conn);
					break;
				default:
					throw new Exception('Invalid List Type');
					break;
			}
			return $list;
		} else {
			throw new Exception('Missing List Type');
		}
	}
	
	public static function decodeJSON()
	{
		if (!isset($_POST['json'])) {
			throw new Exception('JSON not found.');
		}
		$json	=	json_decode($_POST['json'], true);
		if (is_null($json) || !$json)
		{
			throw new Exception('JSON decode error: ' . json_last_error_msg());
		}
		return $json;
	}
	
	private static function loadList()
	{
		require_once LIB_PATH . '/paginator/paginator.php';
		require_once ADMIN_PATH . '/list/list_model.php';
	}
	
	private static function loadItemModel()
	{
		require_once ADMIN_PATH . '/inventory/invItem.php';
	}
	
	
}