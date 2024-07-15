<?php



//Conexao
require_once 'conf/db_connect.php';

//Sessao
session_start();


$Erro = "";
$erroSenha = "";
$erroConta = "";
$numeroTentivas = "";
$contaBloqueada = "";
$diferenca = "";
$tentativas="";

if(isset($_POST['submeter'])){

$erros = array();
$numero = mysqli_escape_string($connect, $_POST['numero']);
$senha = mysqli_escape_string($connect, $_POST['senha']);
if(empty($numero) && empty($senha)){
	$erros[] = "<li> os campos numero da conta e senha precisam serem preenchidos </li>";
	
	
}elseif (empty($numero)) {
	$erros[] = "<li> o campo numero da conta precisa ser preenchido </li>";



}elseif (empty($senha)) {
	$erros[] = "<li> o campo senha precisa ser preenchido </li>";
	

}else{
	$sql = "SELECT * FROM usuarios WHERE numeroConta = '$numero'"; //comparando o numero que esta na base de dados com o numero que vem do formulario 
	$resultado = mysqli_query($connect, $sql);
	$dados = mysqli_fetch_array($resultado);
	if(mysqli_num_rows($resultado) > 0){ //se houver algum resultado/linha 

		$tentativas = $dados['tentativas'];
		if ($tentativas==0) {
			$tempo = $dados['tempo'];
			$diferenca = time() - $tempo;
			if ($diferenca>30) {
				$sql = "update usuarios set tentativas = '3' where numeroConta = '$numero'";
			$resultado = mysqli_query($connect, $sql);
			}else{
				$erros[] = "<li> Conta Bloqueada, tenta daqui a 3H </li>";
			}
		}
		if ($tentativas >0) {
			$senha = md5($senha);
		$sql = "SELECT * FROM usuarios WHERE numeroConta = '$numero' AND senha = '$senha'"; //comparando o numero e a senha que esta na base de dados com o numero e senha que vem do formulario 
		$resultado = mysqli_query($connect, $sql);
		if(mysqli_num_rows($resultado)==1){
			$dados = mysqli_fetch_array($resultado);
			$_SESSION['logado'] = true;
			$_SESSION['id_usuario'] = $dados['id'];
	
			header('location: menu.php');
		}else{
			$tentativas--;
			$sql = "update usuarios set tentativas = '$tentativas' where numeroConta = '$numero'";
			$resultado = mysqli_query($connect, $sql);
			if ($tentativas==0) {
				$sql = "update usuarios set tempo = 'time()' where numeroConta = '$numero'";
			$resultado = mysqli_query($connect, $sql);
			$erros[] = "<li> Conta Bloqueada, tenta daqui a 3H </li>";
			}
			$erros[] = "<li>tentativas restantes '$tentativas'</li>";
			$erros[] = "<li>senha incorrecta</li>";
			
		}
	}
		}else{
		
		$erros[] = "<li> usuario inexistente </li>"; 
	}
		
}


}

?>

