<?php 
require_once 'conf/db_connect.php';
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

<style type="text/css">
	.recibo{
		position: absolute;
		height: 420px;
		width: 400px;
		border:0px solid black;
		text-align: center;
		top: 50%;
		left: 50%;
		transform: translate(-50%, -50%);
		box-shadow: 20px 20px 50px -30px orange;
		background-color: #FFFC7F;
	}
	.recibo h1{
		color:blue;
		text-align: center;
	}
	.pdf{
		 background-color: #ff0000;
            color: #fff;
            font-weight: bold;
            text-decoration: none;
            padding: 5px;
	}
</style>
<a href="pdfCredito.php" class="pdf">Gerar Relatorio Em pdf</a>
<div class="recibo 📟">
	<h1>Recibo</h1>
	<h2>Banco visao de Futuro</h2>
	<hr>
	<?php
	$saldo = $dados['saldo'];
	$dateTime = date('Y-m-d H:i:s A');


	$numeroT = $_SESSION['numero'];
	$valorT = $_SESSION['valor'];

	// if(!(is_numeric($numeroContador))){
	// 	echo "por favor digite apenas numeros";
	// 	echo "<br>";
	// 	return ;
	// }

	if($valorT<$saldo-10){
	echo "RECARGA";
	echo "<hr>";	
	echo "numero de telefone: ".$numeroT;
	echo "<hr>";
	echo "valor pago: $valorT"."MT";
	echo "<hr/>";
	 $sql = "update cliente set saldo = saldo - '$valorT'-10 where id = '$id'";
	 mysqli_query($connect, "INSERT INTO `movimentos` (`id`, `descricao`, `valor`, `data`, `id_us`)
	 VALUES (NULL, 'efectuou uma compra de credito', '$valorT', '$dateTime', '$id')");
				 $resultado = mysqli_query($connect, $sql);
				if(!$resultado){
					echo "nao levantou";
					}
echo "o seu novo saldo é: ".$dados['saldo']."MT";
	echo "<br>";
	echo "<hr/>";
	$sms = $valorT/10;
	echo "sms a receber: ".round($sms);
	echo "<hr/>";
	echo "recarga: ";
	for ($i=1; $i<=4 ; $i++) { 
		echo rand(0,10000)."-";
	}
	echo "<hr/>";
	$bonos = $valorT/5;
	echo "Bonus a receber: ".round($bonos);
	echo "<hr/>";
	echo "data: $dateTime";


	}else
		if($valorT>$saldo-10){
		echo "Saldo insuficiente";
	}
	?>
 	
</div>




