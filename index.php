<!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
		<link rel="stylesheet" type="text/css" href="css/estylo.css">
	</head>
	<body>
	<div class="divContainer">
		<div class="divMenuLateral">
			<a href="index.php"><span class="spanIcone margemUp glyphicon glyphicon-home"></span></a><br/>
			<a href="autores.php"><span class="spanIcone margemUp glyphicon glyphicon-user"></span></a><br/>
			<a href="search.php"><span class="spanIcone margemUp glyphicon glyphicon-search"></span></a><br/>
			<a href="#"><span class="spanIcone margemUp glyphicon glyphicon-cloud"></span></a>
		</div>
		<div class="livro">
			<center>
				<?php  
					# Substitua abaixo os dados, de acordo com o banco criado
					$user = "root"; 
					$password = ""; 
					$database = "red_box"; 
					 
					# O hostname deve ser sempre localhost 
					$hostname = "localhost"; 
					 
					# Conecta com o servidor de banco de dados 
					$con=mysqli_connect( $hostname, $user, $password ) or die( ' Erro na conexão ' ); 
					 
					# Seleciona o banco de dados 
					mysqli_select_db(  $con ,$database) or die( 'Erro na seleção do banco' );
					 
					# Executa a query desejada 
					$query = "SELECT livros.titulo, autores.nome, livros.isbn, livros.imgCapa, editoras.nome as ne FROM livros join autores join editoras where livros.fk_autor=autores.id_autor and livros.fk_editora = editoras.id_editora "; 
					$result_query = mysqli_query($con, $query) or die(' Erro na query:' . $query . ' ' . mysqli_error() ); 
					 
					# Exibe os registros na tela 
					while ($row = mysqli_fetch_array($result_query)) { 
						print "<div class='bloco'>".
									"<img src='img/capas/$row[imgCapa].jpg'>".
									"<hgroup>".										
										"<h2>$row[titulo]</h2>".
										"<h3>$row[nome]</h3>".
										"<h4>$row[ne]</h4>". 
										"<h5>$row[isbn]</h5>". 
									"</hgroup>" .
									"<br/>".
								"</div>";
					}					 
				?>
			</center>		
		</div>
		<div class="footer">
			<h1>Copyright 2017</h1>
		</div>
	</div>
	</body>
</html>