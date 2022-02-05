<?php

include 'connection.php';

$id =  mysqli_real_escape_string($conexao, $_POST['id']);
$nome = mysqli_real_escape_string($conexao,$_POST['nome']);
$login = mysqli_real_escape_string($conexao,$_POST['login']);
$senha = mysqli_real_escape_string($conexao,$_POST['senha']);
$email = mysqli_real_escape_string($conexao,$_POST['email']);


$query = "insert into usuario (nome, login, email, senha) values ('$nome', '$login','$email', '$senha'); ";

mysqli_query($conexao, $query);
?>

