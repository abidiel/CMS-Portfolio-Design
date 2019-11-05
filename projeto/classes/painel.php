<?php

    class Painel
    {
        public static function logado(){
            // verifica se existe session login, 
            // se positivo, retorna true, se não retorna false
            return isset($_SESSION['login']) ? true : false;
        }

        public static function loggout(){
            // setando valor negativo para limpar o cookie
            setcookie('lembrar',true,time()-1,'/');
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
            // fazendo com que a imagem tem um nome unico.
            $formatoArquivo = explode('.',$file['name']);
            $imagemNome = uniqid().'.'.$formatoArquivo[count($formatoArquivo) - 1];
            if(move_uploaded_file($file['tmp_name'],BASE_DIR_PAINEL.'/assets/uploads/'.$imagemNome)){
                return $imagemNome;
            }else{
                return false;
            }

        }
        
        public static function deleteFIle($file){
            // o @ na frente da função é para ocultar o warning
            @unlink('assets/uploads/'.$file);
        }

        public static function insert($arr){
            $certo = true;
            $nome_tabela = $arr['nome_tabela'];
            $query = "INSERT INTO $nome_tabela VALUES (null";
            foreach ($arr as $key => $value){
                $nome = $key;
                $valor = $value;
                
                // se for o valor do campo submit (que não deve ser inserido)
                // segue rodando
                if($nome == 'acao' || $nome == 'nome_tabela'){
                    continue;
                }
                    
                // se tiver campo em branco
                if($value == ''){
                    $certo = false;
                    break;
                }
                $query.=",?";
                $parametros[] = $value;
            }

            // concatenado o final do loop
            $query.=")";
            if($certo == true){
                $sql = MySql::conectar()->prepare($query);
                $sql->execute($parametros);
            }
            return $certo;
        }

        public static function selectAll($tabela,$start = null, $end = null){
            if($start == null && $end == null){
                $sql = MySql::conectar()->prepare("SELECT * FROM $tabela");
            }else{
                $sql = MySql::conectar()->prepare("SELECT * FROM $tabela LIMIT $start,$end");
            }
            $sql->execute();
            return $sql->fetchAll();
        }




    
    }

    

?>