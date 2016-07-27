<?php $this->layout('master', [
    'title'=>'Log in to the Hope Springs forum!',
    'desc'=>'The login page for the Hope Springs forum'
  ]); ?> 

  <body id="loginbackground">
		<div id="login">
			<h1>Login</h1>
			<form action="" method="post" id="loginform">
				<label for="loginusername">User name:</label>
				<input type="text" name="username" placeholder="Your user name" id="loginUsername" value="<?= isset($_POST['login']) ? $_POST['username'] : '' ?>">
				<br>
				<span id="usernameMessage">
					<?php if( isset($usernameMessage) ): ?>
          			<?= $emailMessage ?>
          			<?php endif ?>
          		</span><br>
				<label for="loginpassword">Password:</label>
				<input type="password" name="password" placeholder="Enter your password" id="loginPassword">
				<br>
				<span id="passwordMessage">
					<?php if( isset($passwordMessage) ): ?>
          			<?= $passwordMessage ?>
          			<?php endif ?>

          			<?php if( isset($loginMessage) ): ?>
          			<?= $loginMessage ?>
          			<?php endif ?>
				</span><br><br>
				<input type="submit" name="login" value="Login now!" id="loginsubmit" class="btn btn-success">
			</form>
		</div>