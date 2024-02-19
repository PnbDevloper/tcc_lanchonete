<?php
require_once "restrito.php";
?>
<!DOCTYPE html>
<html>
<head>
    <title> Usuarios Alterar</title>
    <link rel="stylesheet" href="css/editar.css">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <script src = "js/bootstrap.min.js"> </script>
    <script type="text/javascript" src="jquery-3.2.1.min.js" ></script>
</head>
<body>

    <?php 
    require_once "conexao.php";	
        try {
            if(isset($_REQUEST["al"])) {
                $id = $_REQUEST["al"];
                $consulta = $conn->prepare("SELECT * FROM tbl_cadastro WHERE id=:id;");
                $consulta->bindValue(':id', $id);
                $consulta->execute();
                $row = $consulta->fetch(PDO::FETCH_ASSOC);
            }
        }catch(PDOException $erro) {
            echo $erro->getMessage();
        }
    ?>

    <p class="fs-1 text-center mt-5">Alterar informções</p>
        <div class="container">
            <form name="Form" action="editar.php" method="POST">
            <div class="row">
                <div class="col-sm-12  mt-3">
                <label class="form-label">ID </label>
                    <input class="form-control" type="text" name="id" required value="<?php if(isset($row['id'])) {echo $row['id'];}?>" readonly="readonly">
                </div>

                <div class="col-sm-12  mt-3">
                <label class="form-label" >Nome</label>
                    <input class="form-control" type="text" name="nome" required value="<?php if(isset($row['nome'])) {echo $row['nome'];}?>">
                </div>

                <div class="col-sm-12  mt-3">
                <label class="form-label"> Email </label>
                    <input class="form-control" type="text" name="email" required value="<?php if(isset($row['email'])) {echo $row['email'];}?>">
                </div>

                <div class="col-sm-12  mt-3">
                <label class="form-label"> TIPO </label>
                    <select class="form-select" id="tipo" name="tipo"  value="<?php if(isset($row['tipo'])) {echo $row['tipo'];} ?>"  >
                        <option value="1"> Administrador</option>
                        <option value="0"> Padrão </option>
                    </select>
                </div>

                <div class="col-sm-12  mt-3">
                <label class="form-label" >SITUAÇÃO </label>
                    <select class="form-select" id="situacao" name="situacao"  value="<?php if(isset($row['situacao'])) {echo $row['situacao'];} ?>"  >
                        <option value="1"> Ativado </option>
                        <option value="0"> Desativado </option>
                    </select><br>
                </div>

                    <input class="btn btn-primary" type="submit" name="Alterar" value="Alterar"> 

                    <div class="register">
                        <p><a href="cadastro_usuario.php"> <br>Voltar para o Controle de usuario</a></p>
                    </div>

            </form>

        <?php 
            try {
                 if (isset ($_REQUEST["cadastro"])) {
                     
                        $sql = $conn->prepare("UPDATE tbl_cadastro SET nome=:nome, email=:email, tipo=:tipo, situacao=:situacao WHERE id=:id" );

                        $sql->bindValue(':id', $id); 
                        $sql->bindValue(':nome', $nome);
                        $sql->bindValue(':email', $email);  
                        $sql->bindValue(':tipo', $tipo);
                        $sql->bindValue(':situacao', $situacao);
                        $sql->execute();

                    //msg caso não ocorra erro

                    echo "<script language=javascript>
                    alert('Dados gravados com Sucesso !!');
                    location.href = 'editar.php?al=$id';
                    </script>";
                    } 

                 // caso não executar captura o erro no sgbd


                }   catch (PDOException $erro) {

                    echo $erro->getMessage();

                  }
                     $conn = null;
                ?>

</div>
</div>
</body>
</html>
<script type="text/javascript">
$("#tipo").val("<?php echo $tipo ?>");
$("#situacao").val("<?php echo $situacao ?>");
</script>