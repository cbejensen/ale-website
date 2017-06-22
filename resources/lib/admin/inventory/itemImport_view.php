<script src="js/itemImport.js"></script>
<script src="js/listView.js"></script>
<script>
	var usedAssets	=	<?php echo json_encode(ItemImporter::getTakenAssets($this->conn)); ?>;
	var tracks		=	<?php echo json_encode(ItemImporter::getTracks($this->conn)); ?>;
	var vendors		=	<?php echo json_encode(ItemImporter::getVendors($this->conn)); ?>;
	var shipping	=	<?php echo json_encode(ItemImporter::getShippingClasses($this->conn)); ?>;
	var emp_stat	=	<?php echo json_encode(ItemImporter::getEmpStatuses($this->conn)); ?>;
	var tools		=	<?php echo json_encode(ItemImporter::getTools()); ?>;
</script>
<main class="list-main item-import-main" id="list-main">
	<div class="new-import material" id="new-import-dialog">
		<h1>Equipment Import</h1>
		<p>Select a batch (or enter a new one). Then, upload your spreadsheet.</p>
		<p>Format accepted: .csv</p>
		<label>Batch Name:</label>
		<select></select>
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
		</script>
		<table class="list-table" id="list-table">
			<tbody id="list-table-body"></tbody>
		</table>
	</div>
</main>