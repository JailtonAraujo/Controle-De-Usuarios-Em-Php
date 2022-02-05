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
                Olá, <?php echo $_SESSION['usuario'];?>
            </h3>
            <a href="logout.php"><button type="button" class="btn btn-dark">SAIR</button></a>
        </header>

        <div class="main">
            <form action="cadastrar.php" class="form-group needs-validation" method="post" novalidate>
                <div class="input-group mb-3">
                    <span class="input-group-text" id="basic-addon1">ID:</span>
                    <input type="text" name="id" class="form-control" aria-label="Username" aria-describedby="basic-addon1" readonly>
                  </div>
                  <div class="input-group mb-3">
                    <span class="input-group-text" id="basic-addon1">NOME:</span>
                    <input type="text" name="nome" class="form-control" aria-label="Username" aria-describedby="basic-addon1" required>
                    <div class="invalid-feedback">
                      Campo Obrigatorio!!
                  </div>
                  <div class="valid-feedback">
                      Ok
                  </div>
                  </div>
                  <div class="input-group mb-3">
                    <span class="input-group-text" id="basic-addon1">LOGIN:</span>
                    <input type="text" name="login" class="form-control"  aria-label="Username" aria-describedby="basic-addon1" required>
                    <div class="invalid-feedback">
                      Campo Obrigatorio!!
                  </div>
                  <div class="valid-feedback">
                      Ok
                  </div>
                  </div>
                  <div class="input-group mb-3">
                    <span class="input-group-text" id="basic-addon1">EMAIL:</span>
                    <input type="email" name="email" class="form-control"  aria-label="Username" aria-describedby="basic-addon1" required>
                    <div class="invalid-feedback">
                      Campo Obrigatorio!!
                  </div>
                  <div class="valid-feedback">
                      Ok
                  </div>
                  </div>
                  <div class="input-group mb-3">
                    <span class="input-group-text" id="basic-addon1">SENHA:</span>
                    <input type="password" name="senha" class="form-control" aria-label="Username" aria-describedby="basic-addon1" required>
                    <div class="invalid-feedback">
                      Campo Obrigatorio!!
                  </div>
                  <div class="valid-feedback">
                      Ok
                  </div>
                  </div>
                  <div class="button-group">
                    <button type="submit" class="btn btn-success">SALVAR</button>
                    <button type="button" class="btn btn-secondary">LIMPAR</button>
                  </div>
            </form>

            <div class="container-table">
                <div class="input-group mb-3">
                    <input type="text" class="form-control" placeholder="NOME" aria-label="Recipient's username" aria-describedby="button-addon2">
                    <button class="btn btn-primary" type="button" id="button-addon2">BUSCAR</button>
                  </div>
                <table class="table">
                    <thead>
                        <th>ID</th>
                        <th>NOME</th>
                        <th>LOGIN</th>
                        <th>EMAIL</th>
                    </thead>
                    <tbody>
    
                    </tbody>
                </table>
            </div>

        </div>
    </div>

    <footer>
        &copy; copyrigth Sistema php
        <?php print date('Y')?>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    
    <script>
      (function () {
  'use strict'

  // Fetch all the forms we want to apply custom Bootstrap validation styles to
  var forms = document.querySelectorAll('.needs-validation')

  // Loop over them and prevent submission
  Array.prototype.slice.call(forms)
    .forEach(function (form) {
      form.addEventListener('submit', function (event) {
        if (!form.checkValidity()) {
          event.preventDefault()
          event.stopPropagation()
        }

        form.classList.add('was-validated')
      }, false)
    })
})()
    </script>
  </body>

</html>