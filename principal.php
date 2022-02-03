<?php
session_start();

include ('ValidarLogin.php');

echo $_SESSION['usuario'];
?>