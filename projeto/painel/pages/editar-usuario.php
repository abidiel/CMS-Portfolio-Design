<div class="box_content">
    
    <h2>Editar usuário.</h2>

    <!-- Este parametro em enctype é para permitir o envio de imagens -->
    <form method="post" enctype="multipart/form-data">

        <?php
            if(isset($_POST['acao'])){
                //enviou o form.
                Painel::alerta('sucesso','Cadastrado com sucesso!');
            }
        ?>


        <!-- Os valores do value de cada campo são dinamicos, trazidos do banco. -->
        <div class="form_group">
            <label>Nome:</label>
            <input type="text" name="nome" required value="<?php echo $_SESSION['nome']; ?>">
        </div>
        <div class="form_group">
            <label>Senha:</label>
            <input type="password" name="senha" required value="<?php echo $_SESSION['password']; ?>">
        </div>   
        <div class="form_group">
            <label>Imagem:</label>
            <input type="file" name="imagem"  value="<?php echo $_SESSION['img']; ?>">>
        </div>
        <div class="form_group">
            <input type="submit" name="acao" value="Atualizar!">
        </div> 

    </form>


</div>