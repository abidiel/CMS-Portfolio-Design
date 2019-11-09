<?php
    // deletando depoimentos
    if(isset($_GET['excluir'])){
        $idExcluir = intval($_GET['excluir']);
        Painel::deletar('tb_admin_usuarios',$idExcluir);

        //apos deletar, redirecionar
        //isso é feito pois o os parametros da exclusao ficam na url
        Painel::redirect(INCLUDE_PATH_PAINEL.'listar-usuarios');
    }


    //se get pagina tiver valor, atribui a variavel pagina atual
    // o int antes do get é p transformar em inteiro
    $paginaAtual = isset($_GET['pagina']) ? (int)$_GET['pagina'] : 1;
    $porPagina = 4;
    $usuarios = Painel::selectAll('tb_admin_usuarios',($paginaAtual - 1) * $porPagina,$porPagina);
    
?>

<div class="box_content">
    
    <h2 class="title_content">Listagem de usuários</h2>

    <div class="wraper_table">
        <table>
            <tr>
                <td>Nome:</td>
                <td>Usuário:</td>
                <td>-</td>
            </tr>

            <?php
                foreach ($usuarios as $key => $value){
            ?>        

            <tr>
                <td><?php echo $value['nome']; ?></td>
                <td><?php echo $value['user']; ?></td>
                <td><a actionBtn="delete" href="<?php echo INCLUDE_PATH_PAINEL ?>listar-usuarios?excluir=<?php echo $value['id']; ?>" class="btn_ delete"><i class="fa fa-times"></i> Excluir</a></td>
                
            </tr>
                <?php } ?>
        </table>
    </div>

    <div class="paginacao">
        <?php
            // ceil arredonda os números.
            $totalPaginas = ceil(count(Painel::selectAll('tb_admin_usuarios')) / $porPagina);

            for($i = 1; $i <= $totalPaginas; $i++){
                if ($i == $paginaAtual){
                    echo '<a class="page_active" href="'.INCLUDE_PATH_PAINEL.'listar-usuarios?pagina='.$i.'">'.$i.'</a>';
                }else{
                    echo '<a href="'.INCLUDE_PATH_PAINEL.'listar-usuarios?pagina='.$i.'">'.$i.'</a>';
                }
            }
        ?>

    </div>

</div>