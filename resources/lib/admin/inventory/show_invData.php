<?php 
foreach ($asset->data as &$data)
{
	//$data	= str_replace('"','\\"',$data);
}
//$data	=	str_replace('\\', '\\\\\\', json_encode($asset->data, JSON_HEX_QUOT));
//$data	=	json_encode($asset->data, JSON_HEX_QUOT);
//$photos	=	json_encode($asset->photos);
//$cats	=	json_encode($asset->categories);
//$status	=	json_encode($asset->status);
//$options=	json_encode($list->options);
?>
<script>
//	displayInvAsset(<?php // echo "'$data', '$photos', '$cats', '$status', '$options'" ?>)
//var listOptions	=	<?php //echo json_encode($list->options); ?>;
var data		=	<?php echo json_encode($asset->data, JSON_HEX_QUOT); ?>;
var photos		=	<?php echo json_encode($asset->photos); ?>;
var cats		=	<?php echo json_encode($asset->categories); ?>;
var item_status	=	[];
<?php 
foreach ($asset->status as $status)
echo 'item_status.push('.json_encode($status, JSON_HEX_QUOT).');'; 
?>
displayInvAsset(data, photos, cats, item_status, listOptions);
</script>
