<?php 
session_start();
unset($_SESSION['provider_id']);
header("Location:..\index.php");
exit();

?>