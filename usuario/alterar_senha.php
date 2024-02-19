<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="css/alterar_senha.css">
    <link href="../administrador/css/bootstrap.min.css" rel="stylesheet">
    <script src = "../administradorjs/bootstrap.min.js"> </script>
    <title>Alterar senha</title>
</head>
<body>
    <section>
        <div class="form-box">
            <div class="form-value">
                <form name="form" method="post" action="alterar_senha.php">
                    <h2 class="h2color"> Altere sua senha </h2>
                        <div class="inputbox">
                            <ion-icon name="#"></ion-icon>
                            <input type="password" name="senha" required>
                            <label>Sua senha atual</label>
                        </div>
                        <div class="inputbox">
                            <input type="password" name="nova_senha" required>
                            <label> Nova senha</label>
                        </div>
                        <div class="inputbox">
                            <input type="password" name="conf_senha" required>
                            <label>Confirme sua senha</label>
                        </div>

                        <button type="submit" name="btalterar">Alterar</button>

                        <div class="register">
                            <p><a href="perfil.php"> <br> Voltar</a></p>
                        </div>
                </form>
            </div>
        </div>
    </section>
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>

<?php

    require_once "conexao.php";
    require_once "restrito.php";
  


    try{
        if(isset($_REQUEST['btalterar'])){
            $senha = $_REQUEST['senha'];
            $nova_senha = $_REQUEST['nova_senha'];
            $conf_senha = $_REQUEST['conf_senha'];
            $email = $_SESSION['email'];

            $hash = password_hash($nova_senha, PASSWORD_DEFAULT);

            $consulta = $conn->prepare("SELECT senha FROM tbl_cadastro where email=:email;");

            $consulta->bindValue(':email', $email);
            $consulta->execute();

            $row = $consulta->fetch(PDO::FETCH_ASSOC);

            if($nova_senha == $conf_senha and password_verify($senha, $row["senha"])){

                $sql = $conn;
            }

                    echo "<script language=javascript>
                    alert('Dados trocados com sucesso!!!');
                    location.href = 'sair.php';
                    </script>";
        }
    }catch (PDOException $erro) {
        echo $erro->getMessage();
    }
    ?>
</body>
</html>