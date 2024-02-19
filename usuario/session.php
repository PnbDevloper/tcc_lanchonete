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
            location.href = '';
            </script>";
        }
?>

</body>
</html>