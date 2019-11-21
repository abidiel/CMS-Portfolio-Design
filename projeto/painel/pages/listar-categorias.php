<?php
    // deletando depoimentos
    if(isset($_GET['excluir'])){
        $idExcluir = intval($_GET['excluir']);;
        Painel::deletar('tb_site_categorias',$idExcluir);

        //apos deletar, redirecionar
        //isso é feito pois o os parametros da exclusao ficam na url
        Painel::redirect(INCLUDE_PATH_PAINEL.'listar-categorias');
    }else if(isset($_GET['order']) && isset($_GET['id'])){
        Painel::orderItem('tb_site_categorias',$_GET['order'],$_GET['id']);
    }


    //se get pagina tiver valor, atribui a variavel pagina atual
    // o int antes do get é p transformar em inteiro
    $paginaAtual = isset($_GET['pagina']) ? (int)$_GET['pagina'] : 1;
    $porPagina = 4;
    $categorias = Painel::selectAll('tb_site_categorias',($paginaAtual - 1) * $porPagina,$porPagina);
    
?>

<div class="box_content">
    
    <h2 class="title_content">Listagem de categorias</h2>

    <div class="wraper_table">
        <table>
            <tr>
                <td>Nome</td>
                <td>-</td>
                <td>-</td>
                <td>-</td>
                <td>-</td>
            </tr>

            <?php
                foreach ($categorias as $key => $value){
            ?>        

            <tr>
                <td><?php echo $value['nome']; ?></td>
                 <td><a href="<?php echo INCLUDE_PATH_PAINEL ?>editar-categoria?id=<?php echo $value['id']; ?>" class="btn_ edit"><i class="fa fa-edit"></i> Editar</a></td>
                <td><a actionBtn="delete" href="<?php echo INCLUDE_PATH_PAINEL ?>listar-categorias?excluir=<?php echo $value['id']; ?>" class="btn_ delete"><i class="fa fa-times"></i> Excluir</a></td>
                <td><a href="<?php echo INCLUDE_PATH_PAINEL ?>listar-categorias?order=up&id=<?php echo $value['id']; ?>" class="btn order"><i class="fa fa-angle-up"></i></a></td>
                <td><a href="<?php echo INCLUDE_PATH_PAINEL ?>listar-categorias?order=down&id=<?php echo $value['id']; ?>" class="btn order"><i class="fa fa-angle-down"></i></a></td>
            </tr>
                <?php } ?>
        </table>
    </div>

    <div class="paginacao">
        <?php
            // ceil arredonda os números.
            $totalPaginas = ceil(count(Painel::selectAll('tb_site_categorias')) / $porPagina);

            for($i = 1; $i <= $totalPaginas; $i++){
                if ($i == $paginaAtual){
                    echo '<a class="page_active" href="'.INCLUDE_PATH_PAINEL.'listar-categorias?pagina='.$i.'">'.$i.'</a>';
                }else{
                    echo '<a href="'.INCLUDE_PATH_PAINEL.'listar-categorias?pagina='.$i.'">'.$i.'</a>';
                }
            }
        ?>

    </div>

</div>