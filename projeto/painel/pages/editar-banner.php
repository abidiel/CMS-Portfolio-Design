<?php 
    if(isset($_GET['id'])){
        $id = (int)$_GET['id'];
        $slide = Painel::select('tb_site_slides','id = ?', array($id));
    }else{
        Painel::alerta('erro','Você precisa passar o parâmetro id');
        die();
    }
?>

<div class="box_content">
    
    <h2 class="title_content">Editar banner</h2>

    <!-- Este parametro em enctype é para permitir o envio de imagens -->
    <form method="post" enctype="multipart/form-data">

        <?php
            if(isset($_POST['acao'])){

                $nome = $_POST['nome'];
                $imagem = $_FILES['imagem'];
                $imagem_atual = $_POST['imagem_atual'];


                // testa se o usuario selecionou alguma imagem
                if($imagem['name'] != ''){

                    if(Painel::imagemValida($imagem)){
                        Painel::deleteFile($imagem_atual);
                        $imagem = Painel::uploadFile($imagem);
                        $arr = ['nome' => $nome,'slide'=>$imagem,'id'=> $id,'nome_tabela'=>'tb_site_slides'];
                        Painel::update($arr);
                        $slide = Painel::select('tb_site_slides','id = ?', array($id));
                        Painel::alerta('sucesso','O banner foi editado com sucesso (com imagem)!'); 
                    }
                    else{
                        Painel::alerta('erro', 'O formato da imagem é inválido');
                    }

                    
                }else{
                    $imagem = $imagem_atual;       
                    $arr = ['nome' => $nome,'slide'=>$imagem,'id'=> $id,'nome_tabela'=>'tb_site_slides'];
                    Painel::update($arr);    
                    $slide = Painel::select('tb_site_slides','id = ?', array($id));
                    Painel::alerta('sucesso','O banner foi editado com sucesso (sem imagem)!');                
                }
            }
        ?>

        <!-- Os valores do value de cada campo são dinamicos, trazidos do banco. -->

        <div class="form_group">
            <label>Nome:</label>
            <input type="text" name="nome" required value="<?php echo $slide['nome']; ?>">
        </div>

        <div class="form_group">
            <label>Imagem:</label>
            <input type="file" name="imagem">
            <input type="hidden" name="imagem_atual" value="<?php echo $slide['slide']; ?>">
        </div>

        <!-- input oculto para passar o id do usuario -->
        <input type="hidden" name="id_usuario" value="<?php echo $_SESSION['id_usuario'];?>">

        <div class="form_group">
            <input type="submit" name="acao" value="Atualizar!">
        </div> 

    </form>


</div>