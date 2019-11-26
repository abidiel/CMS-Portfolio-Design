<?php
	$url = explode('/',$_GET['url']);
	if(!isset($url[2])){

	$categoria = MySql::conectar()->prepare("SELECT * FROM tb_site_categorias WHERE slug = ?");
	$categoria->execute(array(@$url[1]));
	$categoria = $categoria->fetch();

	
?>

			<!-- main site ( conteúdos do site ) -->
			<main class="main_site">
				
				<!-- sessão banner -->
				<section class="sessao_do_site sessao_banner home">
					<div class="lista_sessao">


						<div class="lista_banner">
							<ul class="lista_banner_ul hzmp">

							<?php
									$sql = MySql::conectar()->prepare("SELECT * FROM tb_site_slides ORDER BY order_id ASC LIMIT 3");
									$sql->execute();
									$slides = $sql->fetchAll();
									foreach ($slides as $key => $value){
								?>


								<li class="lista_banner_li">
									<div class="lista_banner_content">
										<div class="lista_banner_capa">
											<img src="<?php echo INCLUDE_PATH_PAINEL?>assets/uploads/<?php echo $value['slide']; ?>" alt="" title="" class="lista_banner_img img-fluid" />
										</div>
									</div>
								</li>

							<?php } ?>

							</ul>
						</div>						

					</div>
				</section>
				<!-- / sessão banner -->

				<section class="sessao_do_site sessao_pad sessao_paginas_internas">
						<div class="container">
							
							<div class="lista_sessao">
								
								<div class="lista_portfolio_titulo_pagina ">
									<?php
										$porPagina = 2;
										if($categoria['nome'] == ''){ ?>
											<h2>Visualizando todos os posts </h2>
										<?php 
										}else{ ?>
											<h2>Visualizando os posts em: <a href="<?php echo INCLUDE_PATH?>portfolio/<?php echo $categoria['slug']; ?>"><?php echo $categoria['nome']; ?></a></h2>
										<?php }; 

										$query = "SELECT * FROM tb_site_portfolio ";
										if($categoria['nome'] != ''){
											$categoria['id'] = (int)$categoria['id'];
											 $query.="WHERE categoria_id = $categoria[id]";
										}

										
										$query2 = "SELECT * FROM tb_site_portfolio";
										if($categoria['nome'] != ''){
											$categoria['id'] = (int)$categoria['id'];
											$query2.=" WHERE categoria_id = $categoria[id]";
										}
										$totalPaginas = MySql::conectar()->prepare($query2);
										$totalPaginas->execute();
										$totalPaginas = ceil($totalPaginas->rowCount() / $porPagina);
																			

										if(isset($_GET['pagina'])){
											$pagina = (int)$_GET['pagina'];
											if($pagina > $totalPaginas){
												$pagina = 1;
											}
											
											$queryPg = ($pagina - 1) * $porPagina;
											$query.=" ORDER BY order_id ASC LIMIT $queryPg,$porPagina";
										}else{
											$pagina = 1;
											$query.=" ORDER BY order_id ASC LIMIT 0,$porPagina";
										}									

										$sql = MySql::conectar()->prepare($query);
										$sql->execute();
										$portfolio = $sql->fetchAll();

										//Define informações locais 
										setlocale(LC_TIME, 'pt_BR', 'pt_BR.utf-8', 'pt_BR.utf-8', 'portuguese');
										date_default_timezone_set('America/Sao_Paulo');
										?>
								</div>
							
								<!-- content sidebar -->
								<div class="content_sidebar">
									<ul class="content_sidebar_ul row justify-content-center hzmp">
										
										
										<!-- content internas -->
										<div class="content_internas col-12 col-lg-9 marginTopBottom">
											
											
											<!-- lista portfolio -->
											<div class="lista_portfolio">
												<div class="lista_portfolio_articles hzmp">

													<?php
														foreach($portfolio as $key=>$value){
														$sql = MySql::conectar()->prepare("SELECT slug FROM tb_site_categorias WHERE id = ?");
														$sql->execute(array($value['categoria_id']));
														$categoriaNome = $sql->fetch()['slug'];															
													?>
													
													<article class="lista_portfolio_article">
														<div class="lista_portfolio_content">
															<div class="lista_portfolio_capa">
																<a class="lista_portfolio_a" title="" href="<?php echo INCLUDE_PATH; ?>portfolio/<?php echo $categoriaNome; ?>/<?php echo $value['slug']; ?>">
																	<img src="<?php echo INCLUDE_PATH_PAINEL?>assets/uploads/<?php echo $value['capa']; ?>" alt="" title="" class="lista_portfolio_img img-fluid br10">
																</a>
															</div>
															<div class="lista_portfolio_conteudos">
																<div class="lista_portfolio_txts">
																	<div class="lista_portfolio_data">
																		<p class="lista_portfolio_data_p hzmp"><i class="far fa-calendar-alt lista_portfolio_data_i"></i><span class="lista_portfolio_data_span"><?php 	echo strftime('%d de %B de %Y', strtotime($value['data'])) . ""; ?></span></p>
																	</div>
																	<div class="lista_portfolio_titulo">
																		<a class="lista_portfolio_a" title="" href="<?php echo INCLUDE_PATH; ?>portfolio/<?php echo $categoriaNome; ?>/<?php echo $value['slug']; ?>">
																			<header class="header_article"><h3 class="lista_portfolio_h3 transitions5 hzmp"><?php echo $value['titulo']; ?></h3></header>
																		</a>
																	</div>
																	<div class="lista_portfolio_texto">
																		<p class="lista_portfolio_p">
																			<?php echo substr(strip_tags($value['conteudo']),0,150).'...';  ?>
																		</p>
																		<button class="lista_portfolio_btn transitions3" title="">
																			<a href="<?php echo INCLUDE_PATH; ?>portfolio/<?php echo $categoriaNome; ?>/<?php echo $value['slug']; ?>">Ver mais</a>
																		</button>
																	</div>
																		
																</div>
															</div>
														</div>
													</article>

													<?php }?>

												</div>
											</div>
											<!-- / lista portfolio -->
	
											<!-- paginação -->
											<div class="paginacao">



												<ul class="paginacao_ul hzmp">
													
													<?php
														for($i = 1; $i <= $totalPaginas; $i++){ 

															$catStr = ($categoria['nome'] != '') ? '/'.$categoria['slug'] : '';

															if($pagina == $i){ ?>
																<li class="paginacao_li"><a class="paginacao_a transitions5 paginacao_active" title="" href="<?php echo INCLUDE_PATH; ?>portfolio<?php echo $catStr; ?>?pagina=<?php echo $i; ?>"><?php echo $i; ?></a></li>
															<?php }else{ ?>
																<li class="paginacao_li"><a class="paginacao_a transitions5" title="" href="<?php echo INCLUDE_PATH; ?>portfolio<?php echo $catStr; ?>?pagina=<?php echo $i; ?>"><?php echo $i; ?></a></li>
															<?php } ?>
																
														<?php } ?>
	
												</ul>
											</div>
											<!-- / paginação -->
	
										</div>
										<!-- / content internas -->
	
										<!-- sidebar internas -->
										<aside class="sidebar_internas col-12 col-lg-3 marginTopBottom">
	
											<div class="acordeon">
												<div class="titulo_sidebar"><span>Categorias</span><i class="fas fa-caret-down icone_acordeon"></i></div>
												<ul>
													<?php
														$categorias = MySql::conectar()->prepare("SELECT * FROM tb_site_categorias ORDER BY order_id ASC");
														$categorias->execute();
														$categorias = $categorias->fetchAll();
														foreach($categorias as $key => $value){
															// vou precisar para o link: echo $value['slug'];
															?>

															<li><a title="" href="<?php echo INCLUDE_PATH?>portfolio/<?php echo $value['slug']; ?>"><i class="fas fa-angle-right acordeon_item_i"></i><span class="acorderon_item_span"><?php echo $value['nome']; ?></span></a></li>
														
														<?php 
														}
													?>													
													
												</ul>
											</div>
	
										</aside>
										<!-- / sidebar internas -->
	
									</ul>
								</div>
								<!-- / content sidebar -->
	
							</div>
	
						</div>
				</section>
			
			</main>
			<!-- main site ( conteúdos do site ) -->

			<?php }else{ 
	include('single-portfolio.php');
}
?>			
			