<?php $this->layout('master', [
    'title'=>'Create an account for the Hope Springs forum!',
    'desc'=>'Account creation page for Hope Springs forum'
  ]); ?> 

<body id="signupbackground">
		<div id="signup">
			<h1>Create an account</h1>
			<form action="" method="post" id="signupform">
				<label for="username">User name:</label>
				<input type="text" name="username" placeholder="Your user name" id="username">
				<br>
				<span id="usernamemessage"></span><br>
				<label for="email">Email address:</label>
				<input type="text" name="email" placeholder="Your email address" id="email">
				<br>
				<span id="emailmessage"></span><br>
				<label for="password">Password:</label>
				<input type="password" name="password" placeholder="Create a password" id="password">
				<br>
				<span id="passwordmessage"></span><br>
				<label for="reenterpassword">Reenter Password:</label>
				<input type="password" name="reenterpassword" placeholder="Reenter your password" id="reenterpassword">
				<br>
				<span id="reenterpasswordmessage"></span><br>
				<input type="submit" value="Sign up now!" id="signupsubmit" class="btn btn-success">
			</form>
		</div>