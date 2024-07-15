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

	<title>cards 2</title>
	<style type="text/css">
		*{
			padding: 0;
			margin: 0;
			box-sizing: border-box;
			font-family: Arial, Helvetica, sans-serif;
		}

		body{
			display: flex;
			justify-content: center;
			align-items: center;
			min-height: 100vh;

		}
		.container{
			width: 1150px;
			padding: 20px;
			display: flex;
			align-items: center;
			justify-content: center;
			flex-wrap: wrap;
		}
		.container .card-1{
			position: relative;
			padding: 10px;
			width: 300px;
			background-color: #fff;
			margin: 20px; 
			border: 1px solid black;
			border-radius: 20px;
			overflow: hidden;
			transition: 0.5s;
			text-align: center;
			height: 460px;
		}
		.container .card-1 img{
			transition: 0.5s;
			border-radius: 90px;
		}
		.container .card-1 h1{
			font-size: 2rem;
		}
		.container .card-1 .content-1{
			padding: 20px;
			text-align: center;
		}
		.container .card-1 .content-1 p{
			color:#666;
			transition: 0.5s;
		}
		.container .card-1 .content-1 a{
			position: relative;
			display: inline-block;
			padding: 10px 20px;
			background-color: #000;
			color:#fff;
			border-radius: 40px;
			text-decoration: none;
			transition: 0.5s;
			outline: none;
			margin-top: 20px;
  
		}
		.container .card-1:hover{
			background-color: #D42A2A;
			color:white;
			margin-top: -30px;
			box-shadow: 2px 20px 25px #dc2e68;
			border-color: #dc2e69;
		}
		.container .card-1:hover img{
			filter: invert(1);
		}
		.container .card-1:hover .content-1 p{
			color:white;
		}
		.container .card-1:hover .content-1 a{
			color:red;
			background-color: white;
			font-weight: bold;
		}
	


		.container .card-2{
			position: relative;
			padding: 10px;
			width: 300px;
			background-color: #fff;
			margin: 20px; 
			border: 1px solid black;
			border-radius: 20px;
			overflow: hidden;
			transition: 0.5s;
			text-align: center;
			height: 460px;
		}
		.container .card-2 img{
			transition: 0.5s;
			border-radius: 90px;
		}
		.container .card-2 h1{
			font-size: 2rem;
		}
		.container .card-2 .content-2{
			padding: 20px;
			text-align: center;
		}
		.container .card-2 .content-2 p{
			color:#666;
			transition: 0.5s;
		}
		.container .card-2 .content-2 a{
			position: relative;
			display: inline-block;
			padding: 10px 20px;
			background-color: #000;
			color:#fff;
			border-radius: 40px;
			text-decoration: none;
			transition: 0.5s;
			outline: none;
			margin-top: 20px;
  
		}
		.container .card-2:hover{
			background-color: yellow;
			color:green;
			margin-top: -30px;
			box-shadow: 2px 20px 25px yellow;
			border-color: yellow;
		}
		.container .card-2:hover img{
			filter: invert(1);
		}
		.container .card-2:hover .content-2 p{
			color:green;
		}
		.container .card-2:hover .content-2 a{
			color:yellow;
			background-color: green;
			font-weight: bold;
		}


		.container .card-3{
			position: relative;
			padding: 10px;
			width: 300px;
			background-color: #fff;
			margin: 20px; 
			border: 1px solid black;
			border-radius: 20px;
			overflow: hidden;
			transition: 0.5s;
			text-align: center;
			height: 460px;
		}
		.container .card-3 img{
			transition: 0.5s;
			border-radius: 90px;
		}
		.container .card-3 h1{
			font-size: 2rem;
		}
		.container .card-3 .content-3{
			padding: 20px;
			text-align: center;
		}
		.container .card-3 .content-3 p{
			color:#666;
			transition: 0.5s;
		}
		.container .card-3 .content-3 a{
			position: relative;
			display: inline-block;
			padding: 10px 20px;
			background-color: #000;
			color:#fff;
			border-radius: 40px;
			text-decoration: none;
			transition: 0.5s;
			outline: none;
			margin-top: 20px;
  
		}
		.container .card-3:hover{
			background-color: #F87821;
			color:white;
			margin-top: -30px;
			box-shadow: 2px 20px 25px orange;
			border-color: orange;
		}
		.container .card-3:hover img{
			filter: invert(1);
		}
		.container .card-3:hover .content-3 p{
			color:white;
		}
		.container .card-3:hover .content-3 a{
			color:orange;
			background-color: white;
			font-weight: bold;
		}
		.cb{
			background-color: blue;
			position: absolute;
			top: 0%;
			width: 100%;
			height: 65px;
		}
		.cb h1{
			text-align: right;
		}

		.imagem-fundo{
       		background-image: url(./img/entrarBAnk.jpg);
       		background-repeat: no-repeat;
       		background-size:   cover;
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
	
		h2{
			color:#1ED961;
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

<div class="container">
	<div class="card-1">
		<div class="imagem">
			<img src="./img/vodacom3.png" alt="vodacom">
		</div>
		<h1>vodacom</h1>
		<div class="content-1">
			<p>
				Compre recargas e se habilite a ganhar diversos bonus, na vodacom e tudo, tudo bom Vamos?			</p>
			<a href="recargaVodacom.php">Comprar Agora</a>
		</div>
	</div>
	<!--segundo CARD-->
	<div class="card-2">
		<div class="imagem">
			<img src="./img/tmcel.png" alt="vodacom">
		</div>
		<h1>Tmcel</h1>
		<div class="content-2">
			<p>
				Compre recargas e se habilite a ganhar diversos bonus, vamos la falar.
			</p>
			<a href="recargaTmcel.php">Comprar Agora</a>
		</div>
	</div>
	<!--Terceiro CARD-->
	<div class="card-3">
		<div class="imagem">
			<img src="./img/movitel2.jpg" alt="movitel">
		</div>
		<h1>Movitel</h1>
		<div class="content-3">
			<p>
				Compre recargas e se habilite a ganhar diversos bonus, movitel a todo momento em todo lugar.
			</p>
			<a href="recargaMovitel.php">Comprar Agora</a>
		</div>
	</div>
</div>
	
</body>
</html>