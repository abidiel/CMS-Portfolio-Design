<div class="box_content">
    
    <h2 class="title_content">Cadastrar banner</h2>

    <!-- Este parametro em enctype é para permitir o envio de imagens -->
    <form method="post" enctype="multipart/form-data">

        <?php
            if(isset($_POST['acao'])){

                $nome = $_POST['nome'];
                $imagem = $_FILES['imagem'];
                
                if($nome == ''){
                    Painel::alerta('erro','O campo nome não pode estar vazio');
                }                  
                else{
                    if(Painel::imagemValida($imagem) == false){
                        Painel::alerta('erro','O formato da imagem esta incorreto.');
                    }else{
                        // Podemos cadastrar
                        $imagem = Painel::uploadFile($imagem);
                        $arr = ['nome' => $nome,'slide'=>$imagem,'order_id'=>'0','nome_tabela'=>'tb_site_slides'];
                        Painel::insert($arr);
                        Painel::alerta('sucesso','O Cadastro do banner foi feito com sucesso!');  
                        
                    }

                }
            }
        ?>

        <!-- Os valores do value de cada campo são dinamicos, trazidos do banco. -->
        <div class="form_group">
            <label>Nome do banner:</label>
            <input type="text" name="nome"  value="">
        </div>
 

        <div class="form_group">
            <label>Imagem:</label>
            <input type="file" name="imagem"  value="">
            <input type="hidden" name="imagem_atual" value="">
        </div>

        <!-- input oculto para passar o id do usuario -->
        <input type="hidden" name="id_usuario" value="<?php echo $_SESSION['id_usuario'];?>">

        <div class="form_group">
            <input type="submit" name="acao" value="Cadastrar!">
        </div> 

    </form>


</div>