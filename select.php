<?php

header('Content-type: application/json');

include_once 'connection.php';

$parametroDeBusca = $_GET['busca'];

$query = "";

if($parametroDeBusca == 'nome'){
$nome = $_GET['nome'];    
$query = "select * from usuario where nome like upper('$nome%');";
}
else if($parametroDeBusca == 'id'){
    $id = $_GET['id'];
    $query = "select * from usuario where idusuario = $id;";
}

$result = mysqli_query($conexao, $query);

$rows = $result->fetch_all(MYSQLI_ASSOC);

echo json_encode($rows);