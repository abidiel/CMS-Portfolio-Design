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
    }
    

?>