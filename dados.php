<?php
$erroConta = "";
$erroSenha = "";
$UnumeroConta = 15151515;
$Usenha = 12345678;
$nTentaivas = 3;
$numeroConta = $_POST['numero'];
$senha = $_POST['senha'];

/*if($_SERVER['REQUEST_METHOD'] == 'POST'){

//VEREFICAR SE ESTA VAZIO O POST NOME
if(empty($_POST['numero'])){
	$erroConta = "por favor,caro cliente, preencha um numero";
}else
	if (empty($_POST['senha'])) {
	$erroSenha = "por favor,caro cliente, preencha um numero";
}elseif (strlen($senha) < 6) {
	$erroSenha = "A senha precisa ter no minimo 6 digitos";
}*/
if(!(is_numeric($numeroConta))){
	$Erro = "por favor digite apenas numeros";
	echo "<br>";
	return ;
}
/* function fazerLogin(){

}*/	
while($nTentaivas > 0){
	if($UnumeroConta!= $numeroConta){

		echo "numero errado";
		echo "<br>";
		$nTentaivas--;
		echo "numero de tentativas restantes: $nTentaivas";
		echo "<br>";
	}else 
		if($Usenha!=$senha){

		echo "senha errada";
		echo "<br>";
		$nTentaivas--;
		echo "numero de tentativas restantes: $nTentaivas";
		echo "<br>";
		
	}else{
		header('location: menu.php');
		echo "sua conta  é $numeroConta e sua senha  é  $senha";
		echo "<br>";

	}


}
if($nTentaivas == 0){
	echo "conta bloqueda";
}
if($UnumeroConta == $numeroConta && $Usenha==$senha){
	header('location: menu.php');
}

$valor = @_GET['p'];
if ($valor == 'credelec' ) {
	require_once 'credelic.php';
}





//var_dump($_GET);
