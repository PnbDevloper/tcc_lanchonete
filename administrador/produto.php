<?php
require_once "../login/restrito.php";
?>
<!DOCTYPE html>
<html lang="pt-br">
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
<p class="fs-1 text-center mt-5 pclass">Adicionar Produto</p>
    <div class="container">
    <form method="POST" action="produto.php" enctype="multipart/form-data">
    <div class="row">
        <div class="col-sm-12  mt-3">
        <h3><font color="white"> Nome do Produto</font><h3>
            <input type="text" id="fname" name="produto" class="form-control">
        </div>

        <div class="col-sm-12  mt-3">
        <h3><font color="white">Categoria</font> </h3>
                <select id="categoria" name="categoria" class="form-select">
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
                </select> 
        </div>
        <div class="col-sm-12  mt-3">
        <h3><font color="white">Descrição</font> </h3>
            <input type="text" id="desc" name="desc" class="form-control">
        </div>
        <div class="col-sm-12  mt-3">
        <h3><font color="white">Preço</font> </h3>
            <input type="text" id="preco" name="preco" class="form-control">
        </div>
    </div>

    <div class="col-md-12  mt-3">
    <h3><font color="white"> Imagem</font> </h3>
     <input type="file" name="produtoimg" id="input" class="form-control">
    </div> <br>
        <input type="submit"  name="Cadastrar" value="Cadastrar" class="btn btn-primary"> 
    </form>
</div>
</div>
    <?php 
        require_once "conexao.php";
         if (isset ($_REQUEST["Cadastrar"])){
            try{

                $categoria = $_REQUEST['categoria'];
                $desc = $_REQUEST['desc'];
                $preco = $_REQUEST['preco'];
                $produto = $_REQUEST['produto'];


                //cod up
                //timezone - data & hora
                    date_default_timezone_set ('America/Sao_Paulo');
                    $data = date("d-m-Y");
                    $time = date("H-i-s");

                    // função random
                    $num = rand(1,10000000000);

                    //verifica o arquivo up
                    $nomeimg = $_FILES["produtoimg"]["name"];
                    $temp = $_FILES["produtoimg"]["tmp_name"];
                    $tamanho = $_FILES["produtoimg"]["size"];
                    $tipoimg = $_FILES["produtoimg"]["type"];
                    $erro = $_FILES["produtoimg"]["error"];

                    // verifica a extensão
                    $ext = pathinfo ($nomeimg, PATHINFO_EXTENSION);

                      if(($ext != 'jpg') and ($ext != 'png')){
                        echo "<script language=javascript>
                        alert('SÓ É POSSÍVEL FAZER UPLOAD DE ARQUIVO COM EXTENSÃO JPG OU PNG!!');
                        location.href = 'produto.php';
                        </script>";	
                     exit;
                    }

                        if ($tamanho > 1000000 ) {
                            echo "<script language=javascript>
                            alert('	VERIFIQUE O TAMANHO DO SEU ARQUIVO!!');
                            location.href = 'produto.php';
                            </script>";		
                         exit;
                        }
                        
                        //renomear a img
                        $novo_nomeimg= 'imagem'.'_'.$data.'_'.$time.'_'.$num.'.'.$ext;

                        // comando para mover o arquivo img
                        $mover = move_uploaded_file($temp, '../usuario/imgs/'.$novo_nomeimg);

                        $arquivo = '../usuario/imgs/'.$novo_nomeimg;

                $sql = $conn->prepare("INSERT INTO tbl_produtos (id, descricao, categoria, produto, preco, produtoimg)
                                        VALUES (:id, :descricao, :categoria, :produto, :preco, :produtoimg)");

                $sql->bindValue(':id', null);
                $sql->bindValue(':descricao', $desc);
                $sql->bindValue(':produto', $produto);
                $sql->bindValue(':categoria', $categoria);
                $sql->bindValue(':preco', $preco);
                $sql->bindValue(':produtoimg', $arquivo);

                $sql->execute();

                // msg de erro
                echo "<script language=javascript>
                alert('Dados Gravados com Sucesso !!');
                location.href = 'produto.php';
                </script>";
            }
            //se ocorrer tudo bem
            catch (PDOException $erro) {
                echo $erro->getMessage();
            }
        }
    ?>
    
        <p class="fs-2 text-center mt-5 pclass">Cadastro de Produtos</p> 
            <div class="container2 mt-5">
                <table class="table table-bordered text-center ">
                    <tr class="bg-light">
                        <th scope="col"> ID </th>
                        <th scope="col"> Produto </th>
                        <th scope="col"> CATEGORIA</th>
                        <th scope="col"> PREÇO </th>
                        <th scope="col"> DESCRIÇÃO </th>
                        <th width="40"> IMAGEM </th>
                        <th scope="col"> Ações </th>
                    </tr>

                

        <?php 
            try {
                $consulta = $conn->prepare("SELECT * FROM tbl_produtos");
                $consulta->execute();

                while ($row = $consulta->fetch(PDO::FETCH_ASSOC)) {
                    ?>
                        <tr>
                            <td><?php echo $row["id"]?></td>
                            <td><?php echo $row["produto"]?></td>
                            <td><?php echo $row["categoria"]?></td>
                            <td><?php echo $row["preco"]?></td>
                            <td><?php echo $row["descricao"]?></td>
                            
                            <td align="center"> <?php echo "<img src='$row[produtoimg]' width='100' height='100'>";?></td>
                            <td>
                                <a href="produto.php?ex=<?php echo $row["id"];?>"> Excluir</a>
                            </td>
                        </tr>
                        <?php

                        //recuperar o caminho
                        $foto = $row['produtoimg'];
                }

                if(isset($_REQUEST['ex'])){
                    $id = $_REQUEST['ex'];

                 

                    $delete = $conn->prepare("DELETE FROM tbl_produtos WHERE id=:id");
                    $delete->bindValue(':id', $id);
                    $delete->execute();

                    echo "<script language=javascript>
                    alert('Dados excluidos com Sucesso !!');
                    location.href= 'produto.php?al=$id';
                    </script>";
                }

            } catch(PDOException $erro){
                echo $erro->getMessage();
            }
            $conn = null;
            ?>
        </div>


</style>
</table>
</div>
</body>
</html>
