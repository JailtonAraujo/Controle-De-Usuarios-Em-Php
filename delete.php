<?php
    header('Content-type:application/json');
        
    require_once 'connection.php';

    $id = $_GET['id'];

    $query = "delete from usuario where idusuario = $id";

    if(mysqli_query($conexao, $query)){
        echo json_encode("Usuario exclido com sucesso!");
    }else{
        echo json_encode("Erro ao excluir usuario, verifique se o usuario selecionado e valido!");
    }