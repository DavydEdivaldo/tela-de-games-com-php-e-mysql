<?php 
        function thumb($arq){
            $caminho = "../ESTUDONAUTA-PHP/fotos/$arq";
            if(is_null($arq) || !file_exists($caminho)){
                return '../ESTUDONAUTA-PHP/fotos/indisponivel.png';
            }else{
                return $caminho;
            }
        }

        function voltar(){
            return "<a href=\"javascript:history.go(-1)\"><i class=\"material-icons back\">arrow_back</i></a>";
        }

        function msg_sucesso($m){
            $resp = "<div class='sucesso'><i class='material-icons'>check_circle</i> Arquivo aberto com sucesso$m</div>";
            return $resp;
        }

        function msg_aviso($m){
            $resp = "<div class='aviso'><i class='material-icons'>info</i> voce esqueceu o nome$m</div>";
            return $resp;
        }
        function msg_erro($m){
            $resp = "<div class='erro'><i class='material-icons'>error</i> Algo deu errado$m</div>";
            return $resp;   
        }
    ?>