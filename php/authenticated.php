<!--
Author     : Daniel Kleebinder
Created on : 26.04.2018
-->

<div class="text-center">
    <h2>Welcome <?php echo $_SESSION['username']; ?>!</h2>
    <a href="./index.php?action=logout&csrf=<?php echo $_SESSION['csrf_token']; ?>">Logout</a>
</div>