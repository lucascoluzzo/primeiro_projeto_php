<?php
	require_once "config.php";
	session_start();

	if(isset($_GET['go']))
	{
		if($_GET['go'] == 'logar')
		{
		$email = $_POST['email_usuario'];
		$pwd = $_POST['senha_usuario'];

		if(empty($email)){
			echo "<script>alert('Preencha todos os campos para logar-se.'); history.back();</script>";
		}
		elseif(empty($pwd))
			{
			echo "<script>alert('Preencha todos os campos para logar-se.'); history.back();</script>";
			}
		else
			{

			$sql = ("SELECT id_usuario, email_usuario, senha_usuario FROM usuarios WHERE email_usuario = '$email' AND senha_usuario = '$pwd'");
			$query1 = mysqli_query($con, $sql);
		if ($query1)
			{
				$dados_usuario = mysqli_fetch_array($query1);

				if(isset($dados_usuario['email_usuario']))
				{
				$_SESSION['id'] = $dados_usuario['id_usuario'];
				$_SESSION['user_session'] = $email;
				$_SESSION['pwd_session'] = $pwd;
				echo "<script>alert('Usuário logado com sucesso.');</script>";
				header("Location: area_jogador.php");
				}

				else{

				echo "<script>alert('Usuário e senha não correspondem.'); history.back();</script>";
					}
			}	
			
			else
				{
				header("Location: login.php");
				}
			}
		}	
	}
?>