<?php
	require_once "config.php";
	session_start();

	/* Inicio Consulta SQL */
   $id_user = $_SESSION['id'];
    $sql = mysqli_query($con,"SELECT * FROM usuarios WHERE id_usuario = $id_user");
         while ($linha = mysqli_fetch_array($sql)) {
            $nome = $linha['nome_usuario'];
            $sobrenome = $linha['sobrenome_usuario'];
            $cpf = $linha['cpf_usuario'];
            $passaporte = $linha['passaporte_usuario'];
            $data = $linha['data_nascimento'];
            $genero = $linha['genero_usuario'];
            $estadocivil = $linha['estado_civil'];
            $cidadenatal = $linha['cidade_natal'];
            $nacionalidade = $linha['nacionalidade'];
            $idiomas = $linha['idiomas_usuario'];
            $telefone = $linha['telefone_usuario'];
            $altura = $linha['altura_usuario'];
            $peso = $linha['peso_usuario'];
            $pechute = $linha['pe_usuario'];
            $posicao = $linha['posicao_usuario'];
            $historico = $linha['historico_usuario'];
            $curriculo = $linha['cv_usuario'];
            $agente = $linha['agente_usuario'];
            $nomeagente = $linha['nome_agente'];
            $contatoagente = $linha['contato_agente'];
            $parceiro = $linha['nome_parceiro'];
            $escolaridade = $linha['escolaridade'];
            $email = $linha['email_usuario'];
            $paises = $linha['nacionalidade'];
            $pwd = $linha['senha_usuario'];
            $salario = $linha['salario_usuario'];
        	}
    /* Fim Consulta SQL */ 

	if(!isset($_SESSION['user_session']) && !isset($_SESSION['pwd_session'])) 
	{
    	header("Location: login.php");
    }
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet"  href="lib/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet"  href="lib/css/user-logged.css">
    <link rel="stylesheet"  href="lib/css/user-medias.css">
	<title>Logged</title>
