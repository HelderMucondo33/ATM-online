<?php 	

//Encerrando a sessao

session_start();
session_unset();
session_destroy();
header('location: login.php');

 ?>