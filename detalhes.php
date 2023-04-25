<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
    <link rel="stylesheet" href="../estudonauta-php/estilização/main.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
</head>
<body>
    <?php 
        require_once "../estudonauta-php/includes/login.php";
        require_once "../estudonauta-php/includes/banco.php";
        require_once "../estudonauta-php/includes/functions.php";
    ?>
    <main id="idmain"> 
        <?php 
            include_once "../estudonauta-php/topo.php";
            $c = $_GET['cod']?? 0;
            $busca = $banco->query("select * from jogos where cod='$c'");
        ?>
        <h1>Detalhes do jogo</h1>
        <table class='detalhes'>
            <?php 
                if(!$busca){
                    echo "<tr><td>busca falhou! $banco->error</td></tr>";
                } else{
                    if($busca-> num_rows == 1){
                        $reg = $busca->fetch_object();
                        $t = thumb($reg->capa);
                        echo "<tr><td rowspan='4'><img src='$t' class='mini02'/></td></tr>";
                        echo "<td><h2>$reg->nome</h2> Nota: ". number_format($reg->nota, 1). "/10.0";
                        echo "<tr><td>$reg->descricao</td></tr>";
                        echo "<tr><td>Adm</td></tr>";
                    }else{
                        echo "<tr><td>Nenhum registro encontrado</td></tr>";
                    }
                }
            ?>  
        </table>
        <?php echo voltar();?>
    </main>
    <?php include "../estudonauta-php/footer.php";?>
</body>
</html>