<link rel="stylesheet" type="text/css" href="">

<?php

require_once "conexao.php";

?>
	
  <p class="fs-2 text-center mt-5 pclass">Cadastro</p>  
    <div class="container mt-5">
        <table class="table table-bordered text-center">
            <tr class="bg-light">
              <th scope="col"> ID </th>
              <th scope="col"> NOME PRODUTO </th>
              <th scope="col"> CATEGORIA </th>
              <th scope="col"> IMAGEM </th>
              <th scope="col"> Ações </th>
            </tr>
   

<?php
  try{

    $consulta = $conn->prepare("SELECT * FROM tbl_cardapio");

    $consulta->execute();

    while ($row = $consulta->fetch(PDO::FETCH_ASSOC)){

    ?>

    <tr>
        <td><?php echo $row["id"] ?></td>
        <td><?php echo $row["idcategoria"] ?></td>
        <td><?php echo $row["ctgcardapio"] ?></td>
        <td><?php echo "<img src='$row[imagem]' width='100' height='100'> "; ?></td>
        <td> 
          <a href="cardapio.php?ex=<?php echo $row["id"]; ?>">Excluir</a>
        </td>
    </tr>
    <?php
  
    }
  } catch(PDOException $erro){
    echo $erro->getMessage();

  }

  ?>
</table>
<?php 

try {

if(isset($_REQUEST["ex"])){

    $id = $_REQUEST["ex"]; 

    $delete = $conn->prepare("DELETE FROM tbl_cardapio WHERE id=:id");

    $delete->bindValue(':id',$id);

    $delete ->execute();

    echo "<script language=javascript>
    alert('Dados excluidos com Sucesso !!');
    location.href= 'cardapio.php';
    </script>";
  }
} catch(PDOException $erro){
  echo $erro->getMessage();
}

$conn

?>

