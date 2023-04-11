<?php 
        function thumb($arq){
            $caminho = "../ESTUDONAUTA-PHP/fotos/$arq";
            if(is_null($arq) || !file_exists($caminho)){
                return '../ESTUDONAUTA-PHP/fotos/indisponivel.png';
            }else{
                return $caminho;
            }
        }
    ?>