<?php $this->layout('master', [
    'title'=>'Create an account for the Hope Springs forum!',
    'desc'=>'Account creation page for Hope Springs forum'
  ]); ?> 

<body id="signupbackground">
		<div id="signup">
			<h1>Create an account</h1>
			<form action="index.php?page=signup" method="post" id="signupform">
				<label for="username">User name:</label>
				<input type="text" name="username" placeholder="Enter your user name" value="<?= isset($_POST['signupsubmit']) ? $_POST['username']: '' ?>" id="username">
				<br>
				<span id="usernameMessage"><?= isset($userNameMessage) ? $userNameMessage : '' ?></span>
				<br>
				<label for="email">Email address:</label>
				<input type="text" name="email" placeholder="Enter your email address" value="<?= isset($_POST['signupsubmit']) ? $_POST['email']: '' ?>" id="email">
				<br>
				<span id="emailMessage"><?= isset($emailMessage) ? $emailMessage : '' ?></span><br>
				<label for="password">Password:</label>
				<input type="password" name="password" placeholder="Create a password" id="password">
				<br>
				<span id="passwordMessage"><?= isset($passwordMessage) ? $passwordMessage : '' ?></span><br>
				<label for="reenterpassword">Reenter Password:</label>
				<input type="password" name="reenterpassword" placeholder="Reenter your password" id="reenterPassword">
				<br>
				<span id="reenterPasswordMessage"><?= isset($reenterPasswordMessage) ? $reenterPasswordMessage : '' ?></span><br>
				<input type="submit" value="Sign up now!" name="signupsubmit" id="signupsubmit" class="btn btn-success">
			</form>
		</div>