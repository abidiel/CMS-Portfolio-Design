<?php
	$url = explode('/',$_GET['url']);
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
																		<p class="lista_portfolio_data_p hzmp"><i class="far fa-calendar-alt lista_portfolio_data_i"></i><span class="lista_portfolio_data_span">08 de Maio de 2019</span></p>
																	</div>
																	<div class="lista_portfolio_titulo">
																		<a class="lista_portfolio_a" title="" href="#">
																			<header class="header_article"><h3 class="lista_portfolio_h3 transitions5 hzmp">Lorem ipsum dolor sitamet consectetur adipisicing elit mollitia non quibusdam eaque velcum 01</h3></header>
																		</a>
																	</div>
																	<div class="lista_portfolio_texto">
																		<p class="lista_portfolio_p">
																			TESTELorem ipsum dolor sit amet, consectetur adipisicing elit. Labore corporis tenetur, tempore suscipit. Cum, unde voluptatem obcaecati, culpa doloremque est iusto qui mollitia iste ducimus, quo. Dicta necessitatibus ut iure cum illum dolor, adipisci voluptatem placeat, esse fuga. Incidunt, laudantium temporibus ipsa autem expedita saepe molestiae dolorum
																		</p>
																		<p class="lista_portfolio_p">
																				Lorem ipsum dolor sit amet, consectetur adipisicing elit. Labore corporis tenetur, tempore suscipit. Cum, unde voluptatem obcaecati, culpa doloremque est iusto qui mollitia iste ducimus, quo. Dicta necessitatibus ut iure cum illum dolor, adipisci voluptatem placeat, esse fuga. Incidunt, laudantium temporibus ipsa autem expedita saepe molestiae dolorum
																		</p>
																		<p class="lista_portfolio_p">
																				Lorem ipsum dolor sit amet, consectetur adipisicing elit. Labore corporis tenetur, tempore suscipit. Cum, unde voluptatem obcaecati, culpa doloremque est iusto qui mollitia iste ducimus, quo. Dicta necessitatibus ut iure cum illum dolor, adipisci voluptatem placeat, esse fuga. Incidunt, laudantium temporibus ipsa autem expedita saepe molestiae dolorum
																		</p>	
																		<img src="assets/images/portfolio-01-interna.png" class="img-fluid">
																		<p class="lista_portfolio_p">
																				Lorem ipsum dolor sit amet, consectetur adipisicing elit. Labore corporis tenetur, tempore suscipit. Cum, unde voluptatem obcaecati, culpa doloremque est iusto qui mollitia iste ducimus, quo. Dicta necessitatibus ut iure cum illum dolor, adipisci voluptatem placeat, esse fuga. Incidunt, laudantium temporibus ipsa autem expedita saepe molestiae dolorum
																		</p>
																		<p class="lista_portfolio_p">
																				Lorem ipsum dolor sit amet, consectetur adipisicing elit. Labore corporis tenetur, tempore suscipit. Cum, unde voluptatem obcaecati, culpa doloremque est iusto qui mollitia iste ducimus, quo. Dicta necessitatibus ut iure cum illum dolor, adipisci voluptatem placeat, esse fuga. Incidunt, laudantium temporibus ipsa autem expedita saepe molestiae dolorum
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
																	
																	<li class="share_artigo_li"><a class="share_artigo_a transitions5" title="" target="_blank" href=""><i class="fab fa-facebook-f share_artigo_i"></i></a></li>
																	<li class="share_artigo_li"><a class="share_artigo_a transitions5" title="" target="_blank" href=""><i class="fab fa-instagram share_artigo_i"></i></a></li>
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
	
										<!-- sidebar internas -->
										<aside class="sidebar_internas col-12 col-lg-3 marginTopBottom">
	
											<div class="acordeon">
												<div class="titulo_sidebar"><span>Categorias</span><i class="fas fa-caret-down icone_acordeon"></i></div>
												<ul>
													<li><a title="" href=""><i class="fas fa-angle-right acordeon_item_i"></i><span class="acorderon_item_span">Categoria 01</span></a></li>
													<li><a title="" href=""><i class="fas fa-angle-right acordeon_item_i"></i><span class="acorderon_item_span">Categoria 02</span></a></li>
													<li><a title="" href=""><i class="fas fa-angle-right acordeon_item_i"></i><span class="acorderon_item_span">Categoria 03</span></a></li>
												</ul>
											</div>
	
	
											<div class="acordeon">
												<div class="titulo_sidebar"><span>Arquivos</span><i class="fas fa-caret-down icone_acordeon"></i></div>
												<ul>
													<li><a title="" href=""><i class="fas fa-angle-right acordeon_item_i"></i><span class="acorderon_item_span">2019 - Outubro</span></a></li>
													<li><a title="" href=""><i class="fas fa-angle-right acordeon_item_i"></i><span class="acorderon_item_span">2019 - Novembro</span></a></li>
													<li><a title="" href=""><i class="fas fa-angle-right acordeon_item_i"></i><span class="acorderon_item_span">2019 - Dezembro</span></a></li>
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