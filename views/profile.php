<?php  
session_start();
require_once ("../classes/conexao.php");
$conectar = new conexao();
$con = $conectar->connect();
require_once ("../classes/usuario.php");
if(empty($_SESSION['email']))
{
 header("location:../index.php");
}?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">

    <!-- CSS Style -->
    <link rel="stylesheet" href="../css/style.css">

    <title>Sistema de Acesso</title>
  </head>
  <body>
  	<div class="container-fluid colorTextSup text-left padding10">
  		<div class="row">
  		<div class="col">
  			<h2 class="texto-branco">Sistema de Cadastro</h2>
  		</div>
      <nav class="nav text-right">
        <a class="texto-branco padding10 nounderline" href="profile.php?link=1">Cadastrar</a>
        <a class="texto-branco padding10 nounderline" href="profile.php?link=2">Lista de Usuários</a>
        <a class="texto-branco padding10 nounderline" href="../classes/logout.php">Sair</a>
      </nav> 
  		</div>
  	</div>

  	<?php
  		$link=$_GET["link"];

  		$pag[1] = "cadastrar.php";
  		$pag[2] = "listar_usuario.php";
  		$pag[3] = "editar.php";
  		$pag[4] = "deletar.php";

  		if(!empty($link)){
  			include $pag[$link];
  		}
  	?>


	<footer class="fixed-bottom text-center footer-color padding5">
		<div>
			<h5 class="texto-footer">I LOVE CODE - Rair Angelos 	&copy;</h5>
		</div>
	</footer>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>
  </body>
</html>