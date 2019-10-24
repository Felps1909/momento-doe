<?php
    require_once "menu.php";
    @session_start();
    if(!isset($_SESSION["id_usuario"])){
     session_destroy(); 
     header("Location: login.php"); 
     exit; 
 } 
?>
<main>
    <style>
     body{
            background-color: #E2C0FF;
        }
    </style>
    <?php
         use Source\Model\Usuario;
         use  Source\Model\UploadImage;
         $usuario = new Usuario();
         if(isset($_GET['i'])){
             $usuario = $usuario->buscarDados("id_usuario = {$_GET['i']}")[0];
              
         }
     ?>    
        
    <div class="edt-perfil">
        
        <form method="post" class="form-campos" enctype="multipart/form-data">
            <a href="perfil.php">Voltar</a>
            <label class="btn-foto" for='selecao-arquivo'>
                <img src="imagens/editperf.png"  class = "edtft-btn">
            </label>
            <input id='selecao-arquivo' type='file' name="url_foto_usuario">

            
            <label>Nome</label>
            <input class="input" type="text" name="nome_usuario" value="<?php echo $usuario->nome_usuario;?>">

            <label>E-mail</label>
            <input class="input" type="text"  name="email_usuario" value="<?php echo $usuario->email_usuario;?>">

                

            <label>Senha</label>
            <input class="input" type="password" name="senha_usuario" value="" >

            <input type="Submit" name="Enviar" value="Enviar">
        
        </form>
        <?php
            if(isset($_POST['nome_usuario'])){
                
                $nome_usuario = addslashes($_POST['nome_usuario']);
                $senha_usuario = hash("sha256",addslashes($_POST['senha_usuario']));
                $email_usuario = addslashes($_POST['email_usuario']);
                $url_foto_usuario = $_FILES;

                $upload = new UploadImage($_FILES['url_foto_usuario'],  "imagens/perfil/");
                $response = $upload->salvar();
               

                $usuario->nome_usuario = $nome_usuario;
                $usuario->senha_usuario = $senha_usuario;
                $usuario->email_usuario = $email_usuario;
                $usuario->url_foto_usuario = $response['url'];

                $usuario->salvarDados();

                echo "Alterações realizadas com sucesso!";
            }
        
        ?>


    </div>

</main>