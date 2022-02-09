<?php
session_start();
if(!$_SESSION['usuario']){
    header('Location:index.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <link rel="stylesheet" href="css/principal.css">
  <title>HomePage</title>
</head>

<body>

  <div class="container">
    <header class="header1">
      <h3>
        Olá,
        <?php echo $_SESSION['usuario'];?>
      </h3>
      <a href="logout.php"><button type="button" class="btn btn-dark">SAIR</button></a>
    </header>

    <div class="main">
      <form action="" class="form-group needs-validation" method="post" id="form-cadastro">
        <div class="input-group mb-3">
          <span class="input-group-text" id="basic-addon1">ID:</span>
          <input type="text" name="id" id="id" class="form-control" aria-label="Username" aria-describedby="basic-addon1"
            readonly>
        </div>
        <div class="input-group mb-3">
          <span class="input-group-text" id="basic-addon1">NOME:</span>
          <input type="text" name="nome" class="form-control" id="nome" aria-label="Username" aria-describedby="basic-addon1"
            required>
          <div class="invalid-feedback">
            Campo Obrigatorio!!
          </div>
          <div class="valid-feedback">
            Ok
          </div>
        </div>
        <div class="input-group mb-3">
          <span class="input-group-text" id="basic-addon1">LOGIN:</span>
          <input type="text" name="login" id="login" class="form-control" aria-label="Username" aria-describedby="basic-addon1"
            required>
          <div class="invalid-feedback">
            Campo Obrigatorio!!
          </div>
          <div class="valid-feedback">
            Ok
          </div>
        </div>
        <div class="input-group mb-3">
          <span class="input-group-text" id="basic-addon1">EMAIL:</span>
          <input type="email" name="email" id="email" class="form-control" aria-label="Username" aria-describedby="basic-addon1"
           required>
          <div class="invalid-feedback">
            Campo Obrigatorio!!
          </div>
          <div class="valid-feedback">
            Ok
          </div>
        </div>
        <div class="input-group mb-3">
          <span class="input-group-text" id="basic-addon1">SENHA:</span>
          <input type="password" name="senha" id="senha" class="form-control" aria-label="Username" aria-describedby="basic-addon1"
            required>
          <div class="invalid-feedback">
            Campo Obrigatorio!!
          </div>
          <div class="valid-feedback">
            Ok
          </div>
        </div>
        <div class="button-group">
          <button type="submit" id="btn-salvar" class="btn btn-success" >SALVAR</button>
          <button type="button" class="btn btn-secondary" id="btn-limpar" onclick="limparCampos();">LIMPAR</button>
        </div>
        <div id= "resposta" style="color: red; margin-top: 8px;"></div>
      </form>

      <div class="container-table">
        <div class="input-group mb-3">
          <input type="text" class="form-control" placeholder="NOME" aria-label="Recipient's username"
            aria-describedby="button-addon2" id="txt-busca">
          <button class="btn btn-primary" type="button" id="btn-busca">BUSCAR</button>
        </div>
        <div class="tblresults">
          <table class="table" id="tblResultados">
            <thead>
              <tr>
                <th scope="col">ID</th>
                <th scope="col">NOME</th>
                <th scope="col">LOGIN</th>
                <th scope="col">EMAIL</th>
              </tr>
            </thead>
            <tbody>
            </tbody>
          </table>
        </div>
    </div>
  </div>
  </div>

  <footer>
    &copy; copyrigth Sistema php
    <?php print date('Y')?>
  </footer>

  <script src="js/jQuery/jquery-3.6.0.js"></script>
  <script src="js/script.js"></script>
</body>
</html>