
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
	<meta charset="utf-8">
	<link rel="stylesheet" href="font-awesome.min.css">
	<script src="https://use.fontawesome.com/7f68f17844.js"></script>
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>ver saldo</title>
	<style type="text/css">
		.form{
			position: absolute;
			top: 58%;
			left: 50%;
			transform: translate(-50%,-50%);
			background-color: rgba(0,0,0,0.8);
			padding: 40px;
			padding-top: 50px;
			border-radius: 15px;
			box-shadow: 5px 5px 2px 0 blue;
			width: 530px;
			height: 100px;

		}
		.p1{
			color: blueviolet;
			font-size: 24px;
			font-weight: bold;
			font-family: cursive;
		}
		.p2{
			color: green;
			font-weight: bold;
			font-weight: bold;
			font-family: cursive;
			font-size: 24px;
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
		.imagem-fundo{
       	background-image: url(./img/calculator-385506.jpg);
       	background-repeat: no-repeat;
       	background-size: cover;
       	background-position: center;
       	background-attachment: fixed;
       }
       	h2{
		color:#1DA0E4;	
		}
	</style>
</head>
<body class="imagem-fundo">
	<nav>
		<div class="logo">VISAO DO FUTURO</div>
		<ul>
			<li><a href="#"><i class="fa fa-user-circle-o fa-3x" aria-hidden="true"></i></a></li>
			<h2><?php echo $dados['nome']; ?></h2>
		</ul>
	</nav>
 <div class="form">
 	<p class="p1"> Saldo disponivel:</p>
 	<p class="p2">
 		<?php echo $dados['saldo'].".00MT"; ?>
 	</p>
 </div>
</body>
</html>