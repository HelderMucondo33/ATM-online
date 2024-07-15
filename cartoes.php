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

<!DO<?php 	

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
 ?>CTYPE html>
<html>
<head>
	<title>cards</title>
	<link rel="stylesheet" href="font-awesome.min.css">
	<script src="https://use.fontawesome.com/7f68f17844.js"></script>
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<style type="text/css">
		*{
			margin: 0;
			padding: 0;
			box-sizing: border-box;
		}
		body{
			background: #F6F9FF;
			height: 100vh;
			width: 100%;
			display: flex;
			justify-content:center;
			align-items:center;
			color:#434343;
			
		}
		main.cards{

			display: flex;
			padding:32px;

		}
		main.cards section.card img{
			width: 100%;
		}
		main.cards section.card {
			display: flex;
			flex-direction: column;
			align-items: center;
			text-align: center;
			background: #fff;
			padding: 1rem 1.5rem;
			border-radius: 8px;
			max-height: 256px;
			margin-left: 32px;
		}
		main.cards section.card:first-child{
			margin-left: 0;
		} 

		main.cards section.card .icon{
			width: 64px;
			height: 64px;
		}
		#imagem-voda{

		}
		main.cards section.card input{
			padding: 0.5rem 1rem;
			text-transform: uppercase;
			border-radius: 32px;
			border:0;
			cursor:pointer;
			font-size: 80%;
			font-weight: 500;
			color:#fff;
		}
		main.cards section.card.voda input{
			background-image: linear-gradient(45deg,black, red);
		}
		main.cards section.card.mcel input{
			background-image: linear-gradient(45deg,black, yellow);
		}
		main.cards section.card.mov input{
			background-image: linear-gradient(45deg,black, orange);
		}
		main.cards section.card.voda{
			box-shadow: 20px 20px 50px -30px red;
		}
		main.cards section.card.mcel{
			box-shadow: 20px 20px 50px -30px yellow;
		}
		main.cards section.card.mov{
			box-shadow: 20px 20px 50px -30px orange;
		}
		main.cards section.card h3{
			font-size: 100%;
			margin-top: 16px 0;
		}
		main.cards section.card span{
			font-weight: 300;
			max-width: 460px; 
			font-size: 80%;
			margin-bottom:16px; 
		}
		.cabelhaco{
			width: 100%;
			float: left;
			padding: 50px 8%;
			background-color: #4E3C62;
		}
		@media screen and (max-width: 720px){
			main.cards{
				flex-direction: column;

			}
			main.cards section.card{
				margin-left: 0;
				margin-bottom: 32px;
			}
			main.cards section.card:last-child{
				margin-bottom: 0;
			}
		}
		.imagem-fundo{
       	background-image: url(Linha-do-cliente-mcel-vodacom-movitel.png);
       	background-repeat: no-repeat;
       	background-size: cover;
       	background-position: center;
       	background-attachment: fixed;
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
		nav ul li a{
			line-height: 80px;
			color: #fff;
			padding: 12px 30px;
			text-decoration: none;
			font-size: 14px;
			font-weight: bold;
			text-transform: uppercase;
		}
		nav ul li a:hover{
			background: rgba(0, 0, 0, 0.7);
			border-radius: 6px;
		}
		nav .logo:hover{
			font-size: 25px;
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
<main class="cards">
	<section class="card voda">
		<div class="icon" id="imagem-voda">
			<img src="vodacom.jpg" alt="vodacom">
		</div>
		
		<h3>Recarga</h3>
		<span>A expressão Lorem ipsum em design gráfico e editoração é um texto padrão em latim utilizado</span>
		<input type="button" name="entrar" value="Entrar">
	</section>
	<section class="card mcel">
		<div class="icon">
			<img src="tmcel.png" alt="Tmcel">
		</div>
		
		<h3>Recarga</h3>
		<span>A expressão Lorem ipsum em design gráfico e editoração é um texto padrão em latim utilizado</span>
		<a href="recargas.php"><input type="button" name="entrar" value="Entrar"></a>
	</section>
	<section class="card mov">
		<div class="icon">
			<img src="Movitel.png" alt="Movitel">
		</div>
		
		<h3>Recarga</h3>
		<span>A expressão Lorem ipsum em design gráfico e editoração é um texto padrão em latim utilizado</span>
		<input type="button" name="entrar" value="Entrar">
	</section>
</main>
</body>
</html>