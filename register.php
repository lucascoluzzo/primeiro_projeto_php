<?php
	require_once "config.php";

	$selectPaises = "SELECT id_paises, paises_nomes FROM paises ORDER BY 'id_paises'";
	$listaPaises = mysqli_query($con, $selectPaises);
		if(!'listaPaises')
		{
			die("Erro no Banco de dados!");
		}
	$selectTimes = "SELECT id_parceiro, nome_parceiro FROM parceiros";
	$listaTimes = mysqli_query($con, $selectTimes);
		if(!'listaTimes')
		{
			die("Erro no Banco de dados!");
		}

if($_GET['funcao'] == 'cadastrar'){
	$nome = $_POST['nome_usuario'];
	$sobrenome = $_POST['sobrenome_usuario'];
	$cidadenatal = $_POST['cidade_natal'];
	$nacionalidade = $_POST['nacionalidade'];
	$telefone = $_POST['telefone_usuario'];
	$email = $_POST['email_usuario'];
	$pwd = $_POST['senha_usuario'];
	$confirmPwd = $_POST['confirma_senha']
	if ($confirmPwd != $pwd) {
		echo "<script>alert('Senha não confere!'); history.back();</script>";
	}
	else
	{
		$query1 = mysqli_query($con,"SELECT * FROM usuarios WHERE email_usuario = '$email'");
		if($query1 -> num_rows == 1)
		{
			echo "<script>alert('Email já cadastrado!'); history.back();</script>";
		}
		else
		{
			mysqli_query($con, "INSERT INTO usuarios 
			(nome_usuario,
			sobrenome_usuario,
			cidade_natal,
			nacionalidade,
			telefone_usuario,
			email_usuario,
			senha_usuario) 
			values 
			('$nome',
			'$sobrenome',
			'$cidadenatal',
			'$nacionalidade',
			'$telefone',		
			'$email',
			'$pwd')");

			echo "<meta http-equiv=refresh content='0; url=area_jogador.php'><script>alert('Usuário cadastrado com sucesso.');</script>";
		}
	}
}

?>