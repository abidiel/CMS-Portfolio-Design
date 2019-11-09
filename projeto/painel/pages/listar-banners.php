<?php
    // deletando depoimentos
    if(isset($_GET['excluir'])){
        $idExcluir = intval($_GET['excluir']);
        $selectImagem = MySql::conectar()->prepare("SELECT slide FROM tb_site_slides WHERE id = ?");
        $selectImagem->execute(array($_GET['excluir']));

        $imagem = $selectImagem->fetch()['slide'];
        Painel::deleteFile($imagem);

        Painel::deletar('tb_site_slides',$idExcluir);

        //apos deletar, redirecionar
        //isso é feito pois o os parametros da exclusao ficam na url
        Painel::redirect(INCLUDE_PATH_PAINEL.'listar-banners');
    }else if(isset($_GET['order']) && isset($_GET['id'])){
        Painel::orderItem('tb_site_slides',$_GET['order'],$_GET['id']);
    }


    //se get pagina tiver valor, atribui a variavel pagina atual
    // o int antes do get é p transformar em inteiro
    $paginaAtual = isset($_GET['pagina']) ? (int)$_GET['pagina'] : 1;
    $porPagina = 4;
    $slides = Painel::selectAll('tb_site_slides',($paginaAtual - 1) * $porPagina,$porPagina);
    
?>

<div class="box_content">
    
    <h2 class="title_content">Listagem de banners</h2>

    <div class="wraper_table">
        <table>
            <tr>
                <td>Nome</td>
                <td>Imagem</td>
                <td>-</td>
                <td>-</td>
                <td>-</td>
                <td>-</td>
            </tr>

            <?php
                foreach ($slides as $key => $value){
            ?>        

            <tr>
                <td><?php echo $value['nome']; ?></td>
                <td><img class="thumb_painel" src="<?php echo INCLUDE_PATH_PAINEL?>assets/uploads/<?php echo $value['slide']; ?>"</td>
                <td><a href="<?php echo INCLUDE_PATH_PAINEL ?>editar-slides?id=<?php echo $value['id']; ?>" class="btn_ edit"><i class="fa fa-edit"></i> Editar</a></td>
                <td><a actionBtn="delete" href="<?php echo INCLUDE_PATH_PAINEL ?>listar-banners?excluir=<?php echo $value['id']; ?>" class="btn_ delete"><i class="fa fa-times"></i> Excluir</a></td>
                <td><a href="<?php echo INCLUDE_PATH_PAINEL ?>listar-banners?order=up&id=<?php echo $value['id']; ?>" class="btn order"><i class="fa fa-angle-up"></i></a></td>
                <td><a href="<?php echo INCLUDE_PATH_PAINEL ?>listar-banners?order=down&id=<?php echo $value['id']; ?>" class="btn order"><i class="fa fa-angle-down"></i></a></td>
            </tr>
                <?php } ?>
        </table>
    </div>

    <div class="paginacao">
        <?php
            // ceil arredonda os números.
            $totalPaginas = ceil(count(Painel::selectAll('tb_site_slides')) / $porPagina);

            for($i = 1; $i <= $totalPaginas; $i++){
                if ($i == $paginaAtual){
                    echo '<a class="page_active" href="'.INCLUDE_PATH_PAINEL.'listar-banners?pagina='.$i.'">'.$i.'</a>';
                }else{
                    echo '<a href="'.INCLUDE_PATH_PAINEL.'listar-banners?pagina='.$i.'">'.$i.'</a>';
                }
            }
        ?>

    </div>

</div>