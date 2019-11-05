<?php
    //se get pagina tiver valor, atribui a variavel pagina atual
    // o int antes do get é p transformar em inteiro
    $paginaAtual = isset($_GET['pagina']) ? (int)$_GET['pagina'] : 1;
    $porPagina = 4;
    $depoimentos = Painel::selectAll('tb_site_depoimentos',($paginaAtual - 1) * $porPagina,$porPagina);
    
?>

<div class="box_content">
    
    <h2 class="title_content">Listagem depoimentos</h2>

    <div class="wraper_table">
        <table>
            <tr>
                <td>Nome</td>
                <td>Data</td>
                <td>-</td>
                <td>-</td>
            </tr>

            <?php
                foreach ($depoimentos as $key => $value){
            ?>        

            <tr>
                <td><?php echo $value['nome']; ?></td>
                <td><?php echo $value['data']; ?></td>
                <td><a href="#" class="btn_ edit"><i class="fa fa-edit"></i> Editar</a></td>
                <td><a href="#" class="btn_ delete"><i class="fa fa-times"></i> Excluir</a></td>
                
            </tr>
                <?php } ?>
        </table>
    </div>

    <div class="paginacao">
        <?php
            // ceil arredonda os números.
            $totalPaginas = ceil(count(Painel::selectAll('tb_site_depoimentos')) / $porPagina);

            for($i = 1; $i <= $totalPaginas; $i++){
                if ($i == $paginaAtual){
                    echo '<a class="page_active" href="'.INCLUDE_PATH_PAINEL.'listar-depoimentos?pagina='.$i.'">'.$i.'</a>';
                }else{
                    echo '<a href="'.INCLUDE_PATH_PAINEL.'listar-depoimentos?pagina='.$i.'">'.$i.'</a>';
                }
            }
        ?>

    </div>

</div>