<!DOCTYPE html>
<html>
<head>
	<title>login</title>
	<script src="https://use.fontawesome.com/7f68f17844.js"></script>
	<style type="text/css">
		*{
			padding: 0px;
			margin: 0px;
		}
		.login{
			position: absolute;
			top: 50%;
			left: 50%;
			transform: translate(-50%,-50%);
			background-color: rgba(0,0,0,0.8);
			padding: 40px;
			padding-top: 50px;
			border-radius: 15px;
			box-shadow: 5px 5px 2px 0 blue;
			width: 530px;
			height: 390px;

		}
		.login h1{
			color:#1DA0E4; 
			text-align: center;
			

		}
		#nomeBanco{
			color:#1DA0E4;
			text-align: center;
			
		}
		.login h2{
			color:rgb(0,0,255);
		}
		#enviar{
			width: 100%;
			color:#fff;
			background-color: green;
			border-radius: 4px;
			cursor: pointer;
			border:none;
		}
		#Cancelar{
	        width: 100%;
			color:#fff;
			background-color: red;
			border-radius: 4px;
			cursor: pointer;
			border: none;
		}

		#enviar:hover{
			color:blue;
		}
		#Cancelar:hover{
			color:blue;
		}
		#cadastrar a{
			text-decoration: none;
			color:green;
		}
		#cadastrar a:hover{
			color:blue;
		}
		#cadastrar{
			color:#fff;
			font-weight: bold;
		}
		input[type="text"],[type="password"]{
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
		#Cancelar{
			
			border-radius: 3px;
			width: 100%;
			height: 35px;
			font-weight: bold;
			padding-left: 4px;
			color:#fff;
			text-align: center;

		}

		#enviar{
			border-radius: 3px;
			width: 100%;
			height: 35px;
			font-weight: bold;
			padding-left: 4px;
			color:#fff;
			text-align: center;
		}
		.bckGrd{
       	background-image: url(./img/entrarBAnk.jpg);
       	background-repeat: no-repeat;
       	background-size: cover;
       	background-position: center;
       	background-attachment: fixed;
       }
       #msgError{
			text-align: center;
			color:#ff0000;
			background-color: #ffbbbb;
			padding: 10px;
			border-radius: 4px;
			display: none;
		}
		#mostrarNumeroTentativas{
		
			color:#ff0000;
			

		}
		.erro{
			
			color:#ff0000;
			
		}
		#Contabloqueada{
			
			color:#ff0000;
			
		}
		.cb{
			background-color: white;
			position: absolute;
			top: 0%;
			width: 100%;
			height: 65px;
		}
		.cb h1{
			text-align: right;
		}
		.btn-entrar{
			color: red;
			font-weight: bold;
			background-color:#ffbbbb; 
			text-align: center;
			font-size: 18px;
		}
		.login-erro{
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
<body class="bckGrd">
	<link rel="stylesheet" href="font-awesome.min.css">
	<script src="https://use.fontawesome.com/7f68f17844.js"></script>
	<link rel="preconnect" href="https://fonts.googleapis.com">

	<nav>
		<div class="logo">VISAO DO FUTURO</div>
		<ul>
			<li><a href="#"><i class="fa fa-sign-in fa-3x" aria-hidden="true"></i></a></li>
			
		</ul>
	</nav>
	<div class="login-erro">
		<button class="btn-fechar" onclick="fechar();">X</button>
		<?php 
if(!empty($erros)){
	foreach($erros as $erro){
		echo "<br>";
		echo $erro;
		echo "<script>
			document.getElementsByClassName('login-erro')[0].style.display = 'block';
		</script>"; 
	
	}
}

 	
 ?>
	</div>

<div class="login">
	<div id="msgError"></div>
	<h1 id="nomeBanco">BANCO VISAO DO FUTURO(BVF)</h1><br>
	<h1>Bem Vindo</h1> <br> <br><br>
<form action="<?php echo $_SERVER['PHP_SELF'];?>" method="POST">
	
	<input id="Numeroconta"  type="text" name="numero" maxlength="9" placeholder=" Introduza o numero da conta" > <br><br>
	<p class="erro"><?php echo $erroConta; echo $Erro; ?></p><br>
	
	<input id="password" type="password" name="senha"  placeholder="Senha" maxlength="8"><br><br>
	<p class="erro"><?php echo $erroSenha; ?></p><br>
	<div class="btn-entrar">

	<button id="enviar" type="submit" name="submeter">Entrar</button>
		
	</div>
	<br><br>
	<button id="Cancelar" type="cancel" name="cancelar">Cancelar</button>
	<p id="mostrarNumeroTentativas"> <?php echo $numeroTentivas;  ?></p><br>
	<p id="Contabloqueada"> <?php echo $contaBloqueada;  ?> </p>

</form>
</div>
	<script type="text/javascript">
		function fechar() {
		document.getElementsByClassName('login-erro')[0].style.display = 'none';
		}
	</script>
</body>
</html>