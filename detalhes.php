<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
    <link rel="stylesheet" href="../estudonauta-php/estilização/main.css">
</head>
<body>
    <?php 
        require_once "../estudonauta-php/includes/banco.php";
        require_once "../estudonauta-php/includes/functions.php";
    ?>
    <main id="idmain"> 
        <?php 
            $c = $_GET['cod']?? 0;
        ?>
        <h1>Detalhes do jogo</h1>
        <table class='detalhes'>
            <tr><td rowspan="4">foto</td></tr>
            <td>Nome do jogo</td>
            <tr><td>Descrição</td></tr>
            <tr><td>Adm</td></tr>
        </table>
    </main>
</body>
</html>