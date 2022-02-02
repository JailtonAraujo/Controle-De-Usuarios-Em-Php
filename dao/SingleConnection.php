<?php

$hostNmae = "localhost";
$bancoDeDados = "sistema-php";
$userName = "root";
$password = "";

$mysqli = new mysqli($hostNmae, $userName, $password, $bancoDeDados);
if($mysqli->connect_errno){
    echo "Falha ao connectar: (".$mysqli->connect_errno.")".$mysqli->connect_error;
}