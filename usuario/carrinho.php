
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

  <meta name="keywords" content="" />
  <meta name="description" content="" />
  <meta name="author" content="" />

  <title> Carrinho </title>

    <!-- Site Icons -->
    <link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon">
    <link rel="apple-touch-icon" href="images/apple-touch-icon.png">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">    
	<!-- Site CSS -->
    <link rel="stylesheet" href="css/style.css">    
    <!-- Responsive CSS -->
    <link rel="stylesheet" href="css/responsive.css">
    <!-- Custom CSS -->
	<link rel="stylesheet" href="css/custom.css">
	<!-- Custom ICON -->
	<script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
  <style>
    .continuar-comprando {
    margin-right: 10px; 
}

.resetar {
    margin-left: 10px;
}

.centro {
    display: flex;
    flex-direction: column;
    align-items: center;
    text-align: center;
}
.destaque {
            font-weight: bold;
            text-align: center;
        }

</style>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

</head>
<body>
<div class="">
    <!-- cabeçalho -->
    <header class="header_section">
      <div class="container-fluid">
          </div>
        </nav>
        <nav class="navbar bg-info border-bottom border-body" data-bs-theme="info"> 

          <nav class="navbar navbar-expand-lg bg-body-tertiary">    
            <div class="container-fluid">       
              <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
              <div class="navbar-nav">
                  <a class="nav-link text-clear btn btn-dark continuar-comprando" href="index.php">Continuar Comprando</a><br>
                </div>
                <div class="navbar-nav">
                <a class="nav-link text-clear btn btn-primary resetar" href="carrinho.php?reset=true">Redefinir Carrinho</a><br>
</div>
              </div>              
            </div>
          </nav>
      </div>
          
    </header>
    <h1 class="centro">ITENS NO CARRINHO <img src="images/carrinho.png" width="70" height="70" alt="carrinho"></h1>

<div class="centro">
  <h3 class="destaque">Finalizar Compra</h3>
  <form action="carrinho.php" method="post">
    <label for="nome"><h3 class="destaque">Nome:</h3></label>
    <input type="text" id="nome" name="nome" required><br><br>

    <label for="endereco"><h3 class="destaque">Endereço de Entrega:</h3></label>
    <input type="text" id="endereco" name="endereco" required><br><br>

    <label for="formapagamento"><h3 class="destaque">Forma de Pagamento:</h3></label>
    <select id="formapagamento" name="formapagamento" required>
      <radio value="cartao">Cartão de Crédito</radio>
      <radio value="dinheiro">Dinheiro</radio>
    </select><br><br>

    <input type="submit" value="Finalizar Compra" name="btncomprar" class="btn btn-success">

  </form>
</div>
<?php
try {
    require_once "../administrador/conexao.php";

    if (isset($_REQUEST["btncomprar"])) {
        $nome = $_REQUEST["nome"];
        $endereco = $_REQUEST["endereco"];
        $formapagamento = $_REQUEST["formapagamento"];
        $id = $conn->lastInsertId();
        foreach ($carrinho as $item) {
            $produto = $item["produto"];
            $opcao = $item["opcao"];
            $quantidade = $item["quantidade"];
            $total = 0;
            $total += $item["quantidade"] * $item["preco"];


            $cartSql = $conn->prepare("INSERT INTO tbl_compras (id, nome, endereco, formapagamento, produto, opcao, quantidade, preco)
                VALUES (:id, :nome, :endereco, :formapagamento, :produto, :opcao, :quantidade, :preco)");

            $cartSql->bindValue(':id', $d);
            $cartSql->bindValue(':nome', $nome);
            $cartSql->bindValue(':endereco', $endereco);
            $cartSql->bindValue(':formapagamento', $pagamento);
            $cartSql->bindValue(':produto', $produto);
            $cartSql->bindValue(':opcao', $opcao);
            $cartSql->bindValue(':quantidade', $quantidade);
            $cartSql->bindValue(':preco', $total);
            $cartSql->execute();
        }

        echo "<script language=javascript>
        alert('Compra realizada, seu pedido chegará em breve.');
        location.href = 'teste.html';
        </script>";
    }
} catch (PDOException $erro) {
    echo $erro->getMessage();
}
?>


</body>
</html>