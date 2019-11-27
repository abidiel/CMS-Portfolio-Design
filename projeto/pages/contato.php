<main class="main_site">

	<!-- sessão contato -->
	<section class="sessao_do_site sessao_pad sessao_contato contato">
		<div class="container">

			<div class="header_sessao text-center">
				<header>
					<h2 class="header_sessao_h2 hzmp">Contato</h2>
				</header>
				<hr class="header_sessao_hr hzmp">
			</div>

			<div class="lista_sessao">

				<div class="contato">
					<ul class="contato_ul row justify-content-center hzmp">

						<li class="contato_li col-11 col-lg-6 marginTopBottom">

							<div class="form_contato">
								<form method="post" action="<?php echo INCLUDE_PATH ?>mail/envio.php">

									<?php
									if (isset($_POST['acao'])) {
										if (Painel::insert($_POST)) {
											Painel::alerta('sucesso', 'Contato enviado com sucesso!');
										} else {
											Painel::alerta('erro', 'Campos obrigatórios.');
										}
									}
									?>

									<ul class="form_contato_ul hzmp">

										<li class="form_contato_li">
											<input type="text" name="nome" placeholder="Digite seu nome" class="form_f form_campo form_campo_contato" required />
										</li>

										<li class="form_contato_li">
											<input type="email" name="email" placeholder="Digite seu email" class="form_f form_campo form_campo_contato" required />
										</li>

										<li class="form_contato_li">
											<input type="text" formato="tel" name="telefone" placeholder="Digite seu telefone" class="form_f form_campo form_campo_contato" required />
										</li>

										<li class="form_contato_li">
											<textarea name="mensagem" placeholder="Digite sua mensagem" class="form_f form_texto form_campo form_campo_contato" required></textarea>
										</li>

										<li class="form_contato_li text-center">

											<input type="hidden" name="nome_tabela" value="tb_site_contatos">
											<input type="hidden" name="order_id" value="0">
											<button type="submit" name="acao">Enviar!</button>

										</li>

									</ul>
								</form>
							</div>

						</li>

					</ul>
				</div>

			</div>

			<div class="cards_contato">
				<ul class="cards_contato_ul row justify-content-center hzmp">

					<li class="cards_contato_li col-12 col-sm-6 col-md-5 col-lg-4 marginTopBottom">
						<a class="cards_contato_a" href="<?php echo $infoSite['facebook']; ?>" target="_blank">
							<div class="cards_contato_content br10 transitions3">
								<div class="cards_contato_capa">
									<i class="fab fa-facebook-f contato_i"></i>
								</div>
								<div class="cards_contato_conteudos">
									<div class="cards_contato_txts">
										<div class="cards_contato_titulo">
											<h2 class="cards_contato_h2 hzmp">Facebook</h2>
										</div>
									</div>
								</div>
							</div>
						</a>
					</li>

					<li class="cards_contato_li col-12 col-sm-6 col-md-5 col-lg-4 marginTopBottom">
						<a href="<?php echo $infoSite['instagram']; ?>" target="_blank">
							<div class="cards_contato_content br10 transitions3">
								<div class="cards_contato_capa">
									<i class="fab fa-instagram contato_i"></i>
								</div>
								<div class="cards_contato_conteudos">
									<div class="cards_contato_txts">
										<div class="cards_contato_titulo">
											<h2 class="cards_contato_h2 hzmp">Instagram</h2>
										</div>
									</div>
								</div>
							</div>
						</a>
					</li>

				</ul>
			</div>

		</div>
	</section>
	<!-- / sessão contato -->

</main>