</head>
<body>
	<nav id="navgationbar" class="navbar-fixed-top">
		   	<div class="navbar-header">
		      	<a class="" href="https://www.globalscoutingfootball.com/home">
		        	<img alt="Brand" class="logo-nav" src="images/logo-nav.gif">
		        	<label class="title-nav">HOME</label>
		    	</a>
  		</div>
	</nav>
	<div class="container-fluid">
			<!-- Capa usuario -->
		<div class="row">
			<div class="col-md-12">
				<div class="text-center">
					<img src="images/capa.jpg" class="imagem-capa">
				</div>
			</div>
		</div>
	</div>
	<div class="container-fluid">
		<nav id="menuPagina" class="">
			<ul>
				<li><a href="#">Feed</a></li>
				<li><a href="#">About</a></li>
				<li><a href="#">Media</a></li>
				<li><a href="#">Interests</a></li>
			</ul>
		</nav>
	</div>
	<div class="container-fluid">
		<!-- Inicio Coluna para espaço -->
		<div class="row">
			<div class="col-md-1 ">
			</div>	
		<!-- Fim Coluna para espaço -->

			<div class="col-md-2 ">
				<div class="box-perfil">
					<!-- Foto de perfil -->
					<div class="text-center">
						<img src="perfil/sem-imagem.jpg" class="imgresize">
					</div>
					<br>
					<!-- Informações no box de perfil (Nome) -->
					<div class="row">
						<div class="col-md-12">
							<div class="text-center">
								<span class="textName"><?php echo $nome ?></span>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-12">
							<div class="text-right">
								<span class="textSname"><?php echo $sobrenome ?></span>
							</div>	
						</div>
					</div>					
					<br>
					<!-- Informações no box de perfil (Outras informações) -->
					<div class="text-center">
						<div class="row">
							<div class="col-md-6">
								<label>Position:</label><span><?php echo $posicao ?></span>
							</div>
							<div class="col-md-5">
								<label>Age:</label><span><?php echo $data ?></span>
							</div>
						</div>
						<br>
						<div class="row">
							<div class="col-md-6">
								<label>Weight:</label><span><br><?php echo $peso ?></span>
							</div>
							<div class="col-md-5">
								<label>Height:</label><span><?php echo $altura ?></span>
							</div>
						</div>
						<br>
						<div class="row">
							<div class="col-md-6">
								<label>Team:</label><span><?php echo $historico ?></span>
							</div>
							<div class="col-md-5">
								<label>Foot:</label><span><?php echo $pechute ?></span>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- Inicio Dinamico -->
			<div class="col-md-8 ">
				<div class="row">
					<div class="col-md-6">
						<form name="bancoimg" method="post" action="up-medias.php?funcao=imagens" enctype="multipart/form-data">
			  				<div class="container-fluid">
			    				<div id="imp-img">
			    					<label>Upload Images</label>
			    				</div>
			    				<input type="file" name="arquivo" id="arquivo" class="btn">
			    				<input type="submit" name="button" class="btn" value="Enviar">
			    			</div>
						</form>
					</div>
					<div class="col-md-6">
						<form name="bancovid" method="post" action="up-medias.php?funcao=videos">
			      			<div class="container-fluid">
				                <div id="imp-img">
				                    <label>Link YouTube</label>
				                </div>
				                <input type="url" name="nome_video" id="youtube" placeholder="https://www.youtube.com/" class="txt" required>
				                <input type="submit" name="button" class="btn" value="Enviar" id="btnCad">
			        		</div>
			   			 </form>
			   		</div>
	   			 </div>
			<br>
			<h2>Images</h2>
			<hr>
			<br>
			<form name="delete" method="get" action="up-medias.php?funcao=excluir-fotos&id_foto=<?php echo $id ?>">
				<div class="container-fluid">
				<?php 
					$sql = mysqli_query($con,"SELECT * FROM upimages WHERE id_usuario = $id_user ORDER BY data_imagem DESC");
					while ($linha = mysqli_fetch_array($sql)) {
						$id = $linha['id_foto'];
						$foto_db = $linha['nome_foto']
				?>
				<div class="col-sm-6 col-md-6 col-lg-4">
					<label class="excluir"><a  href="up-medias.php?funcao=excluir-fotos&id_foto=<?php echo $id ?>">X</a></label>
					<img class="galeria" src="uploads_fotos/<?php echo $foto_db?>">
				</div>
				<?php
				}
				?>
				</div>
			<br>
			<h2>Videos</h2>
			<hr>
			<br>
			</form>
   			 <form name="delete" method="get" action="up-medias.php?funcao=excluir-videos&id_video=<?php echo $id ?>">
        		<div class="container-fluid">
		            <?php 
		                $sql = mysqli_query($con,"SELECT * FROM upvideos WHERE id_usuario = $id_user ORDER BY data_video DESC");
		                while ($linha = mysqli_fetch_array($sql)) {
		                    $id = $linha['id_video'];
		                    $video = $linha['nome_video'];
		                    $linkyt = "http://www.youtube.com/embed/$video";
		            ?>
		                <div class="col-md-6 col-lg-4">
		                    <label class="excluir"><a  href="up-medias.php?funcao=excluir-videos&id_video=<?php echo $id ?>">X</a></label>
		                    <iframe id="ytplayer" type="text/html" width="270" height="230" src="<?php echo $linkyt ?>" frameborder="0"></iframe>
		                </div>
		            <?php
		            }
		            ?>
        		</div>
    		</form>  
		</div>
		<!-- Fim Dinamico -->
		<!-- Inicio Coluna para espaço -->
			<div class="col-md-1 ">
			</div>
		</div>
		<!-- Fim Coluna para espaço -->
	</div>
    <script src="lib/jquery/jquery.min.js"></script>
    <script src="lib/bootstrap/js/bootstrap.min.js"></script>
</body>
</html>