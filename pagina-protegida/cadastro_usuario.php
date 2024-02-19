<?php
require_once "../login/restrito.php";
?>
<!DOCTYPE html>
<html>
<head>

  <link rel="stylesheet" href="css/cadastro_usuario.css">
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <script src = "js/bootstrap.min.js"> </script>
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <title>usuario</title>
</head>
<body>
  <section>
    <div class="form-box">
      <div class="form-value">
        <form name="form_cad" method="post" action="cadastro_usuario.php">
          <h2 class="h2color">Cadastro<br>Administrativo</h2>
          <div class="inputbox">
            <input type="text" name="nome" id="nome" required>
            <label for="nome">Nome completo</label>
          </div>
            <div class="inputbox">
              <input type="text" name="email" id="email" required>
              <label for="email">Email</label>
            </div>
              <div class="inputbox">
                <input type="password" name="senha" id="senha" required>
                <label for="senha">Senha</label>
              </div>
                  <label class="form-label" for="tipo"> TIPO </label>
                  <select id="tipo"  name="tipo" class="form-select select1" value="<?php if(isset($row['tipo'])) {echo $row['tipo'];} ?>"  >
                  <option value="1"> Administrador</option>
                      <option value="0"> Padrão </option>
                    </select> <br>

                    <button name="cadastro"> Cadastrar </button>
        </form>
      </div>
    </div>
  </section>

  <?php 
      require_once "conexao.php";
      //verificar o botão
      if (isset($_REQUEST["cadastro"])) {
        try{
          //gravação dos dados
          $nome = $_REQUEST["nome"];
          $email = $_REQUEST["email"];
          $senha = $_REQUEST["senha"];
          $tipo = $_REQUEST["tipo"];
          
          $hash = password_hash($senha, PASSWORD_DEFAULT);

          //gravação de dados com a tabela
          $sql = $conn->prepare("INSERT INTO tbl_cadastro (id, nome, senha, email, tipo)
                                  VALUES (:id, :nome, :senha, :email, :tipo) ");

          //passagem de parametros para a tabela
          $sql->bindValue(":id", null);
          $sql->bindValue(":nome", $nome);
          $sql->bindValue(":senha", $hash);
          $sql->bindValue(":email", $email);
          $sql->bindValue(":tipo", $tipo);
          $sql->execute();

            //msg caso não ocorra erro
            echo "<script language=javascript>
            alert('Dados Cadastrados com Sucesso !!');
            location.href = 'cadastro_usuario.php'; 
            </script>";
        }
        catch (PDOException $erro) {
          echo $erro->getMessage();
        }
      }
?>
<div class="container mt-5">
<table class="table table-bordered text-center">

<tr class="bg-light">
  <th scope="col"> ID </th>
  <th scope="col"> NOME </th>
  <th scope="col"> EMAIL </th>
  <th scope="col"> TIPO </th>
  <th scope="col"> EDITAR </th>
  <th scope="col"> EXCLUIR </th>
</tr>

<?php 

try {
$consulta = $conn->prepare("SELECT * FROM tbl_cadastro where tipo=1");

$consulta->execute();

while($row = $consulta->fetch(PDO::FETCH_ASSOC)) {
?>
    <tr>
      <td><?php echo $row["id"] ?> </td>
      <td><?php echo $row["nome"] ?> </td>
      <td><?php echo $row["email"] ?> </td>
      <td>
              <?php if ($row["tipo"] == 0) {
              ?>
                Padrão
              <?php
              } else {
              ?>
                Administrador
              <?php
              } ?>
            </td>
      <td>
        <a href="editar.php?al=<?php echo $row["id"]; ?>">Editar </a>
      </td>
      <td>
        <a href="cadastro_usuario.php?ex=<?php echo $row["id"]; ?>"> Excluir </a>
      </td>

    </tr>

<?php

 }

} catch(PDOException $erro){
  echo $erro->getMessage();
}
?>


<?php 

try{

  if(isset($_REQUEST["ex"])){
  
    $id = $_REQUEST["ex"];
  
    $delete = $conn->prepare("DELETE FROM tbl_cadastro WHERE id=:id");
  
    $delete->bindValue(':id',$id);
  
    $delete ->execute();
  
    echo "<script language=javascript>
  
    alert('Dados excluidos com Sucesso !!');
  
    location.href = 'cadastro_usuario.php';
  
    </script>";
  
   }  
  
  }catch(PDOException $erro){
  
    echo $erro->getMessage();
  
  }
  
   $conn = null;
   ?>

   <a href="../administrador/adm.php"> Voltar</a>
 </div>
</body>
</html>

