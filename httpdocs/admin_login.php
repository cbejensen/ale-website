<!DOCTYPE html>
<html>

<head>
	<link rel="icon" type="image/ico" href="favicon_ale.ico">
	<link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Hind" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="css/default.css" media="all">
	<link rel="stylesheet" type="text/css" href="css/style.css" media="all">
	<link rel="stylesheet" type="text/css" href="css/admin.css" media="all">
	<title>Login | al.db</title>
<!--<meta charset="UTF-8">-->
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<script type="text/javascript" src="js/common.js"></script>
	<script type="text/javascript" src="js/admin.js"></script>
	<script type="text/javascript" src="js/auth.js"></script>
</head>

<body class="admin-body" id="ale-body-login">
	<script>
		var requestURI	=	'<?php echo $_SERVER['REQUEST_URI']; ?>';
	</script>
	<main class="login-main">
		<img class="logo" src="img/interface/favicon-ale.png" alt="ale">
		<span class="img-overlay"></span>
		<div class="creds-wrap">
			<span class="creds-arrow"></span>
			<input type="text" placeholder="Username" id="username">
			<input type="password" placeholder="Password" id="password">
			<span class="gradient-button creds-submit" onclick="authenticateUser()">login</span>
			<img class="login-icon" id="l_user" src="img/interface/user.png">
			<img class="login-icon" id="l_lock" src="img/interface/lock.png">
		</div>
		<div class="login-error material" id="login-error">
			<img src="img/interface/nostop.png">
			<span id="error-msg"></span>
		</div>
	</main>
	<script>
		var passInput	=	document.getElementById('password');
		passInput.onkeydown	=	function(event) {
			//console.log(event);
			if (event.key == 'Enter' || event.keyCode ==  13)
			{
				authenticateUser();
			}
		}
	</script>
</body>
</html>