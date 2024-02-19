<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Login</title>
</head>
<body>
    <?php 
        require_once "conexao.php";
            try {
                if (isset($_REQUEST["login"])) {
                    $email = $_REQUEST["email"];
                    $senha = $_REQUEST["senha"];

                    $consulta = $conn->prepare("SELECT nome, email, situacao, tipo, senha FROM tbl_cadastro WHERE email=:email");
                    $consulta->bindValue(":email", $email);
                    $consulta->execute();
                    
                    $row = $consulta->fetch(PDO::FETCH_ASSOC);
                    $total_rows = $consulta->rowCount();
                }
                if ($row['situacao'] == '0') {

                    echo "<script language=javascript>
                    alert('Usuario inativo!!');
                    location.href = 'acesso.php';
                    </script>";
                    exit;
                }
                if($total_rows > 0 and password_verify($senha, $row["senha"])) {
                    SESSION_START();
                    $_SESSION['email'] = $row ['email'];
                    $_SESSION['senha'] = $row ['senha'];
                    $_SESSION['nome'] = $row ['nome'];
                }else{
                    echo "<script language=javascript>
                    alert('Erro no login!');
                    location.href = 'acesso.php';
                    </script>";
                    exit;
                }

                if ($row['tipo'] == '1') {
                    header("location:../administrador/adm.php");
                }

                if ($row['tipo'] == '0') {
                    header("location:../usuario/index.php");
                }
            }
            catch (PDOException $erro) {
                echo $erro->getMessage();
            }
    ?>
</body>
</html>