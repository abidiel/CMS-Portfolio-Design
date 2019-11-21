<div class="box_content">
    
    <h2 class="title_content">Cadastrar categoria</h2>

    <!-- Este parametro em enctype é para permitir o envio de imagens -->
    <form method="post" enctype="multipart/form-data">

        <?php
            if(isset($_POST['acao'])){

                $nome = $_POST['nome'];
                
                if($nome == ''){
                    Painel::alerta('erro','O campo nome não pode estar vazio');
                }                  
                else{
                    // Podemos cadastrar
                    $verificar = MySql::conectar()->prepare("SELECT * FROM tb_site_categorias WHERE nome = ?");
                    $verificar->execute(array($_POST['nome']));
                    if($verificar->rowCount() == 0){
                        $slug = Painel::generateSlug($nome);
                        $arr = ['nome' => $nome,'slug'=>$slug,'order_id'=>'0','nome_tabela'=>'tb_site_categorias'];
                        Painel::insert($arr);
                        Painel::alerta('sucesso','O Cadastro da categoria '.$nome.' foi feito com sucesso!'); 
                    }else{
                        Painel::alerta('erro','Já existe uma categoria com o nome '.$nome);
                    }

    
                }

                
            }
        ?>

        <!-- Os valores do value de cada campo são dinamicos, trazidos do banco. -->
        <div class="form_group">
            <label>Nome da categoria:</label>
            <input type="text" name="nome"  value="">
        </div>
 
        <!-- input oculto para passar o id do usuario -->
        <input type="hidden" name="id_usuario" value="<?php echo $_SESSION['id_usuario'];?>">

        <div class="form_group">
            <input type="submit" name="acao" value="Cadastrar!">
        </div> 

    </form>


</div>