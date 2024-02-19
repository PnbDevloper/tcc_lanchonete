<?php
require_once "../login/restrito.php";
?>
<!DOCTYPE html>
<html >
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="css/responsive.css">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <script src = "js/bootstrap.min.js"> </script>
    <title>Catalogos</title>
</head>
<body>
 <?php 
 require_once "include/navbar.php";
?>
 <link rel="stylesheet" href="style.css">
<p class="fs-1 text-center mt-5 pclass">Adicionar Categoria</p>
    <div class="container">

    <form name="categoria" method="POST" action="categoria.php">
        <div class="row">
            <div class="col-sm-12  mt-3">
            <h3><font color="white">Categoria</font> </h3>
                <input type="text" id="fname" name="categoria" class="form-control">
            </div>
            <div class="col-12  mt-3">
                <input type="submit" value="cadastrar" name="btcadastrar" class="btn btn-primary">
            </div>
        </div>
        
    </form> 
</div>

<div align= "center"> 
    <?php 
    require_once "conexao.php";

    if (isset($_REQUEST["btcadastrar"])) {

        $cat = $_REQUEST['categoria'];
        

        //inicia gravação de dados
        try{  

            $sql = $conn->prepare("INSERT INTO tbl_categoria (idcat, categoria)
                                VALUES (:idcat, :categoria)");


            //passagem de parametros para a tabela cat

            $sql->bindValue(':idcat', null);
            $sql->bindValue(':categoria', $cat);


            //execução da query de inserção
            $sql->execute();

            
            //msg caso não ocorra erro
            echo "<center> <script language=javascript>
            alert('Dados gravados com Sucesso !!');
            location.href = 'categoria.php'; 
            </script> </center";
        }
        catch (PDOException $erro ) {
            echo $erro->getMessage(); 
        }
    }

    ?>

    <p class="fs-2 text-center mt-5 pclass">Cadastro de Categorias</p>  

    <div class="container mt-5">
    <table class="table table-bordered text-center">
        <tr class="bg-light">
            <th scope="col"> ID </th>
            <th scope="col"> CATEGORIA </th>
            <th scope="col"> Ações </th>
        </tr>

    <?php 
        try{

            $consulta = $conn->prepare("SELECT * FROM tbl_categoria");

            $consulta->execute();

            while($row = $consulta->fetch(PDO::FETCH_ASSOC)){

            ?>

            <tr>
                <td><?php echo $row["idcat"] ?></td>
                <td><?php echo $row["categoria"] ?></td>


                <td>
                    <a href="categoria.php?ex=<?php echo $row["idcat"]; ?>">Excluir</a>
                </td>
                

            </tr>

                <?php
            }
        }catch(PDOException $erro){
            echo $erro->getMessage();
        }
    ?>
    </table>
    <?php 

    try {

    if(isset($_REQUEST["ex"])){

        $idcat = $_REQUEST["ex"]; 

        $delete = $conn->prepare("DELETE FROM tbl_categoria WHERE idcat=:idcat");

        $delete->bindValue(':idcat',$idcat);

        $delete ->execute();

        echo "<script language=javascript>
        alert('Dados excluidos com Sucesso !!');
        location.href= 'categoria.php';
        </script>";
        }
    }catch(PDOException $erro){
        echo $erro->getMessage();
    }

$conn

?>
</div>
</body>
</html>


