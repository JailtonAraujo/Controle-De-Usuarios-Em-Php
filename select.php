<?php

header('Content-type: application/json');

include_once 'connection.php';

$parametroDeBusca = $_GET['busca'];
$offset = 0;

$query = "";
$queryCount = "";

if($parametroDeBusca == 'nome'){
$nome = $_GET['nome'];    
$query = "select * from usuario where nome like upper('$nome%') limit 5 offset $offset";

$queryCount = "select count(*) as total from usuario where nome like upper('$nome%')";

$result = mysqli_query($conexao, $query);

$rows = $result->fetch_all(MYSQLI_ASSOC);

$resultCount = mysqli_query($conexao, $queryCount);
$total = $resultCount->fetch_all(MYSQLI_ASSOC);
array_push($rows,$total[0]);
echo json_encode($rows);

}
else if($parametroDeBusca == 'id'){
    $id = $_GET['id'];
    $query = "select * from usuario where idusuario = $id;";

    $result = mysqli_query($conexao, $query);


    $rows = $result->fetch_all(MYSQLI_ASSOC);
    
    echo json_encode($rows);
}

else if($parametroDeBusca == 'buscaAjax'){
    $offset = $_GET['offset'];
    $nome = $_GET['nome'];    
    $query = "select * from usuario where nome like upper('$nome%') limit 5 offset $offset";

    $queryCount = "select count(*) as total from usuario where nome like upper('$nome%')";

    $result = mysqli_query($conexao, $query);

    $rows = $result->fetch_all(MYSQLI_ASSOC);

    $resultCount = mysqli_query($conexao, $queryCount);
    $total = $resultCount->fetch_all(MYSQLI_ASSOC);
    array_push($rows,$total[0]);
    echo json_encode($rows);
}


