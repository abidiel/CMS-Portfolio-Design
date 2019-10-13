<?php

    include('../config.php');

    //testando o valor do método logado, dentro do objeto painel
    if(Painel::logado() == false){
        include('login.php');
    }
    else{
        include('main.php');
    }


?>