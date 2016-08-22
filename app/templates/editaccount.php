<?php $this->layout('master', [
    'title'=>'Create an account for the Hope Springs forum!',
    'desc'=>'Account creation page for Hope Springs forum'
  ]); 

  ?> 

<body id="signupbackground">
		<div id="signup">
			<h1>Edit your account details</h1>
			<form action="index.php?page=editaccount&accountid=<?= $_GET['accountid'] ?>" method="post" id="editAccountForm">
				<label for="username">User name:</label>
				<input type="text" name="username" value="<?= $accountInfo['username'] ?>" id="username">
				<br>
				<span id="userNameMessage"><?= isset($userNameMessage) ? $userNameMessage : '' ?></span>
				<br>
				<label for="email">Email address:</label>
				<input type="text" name="email" placeholder="Enter your email address" value="<?= $accountInfo['email'] ?>" id="email">
				<br>
				<span id="emailMessage"><?= isset($emailMessage) ? $emailMessage : '' ?></span><br>
				<label for="password">Password:</label>
				<input type="password" name="password" placeholder="Create a new password" id="password">
				<br>
				<span id="passwordMessage"><?= isset($passwordMessage) ? $passwordMessage : '' ?></span><br>
				<label for="reenterpassword">Reenter Password:</label>
				<input type="password" name="reenterpassword" placeholder="Reenter your password" id="reenterPassword">
				<br>
				<span id="reenterPasswordMessage"><?= isset($reenterPasswordMessage) ? $reenterPasswordMessage : '' ?></span><br>
				<input type="submit" value="Edit your account details" name="editaccount" id="editAccountSubmit" class="btn btn-success">
				<br>
				<br>
				
			</form>
				<button id="deleteAccount">Delete your account</button>
				<div id="deleteAccountOptions">
					<p>Are you sure you want to delete your account?</p>
					<a href="<?= $_SERVER['REQUEST_URI'] ?>&deleteaccount&userid=<?= $_GET['accountid'] ?>" class="editdelete">Yes</a> / <button class="editdelete">No</button>
				</div>
				<br>
				<br>
				<a href="index.php?page=home">Return to home page</a>
		</div>

<script>
		// Wait for all the stuff to be ready
	$(document).ready(function() {

		// When the user clicks on the delete button
		$('#deleteAccount, #deleteAccountOptions').click(function(){
			// Toggle the visibilty of the controls
			$('#deleteAccountOptions').toggle();

		});

	});
</script>