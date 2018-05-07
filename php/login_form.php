<!--
Author     : Daniel Kleebinder
Created on : 26.04.2018
-->

<form class="col-md-offset-4 col-md-4" action="./index.php?action=login" method="post">
    <h2 style="margin-bottom: 25px;">Login Form</h2>
    <div class="input-group">
        <span class="input-group-addon"><span class="glyphicon glyphicon-user"></span></span>
        <input id="username" name="username" type="text" class="form-control" autocomplete="on" placeholder="Username (Admin)">
    </div>
    <div class="input-group" style="border-bottom: 1px solid #ccc; padding-bottom: 15px; margin-bottom: 15px;">
        <span class="input-group-addon"><span class="glyphicon glyphicon-lock"></span></span>
        <input id="password" name="password" type="password" class="form-control" autocomplete="on" placeholder="Password (ad123)">
    </div>

    <?php if (isset($correct_credentials) && !$correct_credentials) { ?>
        <div class="alert alert-danger">
            <strong>Invalid Login: </strong> Your login credentials are wrong
        </div>
    <?php } ?>
		
    <button type="submit" class="btn btn-default col-md-7">Login</button>
    <button type="reset" onclick="$('.alert').hide();" class="btn btn-danger col-md-offset-1 col-md-4" style="margin-bottom: 25px;">Reset</button>
    <label>
        <input type="checkbox" name="remember" value="checked" <?php echo isset($remember) ? $remember : ''; ?>> <span>Remember Me</span>
    </label>
</form>

<!--Google Sign-in-->
	<script src="https://apis.google.com/js/platform.js" async defer></script>
		<script type="text/javascript">
		console.log("testing javascript");
		function onSignIn(googleUser) {
			console.log('TEEEEEEEEEEEEEEEEEEEEEEEEEST'); //TEST DELETE!!!
		  var profile = googleUser.getBasicProfile();
		  console.log('ID: ' + profile.getId()); // Do not send to your backend! Use an ID token instead.
		  console.log('Name: ' + profile.getName());
		  console.log('Image URL: ' + profile.getImageUrl());
		  console.log('Email: ' + profile.getEmail()); // This is null if the 'email' scope is not present.
		}
		
		  function signOut() {
			var auth2 = gapi.auth2.getAuthInstance();
			auth2.signOut().then(function () {
			  console.log('User signed out.');
			});
		  }
		</script>
	<meta name="google-signin-client_id" content="553544134525-qkkn81bc0o57l9km2q119umdog04ikci.apps.googleusercontent.com">
	<div class="g-signin2" data-onsuccess="onSignIn"></div>
	<a href="#" onclick="signOut();">Sign out</a>

	
	
	
	
	
	
	
	