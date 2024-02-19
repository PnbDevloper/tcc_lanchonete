<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title> restrito </title>
</head>

<body>
<?php 
    session_start();
        if((!isset($_SESSION['nome'])) and (!isset($_SESSION['email']))){
            
            echo "<script language=javascript>
            Alerta('ALERTA, VOCÊ NÃO TEM PERMISSÃO !!!');
            location.href = 'login.php';
            </script>";
        }
?>

</body>
</html>