<?php
require_once('session/initalize.php');

unset($_SESSION['username']);

redirect_to('login.php');
exit;
?>