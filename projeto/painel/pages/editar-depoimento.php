<?php 
    if(isset($_GET['id'])){
        $id = (int)$_GET['id'];
        $depoimento = Painel::select('tb_site_depoimentos','id = ?', array($id));
    }else{
        Painel::alerta('erro','Você precisa passar o parâmetro id');
        die();
    }
?>

<div class="box_content">
    
    <h2 class="title_content">Editar depoimento</h2>

    <!-- Este parametro em enctype é para permitir o envio de imagens -->
    <form method="post" enctype="multipart/form-data">

        <?php
            if(isset($_POST['acao'])){
                    if(Painel::update($_POST)){
                        Painel::alerta('sucesso','O depoimento foi editado com sucesso!');

                        // faz o select novamente para os values
                        $depoimento = Painel::select('tb_site_depoimentos','id = ?', array($id));
                    }else{
                        Painel::alerta('erro','Campos vazios não são permitidos');
                    }
                }
        ?>

        <div class="form_group">
            <label>Nome:</label>
            <input type="text" name="nome"  value="<?php echo $depoimento['nome']; ?>">
        </div>

        <div class="form_group">
            <label>Depoimento:</label>
            <textarea name="depoimento"><?php echo $depoimento['depoimento']; ?></textarea>
        </div>

        <div class="form_group">
            <label>Data:</label>
            <input type="text" name="data" formato="data" value="<?php echo $depoimento['data']; ?>">
        </div>

        <div class="form_group">
            <input type="hidden" name="id" value="<?php echo $id ?>">
            <input type="hidden" name="nome_tabela" value="tb_site_depoimentos">
            <input type="submit" name="acao" value="Atualizar!">
        </div> 

    </form>


</div>