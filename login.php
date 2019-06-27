<!-- <?php
	session_start();
	require_once "config.php";
	if(isset($_SESSION['user_session']) && isset($_SESSION['pwd_session']))
	{
		header("location: login.php");
	}
?> -->
<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html, charset=utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<link rel="stylesheet"  href="lib/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet"  href="lib/css/login-style.css">
	<title>Entrar</title>
</head>
<body>
	<form method="post" action="validate-login.php?go=logar">
		<div>
			<div class="ladoE">
				<img src="images/FundoSite01.jpg" class="imgsite">
			</div>
			<div class="col-md-6">
				<div class="ladoD" id="loginsite">
					<img src="images/gsfcadastro.png" class="imglogin">
				
					<div class="caixasali">
						<td><input type="email" name="email_usuario" id="usuario" class="caixaslog" placeholder="Username" required></td>
					</div>
					<div class="caixasali">
						<td><input type="password" name="senha_usuario" id="senha" class="caixaslog" placeholder="Password" required></td>
						<br>
						<span><a class="pass" data-toggle="modal" href="#ModalRecover">Forgot Password</a></span>
					</div>
					<div class="caixasali">
						<td colspan="2"><input type="submit" value="SIGN IN" class="caixaentrar" id="btnEntrar"></td>
					</div>
					<div class="caixasali">
						<a class="caixacad" href="cadastro.php">CREATE AN ACCOUNT</a></span>
					</div>
				</div>
			</div>
		</div>
	</form>
	
<!-- Modal -->
<div class="modal fade" id="ModalRecover" tabindex="-1" role="dialog" aria-labelledby="RecoverModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header" id="modalTitle">
        <h3 class="modal-title" >Forgot Password</h3>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
    <div class="modal-body">  
		If you have forgotten the password, 
		<br>
		Enter your registered E-mail that we will send the steps to reset your password.

	</div>
	<div class="modal-body"> 
		<span class="modalspan">E-mail:</span>
		<input class="caixaslog" type="email" name="email_recupera">
		<br>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Send</button>
      </div>
    </div>
  </div>
</div>


	<script src="lib/jquery/jquery.min.js"></script>
	<script src="lib/bootstrap/js/bootstrap.min.js"></script>
</body>
</html>