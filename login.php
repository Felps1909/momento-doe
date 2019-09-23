<?php
require_once "menu.php";
  
    
     use Source\Model\Usuario;
     
    $usuario = new Usuario();
    
?>
    <?php

        if(isset($_POST['email_usuario'])){
            
       
        $senha_usuario = hash("sha256", addslashes($_POST['senha_usuario']));
        $email_usuario = addslashes($_POST['email_usuario']);
       
        
        if(!empty($senha_usuario) && !empty($email_usuario)){
            if($usuario->logarUsuario($email_usuario, $senha_usuario)){
                // var_dump($_SESSION['id_usuario']);
                 header("location:perfil.php");
                
            } else{
                echo"email ou senha incorreta";
            }
                    
        }else{
             echo "preencha todos os campos";
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