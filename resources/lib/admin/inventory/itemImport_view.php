<script src="js/itemImport.js"></script>
<script src="js/listView.js"></script>
<script>
	var usedAssets	=	<?php echo json_encode(ItemImporter::getTakenAssets($this->conn)); ?>;
	var tracks		=	<?php echo json_encode(ItemImporter::getTracks($this->conn)); ?>;
	var batches		=	<?php echo json_encode(ItemImporter::getBatches($this->conn)); ?>;
	var vendors		=	<?php echo json_encode(ItemImporter::getVendors($this->conn)); ?>;
	var shipping	=	<?php echo json_encode(ItemImporter::getShippingClasses($this->conn)); ?>;
	var emp_stat	=	<?php echo json_encode(ItemImporter::getEmpStatuses($this->conn)); ?>;
	var tools		=	<?php echo json_encode(ItemImporter::getTools()); ?>;
</script>
<div class="add-batch material" id="add-batch">
	<span class="closeBtn warning-button" id="modal-close" onclick="closeDialog('add-batch')">x</span>
	<h1>Add a Batch</h1>
	<label>New Batch Name:</label>
	<input id="batch-name-input" type="text" placeholder="e.g. Novartis P/U 2017_06_21" maxlength="50">
	<label>Description:</label>
	<input id="desc-input" type="text" placeholder="e.g. Weekly Novartis Pickup" maxlength="80">
	<span class="gradient-button batch-accept" onclick="submitBatch()">Submit</span>
</div>
<main class="list-main item-import-main" id="list-main">
	<div class="new-import material" id="new-import-dialog">
		<h1>Equipment Import</h1>
		<p>Select a batch (or enter a new one). Then, upload your spreadsheet.</p>
		<p>Format accepted: .csv</p>
		<label>Batch Name:</label>
		<select class="select-add-opt" id="batch-select"></select>
		<div class="add-opt-btn gradient-button" onclick="addBatchDialog()"><img src="img/interface/add-g8a.png"></div>
		<label>CSV Spreadsheet:</label>
		<input type="file" id="csvFileInput" onchange="handleFiles(this.files)" accept=".csv">
	</div>
	<div class="list-toolbar material">
		<div class="page-info" id="page-info">
		</div>
<!-- 		<div class="admin-search-bar" id="search-bar"> -->
<!-- 			<input type="text" placeholder="Search" id="search-input" class=""> -->
<!-- 			<span class="tertiary-button"></span> -->
<!-- 		</div> -->
		<div class="toolbar-btns" id="toolbar-btns"></div>
	</div>
	<div class="list-wrap material">
		<script>
			//var listOptions	=	<?php //echo json_encode($list->options); ?>;
			renderTools();
			renderBatches();
		</script>
		<table class="list-table" id="list-table">
			<tbody id="list-table-body"></tbody>
		</table>
	</div>
</main>
