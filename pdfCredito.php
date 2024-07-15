<?php 

 use Dompdf\Dompdf;
 use Dompdf\Options;
 require_once 'dompdf/dompdf/autoload.inc.php';

//conexao
require_once 'conf/db_connect.php';
session_start();

$HTML ='<table width=500>'; 

$dompdf = new DOMPDF();

//verificacao
if(!isset($_SESSION['logado'])){
	header('location: login.php');
}



$numeroT = $_SESSION['numero'];
$valorT = $_SESSION['valor'];
$dateTime = date('Y-m-d H:i:s A');
 
 $id = $_SESSION['id_usuario']; 

 $sql = "SELECT * FROM usuarios
INNER JOIN cliente ON cliente.id = usuarios.id
 WHERE usuarios.id = '$id'";
 $resultado = mysqli_query($connect, $sql);
$dados = mysqli_fetch_array($resultado); //recebe todos o dados que estao na base de dado

$HTML.='<tbody>';
$HTML .='<tr>';
$HTML .='<td>'."".'</td>';
$HTML .='<td>'."COMPRA DE CREDITO".'</td>';
$HTML .='</tr>';
$HTML.='<tr>';
$HTML .='<td>'."Numero da conta: ".$dados['1']. '</td>';
$HTML .='</tr>';
$HTML .='<tr>';
$HTML .='<td>'."Numero do Telefone: ".$numeroT. '</td>';
$HTML .='</tr>';
$HTML .='<tr>';
$HTML .='<td>'."valor pago: ".$valorT. '</td>';
$HTML .='</tr>';
$HTML .='<tr>';
$HTML .='<td>'."Seu novo é: ".$dados['6'].".00MT". '</td>';
$HTML .='</tr>';
$HTML .='<tr>';
$HTML .='<td>'."sms a receber: ".round($valorT/10). '</td>';
$HTML .='</tr>';
$HTML .='<tr>';
$HTML .='<td>'."Bonus a receber: ".round($valorT/5). '</td>';
$HTML .='</tr>';
$HTML .='<tr>';
$HTML .='<td>'."Recarga: "
     .rand(1000000000, 1000000000000).'<td>';
$HTML .='</tr>';


$HTML .='<tr>';
$HTML .='<td>'."Horas: ".$dateTime. '</td>';
$HTML .='</tr>';
$HTML .='</tbody>';


$HTML .='</table>';

$dompdf->loadHtml('

<img src="img/lampada.jpg" alt="">

<h1 style ="text-align: center; color:blue" > RELATORIO DE COMPRA DE CREDELEC </h1>
'.$HTML.'



');

$dompdf->render();//exibir os dados

// $dompdf->stream(

//     "ListaMovimentos.pdf",
//     array(
//         "Attachment" => true
//     )
// );

header('Content-Type: application/pdf');
echo $dompdf->output();
