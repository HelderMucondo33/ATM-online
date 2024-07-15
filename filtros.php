<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<?php
if(isset($_POST['enviar-formulario'])){
	
	if($idade = filter_input(INPUT_POST, 'idade', FILTER_VALIDATE_INT)){
		echo "e um inteiro";
	}else{
		echo "nao e um inteiro";
	}
}

?>

<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
Idade: <input type="text" name="idade">	<br>
Email: <input type="text" name="email"> <br>
Peso: <input type="text" name="Peso">	<br>
IP: <input type="text" name="ip"><br>
URL: <input type="text" name="url">	<br>	
<button type="submit" name="enviar-formulario">Enviar</button> <br>
</form>
</body>
</html>