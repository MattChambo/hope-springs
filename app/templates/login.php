<?php $this->layout('master', [
    'title'=>'Log in to the Hope Springs forum!',
    'desc'=>'The login page for the Hope Springs forum'
  ]); ?> 

  <body id="loginbackground">
		<div id="login">
			<h1>Login</h1>
			<form action="" method="post" id="loginform">
				<label for="loginusername">User name:</label>
				<input type="text" name="loginusername" placeholder="Your user name" id="loginusername">
				<br>
				<span id="usernamemessage"></span><br>
				<label for="loginpassword">Password:</label>
				<input type="password" name="loginpassword" placeholder="Enter your password" id="loginpassword">
				<br>
				<span id="passwordmessage"></span><br><br>
				<input type="submit" value="Login now!" id="loginsubmit" class="btn btn-success">
			</form>
		</div>