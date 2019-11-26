<?php
	$url = explode('/',$_GET['url']);
	

	$verifica_categoria = MySql::conectar()->prepare("SELECT * FROM `tb_site_categorias` WHERE slug = ?");
	$verifica_categoria->execute(array($url[1]));
	if($verifica_categoria->rowCount() == 0){
		Painel::redirect(INCLUDE_PATH.'portfolio');
	}
	$categoria_info = $verifica_categoria->fetch();

	$post = MySql::conectar()->prepare("SELECT * FROM `tb_site_portfolio` WHERE slug = ? AND categoria_id = ?");
	$post->execute(array($url[2],$categoria_info['id']));
	if($post->rowCount() == 0){
		Painel::redirect(INCLUDE_PATH.'portfolio');
	}

	//É POR QUE MINHA NOTICIA EXISTE
	$post = $post->fetch();


	//Define informações locais 
	setlocale(LC_TIME, 'pt_BR', 'pt_BR.utf-8', 'pt_BR.utf-8', 'portuguese');
	date_default_timezone_set('America/Sao_Paulo');

	$urlAtual = str_replace("Novo/", "", $_SERVER["REQUEST_URI"]);
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
								
								<!-- content sidebar -->
								<div class="content_sidebar">
									<ul class="content_sidebar_ul row justify-content-center hzmp">
										
										<!-- content internas -->
										<div class="content_internas col-12 col-lg-9 marginTopBottom">
											
											<!-- single portfolio -->
											<div class="lista_portfolio">
												<div class="lista_portfolio_articles hzmp">
													
													<article class="lista_portfolio_article">
														<div class="lista_portfolio_content">
															<div class="lista_portfolio_capa">
																<a class="lista_portfolio_a" title="" href="#">
																	<img src="assets/images/portfolio-01-capa.png" alt="" title="" class="lista_portfolio_img img-fluid br10">
																</a>
															</div>
															<div class="lista_portfolio_conteudos">
																<div class="lista_portfolio_txts">
																	<div class="lista_portfolio_data">
																		<p class="lista_portfolio_data_p hzmp"><i class="far fa-calendar-alt lista_portfolio_data_i"></i><span class="lista_portfolio_data_span"><?php echo strftime('%d de %B de %Y', strtotime($post['data'])); ?></span></p>
																	</div>
																	<div class="lista_portfolio_titulo">
																		<a class="lista_portfolio_a" title="" href="#">
																			<header class="header_article"><h3 class="lista_portfolio_h3 transitions5 hzmp"><?php echo $post['titulo']; ?></h3></header>
																		</a>
																	</div>
																	<div class="lista_portfolio_texto">
																		<p class="lista_portfolio_p">
																			<?php echo $post['conteudo']; ?>
																		</p>																		
																	</div>
																		
																</div>
															</div>
														</div>
													</article>
													
	
												</div>
											</div>
											<!-- / single portfolio -->
	
											<!-- compartilhar -->
											<div class="compartilhar">
													<ul class="compartilhar_ul hzmp">
													
														<li class="compartilhar_li"><p class="compartilhar_p hzmp">Compartilhar:</p></li>
														<li class="compartilhar_li">
															<div class="share_artigo">
																<ul class="share_artigo_ul hzmp">
																	
																	<li class="share_artigo_li"><a class="share_artigo_a transitions5" title="" target="_blank" href="http://www.facebook.com/sharer.php?u=<?php echo $urlAtual; ?>"><i class="fab fa-facebook-f share_artigo_i"></i></a></li>
																	<li class="share_artigo_li"><a class="share_artigo_a transitions5" title="" target="_blank" href=""><i class="fab fa-whatsapp share_artigo_i"></i></a></li>
		
																</ul>
															</div>
														</li>
		
													</ul>
												</div>
											<!-- / compartilhar -->

											<!-- plugin de comentários -->
											<div class="comentarios"><p class="comentarios_p hzmp">plugin de comentários aqui</p></div>
											<!-- / plugin de comentários -->

											
	
										</div>
										<!-- / content internas -->
	
									</ul>
								</div>
								<!-- / content sidebar -->
	
							</div>
	
						</div>
				</section>
			
			</main>
			<!-- main site ( conteúdos do site ) -->