<?php

header('Content-type: application/json');

include_once 'connection.php';

$parametroDeBusca = $_GET['busca'];

$query = "select * from usuario where nome like upper('$parametroDeBusca%') order by nome;";

$result = mysqli_query($conexao, $query);

//$lin = mysqli_num_rows($result);

$listaDeUsuario = mysqli_fetch_array($result);

echo $listaDeUsuarios;