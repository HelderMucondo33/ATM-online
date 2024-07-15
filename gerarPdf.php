<?php   
 
 use Dompdf\Dompdf;
 use Dompdf\Options;
 require_once 'dompdf/dompdf/autoload.inc.php';

//conexao
require_once 'conf/db_connect.php';
//sessao
session_start();

$HTML ='<table border=1 width=500>';

$HTML .='<thead>';
$HTML .='<tr>';
$HTML .='<th style="background-color: blueviolet;
            color: #fff;
            height: 40px;"> Descricao </th>';
$HTML .='<th style="background-color: blueviolet;
            color: #fff;
            height: 40px;"> Valor </th>';
$HTML .='<th style="background-color: blueviolet;
            color: #fff;
            height: 40px;"> Data </th>';


$HTML .='</tr>';
$HTML .='</thead>';


$dompdf = new DOMPDF();


//verificacao
if(!isset($_SESSION['logado'])){
    header('location: login.php');
}
 
 $id = $_SESSION['id_usuario'];

 $sql = "SELECT descricao,valor,data FROM movimentos
 WHERE id_us = '$id'";
 $resultado = mysqli_query($connect, $sql);



while ($dados = mysqli_fetch_array($resultado)) {

$HTML .='<tbody>';
$HTML .='<tr>';
$HTML .='<td style="color: blue;
            font-weight: bold;
            height: 30px;">'.$dados['0']. '</td>';
$HTML .='<td style="color: blue;
            font-weight: bold;
            height: 30px;">'.$dados['1']. '</td>';
$HTML .='<td style="color: blue;
            font-weight: bold;
            height: 30px;">'.$dados['2']. '</td>';

$HTML .='</tr>';
$HTML .='</tbody>';


}

$HTML .='</table>';

$dompdf->loadHtml('

<img src="img/imgem1-saldo.jpg" alt="">

<h1 style ="text-align: center; color:blue" > RELATORIO DE MOVIMENTOS </h1>
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



?>

