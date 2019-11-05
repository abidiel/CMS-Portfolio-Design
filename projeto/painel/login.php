
<?php 
    if(isset($_COOKIE['lembrar'])){
        $user = $_COOKIE['lembrar'];
        $password = $_COOKIE['password'];

        $sql = MySql::conectar()->prepare("SELECT * FROM tb_admin_usuarios WHERE user = ? AND password = ?");
        $sql->execute(array($user,$password));
        if($sql->rowCount() == 1){
            $info = $sql->fetch();
            $_SESSION['id_usuario'] = $info['id'];
            $_SESSION['login'] = true;
            $_SESSION['user'] = $info['user'];
            $_SESSION['password'] = $info['password'];
            $_SESSION['nome'] = $info['nome'];
            $_SESSION['img'] = $info['img'];           
            header('Location: '.INCLUDE_PATH_PAINEL);
            die();
        }
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

		<title>Login - Painel de controle</title>

		<!-- css -->
		<link rel="stylesheet" href="<?php echo INCLUDE_PATH_PAINEL; ?>assets/css/styles.css" />
		<!-- <link rel="stylesheet" href="<?php echo INCLUDE_PATH_PAINEL; ?>assets/css/bootstrap-grid.min.css" /> -->
		<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800&display=swap" />
		<link href="https://fonts.googleapis.com/css?family=Montserrat:400,500,700,800&display=swap" rel="stylesheet">
	</head>

	<body>

		<!-- container login -->
		<div class="container_site sessao_pad">
            

            <div class="box-login" id="form_login">
                <?php
                    // se o botão do formulario for clicado
                    if(isset($_POST['acao'])){

                        //atribui valor as variaveis
                        $user = $_POST['user'];
                        $password = $_POST['password'];

                        //conecta no banco e faz consulta, 
                        //os "?" no lugar do valor é por medida de segurança
                        //os valores são passados no array logo abaixo.
                        $sql = MySql::conectar()->prepare("SELECT * FROM tb_admin_usuarios WHERE user = ? AND password = ?");
                        $sql->execute(array($user,$password));

                        //testa o número de resultados da consulta,
                        //se for exatamente 1, é porque os dados inseridos estao no banco de dados
                        if($sql->rowCount() == 1){

                            // Retorna uma unica row da consulta
                            $info = $sql->fetch();

                            //logado com sucesso
                            $_SESSION['id_usuario'] = $info['id'];
                            $_SESSION['login'] = true;
                            $_SESSION['user'] = $info['user'];
                            $_SESSION['password'] = $info['password'];
                            $_SESSION['nome'] = $info['nome'];
                            $_SESSION['img'] = $info['img'];
                            if(isset($_POST['lembrar'])){
                                // cookie de um dia
                                // esse parametro '/' serve para aplicar em todo site
                                // minimiza a chance de erro
                                setcookie('lembrar',true,time()+(60*60*24),'/');
                                setcookie('user',$user,time()+(60*60*24),'/');
                                setcookie('password',$password,time()+(60*60*24),'/');
                            }
                            header('Location: '.INCLUDE_PATH_PAINEL);
                            die();
                        }
                        else{
                            //falha no login
                            ?>
                            <div class="box-erro br25">
                                <i class="fas fa-times"></i> 
                                Usuário ou senha incorretos.
                            </div>
                            
                            <?php
                        }
                    }

                ?>
                <h2>Efetue o login</h2>
                <form method="post">
                    <input type="text" name="user" placeholder="Login..." class="br25 form_f form_campo" required>
                    <input type="password" name="password" placeholder="Senha..." class="br25 form_f form_campo" required>
                        <input type="submit" name="acao" value="Logar!" class="btn_ btn_xl btn_layout br25">
                    <div class="form-group-login">
                        <input type="checkbox" name="lembrar">
                        <label>Lembrar-me</label>
                    </div>      
                </form>     
            </div>
			
		</div>
		<!-- / container login -->

		<!-- jQuery / JS / scripts-->
		<script src="<?php echo INCLUDE_PATH; ?>assets/js/jquery.min.js"></script>
		<script src="<?php echo INCLUDE_PATH; ?>assets/js/scripts.js"></script>
		<!-- jQuery / JS / scripts -->
		
	</body>

</html>