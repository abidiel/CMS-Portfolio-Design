<div class="box_content">
    
    <h2 class="title_content">Adicionar usuário</h2>

    <!-- Este parametro em enctype é para permitir o envio de imagens -->
    <form method="post" enctype="multipart/form-data">

        <?php
            if(isset($_POST['acao'])){

                $id_usuario = $_POST['id_usuario'];
                $user = $_POST['user'];
                $nome = $_POST['nome'];
                $senha = $_POST['password'];
                $imagem = $_FILES['imagem'];
                
                if($user == ''){
                    Painel::alerta('erro','O usuário está vazio');
                }else if($nome == ''){
                    Painel::alerta('erro','O nome está vazio');
                }else if($senha == ''){
                    Painel::alerta('erro','A senha está vazia');                    
                }else{
                    // se esta tudo preenchido, verifica se ja nao existe outro usuario igual
                    if(Usuario::userExists($user)){
                        Painel::alerta('erro','O usuário <strong>"'.$user.'"</strong> ja esta cadastrado.');  
                    }else{
                        // Podemos cadastrar
                        $usuario = new Usuario();
                        $imagem = Painel::uploadFile($imagem);
                        $usuario->cadastrarUsuario($user, $senha, $imagem, $nome);
                        Painel::alerta('sucesso','O Cadastro do usuário <strong> "'.$user.'" </strong> foi feito com sucesso!');  
                        
                    }

                }
            }
        ?>

        <!-- Os valores do value de cada campo são dinamicos, trazidos do banco. -->
        <div class="form_group">
            <label>User:</label>
            <input type="text" name="user"  value="">
        </div>

        <div class="form_group">
            <label>Nome:</label>
            <input type="text" name="nome"  value="">
        </div>

        <div class="form_group">
            <label>Senha:</label>
            <input type="password" name="password"  value="">
        </div>   

        <div class="form_group">
            <label>Imagem:</label>
            <input type="file" name="imagem"  value="">
            <input type="hidden" name="imagem_atual" value="">
        </div>

        <!-- input oculto para passar o id do usuario -->
        <input type="hidden" name="id_usuario" value="<?php echo $_SESSION['id_usuario'];?>">

        <div class="form_group">
            <input type="submit" name="acao" value="Atualizar!">
        </div> 

    </form>


</div>