<?php

session_start();
session_destroy();
session_start();
$_SESSION['logout']="Successfully Logout!! 👋";
header('Location: voterlogin.php');
exit;

?>