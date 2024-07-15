<?php 

//conexao
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
		height: 400px;
		width: 400px;
		border:0px solid black;
		text-align: center;
		top: 50%;
		left: 50%;
		transform: translate(-50%, -50%);
		box-shadow: 20px 20px 50px -30px orange;
		background-color: #FFFFC7;
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
            padding: 6px;
	}
</style>
<br>
<a href="pdfCredelec.php" class="pdf">Gerar Relatorio Em pdf</a>
<div class="recibo">
	<h1>Recibo</h1>
	<h2>Banco visao de Futuro</h2>
	<hr>
	<?php
$saldo = $dados['saldo'];
$numeroC = $_SESSION['Nrcontador'];
$valorC = $_SESSION['valor'];
$dateTime = date('Y-m-d H:i:s A');

// if(!(is_numeric($numeroContador))){
// 	echo "por favor digite apenas numeros";
// 	echo "<br>";
// 	return ;
// }

if($valorC<$saldo-10){
echo "EDM credelec";
echo "<hr>";	
echo "numero de contador: ".$numeroC;
echo "<hr>";
echo "valor pago: $valorC"."MT";
echo "<hr/>";
 $sql = "update cliente set saldo = saldo - '$valorC'-10 where id = '$id'";
	$resultado = mysqli_query($connect, $sql);
	mysqli_query($connect, "INSERT INTO `movimentos` (`id`, `descricao`, `valor`, `data`, `id_us`)
	 VALUES (NULL, 'efectuou uma compra de credelec', '$valorC', '$dateTime', '$id')");
	if(!$resultado){
		echo "nao levantou";
	}
echo "o seu novo saldo é: ".$dados['saldo']."MT";
echo "<br>";
echo "<hr/>";
$energia = $valorC/6.5;
echo "kwh: ".number_format($energia, 2,".", ".");
echo "<hr/>";
echo "recarga: ";
for ($i=1; $i<=4 ; $i++) { 
	echo rand(0,10000)."-";
}
echo "<hr/>";
$divida = $saldo - $saldo;
echo "motante em divida: $divida"."MT";
echo "<hr/>";
	echo "data: $dateTime";


}else
	if($valor>$saldo-10){
	echo "Saldo insuficiente";
}
?>

<!-- <a href="pdfCredelec.php">Gerar Pdf</a> -->
</div>




