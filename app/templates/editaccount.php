<?php $this->layout('master', [
    'title'=>'Create an account for the Hope Springs forum!',
    'desc'=>'Account creation page for Hope Springs forum'
  ]); 

  ?> 

<body id="signupbackground">
		<div id="signup">
			<h1>Edit your account details</h1>
			<form action="index.php?page=editaccount" method="post" id="editAccountForm">
				<label for="username">User name:</label>
				<input type="text" name="username" value="<?= $accountInfo['username'] ?>" id="username">
				<br>
				<span id="userNameMessage"><?= isset($userNameMessage) ? $userNameMessage : '' ?></span>
				<br>
				<label for="email">Email address:</label>
				<input type="text" name="email" placeholder="Enter your email address" value="" id="email">
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
				<input type="submit" value="Edit your account details" name="editaccount" id="editAccountSubmit" class="btn btn-success">
				<br>
				<a href="index.php?page=home">Return to home page</a>
			</form>
		</div>