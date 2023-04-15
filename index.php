<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listagem de jogos</title>
    <link rel="stylesheet" href="../estudonauta-php/estilização/main.css">
</head>
<body>
    <?php 
        require_once "../estudonauta-php/includes/banco.php";
        require_once "../estudonauta-php/includes/functions.php";
    ?>
    <main id="idmain">
        <h1>Escolha seu jogo</h1>
        <table class="listagem">
            <?php 
            $p = "SELECT j.cod, j.nome, g.genero, p.produtora, j.descricao, j.nota, j.capa FROM `jogos` j JOIN generos g ON j.genero = g.cod JOIN produtoras p ON j.produtora = p.cod ";
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
</body>
</html>