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
            if($tipo == 'sucesso'){
                echo '<div class="box_alert sucesso"><i class="fas fa-check"></i>'.$mensagem.'</div>';
            }else if($tipo == 'erro'){
                echo '<div class="box_alert erro"><i class="fas fa-exclamation-triangle"></i>'.$mensagem.'</div>'; 
            }
        }

        public static function imagemValida($imagem){
            if ($imagem['type'] == 'image/jpeg' ||  $imagem['type'] == 'image/jpg' ||  $imagem['type'] == 'image/png'){
                // o size retorna o tamanho da imagem em bytes, divide por 1024 para ficar em kb
                $tamanho = intval($imagem['size'] / 1024);

                //testa o tamanho da imagem, se for maior de 500kb da erro
                if($tamanho < 500){
                    return true;
                }else{
                    return false;
                }

            }else{
                return false;
            }
        }
        
        public static function uploadFile($file){
            if(move_uploaded_file($file['tmp_name'],BASE_DIR_PAINEL.'/assets/uploads/'.$file['name'])){
                return $file['name'];
            }else{
                return false;
            }

        }
        
        public static function deleteFIle($file){
            // o @ na frente da função é para ocultar o warning
            @unlink('assets/uploads/'.$file);
        }




    
    }

    

?>