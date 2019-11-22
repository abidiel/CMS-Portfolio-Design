<?php 
    if(isset($_GET['id'])){
        $id = (int)$_GET['id'];
        $portfolio = Painel::select('tb_site_portfolio','id = ?', array($id));
    }else{
        Painel::alerta('erro','Você precisa passar o parâmetro id');
        die();
    }
?>

<div class="box_content">
    
    <h2 class="title_content">Editar post no portfolio</h2>

    <!-- Este parametro em enctype é para permitir o envio de imagens -->
    <form method="post" enctype="multipart/form-data">

        <?php
            if(isset($_POST['acao'])){

                $nome = $_POST['titulo'];
                $conteudo = $_POST['conteudo'];
                $imagem = $_FILES['capa'];
                $imagem_atual = $_POST['imagem_atual'];

				$verifica = MySql::conectar()->prepare("SELECT `id` FROM `tb_site_portfolio` WHERE titulo = ? AND categoria_id = ? AND id != ?");
				$verifica->execute(array($nome,$_POST['categoria_id'],$id));
                if($verifica->rowCount() == 0){
                    // testa se o usuario selecionou alguma imagem
                    if($imagem['name'] != ''){

                        if(Painel::imagemValida($imagem)){
                            Painel::deleteFile($imagem_atual);
                            $imagem = Painel::uploadFile($imagem);
                            $slug = Painel::generateSlug($nome);
                            $arr = ['titulo' => $nome,'data'=>date('Y-m-d'),'categoria_id' => $_POST['categoria_id'],'conteudo'=>$conteudo,'capa'=>$imagem,'slug'=>$slug,'id'=> $id,'nome_tabela'=>'tb_site_portfolio'];
                            Painel::update($arr);
                            $portfolio = Painel::select('tb_site_portfolio','id = ?', array($id));
                            Painel::alerta('sucesso','O item do portfolio foi editado com sucesso (junto com a imagem)!'); 
                        }
                        else{
                            Painel::alerta('erro', 'O formato da imagem é inválido');
                        }

                    }else{
                        $imagem = $imagem_atual;    
                        $slug = Painel::generateSlug($nome);   
                        $arr = ['titulo' => $nome,'data'=>date('Y-m-d'),'categoria_id' => $_POST['categoria_id'],'conteudo'=>$conteudo,'capa'=>$imagem,'slug'=>$slug,'id'=> $id,'nome_tabela'=>'tb_site_portfolio'];
                        Painel::update($arr);    
                        $portfolio = Painel::select('tb_site_portfolio','id = ?', array($id));
                        Painel::alerta('sucesso','O item do portfolio foi editado com sucesso (sem imagem)!');                
                    }
                }else{
                    Painel::alerta('erro','Já existe um post com o nome '.$nome);
                }


            }
        ?>

        <!-- Os valores do value de cada campo são dinamicos, trazidos do banco. -->

        <div class="form_group">
            <label>Titulo:</label>
            <input type="text" name="titulo" required value="<?php echo $portfolio['titulo']; ?>">
        </div>

        <div class="form_group">
            <label>Conteudo:</label>
            <textarea class="tinymce" name="conteudo"><?php echo $portfolio['conteudo']; ?></textarea>
        </div>

        <div class="form_group">
            <label>Categoria:</label>

            <select name="categoria_id">
            <?php
                $categorias = Painel::selectAll('tb_site_categorias');
                foreach ($categorias as $key => $value){ ?>

                <option <?php if($value['id'] == $portfolio['categoria_id']) echo'selected'; ?> value="<?php echo $value['id']?>"> <?php echo $value['nome']; ?> </option>

                <?php } ?>
            
            </select>
        </div>

        <div class="form_group">
            <label>Imagem:</label>
            <input type="file" name="capa">
            <input type="hidden" name="imagem_atual" value="<?php echo $portfolio['capa']; ?>">
        </div>

        <!-- input oculto para passar o id do usuario -->
        <input type="hidden" name="id_usuario" value="<?php echo $_SESSION['id_usuario'];?>">

        <div class="form_group">
            <input type="submit" name="acao" value="Atualizar!">
        </div> 

    </form>


</div>