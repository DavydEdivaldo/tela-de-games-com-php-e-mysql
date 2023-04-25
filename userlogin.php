<!DOCTYPE html>
<?php 
     require_once "../estudonauta-php/includes/banco.php";
     require_once "../estudonauta-php/includes/login.php";
     require_once "../estudonauta-php/includes/functions.php";
?>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tela de login</title>
    <link rel="stylesheet" href="../estudonauta-php/estilização/main.css">
    <style>
        form{
            text-align: center;
            display: flex;
            justify-content: center;
        }
        td{
            padding: 7px;
        }
        h1{
            text-align: center;
        }
    </style>
</head>
<body>
    <main id="idmain">
        <?php 
            $u = $_POST['usuario'] ?? null;
            $s = $_POST['senha'] ?? null;

            if (is_null($u) || is_null($s)){
                require "../estudonauta-php/user-login-form.php";
            }else{
                $entrar = $_POST['entrar'];
                if(isset($entrar)){
                    $verifica = $banco->query("SELECT * FROM usuarios WHERE usuario = '$u' AND senha ='$s' ") or die("erro ao selecionar");
                    if($verifica->num_rows <= 0){
                        echo "<script language='javascript' type='text/javascript'> alert('Login e/ou senha incorreto');window.location.href='userlogin.php';</script>";
                        die();
                    }
                }
                
               
                
            }
 ?>
    </main>
</body>
</html>