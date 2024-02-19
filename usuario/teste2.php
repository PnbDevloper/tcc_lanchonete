<!DOCTYPE html>
<html>
<head>
  <title>Carrinho de compras</title>
</head>
<body>
  <h1>Carrinho de compras</h1>
  <ul>
    <?php
    // Conectar ao banco de dados
    $conn = new mysqli("localhost", "root", "", "lanchonete");
    // Obter os produtos do carrinho de compras
    $sql = "SELECT * FROM carrinho_de_compras";
    $result = $conn->query($sql);
    // Exibir os produtos do carrinho de compras
    while ($row = $result->fetch_assoc()) {
      echo "<li>" . $row['nome'] . " - R$" . $row['preco'] . "</li>";
    }
    // Fechar a conexão com o banco de dados
    $conn->close();
    ?>
  </ul>
  <p>Total: R$ <?php echo $carrinho->calcularTotal(); ?></p>
  <form action="checkout.php" method="post">
    <input type="submit" value="Checkout">
  </form>
</body>
</html>

