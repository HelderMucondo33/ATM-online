<?php 	

//conexao
require_once 'conf/db_connect.php';
//sessao
session_start();

//verificacao
if(!isset($_SESSION['logado'])){
	header('location: login.php');
}
 
 $id = $_SESSION['id_usuario'];

 $sql = "SELECT * FROM usuarios
INNER JOIN cliente ON cliente.id = usuarios.id
 WHERE usuarios.id = '$id'";
 $resultado = mysqli_query($connect, $sql);
$dados = mysqli_fetch_array($resultado); //recebe todos o dados que estao na base de dado
 ?>

<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="font-awesome.min.css">
	<script src="https://use.fontawesome.com/7f68f17844.js"></script>
	<link rel="preconnect" href="https://fonts.googleapis.com">

	<title></title>
	<style type="text/css">

		.recarga{
			position: absolute;
			top: 50%;
			left: 50%;
			transform: translate(-50%, -50%);
			background-color: rgba(0,0,0,0.9);
			padding: 40px;
			padding-top: 50px;
			border-radius: 15px;
			box-shadow: 5px 5px 2px 0 blue;
			width: 530px;
			height: 270px;
		}
		input[type="number"],[type="text"]{
			background-color: rgba(0,0,0,0.1);
			border: solid 1px blue;
			border-radius: 3px;
			width: 100%;
			height: 35px;
			font-weight: bold;
			padding-left: 12px;
			color:#fff;
			font-size: 1.1em;
		}
		#btn-comprar{
			border-radius: 3px;
			width: 40%;
			height: 35px;
			font-weight: bold;
			padding-left: 4px;
			color:#fff;
			text-align: center;
			background-color: green;
			cursor: pointer;
			border:none;
		}
		#btn-sair{
			border-radius: 3px;
			width: 40%;
			height: 35px;
			font-weight: bold;
			padding-left: 4px;
			color:#fff;
			text-align: center;
			background-color: red;
			cursor: pointer;
			border:none;
			margin-left: 7.6em;
		}
		.recarga h1{
			color:#1DA0E4;
		}
		.recarga h2{
			color:#1DA0E4;
			text-align: center;
			font-weight: bold;
			font-size: 1.6em;
			text-decoration: underline;
		}
		
       .imagem-fundo{
       	background-image: url(./img/morvite.jpeg);
       	background-repeat: no-repeat;
       	background-size: cover;
       	background-position: center;
       	background-attachment: fixed;
       }
        .msgError{
			text-align: center;
			color:#ff0000;
			background-color: #ffbbbb;
			padding: 10px;
			border-radius: 4px;
			width: 280px;
			height: 140px;
			position: absolute;
			top: 35%;
			left: 8%;
			font-weight: bold;
			font-size: 17px;
			display: none;
			
		}

        	nav{
			position: fixed;
			top: 0;
			left: 0;
			width: 100%;
			height: 100px;
			padding: 10px 90px;
			box-sizing: border-box;
			background-color: rgba(0, 0, 0, 0.6);
			border-bottom: 1px solid #fff;
		}
		nav .logo{
		padding: 22px 20px;
			height: 80px;
			float: left;
			font-size: 2em;
			font-weight: bold;
			text-transform: uppercase;
			color: #fff;
			text-decoration: underline;
		}
		nav ul{
			list-style: none;
			float: right;
			margin: 0;
			padding: 0;
			display: flex;
		}
		nav ul li i{
			line-height: 80px;
			color: #fff;
			padding: 12px 30px;
			text-decoration: none;
			font-size: 14px;
			font-weight: bold;
			
		}
		nav ul li a:hover{
			
			border-radius: 6px;
		}
		nav .logo:hover{
			font-size: 25px;
		}
		i:hover {
			color: #54A4D6;
		}
		h2{
			color:#1ED961;
		}
		.btn-fechar{
			position: absolute;
			background-color: unset;
			color: #ff0000;
			border-color: #fff;
			font-size: 16px;
			width: 25px;
			height: 25px;
			right: 0;
			top: 0;
		}
		.btn-fechar:hover{
			color: #fff;
			cursor: pointer;
			background-color: #ff0000;
		}

	</style>
</head>
<body class="imagem-fundo">
		<?php 
$erro = "";

	if ($_SERVER['REQUEST_METHOD']=='POST') {

		$numroTelefone = $_POST['numeroTelefone'];
		$valor = $_POST['valor'];

			$_SESSION['numero'] = $numroTelefone;
			$_SESSION['valor'] = $valor;
		$valorStr = strval($numroTelefone);
		$trsArry = str_split($valorStr);

		if ($trsArry[0]==8 && $trsArry[1]==6 || $trsArry[1]==7) {
			header('location: dadosCredito.php');
		}else{
			echo "<br>";
			echo "<br>";
			$erro = "por favor digite os numeros que iniciam com 86 ou 87";
			
		}
		

	}		
	 ?>
		<nav>
		<div class="logo">VISAO DO FUTURO</div>
		<ul>
			<li><a href="#"><i class="fa fa-user-circle-o fa-3x" aria-hidden="true"></i></a></li>
			<h2><?php echo $dados['nome']; ?></h2>
		</ul>
	</nav>
	<div class="msgError">
		<button class="btn-fechar" onclick="fechar();">X</button>
		<?php 
		echo "<br>";
		echo "<br>";
		echo $erro; ?>
	</div>

<div class="recarga">
	<h2>BVF</h2>
	<h1>Comprar Credito</h1>
	<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
		<input type="text" name="numeroTelefone" placeholder="Digite o numero do telefone" minlength="9" maxlength="9"> <br> <br>
		<input  type="number" name="valor" placeholder="Digite o valor" min="10"><br><br>
		<input id="btn-comprar" type="submit" name="compra" value="Comprar">
		<a href="menu.php"><button type="submit" id="btn-sair">cancelar</button></a>

	</form>
</div>
<script type="text/javascript">
		function fechar() {
		document.getElementsByClassName('msgError')[0].style.display = 'none';
		}
	</script>
</body>
</html>
<?php 	
if (!$erro = "") {

	echo "<script>
			document.getElementsByClassName('msgError')[0].style.display = 'block';
		</script>"; 
}
 ?>