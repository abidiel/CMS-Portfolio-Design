

<div class="box_content">
    
    <h2 class="title_content">Editar usuário.</h2>

    <!-- Este parametro em enctype é para permitir o envio de imagens -->
    <form method="post" enctype="multipart/form-data">

        <?php
            if(isset($_POST['acao'])){

                $id_usuario = $_POST['id_usuario'];
                $user = $_POST['user'];
                $cargo = $_POST['cargo'];
                $nome = $_POST['nome'];
                $senha = $_POST['password'];
                $imagem = $_FILES['imagem'];
                $imagem_atual = $_POST['imagem_atual'];
                $usuario = new Usuario();

                //instanciando da classe Usuario.
                $usuario = new Usuario();   

                // testa se o usuario selecionou alguma imagem
                if($imagem['name'] != ''){

                    if(Painel::imagemValida($imagem)){
                        Painel::deleteFile($imagem_atual);
                        $imagem = Painel::uploadFile($imagem);
                        if($usuario->atualizarUsuario($user, $id_usuario, $nome, $senha, $imagem, $cargo)){
                            $_SESSION['img'] = $imagem;
                            Painel::alerta('sucesso','Atualizado com sucesso junto com a imagem');
                        } else {
                            Painel::alerta('erro','Ocorreu um erro ao atualizar junto com a imagem');
                        }
                    }
                    else{
                        Painel::alerta('erro', 'O formato da imagem é inválido');
                    }

                    
                }else{
                    $imagem = $imagem_atual;       
                    
                    if($usuario->atualizarUsuario($user, $id_usuario, $nome, $senha, $imagem, $cargo)){
                        $_SESSION['img'] = $imagem;
                        Painel::alerta('sucesso','Atualizado com sucesso');
                    } else {
                        Painel::alerta('erro','Ocorreu um erro ao atualizar');
                    }
                }
            }
        ?>


        <!-- Os valores do value de cada campo são dinamicos, trazidos do banco. -->
        <div class="form_group">
            <label>User:</label>
            <input type="text" name="user" required value="<?php echo $_SESSION['user']; ?>">
        </div>

        <div class="form_group">
            <label>Nome:</label>
            <input type="text" name="nome" required value="<?php echo $_SESSION['nome']; ?>">
        </div>

        <div class="form_group">
            <label>Senha:</label>
            <input type="password" name="password" required value="<?php echo $_SESSION['password']; ?>">
        </div>   

        <div class="form_group">
            <label>Imagem:</label>
            <input type="file" name="imagem"  value="<?php echo $_SESSION['img']; ?>">
            <input type="hidden" name="imagem_atual" value="<?php echo $_SESSION['img']; ?>">
        </div>

        <div class="form_group">
            <select name="cargo">
                <option value="0">Cargo 0</option>
                <option value="1">Cargo 1</option>
                <option value="2">Cargo 2</option>
            </select>
        </div>

        <input type="hidden" name="id_usuario" value="<?php echo $_SESSION['id_usuario'];?>">

        <div class="form_group">
            <input type="submit" name="acao" value="Atualizar!">
        </div> 

    </form>


</div>