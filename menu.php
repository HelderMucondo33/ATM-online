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

		.menu{
			position: absolute;
			top: 58%;
			left: 50%;
			transform: translate(-50%,-50%);
			background-color: rgba(0,0,0,0.9);
			padding: 40px;
			padding-top: 50px;
			border-radius: 15px;
			box-shadow: 5px 5px 2px 0 blue;
			width: 700px;
			height: 390px;
		}
		.menu h2{
			text-align: center;
			color:#1ED961;

		}
		h2{
			color:#1ED961;
		}
		.menu h1{
			color:#1DA0E4;
			text-align: center;
		}
	
		#nomeBanco{
			color:#1DA0E4;
			text-align: center;
			font-weight: bold;
			font-size: 1.6em;
			text-decoration: underline;
		}

		.btn-transacoes-1{
			border-radius: 3px;
			width: 150%;
			height: 35px;
			font-weight: bold;
			padding-left: 4px;
			color:#fff;
			text-align: center;
			background-color: green;
			cursor: pointer;
			border:none;
			margin: 20px;


		}
		.btn-transacoes-2{
			border-radius: 3px;
			width: 90%;
			height: 35px;
			font-weight: bold;
			padding-left: 4px;
			color:#fff;
			text-align: center;
			background-color: green;
			cursor: pointer;
			border:none;
			margin-left: 195px;

		}

		.btn-transacoes-1:hover,.btn-transacoes-2:hover{
			background-color: blue;
		
			
		}
		.btn-transacoes-sair:hover{
			color: blue;
		}

		.btn-transacoes-sair{
			border-radius: 3px;
			width: 90%;
			height: 35px;
			font-weight: bold;
			padding-left: 4px;
			color:#fff;
			text-align: center;
			background-color: red;
			cursor: pointer;
			border:none;
			margin-left: 195px;
		}
		.imagem-fundo{
       		background-image: url(./img/business-5475660.jpg);
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

<div class="menu">
	<h2 id="nomeBanco">BVF</h2>
		<h1>Selecione as suas transaçoes, por favor</h1>
	       <h2>Numero da conta:<?php echo $dados['numeroConta']; ?></h2>
	  <table>
	  	<tr>
	  	<td><a href="credelic.php"><button class="btn-transacoes-1" name="botao"> 1.Comprar Credelec  <i class="fa fa-plug" aria-hidden="true"></i></button> </a></td>
	  		<td><a href="levantamento.php"><button class="btn-transacoes-2" name="botao"> 4.Levantamento  <i class="fa fa-money" aria-hidden="true"></i></button> </a></td>
	  	</tr>
	  	<tr>
	  		<td><a href="consultarSaldo.php"><button class="btn-transacoes-1" name="botao"> 2.Consultar Saldo  <i class="fa fa-dollar" aria-hidden="true"></i></button> </a></td>
	  		
	  		<td><a href="recargas.php"><button class="btn-transacoes-2" name="botao"> 5.Comprar Credito  <i class="fa fa-tty" aria-hidden="true"></i></button> </a></td>
	  	</tr>
	  	<tr>
	  		<td><a href="movimentos.php"><button class="btn-transacoes-1" name="botao"> 3.Movimentos  <i class="fa fa-suitcase" aria-hidden="true"></i></i></button> </a></td>
	  		<td><a href="logOut.php"><button class="btn-transacoes-sair" name="botao"> 6.Sair  <i class="fa fa-sign-out" aria-hidden="true"></i></button> </a></td>
	  	</tr>


	  </table>
</div>
</body>
</html>