<?php
if($_POST["name"]) {
	$recipient="jack@atlanticlabequipment.com";
    $sender=$_POST["name"];
	$sender3="Atlantic Lab Equipment";
    $senderEmail=$_POST["email"];
    $message="$sender has asked a question";
	$message2=$_POST["message"];
	$message3="Thank you for your submission to our Questions form. We'll contact you as soon as possible with a solution!";
	$subject="$sender asked a Question";
	$subject2="ALE - Thank You for your Submission!";
	$thankyou="Hello $sender,\n\n$message3";
	
    $mailBody="Name: $sender\nEmail: $senderEmail\n\n$message2";
mail($recipient, $subject, $mailBody, "From: $sender <$senderEmail>");
mail($senderEmail, $subject2, $thankyou, "From: $sender3 <$recipient>");
}
?>


<html>
<head>
	<title>Ask a Question - Submission Complete</title>
	<link rel="stylesheet" type="text/css" href="<?php bloginfo('template_directory'); ?>/defaults.css" media="screen">
	<link rel="stylesheet" type="text/css" href="<?php bloginfo('template_directory'); ?>/style.css" media="screen">
	<link href="https://fonts.googleapis.com/css?family=Fjalla+One" rel="stylesheet">
	<meta name="viewport" content="width=divice-width, initial-scale=1.0">
</head>
<body>
<?php get_header(); ?>
<p>Thank you for your submission, <?php echo $_POST["name"]; ?>.</p>
<p>You should receive a confirmation email at this address:<br/>
<?php echo $_POST["email"]; ?></p>
<p>We'll contact you with an answer to your question as soon as possible!</p>
<?php get_footer(); ?>
</body>
</html>
