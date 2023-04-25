<?php 
    echo "<header>";
    if (empty($_SESSION['user'])){
        echo "<a href=\"../estudonauta-php/userlogin.php\">Entrar</a>";
    } else{
        echo "Olá, " .$_SESSION['nome']. " seja muito bem vindo.";
    }
    
    echo "</header>";
?>
