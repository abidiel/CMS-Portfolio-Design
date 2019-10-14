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
		<link rel="stylesheet" href="<?php echo INCLUDE_PATH_PAINEL; ?>assets/css/bootstrap-grid.min.css" />
		<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800&display=swap" />
		<link href="https://fonts.googleapis.com/css?family=Montserrat:400,500,700,800&display=swap" rel="stylesheet">
	</head>

	<body>
        
        <!-- Cabeçalho painel -->
        <div class="topo_painel">

            <div class="menu">

            <?php 
                echo 'MENUS';
            ?>
            
            </div class="menu">

            <header>

                    <div class="loggout">
                        <a href="<?php echo INCLUDE_PATH_PAINEL ?>?loggout">
                            <i class="fas fa-sign-out-alt"></i>
                            Sair
                        </a>
                    </div>
            </header>

        </div>
        <!-- / Cabeçalho painel -->

		<div class="container sessao_pad">
oi
			
		</div>

		<!-- jQuery / JS / scripts
		<script src="<?php echo INCLUDE_PATH_PAINEL; ?>assets/js/jquery.min.js"></script>
		<script src="<?php echo INCLUDE_PATH_PAINEL; ?>assets/js/scripts.js"></script>
		<script src="<?php echo INCLUDE_PATH_PAINEL; ?>assets/libs/slick/slick.min.js"></script>
		<!-- jQuery / JS / scripts -->
		
	</body>

</html>