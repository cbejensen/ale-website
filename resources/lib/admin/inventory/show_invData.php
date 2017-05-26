<?php 
$data	=	json_encode($asset->data);
$photos	=	json_encode($asset->photos);
$cats	=	json_encode($asset->categories);
?>
<script>displayInvItem(<?php echo "'$data', '$photos', '$cats'" ?>)</script>