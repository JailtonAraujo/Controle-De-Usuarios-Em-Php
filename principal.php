<?php
session_start();

include ('ValidarLogin.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HomePage</title>
</head>
<body>
<h1> Olá, <?php echo $_SESSION['usuario']?> </h1>

<a href="logout.php">Sair</a>
</body>
</html>

