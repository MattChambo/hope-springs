<?php $this->layout('master', [
    'title'=>'Log in to the Hope Springs forum!',
    'desc'=>'The login page for the Hope Springs forum'
  ]); ?> 

  <body id="loginbackground">
		<div id="login">
			<h1>Login</h1>
			<form action="index.php?page=login" method="post" id="loginform">
				<label for="loginUsername">User name:</label>
				<input type="text" name="username" placeholder="Your user name" id="loginUsername" value="<?= isset($_POST['login']) ? $_POST['username'] : '' ?>">
				<br>
				<span id="userNameMessage"><?= isset($userNameMessage) ? $userNameMessage : '' ?></span><br>
				<label for="loginpassword">Password:</label>
				<input type="password" name="password" placeholder="Enter your password" id="loginPassword">
				<br>
				<span id="passwordMessage">
					<?= isset($passwordMessage) ? $passwordMessage : '' ?>
          			<?= isset($loginMessage) ? $loginMessage : '' ?>
				</span><br><br>
				<input type="submit" name="login" value="Login now!" id="loginsubmit" class="btn btn-success">
				<a href="index.php?page=home">Return to home page</a>
			</form>
		</div>