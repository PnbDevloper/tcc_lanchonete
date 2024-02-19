<!DOCTYPE html>
<html>
<?php
require_once "include/headcadastro.php";
?>
</head>
<body>

  <p class="fs-1 text-center mt-5">Cadastro</p>

  <form class="row g-3" action="cadastrar.php">
  <div class="col-sm-6 mt-3">
    <label for="fname" class="form-label">Nome:</label>
    <input type="text" id="fname" name="nome" class="form-control">
</div>
<div class="col-sm-6  mt-3">
    <label for="lname" class="form-label">Sobrenome:</label>
    <input type="text" id="lname" name="sobrenome" class="form-control">
</div>

  <div class="col-sm-12  mt-3">
    <label for="lname" class="form-label">Email:</label>
    <input type="text" name="email" class="form-control">
</div>
<div class="col-sm-12  mt-3">
    <label for="password" class="form-label">Senha:</label>
    <input type="password" name="senha" class="form-control"> <br>
  <div class="col-12">
  <input type="submit" class="btn btn-primary" value="Cadastrar">
  </div>
</form>

</body>
</html>

