<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/esqueceu_senha.css">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <script src = "js/bootstrap.min.js"> </script>

    <title>Login</title>
</head>
<body>
    <section>
        <div class="form-box">
            <div class="form-value">
                <form name="form"  method="post" action="esqueceu_senha.php">
                    <h2 class="h2color"> Recuperação <br>de senha </h2>
                    <div class="inputbox">
                        <ion-icon name="mail-outline"></ion-icon>
                           <input type="email" name="email" required>
                           <label for="email">Email</label>
                    </div>
                        <div class="inputbox">
                            <ion-icon name="lock-closed-outline"></ion-icon>
                            <input type="password" name="nova_senha" required>
                            <label for="nova_senha">Nova senha</label>
                        </div>
                        <div class="inputbox">
                            <ion-icon name="lock-closed-outline"></ion-icon>
                            <input type="password" name="conf_senha" required>
                            <label for="conf_senha">Confirmar senha</label>
                        </div>
                            <button name="solicitar"> solicitar </button>
                    <div class="register">
                        <p><a href="acesso.php"> <br> Voltar</a></p>
                    </div>
                </form>
             </div>
        </div>
    </section>
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>

    <?php 

    require_once "conexao.php";

    try {
    if (isset($_REQUEST['solicitar'])) {

        $email = $_REQUEST['email'];
        $nova_senha = $_REQUEST['nova_senha'];
        $conf_senha = $_REQUEST['conf_senha'];
        $email = $_SESSION['email'];

        $hash = password_hash($nova_senha, PASSWORD_DEFAULT);

        $consulta->bindValue("SELECT senha FROM tbl_cadastro WHERE email=:email;");

        $consulta->bindValue(':email', $email);
        $consulta->execute();

        $row = $consulta->fetch(PDO::FETCH_ASSOC);

        if ($nova_senha == $conf_senha and password_verify($senha, $row["senha"])) {
            $sql = $conn->prepare("UPDATE tbl_cadastro SET senha=:hash WHERE email=:email");

            $sql->bindValue(':hash', $hash);
            $sql->bindValue(':email', $email);
            $sql->execute();

            echo "<script language=javascript>
            alert('Senha alterada com sucesso !!');
            location.href = 'login.php';
            </script>";
            
        }
    }
} catch (PDOException $erro) {
    echo $erro->getMessage();
}
$conn = null;

    ?>
</body>
</html>