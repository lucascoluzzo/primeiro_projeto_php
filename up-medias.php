<?php
	require_once "config.php"; 
		session_start();
			 if(!isset($_SESSION['user_session']) && !isset($_SESSION['pwd_session'])) 
			{
			    header("Location: login.php");
		    }

	/* Query para importar imagem para o banco de dados */
	if ($_GET['funcao'] == "imagens" && is_file($_FILES['arquivo']['tmp_name']))
	{
		$foto = $_FILES['arquivo']['name'];

		$foto = str_replace(" ", "_", $foto);
		$foto = str_replace("â", "a", $foto);
		$foto = str_replace("ã", "a", $foto);
		$foto = str_replace("á", "a", $foto);
		$foto = str_replace("à", "a", $foto);
		$foto = str_replace("é", "e", $foto);
		$foto = str_replace("è", "e", $foto);
		$foto = str_replace("í", "i", $foto);
		$foto = str_replace("ì", "i", $foto);
		$foto = str_replace("ó", "o", $foto);
		$foto = str_replace("õ", "o", $foto);
		$foto = str_replace("ô", "o", $foto);
		$foto = str_replace("ò", "o", $foto);
		$foto = str_replace("ç", "c", $foto);

		$foto = strtolower($foto);

		$tipos = array('image/jpeg','image/pjpeg','image/png','image/jpeg','image/jpg');
		$arqType = $_FILES['arquivo']['type'];
		if(array_search($arqType, $tipos) === false)
		{
			echo "<meta http-equiv=refresh content='0; url=user_active.php'><script type='text/javascript'>alert('formato invalido');</script>";
		}
		else 
		{
			echo "<meta http-equiv=refresh content='0; url=user_active.php'><script type='text/javascript'>alert('Imagem Salva!');</script>";

			if (file_exists("uploads_fotos/$foto")) 
			{
				$a = 1;
					while (file_exists("uploads_fotos/[$a]$foto"))
					{
						$a++;
					}
				$foto = "[".$a."]".$foto;

				echo "<meta http-equiv=refresh content='0; url=user_active.php'><script type='text/javascript'>alert('Imagem Salva!');</script>";
			}

			if (!move_uploaded_file($_FILES['arquivo']['tmp_name'], "uploads_fotos/".$foto))
			{
				echo "<meta http-equiv=refresh content='0; url=user_active.php'><script type='text/javascript'>alert('Erro Upload');</script>";
			}

			$id_user = $_SESSION['id'];
			$sql = mysqli_query($con,"INSERT INTO upimages (nome_foto, id_usuario) VALUES ('$foto', $id_user)");
		}
	}
	
	else 
		{
			header("Location: user_active.php");
		}

	/* Query para deletar imagem do banco de dados */
	if ($_GET['funcao'] == "excluir-fotos")
	{
		$idfoto = $_GET['id_foto'];
			echo "<meta http-equiv=refresh content='0; url=user_active.php'><script type='text/javascript'>alert('Foto Apagada!');</script>";
			$sql_alt = mysqli_query($con, "SELECT * FROM upimages WHERE id_foto = '$idfoto'");
			while ($linha = mysqli_fetch_array($sql_alt))
			{
				$foto_db = $linha['nome_foto'];	
			}
		unlink("uploads_fotos/$foto_db");
		$sql_del = mysqli_query($con, "DELETE FROM upimages WHERE id_foto = '$idfoto'");
	}

	/* Query para importar videos para o banco de dados */
    if($_GET['funcao'] == "videos") {
        $video = $_POST['nome_video'];
        $video = preg_replace("#.*youtube\.com/watch\?v=#", "", $video);
        $id_user = $_SESSION['id'];
        $sql = mysqli_query($con,"INSERT INTO upvideos (nome_video, id_usuario) VALUES ('$video', $id_user)");
         echo "<meta http-equiv=refresh content='0; url=user_active.php'><script type='text/javascript'>alert('Video Salvo!');</script>";
        } 

    /* Query para excluir videos do banco de dados */
	if ($_GET['funcao'] == "excluir-videos")
	{
		$idvideo = $_GET['id_video'];
			echo "<meta http-equiv=refresh content='0; url=user_active.php'><script type='text/javascript'>alert('Video apagado!');</script>";

		$sql_alt = mysqli_query($con, "SELECT * FROM upvideos WHERE id_video = '$idvideo'");
			while ($linha = mysqli_fetch_array($sql_alt)) 
			{
				$foto_db = $linha['nome_video'];	
			}
		$sql_del = mysqli_query($con, "DELETE FROM upvideos WHERE id_video = '$idvideo'");
	}


?>





