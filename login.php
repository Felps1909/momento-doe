<?php
require_once "menu.php";
  
    
     use Model\Usuario;
     
    $usuario = new Usuario();
    
?>
    <?php

        if(isset($_POST['email_usuario'])){
            
         $email_usuario = addslashes($_POST['email_usuario']);
        $senha_usuario = hash("sha256", addslashes($_POST['senha_usuario']));
        
       
        
        if(!empty($senha_usuario) && !empty($email_usuario)){
            if($usuario->logarUsuario($email_usuario, $senha_usuario)){
                    
                 $_SESSION['logado'] = true;
                 $_SESSION['id_tipo_us'] = $usuario->getTipoUsuario()->id_tipo_us;

                 header("location:perfil.php");
                
            } else{
                echo"<script>";
                echo "alert('Email ou senha incorreta!')";
                echo"</script>" ; 
            }
                    
        }else{
            echo"<script>";
            echo "alert('Preencha todos os Campos!')";
            echo"</script>" ; 
         }
    }
   

 ?>
 <head>
 <title>Login</title>
 </head>
<style>
        body{
            background-color: #E2C0FF;
        }
    </style>
       <!--botoes cadastro e login-->
       <div class="btn">
            <a href="cadastro.php" class="btn-cadastro">Cadastro</a>
            <a href="login.php" class="btn-cadastro">Login</a>
       </div>
       
        <form method = "post" class="form-campos">
       <div id="pessoa">

                <label>E-mail</label>
                <input class="input" type="text" name="email_usuario">
                <label>Senha</label>
                <input class="input" type="password" name="senha_usuario">

               
                

                <input type="Submit" name="Enviar" value="Enviar">
               
            
            
       </div>
       </form>
<?php
    require_once "footer.php";
?>