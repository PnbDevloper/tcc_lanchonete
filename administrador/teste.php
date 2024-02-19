<?php 
require_once "conexao.php";
?>
<h1> <b>Consulta <b></h1>

    <table border="1">

        <tr>
            <th scope="col"> <b>ID <b></th>
            <th scope="col"><b> CATEGORIA <b></th>

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