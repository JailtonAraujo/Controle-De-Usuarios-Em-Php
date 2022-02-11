<?php
    header('Content-type: application/json');

    include_once 'connection.php';

    $id = $_POST['id'];
    $nome = $_POST['nome'];
    $login = $_POST['login'];
    $email = $_POST['email'];
    $senha = $_POST['senha'];

    if($id == '' || $id == null){

   $query = "insert into usuario (nome, login, email, senha) values ('$nome', '$login', '$email', '$senha')";
   
   if(mysqli_query($conexao, $query)){
        echo json_encode("cadastrado com sucesso!");
   }else{
       echo json_encode("Erro ao cadastrar usuario!");
   }
    }else{
        $query = "update usuario set nome = '$nome', login = '$login', email = '$email', senha = '$senha' where idusuario = $id";

        if(mysqli_query($conexao, $query)){
            echo json_encode("Usuario atualizado com sucesso!");
        }else{
            echo json_encode("Erro ao atualizar usuario, verifique os dados!");
        }
    }