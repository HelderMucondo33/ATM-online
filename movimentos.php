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

 $sql = "SELECT descricao,valor,data FROM movimentos
 WHERE id_us = '$id'";
 $resultado = mysqli_query($connect, $sql);

 ?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>movimentos</title>
    <style type="text/css">
        th{
            background-color: blueviolet;
            color: #fff;
            height: 40px;
        }
        td{
            color: blue;
            font-weight: bold;
            height: 30px;
            background-color: #ffffc7;
        }
        .pdf{
            background-color: #ff0000;
            color: #fff;
            font-weight: bold;
            text-decoration: none;
            padding: 5px;
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
<body>
    <nav>
        <div class="logo">VISAO DO FUTURO</div>
        <ul>
            <li><a href="#"><i class="fa fa-user-circle-o fa-3x" aria-hidden="true"></i></a></li>
            
        </ul>
    </nav>

    <br><br><br><br><br><br><br><br>
 <a href="gerarPdf.php" class="pdf">Gerar Relatorio Em pdf</a>
 <br>
 <br>
    <table border="1" width="650" style="border-color:blue">
        <thead>
            <th>Descrição </th>
            <th>Valor</th>
            <th>Data</th>
        </thead>

        <tbody >
            <?php 

            while ($dados = mysqli_fetch_array($resultado)) {
                    $dado = $dados[0];
                    $dado2 =$dados[1];
                    $dado3 =$dados[2];

                echo "<tr> 
                        <td>$dado</td>
                        <td>$dado2</td>
                        <td>$dado3</td>

                    </tr>";
            }


             ?>
            
        </tbody>
    </table>
    <br>

       
</body>
</html>
 
