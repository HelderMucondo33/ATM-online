<!DOCTYPE html>
<html>
<head>
	<title></title>
	<style type="text/css">
		.opcoes{
			position: absolute;
			top: 23%;
			left: 12%;
			cursor: pointer;
			box-shadow: 5px 5px 2px 0px black;
			

		}
		
		.redes img:hover{
			width: 190px;
			height: 110px;
			border: 1px solid black;

		}

		.redes{
			width: 180px;
			height: 100px;
			margin: 12px;
			box-shadow: 5px 5px 2px 0px black;
		}
		.recargas{
			position: absolute;
			top: 50%;
			left: 50%;
			transform: translate(-50%, -50%);
			background-color: rgba(0,0,0,0.9);
			padding: 40px;
			padding-top: 50px;
			border-radius: 15px;
			box-shadow: 5px 5px 2px 0 blue;
			width: 530px;
			height: 270px;
		}
		input[type="number"]{
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
		#btn-comprar{
			border-radius: 3px;
			width: 40%;
			height: 35px;
			font-weight: bold;
			padding-left: 4px;
			color:#fff;
			text-align: center;
			background-color: green;
			cursor: pointer;
			border:none;
		}
		#btn-sair{
			border-radius: 3px;
			width: 40%;
			height: 35px;
			font-weight: bold;
			padding-left: 4px;
			color:#fff;
			text-align: center;
			background-color: red;
			cursor: pointer;
			border:none;
			margin-left: 7.6em;
		}
		.recargas h1{
			color:#1DA0E4;
		}
		.recargas h2{
			color:#1DA0E4;
			text-align: center;
			font-weight: bold;
			font-size: 1.6em;
			text-decoration: underline;
		}
		
       .imagem-fundo{
       	background-image: url(Linha-do-cliente-mcel-vodacom-movitel.png);
       	background-repeat: no-repeat;
       	background-size: cover;
       	background-position: center;
       	background-attachment: fixed;
       }
       .imagem-recargas{
       	width: 180px;
		height: 100px;
       }

	</style>
</head>
<body class="imagem-fundo">

<div class="recargas">
	<h2>BVF</h2>
	<h1>Comprar credito</h1>
	<form>
		<input type="number" name="numeroTelefone" placeholder="Digite o numero do telefone" maxlength="9"> <br> <br>
		<input  type="number" name="valor" placeholder="Digite o valor"><br><br>
		<input id="btn-comprar" type="submit" name="compra" value="Comprar">
		<td><a href="menu.php"><input id="btn-sair" type="button" name="botao" value="Sair"></a></td>
	</form>
</div>

	<div class="opcoes">
		
	<div class="redes">
		<a href=""><img class="imagem-recargas" src="vodacom.jpg"></a>
	</div>
	<div class="redes">
		<a href=""><img class="imagem-recargas" src="Movitel.png"></a>
	</div>
	<div class="redes">
		<a href=""><img class="imagem-recargas" src="tmcel.png"></a>
	</div>
</div>



</body>
</html>