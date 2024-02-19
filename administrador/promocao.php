<?php
require_once "../login/restrito.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="css/responsive.css">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <script src = "js/bootstrap.min.js"> </script>
    <title>Promoção</title>
</head>
<body>

<?php 
 require_once "include/navbar.php";
?>   <link rel="stylesheet" href="style.css">

    <form name="promocao" method="POST" action="promocao.php" enctype="multipart/form-data">

   <p class="fs-1 text-center mt-5 pclass">Adicionar Promoção</p>
        <div class="container">
            <div class="row">
                <div class="col-sm-12  mt-3">
                <h3><font color="white"> Nome da Promoção</font><h3>
                    <input type="text" id="fname" name="nomeproduto" class="form-control">
                </div>
                        <div class="col-md-12  mt-3">
                        <h3><font color="white"> Imagem</font><h3>
                            <input type="file" name="arquivo" id="arquivo" class="form-control"><br>
                        </div>
                        <input type="submit" class="btn btn-primary" name="btcadastrar" value="cadastrar">
            </div>
            </form>
        </div> 

    <div align= "center"> 

    <?php 
        require_once "conexao.php";
            try{
                if (isset($_REQUEST["btcadastrar"])) {
                    // receber dados
                    $nome = $_REQUEST['nomeproduto'];



                    //definindo timezone - data e hora
                    date_default_timezone_set ('America/Sao_Paulo');
                    $data = date("d-m-Y");
                    $time = date("H-i-s");
    
                    // função random
                    $num= rand(1,10000000000);

                    //verifica o arquivo para upload
                    $nomeimg =  $_FILES["arquivo"]["name"];
                    $temp =     $_FILES["arquivo"]["tmp_name"];
                    $tamanho =  $_FILES["arquivo"]["size"];
                    $tipoimg =  $_FILES["arquivo"]["type"];
                    $erro =     $_FILES["arquivo"]["error"];

                    //verifica a extensao do arquivo
                    $ext = pathinfo ($nomeimg, PATHINFO_EXTENSION);

                    if (($ext != 'jpg') and  ($ext != 'png')){
                        echo "<script language=javascript>
                        alert('SÓ É POSSÍVEL FAZER UPLOAD DE ARQUIVO COM EXTENSÃO JPG OU PNG!!');
                        location.href = 'promocao.php';
                        </script>";     
                     exit;
                    }

                    if ($tamanho > 900000 ){
                        echo "<script language=javascript>
                        alert(' VERIFIQUE O TAMANHO DO SEU ARQUIVO!!');
                        location.href = 'promocao.php';
                        </script>";     
                     exit;
                    }

                    //renomear o nome da imagem
                    $novo_nomeimg= 'imagem'.'_'.$data.'_'.$time.'_'.$num.'.'.$ext;
    
                    //Comando para mover o arquivo para a pasta
                    $mover = move_uploaded_file($temp, '../usuario/imgs/'.$novo_nomeimg); 

                    //CRIANDO CAMINHO DO ARQUIVO
                    $arquivo = '../usuario/imgs/'.$novo_nomeimg;

                    $sql = $conn->prepare("INSERT INTO tbl_promocao (idpromo, nomeproduto, arquivo)
                                            VALUES (:idpromo, :nomeproduto, :arquivo)");

                    $sql->bindValue(':idpromo', null);
                    $sql->bindValue(':nomeproduto', $nome);
                    $sql->bindValue(':arquivo', $arquivo);
                    $sql->execute();

                    echo "<script language=javascript>
                    alert('Dados gravados com sucesso!!');
                    location.href = 'promocao.php';
                    </script>";
                }
            }catch (PDOException $erro){
                echo $erro->getMessage();
            }
     // ABRIR CONSULTA
    ?>

    <p class="fs-2 text-center mt-5 pclass">Alterar informações</p> 
        <div class="container mt-5"> 
            <table class="table table-bordered text-center">
                <tr class="bg-light">
                    <th scope="col">ID PRODUTO</th>
                    <th scope="col">Nome do produto</th>
                    <th scope="col">Imagem</th>
                    <th scope="col"> Ações </th>
                </tr>

    <?php 

        try {
            // criar a variavel consulta
            $consulta = $conn->prepare("SELECT * FROM tbl_promocao");
            $consulta->execute();

            // codigo para consultar
            while ($row = $consulta->fetch(PDO::FETCH_ASSOC)){
    ?>
                <tr>
                    <td height="94"> <?php echo $row["idpromo"]?> </td>
                    <td colspan=""><?php echo $row["nomeproduto"]?> </td>
                    <td><?php echo "<img src='$row[arquivo]' width='100' height='100'> "; ?></td>

                    <td> 
                         <a href="promocao.php?ex=<?php echo $row["idpromo"];?>">Excluir</a>
                    </td>


                </tr>

<?php 

                //rec dados
                $foto = $row['arquivo'];
            }

        if(isset($_REQUEST['ex'])) {

        $idpromo = $_REQUEST['ex'];

        //apagar imagem
        unlink($foto);

        //criar varivael excluir
        $excluir = $conn->prepare("DELETE FROM tbl_promocao where idpromo = :idpromo;");
        $excluir->bindValue(':idpromo', $idpromo);
        $excluir->execute();

        echo "<script language=javascript>
        alert('Dados excluidos com sucesso!!');
        location.href = 'promocao.php';
        </script>"; 
    }
        } catch (PDOException $erro) {
            echo $erro->getMessage();
        }

        //fechar conn
        $conn = null;
?>
    
        </table>
</div>
</body>
</html>