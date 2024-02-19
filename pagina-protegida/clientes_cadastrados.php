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
  <title>Contatos</title>
</head>
<body>
<style>
    .modal {
        display: none;
        position: fixed;
        z-index: 999;
        left: 0;
        top: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(0, 0, 0, 0.7);
    }

    .modal-content {
        background-color: white;
        margin: 15% auto;
        padding: 20px;
        border: 1px solid #888;
        width: 80%;
        max-width: 600px;
    }

    .close {
        color: #aaa;
        float: right;
        font-size: 28px;
        font-weight: bold;
        cursor: pointer;
    }

    .close:hover,
    .close:focus {
        color: black;
        text-decoration: none;
        cursor: pointer;
    }
    
    .mensagem-popup {
        max-height: 300px;
        overflow-y: auto;
        word-wrap: break-word; /* Quebra de palavras */
        white-space: pre-wrap; /* Manutenção de quebras de linha */
        max-width: 100%; /* Largura máxima igual à largura do modal */
    }
</style>

  <?php 
      require_once "conexao.php";

?>
<div class="container mt-5">
<table class="table table-bordered text-center">

<tr class="bg-light">
  <th scope="col"> ID </th>
  <th scope="col"> NOME </th>
  <th scope="col"> EMAIL </th>
  <th scope="col"> NUMERO </th>
  <th scope="col"> MENSAGEM </th>
  <th scope="col"> excluir </th>


</tr>

<?php 

try {
$consulta = $conn->prepare("SELECT * FROM tbl_contatos");

$consulta->execute();

while($row = $consulta->fetch(PDO::FETCH_ASSOC)) {
?>
    <tr>
      <td><?php echo $row["id"] ?> </td>
      <td><?php echo $row["nome"] ?> </td>
      <td><?php echo $row["email"] ?> </td>
      <td><?php echo $row["numero"] ?> </td>
<td>
    <?php
    $mensagem = $row["mensagem"];
    $limite_caracteres = 30;

    if (strlen($mensagem) > $limite_caracteres) {
        echo '<span class="mensagem-resumida">' . substr($mensagem, 0, $limite_caracteres) . '...</span>';
        echo '<span class="mensagem-completa" style="display:none;">' . $mensagem . '</span>';
        echo '<button onclick="mostrarPopup(`' . $mensagem . '`)">Ver mais</button>';
    } else {
        echo $mensagem;
    }
    ?>
</td>
<script>
    function mostrarPopup(mensagemCompleta) {
        var modal = document.createElement('div');
        modal.classList.add('modal');

        var modalContent = document.createElement('div');
        modalContent.classList.add('modal-content');

        var closeBtn = document.createElement('span');
        closeBtn.classList.add('close');
        closeBtn.innerHTML = '&times;';
        closeBtn.onclick = function () {
            modal.style.display = 'none';
        };

        var mensagemElement = document.createElement('p');
        mensagemElement.classList.add('mensagem-popup'); // Adicionando a classe de estilo ao parágrafo
        mensagemElement.textContent = mensagemCompleta;

        modalContent.appendChild(closeBtn);
        modalContent.appendChild(mensagemElement);
        modal.appendChild(modalContent);
        document.body.appendChild(modal);

        modal.style.display = 'block';
    }
</script>

        <td> 
          <a href="clientes_cadastrados.php?ex=<?php echo $row["id"]; ?>">Excluir</a>
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
  
    $delete = $conn->prepare("DELETE FROM tbl_contatos WHERE id=:id");
  
    $delete->bindValue(':id',$id);
  
    $delete ->execute();
  
    echo "<script language=javascript>
  
    alert('Dados excluidos com Sucesso !!');
  
    location.href = 'clientes_cadastrados.php';
  
    </script>";
  
   }  
  
  }catch(PDOException $erro){
  
    echo $erro->getMessage();
  
  }
  
   $conn = null;
   ?>
 </div>

     
 <a href="../administrador/adm.php"> Voltar</a>

</body>
</html>

