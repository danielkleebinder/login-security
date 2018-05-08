<!--
Author     : Daniel Kleebinder
Created on : 26.04.2018
-->

<form id="login-form" class="col-md-offset-4 col-md-4" action="./index.php?action=login" method="post">
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

    <!-- Default Login Button-->
    <button type="submit" class="btn btn-default col-md-7">Login</button>

    <!-- Reset Form Button -->
    <button type="reset" onclick="$('.alert').hide();" class="btn btn-danger col-md-offset-1 col-md-4" style="margin-bottom: 25px;">Reset</button>

    <label>
        <input type="checkbox" name="remember" value="checked" <?php echo isset($remember) ? $remember : ''; ?>> <span>Remember me on this computer</span>
    </label>

    <!-- Google Login -->
    <meta name="google-signin-client_id" content="295673662324-6068fp36kff344hfcmn8bbc8q81190uh.apps.googleusercontent.com">
    <script type="text/javascript" src="https://apis.google.com/js/platform.js" async defer></script>
    <script type="text/javascript" src="./js/google.js"></script>
    <div class="g-signin2 col-md-12"
         style="width: 360px; margin-top: 15px; padding-top: 0px; padding-left: 0px;"
         onclick="onClickSignIn()"
         data-onsuccess="onSignIn"></div>
    <!--<a href="#" onclick="signOut();">Sign out</a>-->
</form>