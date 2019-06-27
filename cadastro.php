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
?>

<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html, charset=utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	
	<title>Cadastrar</title>
	<link rel="stylesheet"  href="lib/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet"  href="style.css">
</head>
<body>
 <header>
 	<nav>
 		<ul class="tright">
 			<li>
 				<a href="https://www.globalscoutingfootball.com/home">Voltar</a>
 			</li>
 		</ul>
 	</nav>
 	<a href="https://www.globalscoutingfootball.com/home"><img  id="logoGS" title="Logo" alt="Logo" src="images/gsfcadastro.png"></a>
 	<img  id="logoCBF" title="Logo" alt="Logo" src="images/cbf_logo.png">
	<!-- <div>
	 <h1 id="titulo">JUNTE-SE A NÓS</h1> 
	</div> -->
</header>
	<div class="row">
			<div class="col-md-2">
			</div>
		<div class="col-md-8">
			<h3>
				<span id="negrito">
				Bem-vindo ao nosso software de análise e captação de atletas
				</span>
			</h3>
				<br>
				<span>
				Ao se cadastrar, você será analisado por nossos profissionais <br> e poderá ser encaminhado para avaliações em nossos clubes parceiros.
				</span>
				<br>
				<br>
				<span>
				Preencha os campos abaixo e aguarde nosso contato.
				</span>
		</div>
	</div>
