<!DOCTYPE html>
<html>
<?php
require_once "include/headcadastro.php";
?>
</head>
<body>
    <section>
      <div class="form-box">
        <div class="form-value">
          <form name="form"  method="post" action="cadastrar.php">
            <h2 class="h2color"> Cadastro </h2>
							<div class="inputbox">
                <ion-icon name="people-outline"></ion-icon>
                  <input type="text" name="nome" id="nome" required>
                  <label for="name">Nome</label>
               </div>
                  <div class="inputbox">
                    <ion-icon name="people-outline"></ion-icon>
                      <input type="text" name="sobrenome" id="sobrenome" required>
                      <label for="sobrenome">Sobrenome</label>
                  </div>
                      <div class="inputbox">
                        <ion-icon name="mail-outline"></ion-icon>
                          <input type="email" name="email" id="email" required>
                          <label for="email">Email</label>
                      </div>
                        <div class="inputbox">
                          <ion-icon name="lock-closed-outline"></ion-icon>
                            <input type="password" name="senha" id="senha" required>
                            <label for="senha">Senha</label>
                        </div>

                        <div class="inputbox">
                          <ion-icon name="location-outline"></ion-icon>
                            <input type="text" name="bairro" id="bairro" required>
                            <label for="bairro">Bairro</label>
                        </div>
                        <div class="inputbox">
                          <ion-icon name="home-outline"></ion-icon>
                            <input type="text" name="rua" id="rua" required>
                            <label for="rua">Rua</label>
                        </div>
                        <div class="inputbox">
                        <ion-icon name="search-outline"></ion-icon>
                          <input type="text" name="numero" id="numero" required>
                          <label for="numero">Numero</label>
                      </div>

                          <button name="cadastro"> Cadastrar </button>
                    <div class="register">
                      <p>Já tem uma conta? <a href="acesso.php"> <br> Entrar</a></p>
                  </div>
              </form>
            </div>
        </div>
    </section>
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>

    <?php 
      require_once "conexao.php";
      //verificar o botão
      if (isset($_REQUEST["cadastro"])) {
        try{
          //gravação dos dados
          $nome = $_REQUEST["nome"];
          $sobrenome = $_REQUEST["sobrenome"];
          $email = $_REQUEST["email"];
          $senha = $_REQUEST["senha"];
          $bairro = $_REQUEST["bairro"];
          $rua = $_REQUEST["rua"];
          $numero = $_REQUEST["numero"];
          $tipo = 1;

          //senha hash
          $hash = password_hash($senha, PASSWORD_DEFAULT);

          //gravação de dados com a tabela
          $sql = $conn->prepare("INSERT INTO tbl_cadastro (id, nome, sobrenome, email, senha, bairro, rua, numero)
                                  VALUES (:id, :nome, :sobrenome, :email, :senha, :bairro, :rua, :numero) ");

          //passagem de parametros para a tabela
          $sql->bindValue(":id", null);
          $sql->bindValue(":nome", $nome);
          $sql->bindValue(":sobrenome", $sobrenome);
          $sql->bindValue(":email", $email);
          $sql->bindValue(":senha", $hash);
          $sql->bindValue(":bairro", $bairro);
          $sql->bindValue(":rua", $rua);
          $sql->bindValue(":numero", $numero);
          $sql->execute();

            //msg caso não ocorra erro
            echo "<script language=javascript>
            alert('Dados Cadastrados com Sucesso !!');
            location.href = 'acesso.php'; 
            </script>";
        }
        catch (PDOException $erro) {
          echo $erro->getMessage();
        }
      }
      $conn = null;
    ?>
</body>
</html>