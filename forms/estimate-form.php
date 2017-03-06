<?php
if($_POST["instrument"]) {
	$recipient="jack@atlanticlabequipment.com";
	$ale="Atlantic Lab Equipment";
	
	$sender=$_POST["firstname"];
	$sender2=$_POST["lastname"];
	$senderEmail=$_POST["email"];
	$phone=$_POST["phone"];
	$word=$_POST["word"];
	$comments=$_POST["comments"];
	$instrument=$_POST["instrument"];
	$infoRequest=$_POST["info-requested"];
	$mailing=$_POST["mailing"];
	
	$subject="$sender $sender2 asked for a quote!";
	$mailbody="Name: $sender $sender2\nEmail: $senderEmail\nPhone: $phone\n\nInstrument of Interest: $instrument\nInformation Requested: $infoRequest\n\nAdditional Questions or Comments: $comments\n\nSigned up for Newsletter? $mailing\nHow did you hear about us? $word";
	
	$subject2="Thank You from ALE! - Submission Confirmation";
	$mailbody2="Hello $sender,\n\nThank you for your interest in Atlantic Lab Equipment! We'll contact you with a quote as soon as possible.";
	
	mail($recipient, $subject, $mailbody, "From: $sender $sender2<$senderEmail>");
	mail($senderEmail, $subject2, $mailbody2, "From: $ale <$recipient>");	
}
?>




<html>
<body>


<?php echo $_POST["instrument"]; ?>&nbsp;
<?php echo $_POST["info-requested"]; ?>&nbsp;
<?php echo $_POST["firstname"]; ?>&nbsp;
<?php echo $_POST["lastname"]; ?>&nbsp;
<?php echo $_POST["email"]; ?>&nbsp;
<?php echo $_POST["phone"]; ?>&nbsp;
<?php echo $_POST["word"]; ?>&nbsp;
<?php echo $_POST["comments"]; ?>:&nbsp;
<?php echo $_POST["mailing"]; ?>

</body>
</html>