<div>
	
	<form method="post" action="?go=cadastrar">
	<div class="container-fluid">

			<div class="row">
				<div class="col-md-2">
				</div>

				<div class="col-md-4">
					<h4 class="Title">
						<span>Informações Pessoais</span>
					</h4>
				</div>
			</div>

			<div class="row">
				<div class="col-md-2">
				</div>
				<div class=" col-md-2">
					<div>
						<label>Nome:</label>	
					</div>
						<input type="text" name="nome_usuario" id="nome_usuario" class="txt" placeholder="Digite seu nome..">
				</div>
				<div class="col-md-2">
					<div>
						<label>Sobrenome:</label>
					</div>
							<input type="text" name="sobrenome_usuario" id="sobrenome_usuario" class="txt" placeholder="Digite seu sobrenome..">
				</div>
			</div>

			<div class="row">
				<div class="col-md-2">
				</div>
				<div class="col-md-2">
					<div>
						<label>CPF:</label>
					</div>
						<input type="number" name="cpf_usuario" id="cpf_usuario" class="txt" maxlength="14">
				</div>
				<div class="col-md-2">		
					<div>
						<label>Passaporte:</label>
					</div>
						<input type="text" name="passaporte_usuario" id="passaporte_usuario" class="txt">
				</div>		
				<div class="col-md-2">
					<div>		
						<label>Data de Nascimento:</label>
					</div>
					<input type="date" name="data_nascimento" id="data_nascimento" class="txt" placeholder="01/01/2018" min="1960-01-01" max="2018-01-01" >
				</div>
				<div class="col-md-2">
					<div>
						<label>Gênero:</label>
					</div>
					<select type="text" name="genero_usuario" id="genero_usuario" class="txt"> 
						<option value="Masculino">Masculino</option>
						<option value="Feminino">Feminino</option>
					</select>
				</div>
			</div>

			<div class="row">
				<div class="col-md-2">
				</div>
				<div class="col-md-2">
					<div>
						<label>Estado Civil:</label>
					</div>
						<select type="text" name="estado_civil" id="estado_civil" class="txt">
							<option value ="Solteiro(a)">Solteiro(a)</option> 
							<option value ="Casado(a)">Casado(a)</option>
							<option value ="Divorciado(a)">Divorciado(a)</option>
							<option value ="Viuvo(a)">Viuvo(a)</option>
							<option value ="União Estavel">União Estavel</option>
							<option value ="Noivo(a)">Noivo(a)</option>
						</select>
				</div>
				<div class="col-md-2">
					<div>	
						<label>Cidade Natal:</label>
					</div>
						<input type="text" name="cidade_natal" id="cidade_natal" class="txt">
				</div>
				<div class="col-md-2">
					<div>
						<label>Nacionalidade:</label>
					</div>	
						<select type="text" name="nacionalidade" id="nacionalidade" class="txt"> 
						<?php
							while($linha = mysqli_fetch_assoc($listaPaises))
						{	
						?>
							<option value="<?php echo $linha["paises_nomes"]?>"><?php echo $linha["paises_nomes"]?></option>
						<?php
						}
						?>
					</select>
				</div>	
				<div class="col-md-2">
					<div>	
						<label>Idiomas Que Fala:</label>
					</div>
				<input type="text" name="idiomas_usuario" id="idiomas_usuario" class="txt">
				</div>	
			</div>		

			<div class="row">
				<div class="col-md-2">
				</div>	
				
					<div class="col-md-2">
					<div>
						<label>Telefone:</label>
					</div>
						<input type="number" name="telefone_usuario" id="telefone_usuario" class="txt" placeholder="551199999-9999">
					</div>

					<div class="col-md-2">
						<div>
							<label>Escolaridade:</label>
						</div>	
								<select type="text" name="escolaridade" id="escolaridade" class="txt">
									<option value="Ensino Médio Completo">Ensino Médio Completo</option>
									<option value="Ensino Médio Incompleto">Ensino Médio Incompleto</option>
									<option value="Ensino Fundamental Completo">Ensino Fundamental Completo</option>
									<option value="Ensino Fundamental Incompleto">Ensino Fundamental Incompleto</option>
									<option value="Ensino Superior Completo">Ensino Superior Completo</option>
									<option value="Ensino Superior Incompleto">Ensino Superior Incompleto</option>
									<option value="Pós Graduação ou mais">Pós Graduação ou mais</option>
									<option value="Analfabeto">Analfabeto</option>
								</select>
					</div>		
				<div class="col-md-2">
					<div>
						<label>Email:</label>
					</div>
						<input type="email" name="email_usuario" id="email_usuario" class="txt">
				</div>
				<div class="col-md-2">
					<div>	
						<label>Senha:</label>
					</div>
					<input type="password" name="senha_usuario" id="senha_usuario" class="txt" maxlength="25">
				</div>	
			</div>
	
			<div class="row">
				<div class="col-md-2">
				</div>

				<div class="col-md-4">
					<h4 class="Title">
						<span>Sobre o atleta</span>
					</h4>
				</div>
			</div>	

			<div class="row">
					<div class="col-md-2">
					</div>
					<div class="col-md-2">
						<div>
							<label>Peso:</label>
						</div>
						<input type="number" name="peso_usuario" id="peso_usuario" class="txt">
					
						</div>
					<div class="col-md-2">
						<div>	
							<label>Altura:</label>
						</div>
							<input type="text" name="altura_usuario" id="altura_usuario" class="txt">
					</div>
					<div class="col-md-2">
						<div>
							<label>Pé Que Chuta:</label>
						</div>
							<select type="text" name="pe_usuario" id="pe_usuario" class="txt">
								<option value="Direito">Direito</option>
								<option value="Esquerdo">Esquerdo</option>
								<option value="Ambos">Ambos</option>
							</select>
					</div>
					<div class="col-md-2">
						<div>
							<label>Posição Preferida:</label>
						</div>
							<select type="text" name="posicao_usuario" id="posicao_usuario" class="txt">
								<option value="Goleiro">Goleiro</option>
								<option value="Zagueiro">Zagueiro</option>
								<option value="Meio-Campo">Meio-Campo</option>
								<option value="Atacante">Atacante</option>
								<option value="Volante">Volante</option>
								<option value="Lateral">Lateral</option>
								<option value="Armador">Armador</option>
								<option value="Centro-Avante">Centro-Avante</option>
							</select>	
					</div>
			</div>
	
			<div class="row">
				<div class="col-md-2">
				</div>
				<div class="col-md-2">
							<div>
								<label>Pretensão salarial</label>
							</div>
								<select type="text" name="salario_usuario" id="salario_usuario" class="txt">
									<option value="Sem preferencia">Sem preferência</option>
									<option value="1 mil a 5 mil">1 mil a 5 mil</option>
									<option value="5 mil a 15 mil">5 mil a 15 mil</option>
									<option value="15 mil a 50 mil">15 mil a 50 mil</option>
									<option value="Mais de 50 mil">Mais de 50 mil</option>
								</select>
					</div>
					<div class="col-md-2">
						<div>
							<label>Times que deseja ser avaliado:</label>
						</div>
						
								<select type="text" name="nome_parceiro" id="nome_parceiro" class="txt">
								<?php
									while($linha = mysqli_fetch_assoc($listaTimes))
									{	
								?>
									<option value="<?php echo $linha["nome_parceiro"]?>"><?php echo $linha["nome_parceiro"]?></option>
								<?php
									}
								?>
								</select>
							</div>
					<div class="col-md-2">
						<div>
							<label>Historico de Clubes:</label>
						</div>	
								<input type="text" name="historico_usuario" id="historico_usuario" class="txt">
						</div>
					<div class="col-md-2">
						<div>
							<label>Transfermarkt/Soccerway:</label>
						</div>	
							<input type="url" name="cv_usuario" id="cv_usuario" class="txt">
					</div>		
				</div>

			<div class="row">
				<div class="col-md-2">
				</div>
					<div class="col-md-2">	
						<div>	
							<label>Possui Agente?</label>
						</div>
							<select type="text" name="agente_usuario" id="agente_usuario" class="txt">
								<option value ="Não">Não</option>
								<option value ="Sim">Sim</option>
							</select>
					</div>
					<div class="col-md-2">
						<div>
							<label>Nome do Agente:</label>
						</div>	
							<input type="text" name="nome_agente" id="nome_agente" class="txt">
					</div>
					<div class="col-md-2">
						<div>
							<label>Contato do Agente:</label>
						</div>
							<input type="number" name="contato_agente" id="contato_agente" class="txt">
					</div>		
			</div>

		<div class="row">
			<div class="col-md-4">
				<div>
				<label></label>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-2">
			</div>
			<div class="col-md-5">
					<input type="checkbox" value="Sim" class="" id="check" required>
					<!-- Button trigger modal -->
					<a data-toggle="modal" data-target="#exampleModalLong">
					  Li e aceito os termos de uso
					</a>
				</div>
					<!-- Modal -->
				<div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
					  <div class="modal-dialog" role="document">
					    <div class="modal-content">
					      <div class="modal-header">
					        <h5 class="modal-title" id="exampleModalLongTitle">Termos de Uso Global Scouting Football</h5>
					        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
					          <span aria-hidden="true">&times;</span>
					        </button>
					      </div>
					      <div class="modal-body">
					        
							<p>Termo de Aceitação das Condições para Utilização do Serviço</p>
							<br>
							<p>1.	O presente Termo vincula e deve ser observado por todos os Usuários que utilizarem os serviços do Global Scouting Football, conforme as informações abaixo.</p>

							<p>2.	Qualquer Usuário, ao utilizar ou visitar a página do site Global Scouting Football ou quaisquer produtos e/ou serviços vinculados ao site Global Scouting Football, quais sejam, programas, fornecimento de dados e serviços fornecidos para o Usuário, a partir ou através do Global Scouting Football (denominados coletivamente, "Serviços"), manifesta a sua concordância e anuência em relação (i) às Políticas, Condições e Regras Gerais para Utilização do Serviço ("Política de Utilização de Serviço") disponível no Global Scouting Football; (ii) o aviso de privacidade do Global Scouting Football, localizado no site www.gsfootball.com e incorporado ao documento de Política de Utilização de Serviço como referência; e (iii) as Diretrizes do Global Scouting Football, localizadas no site www.gsfootball.com e também incorporadas ao documento Política de Utilização de Serviço como referência. </p>

							<p>3.	Fica estabelecido que, caso o Usuário não concorde com algum dos termos presentes no documento de Política de Utilização de Serviço, com o aviso de privacidade do Global Scouting Football ou com as Diretrizes do Global Scouting Football, o Usuário não deverá utilizar o Serviço e aceitar o presente termo.</p>

							<p>4.	Ainda, fica estabelecido que, embora o Global Scouting Football se esforce para avisar o Usuário sempre que mudanças importantes forem realizadas no documento de Política de Utilização de Serviço, o Usuário deve reler periodicamente a versão mais atualizada mantida junto ao site (www.gsfootball.com). </p>

							<p>5.	O Global Scouting Football pode, a seu exclusivo critério, modificar ou revisar o documento de Política de Utilização de Serviço e suas políticas a qualquer tempo, e o Usuário concorda em cumprir tais modificações ou revisões. Nada no documento de Política de Utilização de Serviço será tido como concessão de quaisquer direitos ou benefícios a terceiros.</p>

							<p>6.	Fica o Usuário consentido de que o site é controlado e oferecido pelo Global Scouting Football a partir de suas instalações na República Federativa do Brasil. O Global Scouting Football não garante que o website do Global Scouting Football seja apropriado ou esteja disponível para uso em outros locais. As pessoas que acessam ou usam o website do Global Scouting Football a partir de outras jurisdições o fazem por conta própria e são responsáveis pelo cumprimento das leis regionais/nacionais.</p>

							<p>7.	Fica estabelecido que, em relação à capacidade para aceitar as disposições deste Termo, bem como a Política de Utilização de Serviço, o Usuário afirma ser maior de 18 (dezoito) anos ou ser menor emancipado, ou estar de posse de autorização legal dos pais ou de tutores, e plenamente capaz de consentir com os termos, condições, obrigações, afirmações, representações e garantias descritas nesta Política de Utilização de Serviço, e obedecê-los e cumpri-los. Dessa forma, em qualquer circunstância, o Usuário afirma ter mais de 18 (dezoito) anos, visto que o website do Global Scouting Football não é projetado para jovens menores de 18 (dezoito) anos. </p>

							<p>8.	Este Termos será regido pelas leis internas da República Federativa do Brasil, independentemente dos princípios de conflitos de leis. Qualquer reclamação ou controvérsia entre o Usuário e o Global Scouting Football que decorra total ou parcialmente do website será dirimida exclusivamente pelo foro da Comarca de São Paulo, Estado de São Paulo, Brasil, seja qual for o domicílio do Usuário.</p>
							<br>
							<p>Data: 30 de janeiro de 2018</p>
					      </div>
					    </div>
					  </div>
				</div>
		</div>
		<div class="row">
				<div class="col-md-2">

					</div>
					<div class="col-md-7">
						<input type="checkbox" value="Sim" class="" id="check" required>
						<a href="https://ec.europa.eu/commission/sites/beta-political/files/data-protection-factsheet-changes_en.pdf">Afirmo estar ciente das novas mudanças relacionadas a proteção de dados europeia (GDPR)</a>
				</div>
		</div>
		<div class="row">
				<div class="col-md-2">
				</div>
				<div class="col-md-4">
				</div>
		</div>	
		<div class="row">
				<div class="col-md-5">
				</div>
				<div class="col-md-4">
					<input type="submit" value="Cadastrar" class="btn" id="btnCad"> 
				</div>
		</div>		
		</form>
	</div>	

		
<footer>
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-4">
				
			</div>
			<div class="col-md-7">
				<h5>Copyright 2018 | Powered by House Dev's</h5>
			</div>
		</div>
	</div>
</footer>

	<script src="lib/jquery/jquery.min.js"></script>
	<script src="lib/bootstrap/js/bootstrap.min.js"></script>
	
</body>
</html>
