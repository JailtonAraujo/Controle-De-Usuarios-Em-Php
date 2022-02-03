<?php
session_start();
include 'connection.php';
if(empty($_POST["login"]) || empty($_POST["senha"])){
    header('Location: index.php');
    exit();
}

$usuario = mysqli_real_escape_string($conexao, $_POST["login"]);
$senha = mysqli_real_escape_string($conexao, $_POST["senha"]);


$query = "select login, idusuario from usuario where senha = md5('$senha') and login = '$usuario'";

$qu = "insert into usuario (nome, login, senha) values ('jailton', 'jailton', 'jailton123')";

$result = mysqli_query($conexao, $query);

$row = mysqli_num_rows($result);

<<<<<<< Updated upstream
if(empty($_POST["login"]) || empty($_POST["senha"])){
    header('Location: index.php');
    exit();
}

$usuario = mysqli_real_escape_string($conexao, $_POST["login"]);
$senha = mysqli_real_escape_string($conexao, $_POST["senha"]);
$msg = "Senha ou Login Inavlidos, confira-os!";

$query = "select login, idusuario from usuario where senha = md5('$senha') and login = '$usuario'";

$qu = "insert into usuario (nome, login, senha) values ('jailton', 'jailton', 'jailton123')";

$result = mysqli_query($conexao, $query);

$row = mysqli_num_rows($result);

=======
>>>>>>> Stashed changes
if($row == 1){
    $_SESSION['usuario'] = $usuario;
    header('Location: principal.php');
    exit();
}else{
<<<<<<< Updated upstream
    $_SESSION['msg'] = $msg;
=======
    $_SESSION['nao-autenticado'] = true;
>>>>>>> Stashed changes
    header('Location: index.php');
    exit();
}

?>