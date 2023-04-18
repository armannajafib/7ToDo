<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<title><?= BASE_TITLE . " | authotication"; ?></title>
	<link rel="stylesheet" href="<?= site_url("assets/css/auth.css"); ?>">

</head>

<body>
	<!-- partial:index.partial.html -->
	<!DOCTYPE html>
	<html lang="en">

	<head>
		<meta charset="UTF-8">
		<title>Kaito</title>



		<link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Open+Sans:600'>

		<link rel="stylesheet" href="<?= site_url("assets/css/auth.css"); ?>">
		<ul class="lightrope">
			<li></li>
			<li></li>
			<li></li>
			<li></li>
			<li></li>
			<li></li>
			<li></li>
			<li></li>
			<li></li>
			<li></li>
			<li></li>
			<li></li>
			<li></li>
			<li></li>
			<li></li>
			<li></li>
			<li></li>
			<li></li>
			<li></li>
			<li></li>
			<li></li>
			<li></li>
			<li></li>
			<li></li>
			<li></li>
			<li></li>
			<li></li>
			<li></li>
			<li></li>
			<li></li>
			<li></li>
			<li></li>
			<li></li>
			<li></li>
			<li></li>
			<li></li>
			<li></li>
			<li></li>
			<li></li>
			<li></li>
			<li></li>
			<li></li>
		</ul>

	</head>

	<body>

		<div class="login-wrap">
			<div class="login-html">
				<input id="tab-1" type="radio" name="tab" class="sign-in" checked><label for="tab-1" class="tab">Login</label>
				<input id="tab-2" type="radio" name="tab" class="sign-up"><label for="tab-2" class="tab">Regester</label>
				<div class="login-form">
					<div class="sign-in-htm">
						<form action="<?= site_url("auth.php?action=login") ?>" method="post">
							<div class="group">
								<label for="user" class="label">Email</label>
								<input id="user" type="email" class="input" name="logEmail">
							</div>
							<div class="group">
								<label for="pass" class="label">Password</label>
								<input id="pass" type="password" class="input" data-type="password" name="logPassword">
							</div>
							<div class="group">
								<input id="check" type="checkbox" class="check" checked>
								<label for="check"><span class="icon"></span> Keep me Signed in</label>
							</div>
							<div class="group">
								<input type="submit" class="button" value="Sign In">
							</div>
						</form>
						<div class="hr"></div>
						<div class="foot-lnk">
							<a href="#forgot">Forgot Password?</a>
						</div>
					</div>
					<div class="sign-up-htm">
						<form action="<?= site_url("auth.php?action=register") ?>" method="post">
							<div class="group">
								<label for="user" class="label">Username</label>
								<input id="user" type="text" class="input" name="userNameReg">
							</div>
							<div class="group">
								<label for="pass" class="label">Password</label>
								<input id="pass" type="password" class="input" data-type="password" name="passReg">
							</div>
							<div class="group">
								<label for="pass" class="label">Repeat Password</label>
								<input id="pass" type="password" class="input" data-type="password" name="rePassReg">
							</div>
							<div class="group">
								<label for="pass" class="label">Email Address</label>
								<input id="pass" type="text" class="input" name="emailReg">
							</div>
							<div class="group">
								<input type="submit" class="button" value="Sign Up">
							</div>
						</form>
						<div class="hr"></div>
						<div class="foot-lnk">
							<label for="tab-1">Already Member?</a>
						</div>
					</div>
				</div>
			</div>
		</div>



	</body>

	</html>
	<!-- partial -->

</body>

</html>