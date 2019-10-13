<?php

    class Painel
    {
        public static function logado(){
            // verifica se existe session login, 
            // se positivo, retorna true, se não retorna false
            return isset($_SESSION['login']) ? true : false;
        }
    }
    

?>