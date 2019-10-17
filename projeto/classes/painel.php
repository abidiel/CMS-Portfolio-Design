<?php

    class Painel
    {
        public static function logado(){
            // verifica se existe session login, 
            // se positivo, retorna true, se não retorna false
            return isset($_SESSION['login']) ? true : false;
        }

        public static function loggout(){
            session_destroy();
            header('Location: '.INCLUDE_PATCH_PAINEL);
        }

        public static function carregarPagina(){
            if(isset($_GET['url'])){
                
                $url = explode('/',$_GET['url']);
                
                if(file_exists('pages/'.$url[0].'.php')){
                    include ('pages/'.$url[0].'.php');
                }else{
                    echo 'Pagina não existe';
                    header('Location: '.INCLUDE_PATH_PAINEL);
                }

            }else{
                include('pages/home.php');
            }

        }

        public static function alerta($tipo, $mensagem){
            echo 'ENTROU NA FUNCAO ALERTA';
            if($tipo == 'sucesso'){
                echo '<div class="sucesso">'.$mensagem.'</div>';
            }else if($type == 'erro'){
                echo '<div class="erro">'.$mensagem.'</div>'; 
            }
        }
    
    
    }

    

?>