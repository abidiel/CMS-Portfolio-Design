<?php 
	include ('config.php'); 
    $infoSite = MySql::conectar()->prepare("SELECT * FROM tb_site_config");
    $infoSite->execute();
    $infoSite = $infoSite ->fetch();
?>

<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<meta charset="utf-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
		<meta name="robots" content="index, follow" />
		<meta name="description" content="" />

		<title><?php echo $infoSite['titulo']; ?></title>
		<link rel="icon" href="<?php echo INCLUDE_PATH; ?>assets/images/favicon.png" />

		<!-- css -->
		<link rel="stylesheet" href="<?php echo INCLUDE_PATH; ?>style.css" />
		<link rel="stylesheet" href="<?php echo INCLUDE_PATH; ?>assets/libs/slick/slick.css" />
		<link rel="stylesheet" href="<?php echo INCLUDE_PATH; ?>assets/css/bootstrap-grid.min.css" />
		<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800&display=swap" />
		<link href="https://fonts.googleapis.com/css?family=Montserrat:400,500,700,800&display=swap" rel="stylesheet">
	</head>

	<body>

		<!-- container site -->
		<div class="container_site">

			<!-- header main -->
			<header class="header_main">
				
				<!-- cabeçalho -->
				<div id="navbar" class="cabecalho transitions3">
					<div class="container">
						<ul class="cabecalho_ul hzmp">
							
							<li class="cabecalho_li">
								
								<div class="logo">
									<a class="logo_a" title="John's Portfólio" href="<?php echo INCLUDE_PATH; ?>">
										<h1 class="logo_h1 hdno hfz0 hzmp">John's Portfólio</h1>
										<img src="<?php echo INCLUDE_PATH; ?>assets/images/logo.png" alt="John's Portfólio" title="John's Portfólio" class="logo_img img-fluid" />
									</a>
								</div>

							</li>
							
							<li class="cabecalho_li">
								
								<div class="menus">
									
									<div class="btn_menu_mobile" title="MENU">
										<span class="btn_menu_mobile_span"></span>
										<span class="btn_menu_mobile_span"></span>
										<span class="btn_menu_mobile_span"></span>
									</div>

									<nav class="menu">
										<ul class="menu_ul hzmp">
											<li class="menu_li"><a class="menu_a" title="Home" href="home">Home</a></li>
											<li class="menu_li"><a class="menu_a" title="Portfólio" href="list-portfolio">Portfólio</a></li>
											<li class="menu_li"><a class="menu_a" title="Contato" href="contato">Contato</a></li>
											<li class="redes_sociais_li">
												<a class="redes_sociais_a br50 transitions5" title="Acesse meu Facebook" target="_blank" href="<?php echo $infoSite['facebook']; ?>">
													<i class="fab fa-facebook-f redes_sociais_i"></i>
												</a>
											</li>
											<li class="redes_sociais_li">
												<a class="redes_sociais_a br50 transitions5" title="Acesse meu Instagram" target="_blank" href="<?php echo $infoSite['instagram']; ?>">
													<i class="fab fa-instagram redes_sociais_i"></i>
												</a>
											</li>
										</ul>
									</nav>
								</div>
							</li>

						</ul>
					</div>
				</div>
				<!-- / cabeçalho -->

			</header>
			<!-- / header main -->

				
				<?php


					// CONDICAO EM 1 LINHA
					// se url tive valor, atribuit get url (sinal ?)
					// caso contrario, atribui home (sinal :)
					$url = isset($_GET['url']) ? $_GET['url'] : 'home';
					
					// manipulando urls, se possuir o arquivo requisito dentro de pages, abre ele, senão da erro 404.
					if(file_exists('pages/'.$url.'.php')){
						include('pages/'.$url.'.php');
					}else{
						include('pages/404.php');
					}
				?>




			<!-- footer main -->
			<footer class="footer_main">
				
				<!-- sessão rodapé -->
				<section class="sessao_do_site sessao_rodape">
					<div class="lista_sessao">

						<!-- rodapé -->
						<div class="rodape">
							<div class="container">
								<ul class="rodape_ul row justify-content-center hzmp">
									
									<li class="rodape_li col-12  marginTopBottom">
										<div class="rodape_content">
											<div class="logo_rodape">
												<div class="logo_rodape_capa">
													<a class="logo_rodape_a" title="John's Portfólio" href="<?php echo INCLUDE_PATH; ?>">
														<img src="<?php echo INCLUDE_PATH; ?>assets/images/logo.png" alt="" title="" class="logo_rodape_img img-fluid" />
													</a>
												</div>
											</div>
										</div>
									</li>


								</ul>
							</div>
						</div>
						<!-- / rodapé -->
						
						<!-- copyright -->
						<div class="copyright">
							<div class="container">
								<p class="copyright_p hzmp">
									Todos os direitos reservados
								</p>
							</div>
						</div>
						<!-- / copyright -->

					</div>
				</section>
				<!-- / sessão rodapé -->

			</footer>
			<!-- / footer main -->
			
		</div>
		<!-- / container site -->

		<!-- jQuery / JS / scripts -->
		<script src="<?php echo INCLUDE_PATH; ?>assets/js/jquery.min.js"></script>
		<script src="<?php echo INCLUDE_PATH_PAINEL; ?>assets/js/jquery.mask.js"></script>
		<script src="<?php echo INCLUDE_PATH; ?>assets/js/scripts.js"></script>
		<script src="<?php echo INCLUDE_PATH; ?>assets/libs/slick/slick.min.js"></script>
		<!-- jQuery / JS / scripts -->
		
	</body>

</html>