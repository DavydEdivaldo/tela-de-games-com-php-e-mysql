<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listagem de jogos</title>
    <link rel="stylesheet" href="../estudonauta-php/estilização/main.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
</head>
<body>
    <?php 
        require_once "../estudonauta-php/includes/banco.php";
        require_once "../estudonauta-php/includes/functions.php";
        $ordem = $_GET['o'] ?? "n";
        $chave = $_GET['c'] ?? "";
    ?>
    <main id="idmain">
        <?php include_once "../estudonauta-php/topo.php";?>
        <h1>Escolha seu jogo</h1>
        <form action="index.php" method="get" id="busca">
            Ordenar: 
            <a href="index.php?o=n&c=<?php echo $chave ?>"> Nome | </a>
            <a href="index.php?o=p&c=<?php echo $chave ?>"> Produtora |</a>
            <a href="index.php?o=n1&c=<?php echo $chave ?>"> Nota Alta |</a>
            <a href="index.php?o=n2&c=<?php echo $chave?>">Nota Baixa |</a> 
            <a href="index.php">Mostrar todos |</a>
           <label for="c">Buscar:</label> <input type="search" name="c" size="10" maxlength="20">
           <input type="submit" value="OK">
        </form>
        <table class="listagem">
            <?php 
            $p = "SELECT j.cod, j.nome, g.genero, p.produtora, j.descricao, j.nota, j.capa FROM `jogos` j JOIN generos g ON j.genero = g.cod JOIN produtoras p ON j.produtora = p.cod ";

            if(!empty($chave)){
                $p.= "WHERE j.nome LIKE '%$chave%' OR p.produtora LIKE '%$chave%' OR g.genero LIKE '%$chave%' ";
            }

            switch ($ordem){
                case 'p':
                    $p .= "ORDER BY p.produtora";
                    break;
                case 'n1':
                    $p.= "ORDER BY j.nota DESC";
                    break;
                case 'n2':
                    $p.= "ORDER BY j.nota ASC";
                    break;
                default:
                $p.= "ORDER BY j.nome";
            }

                $busca = $banco->query($p);
                if(!$busca){
                    echo '<p>Erro </p>';
                } else{
                    if($busca->num_rows == 0){
                        echo '<tr><td>Nenhum registro encontrado</td></tr>';
                    } else{
                        while($reg = $busca->fetch_object()){
                            $t=thumb($reg->capa);
                           echo "<tr><td><img src='$t' class='mini'/>";
                           echo "<td><a href='detalhes.php? cod=$reg->cod'>$reg->nome</a>";
                           echo " [$reg->genero]";
                           echo "<br/>"  ;
                           echo "$reg->produtora";
                           echo "<td>Adm";
                        }
                    }
                }
            ?>
            
        </table>
    </main>
    <?php include "../estudonauta-php/footer.php";?>
</body>
</html>