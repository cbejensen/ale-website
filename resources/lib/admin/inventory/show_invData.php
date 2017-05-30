<?php 
$data	=	json_encode($asset->data);
$photos	=	json_encode($asset->photos);
$cats	=	json_encode($asset->categories);
$status	=	json_encode($asset->status);
?>
<script>displayInvItem(<?php echo "'$data', '$photos', '$cats', '$status'" ?>)</script>