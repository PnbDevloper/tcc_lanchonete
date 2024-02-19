
<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="css/pag-protegida.css">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <script src = "js/bootstrap.min.js"> </script>
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
<title>Página Protegida</title>
</head>
<body>
    <section>
      <div class="form-box">
        <div class="form-value">
              <form name="form"  method="post" action="verificacao.php">
                <h2 class="h2color"> Insira a senha <br>para acessar </h2>
                  <div class="inputbox">
                      <ion-icon name="lock-closed-outline"></ion-icon>
                        <input type="password" name="senha" id="senha" required>
                      <label for="senha">Senha</label>
                    </div>
                  <button name="entrar"> Entrar </button>
              </form>
            </div>
        </div>
    </section>
</body>
</html>