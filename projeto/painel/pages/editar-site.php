<?php
    $site = Painel::select('tb_site_config',false);
?>

<div class="box_content">
    
    <h2 class="title_content">Editar site</h2>

    <!-- Este parametro em enctype é para permitir o envio de imagens -->
    <form method="post" enctype="multipart/form-data">

        <?php
            if(isset($_POST['acao'])){
                if(Painel::update($_POST,true)){
                    Painel::alerta('sucesso','O site foi editado com sucesso!');
                    $site = Painel::select('tb_site_config',false);
                }else{
                    Painel::alerta('erro','Campos obrigatórios.');
                }
            }
        ?>

        <h3>Informações gerais:</h3>
        <div class="form_group">
            <label>Título do site:</label>
           <input type="text" name="titulo" value="<?php echo $site['titulo'] ?>">
        </div>

        <div class="form_group">
            <label>Nome:</label>
           <input type="text" name="nome_autor" value="<?php echo $site['nome_autor'] ?>">
        </div>
        
        <div class="form_group">
            <label>Descricao:</label>
           <textarea name="descricao"><?php echo $site['descricao'] ?></textarea>
        </div>
        
        <br>

        <h3>Redes sociais:</h3>
        <div class="form_group">
            <label>Instagram:</label>
           <input type="text" name="instagram" value="<?php echo $site['instagram'] ?>">
        </div>

        <div class="form_group">
            <label>Facebook:</label>
           <input type="text" name="facebook" value="<?php echo $site['facebook'] ?>">
        </div>

        <br>
        
        <?php 
            for($i = 1; $i <= 6; $i++){
        ?>

            <h3>Skill <?php echo $i; ?>:</h3>
            <div class="form_group">
                <label>Icone:</label>
            <input type="text" name="icone<?php echo $i; ?>" value="<?php echo $site['icone'.$i] ?>">
            </div>

            <div class="form_group">
                <label>Titulo:</label>
            <input type="text" name="titulo<?php echo $i; ?>" value="<?php echo $site['titulo'.$i] ?>">
            </div>

            <div class="form_group">
                <label>Descrição:</label>
            <input type="text" name="descricao<?php echo $i; ?>" value="<?php echo $site['descricao'.$i] ?>">
            </div>

            <br>

        <?php 
        }
        ?>

        <div class="form_group">
            <input type="hidden" name="nome_tabela" value="tb_site_config" />
            <input type="submit" name="acao" value="Atualizar!">
        </div> 

    </form>


</div>