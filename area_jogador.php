<?php
require_once "config.php";
session_start();

if(!isset($_SESSION['user_session']) && !isset($_SESSION['pwd_session'])) {

    header("Location: login.php");

    }
?>


<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html, charset=utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet"  href="lib/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet"  href="jogadorareastyle.css">
    <title>Global Scouting Football</title>
</head>
<body>
<header>
    <?php 
    $id_user = $_SESSION['id'];
    $sql = mysqli_query($con,"SELECT * FROM usuarios WHERE id_usuario = $id_user");

    $linhas = mysqli_num_rows($sql); 
?>
    <div id="menu"> 
                <nav>
                    <ul class="menu tcenter">
                        <li>
                            <a href="area_jogador.php"><i aria-hidden="true"></i>Home</a>
                        </li>
                        <li>
                            <a href="galeria_jogador.php"><i aria-hidden="true"></i>Galeria</a>                        
                        </li>
                        <li>
                            <a href="videos_jogador.php"><i aria-hidden="true"></i>Videos</a>                        
                        </li>
                         <li>
                            <a href="alt_cadastro.php"><i aria-hidden="true"></i>Alterar Cadastro</a>                        
                        </li>
                        <li>
                            <a href="sair.php"><i aria-hidden="true"></i> Sair</a>                        
                        </li>
                            <button type="button" class="btn btn-warning" data-toggle="modal" data-target=".bd-example-modal-lg">Meus Dados</button>

                            <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                              <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                  <?php while ($linhas = mysqli_fetch_array($sql)) 
                                    {
                                ?>
                                <br>
                            <div class="row">
                                <div class="col-md-4">
                                   <label>Nome:</label><span><?php echo $linhas['nome_usuario'];?></span>
                                </div>
                                <div class="col-md-4">
                                   <label>Sobrenome:</label> <span><?php echo $linhas['sobrenome_usuario'];?></span>
                                </div>                                
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-md-4">
                                   <label>Nacionalidade:</label><span><?php echo $linhas['nacionalidade'];?></span>
                                </div>
                                <div class="col-md-4">
                                   <label>Telefone:</label> <span><?php echo $linhas['telefone_usuario'];?></span>
                                </div>                                
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-md-4">
                                   <label>Peso(KG):</label><span><?php echo $linhas['peso_usuario'];?></span>
                                </div>
                                <div class="col-md-4">
                                   <label>Data de Nascimento:</label> <span><?php echo $linhas['data_nascimento'];?></span>
                                </div>                                
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-md-4">
                                   <label>Tipo de Pé:</label><span><?php echo $linhas['pe_usuario'];?></span>
                                </div>
                                <div class="col-md-4">
                                   <label>Posição:</label> <span><?php echo $linhas['posicao_usuario'];?></span>
                                </div>                                
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-md-4">
                                   <label>Salario:</label><span><?php echo $linhas['salario_usuario'];?></span>
                                </div>
                                <div class="col-md-4">
                                   <label>E-Mail:</label> <span><?php echo $linhas['email_usuario'];?></span>
                                </div>                                
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-md-4">
                                   <label>Agente:</label><span><?php echo $linhas['agente_usuario'];?></span>
                                </div>
                                <div class="col-md-4">
                                   <label>Nome do Agente:</label> <span><?php echo $linhas['nome_agente'];?></span>
                                </div>                                
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-md-4">
                                   <label>Contato do Agente:</label><span><?php echo $linhas['contato_agente'];?></span>
                                </div>
                                <div class="col-md-4">
                                   <label>Escolaridade:</label> <span><?php echo $linhas['escolaridade'];?></span>
                                </div>
                                <br>                                
                            </div>   
                             <?php   
                                 } 
                             ?>
                                </div>
                              </div>
                            </div>
                        <li> 

                        </li>
                    </ul>
                </nav>
    </div>
        <div>
        <img  id="logoGS" title="Logo" alt="Logo" src="images/gsfcadastro2.png"> 
    </div>
    <div>
        <h1>FEED DE NOTICIAS</h1>

    </div>
</header>
    <br>
    <hr>
    <br>
     <?php 
                $sql = mysqli_query($con,"SELECT * FROM noticias ORDER BY data_noticia DESC");
                while ($linha = mysqli_fetch_array($sql)) {
                    $id = $linha['id_noticia'];
                    $foto_db = $linha['nome_foto'];
                    $textnoticia = $linha['text_noticia'];
                    $urlnoticia = $linha['url_noticia'];
                    $titulonoticia = $linha['titulo_noticia'];
            ?>

        <div class="container-fluid">
            <div class="col-md-10">
                    <h2 style="margin-left: 600px"><?php echo $titulonoticia; ?></h2>
                    <br>
                    <img id="imgnoticia" src="uploads_noticias/<?php echo $foto_db?>" style="margin-left: 490px; margin-bottom: 30px" >
                    <br>
                    <textarea class="form-control" readonly name="text_noticia" rows="5" id="comment" style="margin-left: 100px; background-color: #fff;"><?php echo $textnoticia; ?></textarea>
                    <br>
                    <label><a href="<?php echo $urlnoticia?> ">Link da Materia Completa</a></label>
                    <br>
                    <hr>
            </div>
        </div>
            <?php 
                }
             ?>

<div class="container-fluid">
        
</div>




<footer>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-4">
                
            </div>
            <div class="col-md-7">
                <h4>Copyright 2018 | Powered by House Dev's</h4>
            </div>
        </div>
    </div>
</footer>
    <script src="lib/jquery/jquery.min.js"></script>
    <script src="lib/bootstrap/js/bootstrap.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>    
    <script type="text/javascript" src="lib/js/jquery.arbitrary-anchor.js"></script>
</body>
</html>