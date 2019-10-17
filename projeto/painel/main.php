<?php
    if(isset($_GET['loggout'])){
        Painel::loggout();
    }
?>
<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<meta charset="utf-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
		<meta name="robots" content="index, follow" />
		<meta name="description" content="" />

		<title>Painel de controle</title>

		<!-- css -->
		<link rel="stylesheet" href="<?php echo INCLUDE_PATH_PAINEL; ?>assets/css/styles.css" />
		<!-- <link rel="stylesheet" href="<?php echo INCLUDE_PATH_PAINEL; ?>assets/css/bootstrap-grid.min.css" /> -->
		<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800&display=swap" />
		<link href="https://fonts.googleapis.com/css?family=Montserrat:400,500,700,800&display=swap" rel="stylesheet">
	</head>

	<body>
        
        <!-- Cabeçalho painel -->
            <div class="menu">
				<div class="box_usuario">
					<?php 
						// se possui imagem, mostra ela
						if($_SESSION['img'] != ''){
					?>
					<div class="avatar_usuario">
						<!-- trazendo imagem conforme link no banco (cadastrado manualmente em primeiro momento) -->
						<img src="<?php echo INCLUDE_PATH_PAINEL ?>assets/uploads/<?php echo $_SESSION['img']; ?>" />
					</div>
					<?php
					} else{
					?>
					<div class="avatar_usuario">
						<!-- trazendo imagem padrão -->
						<img src="<?php echo INCLUDE_PATH_PAINEL ?>assets/uploads/sem-imagem.jpg" />
					</div>
					<?php } ?>


					<div class="nome_usuario">

						<!-- Dado dinâmico através de session  -->
						<p><?php echo $_SESSION['nome']; ?></p>
						<p><?php echo pegaCargo($_SESSION['cargo']); ?></p>
					</div>
				</div>

				<div class="itens_menu">
					<h2>Cadastro</h2>
					<a href="#">Cadastrar Depoimento</a>
					<a href="#">Cadastrar Serviço</a>
					<a href="#">Cadastrar Slides</a>
					<h2>Gestão</h2>
					<a href="#">Listar Depoimento</a>
					<a href="#">Listar Serviço</a>					
					<a href="#">Listar Slides</a>					
					<h2>Administração do painel</h2>
					<a href="<?php echo INCLUDE_PATH_PAINEL ?>editar-usuario">Editar usuários</a>
					<a href="#">Adicionar usuários</a>			
					<h2>Configuração geral</h2>
					<a href="#">Editar</a></a>				
					
				</div>

            </div>

            <header>
					<div class="menu_btn">
						<i class="fas fa-bars"></i>
					</div>
                    <div class="loggout">
                        <a href="<?php echo INCLUDE_PATH_PAINEL ?>?loggout">
                            <i class="fas fa-sign-out-alt"></i>
                            Sair
                        </a>
					</div>
					<div class="clear"></div>	
			</header>
			
			<div class="content">
			
			<!-- Carrega a página atual -->
			
			<?php Painel::carregarPagina(); ?>

			</div>

			
		<!-- jQuery / JS / scripts -->
		<script src="<?php echo INCLUDE_PATH; ?>assets/js/jquery.min.js"></script>
		<script src="<?php echo INCLUDE_PATH_PAINEL; ?>assets/js/scripts.js"></script>
		<!-- jQuery / JS / scripts 
		
	</body>

</html>