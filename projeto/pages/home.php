

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

		<!-- sessão sobre -->
		<section class="sessao_do_site sessao_pad sessao_sobre sobre">
			<div class="container">

				<div class="row justify-content-center">		
					<div class="sobre_capa col-6 col-md-3 marginTopBottom">
						<img src="assets/images/perfil.jpg" alt="" title="" class="sobre_img img-fluid br50" />
					</div>													
				</div>

				<div class="row justify-content-center">
					<div class="header_sessao text-center">
							<h2 class="header_sessao_h2 hzmp"><?php echo $infoSite['nome_autor'] ?></h2>
					</div>	
				</div>

				<div class="row justify-content-center">
					<div class="sobre_txts col-11 col-md-8 marginTopBottom">
						<div class="sobre_texto">
							<p class="sobre_p">
								<?php echo $infoSite['descricao'] ?>
							</p>
						</div>
					</div>
				</div>

			</div>
		</section>
		<!-- / sessão sobre -->


		<!-- sessao front end -->
		<section class="sessao_do_site sessao_pad sessao_front front">
			<div class="container">

				<div class="row justify-content-center">
					<div class="header_sessao text-center">
						<h2 class="header_sessao_h2 hzmp">Skills Front End</h2>
						<hr class="header_sessao_hr hzmp">
					</div>	
				</div>
				<div class="cards_front_end">
					<ul class="cards_front_end_ul row justify-content-center hzmp">
						
						<li class="cards_front_end_li col-11 col-sm-8 col-md-5 col-lg-4 marginTopBottom">
							<div class="cards_front_end_content br10">
								<div class="cards_front_end_capa br50">
									<i class="<?php echo $infoSite['icone1'] ?> cards_i"></i>
								</div>
								<div class="cards_front_end_conteudos">
									<div class="cards_front_end_txts">
										<div class="cards_front_end_titulo"><h2 class="cards_front_end_h2 hzmp"><?php echo $infoSite['titulo1'] ?></h2></div>
										<div class="cards_front_end_texto"><h3 class="cards_front_end_h3 hzmp"><?php echo $infoSite['descricao1'] ?></h3></div>
									</div>
								</div>
							</div>
						</li>

						<li class="cards_front_end_li col-11 col-sm-8 col-md-5 col-lg-4 marginTopBottom">
							<div class="cards_front_end_content br10">
								<div class="cards_front_end_capa br50">
									<i class="<?php echo $infoSite['icone2'] ?> cards_i"></i>
								</div>
								<div class="cards_front_end_conteudos">
									<div class="cards_front_end_txts">
										<div class="cards_front_end_titulo"><h2 class="cards_front_end_h2 hzmp"><?php echo $infoSite['titulo2'] ?></h2></div>
										<div class="cards_front_end_texto"><h3 class="cards_front_end_h3 hzmp"><?php echo $infoSite['descricao2'] ?></h3></div>
									</div>
								</div>
							</div>
						</li>

						<li class="cards_front_end_li col-11 col-sm-8 col-md-5 col-lg-4 marginTopBottom">
							<div class="cards_front_end_content br10">
								<div class="cards_front_end_capa br50">
									<i class="<?php echo $infoSite['icone3'] ?> cards_i"></i>
								</div>
								<div class="cards_front_end_conteudos">
									<div class="cards_front_end_txts">
										<div class="cards_front_end_titulo"><h2 class="cards_front_end_h2 hzmp"><?php echo $infoSite['titulo3'] ?></h2></div>
										<div class="cards_front_end_texto"><h3 class="cards_front_end_h3 hzmp"><?php echo $infoSite['descricao3'] ?></h3></div>
									</div>
								</div>
							</div>
						</li>

						
					</ul>
				</div>		

			</div>
		</section>
		<!-- / sessão front-end -->

		<!-- sessao design -->
		<section class="sessao_do_site sessao_pad sessao_design design">
			<div class="container">

				<div class="row justify-content-center">
					<div class="header_sessao text-center">
						<h2 class="header_sessao_h2 hzmp">Skills Design</h2>
						<hr class="header_sessao_hr hzmp">
					</div>	
				</div>
				<div class="cards_design">
					<ul class="cards_design_ul row justify-content-center hzmp">
						
						<li class="cards_design_li col-11 col-sm-8 col-md-5 col-lg-4 marginTopBottom">
							<div class="cards_design_content br10">
								<div class="cards_design_capa br50">
									<i class="<?php echo $infoSite['icone4'] ?> cards_i"></i>
								</div>
								<div class="cards_design_conteudos">
									<div class="cards_design_txts">
										<div class="cards_design_titulo"><h2 class="cards_design_h2 hzmp"><?php echo $infoSite['titulo4'] ?></h2></div>
										<div class="cards_design_texto"><h3 class="cards_design_h3 hzmp"><?php echo $infoSite['descricao4'] ?></h3></div>
									</div>
								</div>
							</div>
						</li>

						<li class="cards_design_li col-11 col-sm-8 col-md-5 col-lg-4 marginTopBottom">
							<div class="cards_design_content br10">
								<div class="cards_design_capa br50">
									<i class="<?php echo $infoSite['icone5'] ?> cards_i"></i>
								</div>
								<div class="cards_design_conteudos">
									<div class="cards_design_txts">
										<div class="cards_design_titulo"><h2 class="cards_design_h2 hzmp"><?php echo $infoSite['titulo5'] ?></h2></div>
										<div class="cards_design_texto"><h3 class="cards_design_h3 hzmp"><?php echo $infoSite['descricao5'] ?></h3></div>
									</div>
								</div>
							</div>
						</li>

						<li class="cards_design_li col-11 col-sm-8 col-md-5 col-lg-4 marginTopBottom">
							<div class="cards_design_content br10">
								<div class="cards_design_capa br50">
									<i class="<?php echo $infoSite['icone6'] ?> cards_i"></i>
								</div>
								<div class="cards_design_conteudos">
									<div class="cards_design_txts">
										<div class="cards_design_titulo"><h2 class="cards_design_h2 hzmp"><?php echo $infoSite['titulo6'] ?></h2></div>
										<div class="cards_design_texto"><h3 class="cards_design_h3 hzmp"><?php echo $infoSite['descricao6'] ?></h3></div>
									</div>
								</div>
							</div>
						</li>

						
					</ul>
				</div>		

			</div>
		</section>
		<!-- / sessão design -->

		<!-- sessao depoimentos -->
		<section class="sessao_do_site sessao_pad sessao_depoimentos depoimentos">
			<div class="container">

				<div class="cards_depoimentos">
					<ul class="cards_depoimentos_ul row justify-content-center hzmp">
						
						<?php
							$sql = MySql::conectar()->prepare("SELECT * FROM tb_site_depoimentos ORDER BY order_id ASC LIMIT 3");
							$sql->execute();
							$depoimentos = $sql->fetchAll();
							foreach ($depoimentos as $key => $value){
						?>

						<li class="cards_depoimentos_li col-12 col-sm-8 col-md-6 col-lg-4 marginTopBottom">
							<div class="cards_depoimentos_content br10">
								<div class="cards_depoimentos_capa br50">
									<i class="fas fa-quote-left cards_i"></i>
								</div>
								<div class="cards_depoimentos_conteudos">
									<div class="cards_depoimentos_txts">
										<div class="cards_depoimentos_texto">
											<h3 class="cards_depoimentos_h3 hzmp"><?php echo $value['depoimento']; ?></h3>
										</div>
										<div class="cards_depoimentos_titulo">
											<h2 class="cards_depoimentos_h2 hzmp"><?php echo $value['nome']; ?></h2>
											<h1 class="cards_depoimentos_h1 hzmp"><?php echo $value['data']; ?></h1>
										</div>
									</div>
								</div>
							</div>
						</li>

						<?php } ?>

					</ul>
				</div>		

			</div>
		</section>
		<!-- / sessão depoimentos -->


		<!-- sessao newsletter -->
		<section class="sessao_do_site sessao_pad sessao_newsletter newsletter">
			<div class="container">

				<div class="row justify-content-center">
					<div class="header_sessao text-center">
						<h3 class="header_sessao_h3 hzmp">Inscreva-se para receber conteúdos grátis</h3>
						<hr class="header_sessao_hr hzmp">
					</div>	
				</div>	

				<div class="row col-12 hzmp justify-content-center">

					<div class="form_newsletter">
						<form action="" method="post" name="formNewsletter">
							<ul class="form_newsletter_ul hzmp">
								
								<li class="form_newsletter_li">
									<input type="email" name="email" placeholder="Digite seu email" class="br25 form_f form_campo form_campo_jewsletter" />
								</li>

								<li class="form_newsletter_li text-center">
									<button class="btn_ btn_xl btn_layout br25 form_botao_newsletter">
										<i class="fas fa-paper-plane form_news_button_icone"></i>
										<span class="form_botao_newsletter_span">Realizar cadastro</span>
									</button>
								</li>

							</ul>
						</form>
					</div>

				</div>	

			</div>
		</section>
		<!-- / sessão newsletter -->

	</main>
	<!-- / main site ( conteúdos do site ) -->