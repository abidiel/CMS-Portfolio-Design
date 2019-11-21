<?php
    // deletando depoimentos
    if(isset($_GET['excluir'])){
        $idExcluir = intval($_GET['excluir']);
        $selectImagem = MySql::conectar()->prepare("SELECT capa FROM tb_site_portfolio WHERE id = ?");
        $selectImagem->execute(array($_GET['excluir']));

        $imagem = $selectImagem->fetch()['capa'];
        Painel::deleteFile($imagem);

        Painel::deletar('tb_site_portfolio',$idExcluir);

        //apos deletar, redirecionar
        //isso é feito pois o os parametros da exclusao ficam na url
        Painel::redirect(INCLUDE_PATH_PAINEL.'listar-portfolio');
    }else if(isset($_GET['order']) && isset($_GET['id'])){
        Painel::orderItem('tb_site_portfolio',$_GET['order'],$_GET['id']);
    }


    //se get pagina tiver valor, atribui a variavel pagina atual
    // o int antes do get é p transformar em inteiro
    $paginaAtual = isset($_GET['pagina']) ? (int)$_GET['pagina'] : 1;
    $porPagina = 4;
    $portfolio = Painel::selectAll('tb_site_portfolio',($paginaAtual - 1) * $porPagina,$porPagina);
    
?>

<div class="box_content">
    
    <h2 class="title_content">Posts no portfolio</h2>

    <div class="wraper_table">
        <table>
            <tr>
                <td>Título</td>
                <td>Categoria</td>
                <td>Imagem</td>
                <td>-</td>
                <td>-</td>
                <td>-</td>
                <td>-</td>
            </tr>

            <?php
                foreach ($portfolio as $key => $value){

                $nomeCategoria = Painel::select('tb_site_categorias','id=?',array($value['categoria_id'])) ['nome'];

            ?>        

            <tr>
                <td><?php echo $value['titulo']; ?></td>
                <td><?php echo $nomeCategoria; ?></td>
                <td><img class="thumb_painel" src="<?php echo INCLUDE_PATH_PAINEL?>assets/uploads/<?php echo $value['capa']; ?>"</td>
                <td><a href="<?php echo INCLUDE_PATH_PAINEL ?>editar-portfolio?id=<?php echo $value['id']; ?>" class="btn_ edit"><i class="fa fa-edit"></i> Editar</a></td>
                <td><a actionBtn="delete" href="<?php echo INCLUDE_PATH_PAINEL ?>listar-portfolio?excluir=<?php echo $value['id']; ?>" class="btn_ delete"><i class="fa fa-times"></i> Excluir</a></td>
                <td><a href="<?php echo INCLUDE_PATH_PAINEL ?>listar-portfolio?order=up&id=<?php echo $value['id']; ?>" class="btn order"><i class="fa fa-angle-up"></i></a></td>
                <td><a href="<?php echo INCLUDE_PATH_PAINEL ?>listar-portfolio?order=down&id=<?php echo $value['id']; ?>" class="btn order"><i class="fa fa-angle-down"></i></a></td>
            </tr>
                <?php } ?>
        </table>
    </div>

    <div class="paginacao">
        <?php
            // ceil arredonda os números.
            $totalPaginas = ceil(count(Painel::selectAll('tb_site_portfolio')) / $porPagina);

            for($i = 1; $i <= $totalPaginas; $i++){
                if ($i == $paginaAtual){
                    echo '<a class="page_active" href="'.INCLUDE_PATH_PAINEL.'listar-portfolio?pagina='.$i.'">'.$i.'</a>';
                }else{
                    echo '<a href="'.INCLUDE_PATH_PAINEL.'listar-portfolio?pagina='.$i.'">'.$i.'</a>';
                }
            }
        ?>

    </div>

</div>