<?php
    if(!session_start()){
        session_start();
    }   
     require_once "vendor/autoload.php";
     use Source\Model\Usuario;
     
    $usuario = new Usuario();
    if(isset($_POST['email_usuario'])){
            
       
        $senha_usuario = addslashes($_POST['senha_usuario']);
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
    <form method="POST">
        
    <label>Email:</label>
        <input type="text" name="email_usuario">
        <br>

        <label>Senha:</label>
        <input type="password" name="senha_usuario">
        <br>

        <input type="submit" name="Enviar">
    </form>