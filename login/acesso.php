<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/login.css">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <script src = "js/bootstrap.min.js"> </script>

    <title>Login</title>
</head>
<body>
    <section>
        <div class="form-box">
            <div class="form-value">
                <form name="form"  method="post" action="login.php">
                    <h2 class="h2color"> Login </h2>
                    <div class="inputbox">
                        <ion-icon name="mail-outline"></ion-icon>
                           <input type="email" name="email" required>
                           <label for="email">Email</label>
                    </div>
                        <div class="inputbox">
                            <ion-icon name="lock-closed-outline"></ion-icon>
                            <input type="password" name="senha" required>
                            <label for="senha">Senha</label>
                        </div>
                                                <div class="forget">
                            <label for=""><a href="esqueceu_senha.php">  Esqueceu a senha?</a></label>
                        </div>
                            <button name="login"> Entrar </button>
                                                <div class="register">
                        <p>Não tenho uma conta? <a href="cadastrar.php"> <br> Cadastre-se</a></p>
                    </div>

                </form>
             </div>
        </div>
    </section>
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</body>
</html>