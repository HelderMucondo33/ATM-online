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
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="font-awesome.min.css">
	<script src="https://use.fontawesome.com/7f68f17844.js"></script>
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<title>levantamento</title>
	<style type="text/css">
		 .msgError{
			text-align: center;
			color:#ff0000;
			background-color: #ffbbbb;
			padding: 10px;
			border-radius: 4px;
			
		
		}
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
		label{
			color:#1DA0E4;
		}
		#btn-levantar{
			border-radius: 3px;
			width: 40%;
			height: 35px;
			font-weight: bold;
			font-size: 16px;
			padding-left: 4px;
			color:#fff;
			text-align: center;
			background-color: green;
			cursor: pointer;
			border:none;
		}
		#btn-sair{
			position: absolute;
			left: 56%;
			border-radius: 3px;
			width: 36%;
			height: 35px;
			font-weight: bold;
			font-size: 16px;
			padding-left: 4px;
			color:#fff;
			text-align: center;
			background-color: red;
			cursor: pointer;
			border:none;
		}
		select{
			background-color: rgba(0,0,0,0.1);
			border: solid 1px blue;
			border-radius: 3px;
			width: 100%;
			height: 35px;
			font-weight: bold;
			padding-left: 12px;
			color:#blueviolet;
			font-size: 1.1em;
			font-weight: bold;
		}
		option{
			background-color: #111;
			color: green;
			font-weight: bold;
		}
		.recibo{
			position: absolute;
			top:40%;
		}
		.btn-notas{
		width: 100px;
		height: 50px;
		font-size: 1em;
		cursor: pointer;
		margin: 18px;
		margin-left: 5px;
		color: #fff;
		background-color: blue;
		border: none;
		border-radius: 3.5px;	
		font-weight: bold;
		
		}
		.notas{
			position: absolute;
			top: 20%;
			left: 29%;
		}
		.notas h2{
			color:#1DA0E4; 
		}
		h2{
		color:#1DA0E4;	
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
		.recibo{
			color: green;
			font-weight: bold;
			font-size: 15px;
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

<?php 	
		$novoSaldo = 0;
		$saldo = $dados['saldo'];
		$erro = '';
		$valor = 0;
		$dateTime = date('Y-m-d H:i:s A');
		

		if ($_SERVER['REQUEST_METHOD']=='POST') {
			$valor= $_POST['valor'];
			if($saldo>$valor+10){
				switch ($valor) {
					case '50':
				 $sql = "update cliente set saldo = saldo - '$valor'-10 where id = '$id'";
				 $resultado = mysqli_query($connect, $sql);
						 mysqli_query($connect, "INSERT INTO `movimentos` (`id`, `descricao`, `valor`, `data`, `id_us`)
						  VALUES (NULL, 'efectuou um levantamento', '$valor', '$dateTime', '$id')");

				if(!$resultado){
					echo "nao levantou";
					}
						break;
					case '100':
						$sql = "update cliente set saldo = saldo - '$valor' - 10 where id = '$id'";
						$resultado = mysqli_query($connect, $sql);
						mysqli_query($connect, "INSERT INTO `movimentos` (`id`, `descricao`, `valor`, `data`, `id_us`)
						  VALUES (NULL, 'efectuou o levantamento', '$valor', '$dateTime', '$id')");
						if (!$resultado) {
							echo "nao levantou";
						}
						break;
					case '200':
						$sql = "update cliente set saldo = saldo - '$valor' - 10 where id = '$id'";
						$resultado = mysqli_query($connect , $sql);
								 mysqli_query($connect, "INSERT INTO `movimentos` (`id`, `descricao`, `valor`, `data`, `id_us`)
						  VALUES (NULL, 'efectuou o levantamento', '$valor', '$dateTime', '$id')");
						if (!$resultado) {
							echo "nao levantou";
						}
							break;
					case '500':
						$sql = "update cliente set saldo = saldo - '$valor' - 10 where id = '$id'";
						$resultado = mysqli_query($connect , $sql);
						 mysqli_query($connect, "INSERT INTO `movimentos` (`id`, `descricao`, `valor`, `data`, `id_us`)
				  VALUES (NULL, 'efectuou o levantamento', '$valor', '$dateTime', '$id')");
						if (!$resultado) {
							echo "nao levantou";
						}
								break;
					case '1000':
						$sql = "update cliente set saldo = saldo - '$valor' - 10 where id = '$id'";
						$resultado = mysqli_query($connect , $sql);
								 mysqli_query($connect, "INSERT INTO `movimentos` (`id`, `descricao`, `valor`, `data`, `id_us`)
						  VALUES (NULL, 'efectuou o levantamento', '$valor', '$dateTime', '$id')");
						if(!$resultado) {
							echo "nao levantou";
						}
						break;
						case '5000':
						$sql = "update cliente set saldo = saldo - '$valor' - 10 where id = '$id'";
						$resultado = mysqli_query($connect , $sql);
								 mysqli_query($connect, "INSERT INTO `movimentos` (`id`, `descricao`, `valor`, `data`, `id_us`)
						  VALUES (NULL, 'efectuou o levantamento', '$valor', '$dateTime', '$id')");
						if(!$resultado) {
							echo "nao levantou";
						}
						break;
						case '10000':
						$sql = "update cliente set saldo = saldo - '$valor' - 10 where id = '$id'";
						$resultado = mysqli_query($connect , $sql);
								 mysqli_query($connect, "INSERT INTO `movimentos` (`id`, `descricao`, `valor`, `data`, `id_us`)
						  VALUES (NULL, 'efectuou o levantamento', '$valor', '$dateTime', '$id')");
						if(!$resultado) {
							echo "nao levantou";
						}
						break;
					default:
						// code...
						break;
				}
			
			}else
				if($saldo<$valor+10){
				$erro = "Saldo insuficiente";
				echo "<script>
						document.getElementsByClassName('msgErro')[0].style.display = 'block';
					</script>";
			}	
		

		}


 ?>
 	<div class="notas">
 		<h2>notas disponiveis</h2>
		<table>
		<tr>
			<td><button class="btn-notas">50MT</button></td>
			<td><button class="btn-notas">100MT</button></td>
			<td><button class="btn-notas">200MT</button></td>
			<td><button class="btn-notas">500MT</button></td>
			<td><button class="btn-notas">1000MT</button></td>
		</tr>
	</table>
	</div>
	
	<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
		<div class="form">
			<p>
			<label for="valor">
				VALOR A LEVANTAR
			</label>
			<br>
			<select name="valor" style="width:300px" id="valor">
				<option value="50">50.00MT</option>
				<option value="100">100.00MT</option>
				<option value="200">200.00MT</option>
				<option value="500">500.00MT</option>
				<option value="1000">1000.00MT</option>
				<option value="5000">5000.00MT</option>
				<option value="10000">10.000.00MT</option>

			</select>
			<button id="btn-levantar" type="submit" name="levantar">Levantar <i class="fa fa-arrow-circle-down" aria-hidden="true"></i> </button><br><br>
			<a href="logOut.php"><button id="btn-sair" type="submit" name="levantar">Sair <i class="fa fa-sign-out" aria-hidden="true"></i> </button></a>
			
		</p>
		</div>
			
		<div class="recibo">
				<p style="font-size:24px; font-weight: bold;">
			<label>
				Saldo restante:
				<span style="color: green"><?php echo $dados['saldo']; //echo $dados['saldo']; ?></span>
			</label>
			<br>
			<p>
				<?php 
					if($saldo>$valor+10){

					echo "levantou $valor.00MT";

					} 
				?>
			
			</p>
			<p><?php echo "data: $dateTime";?></p>

			<div class="msgError"><?php echo $erro; ?></div>
		</div>
	
		
</form>
</body>
</html>