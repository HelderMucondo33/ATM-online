<?php 	
//conexao com base de dados

$servername = "localhost";
$username = "root";
$password = "";
$db_name = "sistemaatm";

$connect = mysqli_connect($servername, $username, $password,$db_name); //suport a programacao precedural e  orientada a objectos

if(mysqli_connect_error()){
	echo "Falha na conexao: ".mysqli_connect_error( );

}
 ?>
