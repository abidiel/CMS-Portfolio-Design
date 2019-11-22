<div class="box_content">
    
    <h2 class="title_content">Cadastrar portfolio</h2>

    <!-- Este parametro em enctype é para permitir o envio de imagens -->
    <form method="post" enctype="multipart/form-data">

        <?php
            if(isset($_POST['acao'])){

                $categoria_id = $_POST['categoria_id'];
                $titulo = $_POST['titulo'];
                $conteudo = $_POST['conteudo'];
                $capa = $_FILES['capa'];

                if($titulo == '' || $conteudo == ''){
                    Painel::alerta('erro','Campos vazios não são permitidos');
                }else if($capa['tmp_name'] == '' ){
                    Painel::alerta('erro','A imagem de capa precisa ser selecionada');
                }else{
                    if(Painel::imagemValida($capa)){
                        $verifica = MySql::conectar()->prepare("SELECT * FROM tb_site_portfolio WHERE titulo = ?");
                        $verifica->execute(array($titulo));
                        if($verifica->rowCount() == 0 ){
                            $imagem = Painel::uploadFile($capa);
                            $slug = Painel::generateSlug($titulo);
                            $arr = ['categoria_id'=>$categoria_id,'data'=>date('Y-m-d'),'titulo'=>$titulo,'conteudo'=>$conteudo,'capa'=>$imagem,'slug'=>$slug,'order_id'=>'0','nome_tabela'=>'tb_site_portfolio'];
                            if(Painel::insert($arr)){
                                Painel::redirect(INCLUDE_PATH_PAINEL.'cadastrar-portfolio?sucesso');
                            }
                        }else{
                            Painel::alerta('erro','Já existe um post com o nome '.$titulo);
                        }

                    }else{
                        Painel::alerta('erro','Selecione uma imagem válida.');
                    }
                }
                

            }
            if(isset($_GET['sucesso']) && !isset($_POST['acao'])){
                Painel::alerta('sucesso','Cadastro realizado com sucesso');
            }
        ?>

        <div class="form_group">
            <label>Categoria:</label>

            <select name="categoria_id">
            <?php
                $categorias = Painel::selectAll(tb_site_categorias);
                foreach ($categorias as $key => $value){ ?>

                <option <?php if($value['id'] == @$_POST['categoria_id']) echo'selected'; ?> value="<?php echo $value['id']?>"> <?php echo $value['nome']; ?> </option>

                <?php } ?>
            
            </select>
        </div>


        
        <div class="form_group">
            <label>Título:</label>
            <input type="text" name="titulo" value="<?php recoverPost('titulo'); ?>" >
        </div>
 
        <div class="form_group">
            <label>Conteúdo:</label>
            <textarea class="tinymce" name="conteudo"  value=""> <?php recoverPost('conteudo'); ?> </textarea>
        </div>

        <div class="form_group">
            <label>Imagem:</label>
            <input type="file" name="capa"  value="">
        </div>

        <!-- input oculto para passar o id do usuario -->
        <input type="hidden" name="id_usuario" value="<?php echo $_SESSION['id_usuario'];?>">

        <div class="form_group">
            <input type="hidden" name="nome_tabela" value="tb_site_portfolio">
            <input type="hidden" name="order_id" value="0">
            <input type="submit" name="acao" value="Cadastrar!">
        </div> 

    </form>


</div>