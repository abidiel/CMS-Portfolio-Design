<?php 
    if(isset($_GET['id'])){
        $id = (int)$_GET['id'];
        $categoria = Painel::select('tb_site_categorias','id = ?', array($id));
    }else{
        Painel::alerta('erro','Você precisa passar o parâmetro id');
        die();
    }
?>

<div class="box_content">
    
    <h2 class="title_content">Editar categoria</h2>

    <!-- Este parametro em enctype é para permitir o envio de imagens -->
    <form method="post" enctype="multipart/form-data">

        <?php
            if(isset($_POST['acao'])){
                $slug = Painel::generateSlug($_POST['nome']);
                $arr = array_merge($_POST,array('slug'=>$slug));

                //testando se ja nao existe a categoria
                $verificar = MySql::conectar()->prepare("SELECT * FROM tb_site_categorias WHERE nome = ? AND id != ?");
                $verificar->execute(array($_POST['nome'],$id));
                if($verificar->rowCount() == 1 ){
                    Painel::alerta('erro','Ja existe uma categoria com esse nome');
                }else{
                    if(Painel::update($arr)){
                        Painel::alerta('sucesso','A categoria foi editado com sucesso!');
    
                        // faz o select novamente para os values
                        $categoria = Painel::select('tb_site_categorias','id = ?', array($id));
                    }else{
                        Painel::alerta('erro','Campos vazios não são permitidos');
                    }
                }

            }
        ?>

        <div class="form_group">
            <label>Categoria:</label>
            <input type="text" name="nome"  value="<?php echo $categoria['nome']; ?>">
        </div>

        <div class="form_group">
            <input type="hidden" name="id" value="<?php echo $id ?>">
            <input type="hidden" name="nome_tabela" value="tb_site_categorias">
            <input type="submit" name="acao" value="Atualizar!">
        </div> 

    </form>


</div>