<!DOCTYPE html>
<html >
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="css/perfil.css">

    <link href="../administrador/css/bootstrap.min.css" rel="stylesheet">
    <script src = "../administradorjs/bootstrap.min.js"> </script>
    <title>Perfil</title>
</head>
<body>
    <?php
        require_once "restrito.php";
    ?>

    <section>
        <div class="form-box">
            <div class="form-value">
                <form name="form"  method="post" action="sair.php">
                    <h2 class="h2color"> Perfil  </h2>
                        <div class="inputbox h2color">
                            <p class="custom-text"><?php echo $_SESSION["nome"]; ?></p>
                        </div>
                        <div class="inputbox h2color">
                        <p class="custom-text"><?php echo $_SESSION["email"]; ?></p>
                        </div><br>

                        <div class="forget">
                                <label for=""><a href="alterar_senha.php">  Deseja alterar a senha?</a></label>
                        </div>
                       
                        
                        <button name="sair"> sair</a> </button> <br><br><br>
                        
                            <div class="forget">
                                <label for=""><a href="index.php"> Voltar ao site</a></label>
                            </div>
                </form>
            </div>
        </div>
    </section>

        <a href="sair.php">Sair</a>

</body>
</html>