<!--
Author     : Daniel Kleebinder
Created on : 26.04.2018
-->

<div class="text-center">
    <meta name="google-signin-client_id" content="295673662324-6068fp36kff344hfcmn8bbc8q81190uh.apps.googleusercontent.com">
    <script type="text/javascript" src="https://apis.google.com/js/platform.js?onload=onLoad" async defer></script>
    <script type="text/javascript" src="./js/google.js"></script>

    <h2>Welcome <?php echo $_SESSION['username']; ?>!</h2>
    <a href="./index.php?action=logout&csrf=<?php echo $_SESSION['csrf_token']; ?>" onclick="signOut();">Logout</a>
</div>