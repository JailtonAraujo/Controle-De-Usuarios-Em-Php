<?php

include 'connection.php';

$_SESSION['msg'] = "";

$id =  mysqli_real_escape_string($conexao, $_POST['id']);
$nome = mysqli_real_escape_string($conexao,$_POST['nome']);
$login = mysqli_real_escape_string($conexao,$_POST['login']);
$senha = mysqli_real_escape_string($conexao,$_POST['senha']);
$email = mysqli_real_escape_string($conexao,$_POST['email']);

if($id == null || empty($id) || $id == 0){//SE O ID FOR NULL OU VAZIO É UM NOVO USUARIO (CADASTRAR).
    $query = "insert into usuario (nome, login, email, senha) values ('$nome', '$login','$email', '$senha'); ";
    mysqli_query($conexao, $query);
    header('Location: principal.php');
    exit();
   $_SESSION['msg'] = "Usuario cadastrado com sucesso!";

}else{//SE JA OUVER UM ID ENTÃO É UM USUARIO EXISTENTE (ATUALIZAR)

    $query = "update usuario set nome = '$nome' login = '$login', email = '$email', senha = '$senha' where idusuario = $id";
    mysqli_query($conexao, $query);
    header('Location: principal.php');
    exit();
   // $_SESSION['msg'] = "Usuario atualizado com sucesso!";
}

$busca = $_POST['busca'];

print $busca;

?>

