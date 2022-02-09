<?php

header('Content-type: application/json');

include_once 'connection.php';

$parametroDeBusca = $_GET['busca'];

$query = "select * from usuario where nome like upper('$parametroDeBusca%');";

$result = mysqli_query($conexao, $query);

$rows = $result->fetch_all(MYSQLI_ASSOC);

echo json_encode($rows);