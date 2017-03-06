<?php
if($_POST["firstname"]) {
	$recipient="atlanticnewsletter@gmail.com";
    $sender=$_POST["firstname"];
	$sender2=$_POST["lastname"];
	$sender3="Atlantic Lab Equipment";
	$sender4="$sender $sender2";
    $senderEmail=$_POST["email"];
    $message="$sender $sender2 has subscribed to Atlantic Lab Equipment's Monthly Newsletter";
	$message2="Thank you for signing up for the Atlantic Lab Equipment Newsletter.\n\nWe are looking forward to working with you in the future. At Atlantic Lab Equipment we value service, support, and integrity.\n\nThanks again,\n\nThe ALE Team 866-484-6031";
	$subject="$sender $sender2 Has Subscribed to the Newsletter";
	$subject2="Thank You for Subscribing to our Newsletter!";
	$thankyou="Hello $sender,\n\n$message2";
	
    $mailBody="Name: $sender $sender2\nEmail: $senderEmail\n\n$message";
mail($recipient, $subject, $mailBody, "From: $sender4 <$senderEmail>");
mail($senderEmail, $subject2, $thankyou, "From: $sender3 <$recipient>");
}
?>

<html>
<body>

<?php echo $_POST["firstname"]; ?>&nbsp;
<?php echo $_POST["lastname"]; ?>:&nbsp;
<?php echo $_POST["email"]; ?>

</body>
</html>