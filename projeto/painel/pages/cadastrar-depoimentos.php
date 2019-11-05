<div class="box_content">
    
    <h2 class="title_content">Adicionar depoimentos</h2>

    <!-- Este parametro em enctype é para permitir o envio de imagens -->
    <form method="post" enctype="multipart/form-data">

        <?php
            if(isset($_POST['acao'])){
                if(Painel::insert($_POST)){
                    Painel::alerta('sucesso','O Cadastro do depoimento foi feito com sucesso!');
                }else{
                    Painel::alerta('erro','Campos obrigatórios.');
                }
                  
            }
        ?>

        <div class="form_group">
            <label>Nome:</label>
            <input type="text" name="nome"  value="">
        </div>

        <div class="form_group">
            <label>Depoimento:</label>
            <textarea name="depoimento"></textarea>
        </div>

        <div class="form_group">
            <label>Data:</label>
            <input type="text" name="data" formato="data" value="">
        </div>

        <div class="form_group">
            <input type="hidden" name="nome_tabela" value="tb_site_depoimentos">
            <input type="submit" name="acao" value="Cadastrar!">
        </div> 

    </form>


</div>