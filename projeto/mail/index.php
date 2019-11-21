<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Contato pelo site</title>
</head>

<body>
<h1>Fale conosco</h1>
<form method="post" action="enviar_email.php" enctype="multipart/form-data" name="form_contato" >
	<label for="nome">Nome:</label>
	<input type="text" name="nome" required/>

	<label for="email">Email:</label>
	<input type="mail" name="email" required/>
	
	<label for="telefone">Telefone:</label>
	<input type="text" name="telefone" required/>
		
	<label for="mensagem">Mensagem:</label><br />
	<textarea name="mensagem" rows="20" required cols="20"></textarea>

	<input type="submit" name="submit" value="Enviar" class="submit-button" />
</form>
        
<?php

?>

</body>
</html>