<?php
require_once "restrito.php";
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="css/responsive.css">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <script src = "js/bootstrap.min.js"> </script>
    <title>Cardapio</title>
</head>
<body>

<?php 
    require_once "include/navbar.php";
?>
<link rel="stylesheet" href="style.css">
  </nav>

<p class="fs-1 text-center mt-5 pclass" >Adicionar Cardapio</p> 
    <div class="container">
      <form name="cardapio" action="cardapio.php" method="POST" enctype="multipart/form-data">
        <div class="row"> 
          <div class="col-sm-12  mt-3">
          <h3><font color="white">Nome Produto</font> </h3>
            <input type="text" name="idcategoria" class="form-control">
          </div>
          <div class="col-sm-12  mt-3">
          <h3><font color="white">Categoria</font> </h3>
              <select id="ctgcardapio" name="ctgcardapio" class="form-select">
                <?php
                  require_once "conexao.php";
                  $consulta = $conn->prepare("SELECT * FROM tbl_categoria");
                  $consulta->execute();
                  while ($row = $consulta->fetch(PDO::FETCH_ASSOC)){
                  ?>
                  <option><?php echo $row["categoria"]; ?></option>
                <?php 
                  }
                ?>
              </select><br>
          </div>
        </div>

        <div class="col-md-12  mt-3">
        <h3><font color="white">Imagem</font> </h3>
            <input type="file" name="imagem" id="input" class="form-control"><br>
          </div>  
          <div class="col-sm-12  mt-3">
            <input type="submit" name="Cadastrar" class="btn btn-primary" value="Cadastrar "> <br> 
          </div>
      </form>
    </div>
<div align= "center"> 
  <?php 
    require_once "conexao.php";

    if (isset ($_REQUEST["Cadastrar"])) {

    try{
    $ctgcardapio = $_REQUEST["ctgcardapio"];
    $idcategoria = $_REQUEST["idcategoria"];

    //cod up
     //timezone - data & hora
      date_default_timezone_set ('America/Sao_Paulo');
      $data = date("d-m-Y");
     $time = date("H-i-s");

    // função random
    $num = rand(1,10000000000);

    //verifica o arquivo up
    $nomeimg = $_FILES["imagem"]["name"];
    $temp = $_FILES["imagem"]["tmp_name"];
    $tamanho = $_FILES["imagem"]["size"];
    $tipoimg = $_FILES["imagem"]["type"];
    $erro = $_FILES["imagem"]["error"];

    // verifica a extensão
    $ext = pathinfo ($nomeimg, PATHINFO_EXTENSION);

    if(($ext != 'jpg') and ($ext != 'png')){
      echo "<script language=javascript>
          alert('SÓ É POSSÍVEL FAZER UPLOAD DE ARQUIVO COM EXTENSÃO JPG OU PNG!!');
          location.href = 'cardapio.php';
          </script>"; 
        exit;
        }

    if ($tamanho > 1000000 ) {
      echo "<script language=javascript>
            alert(' VERIFIQUE O TAMANHO DO SEU ARQUIVO!!');
            location.href = 'cardapio.php';
            </script>";   
        exit;
        }
                        
    //renomear a img
    $novo_nomeimg= 'imagem'.'_'.$data.'_'.$time.'_'.$num.'.'.$ext;

    // comando para mover o arquivo img
    $mover = move_uploaded_file($temp, 'img/'.$novo_nomeimg);

    $arquivo = 'img/'.$novo_nomeimg;
    
    //inicar gravação de dados na tabela do bando BD_ADM
      $sql = $conn->prepare("INSERT INTO tbl_cardapio (id, idcategoria, ctgcardapio, imagem)
                            VALUES (:id, :idcategoria, :ctgcardapio, :imagem) ");

    //passagem de parametros para a tabela

      $sql->bindValue(':id', null);
      $sql->bindValue(':idcategoria', $idcategoria);
      $sql->bindValue(':ctgcardapio', $ctgcardapio);
      $sql->bindValue(':imagem', $arquivo);

      //execução da query de inserção
      $sql->execute();

      //msg caso não ocorra erro
      echo "<script language=javascript>
      alert('Dados gravados com Sucesso !!');
      location.href = 'cardapio.php';
      </script>";
    } // caso não executar captura o erro no sgbd 
    catch (PDOException $erro ) {
      echo $erro->getMessage(); 
    }

  }

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
</div>
</body>
</html>