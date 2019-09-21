<?php
   require_once "vendor/autoload.php";
   use Source\Model\Usuario;

   $usuario = new Usuario();
//    $usuario = new Usuario("momentodoe","localhost","root","");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <?php
        if(isset($_POST['nome_usuario'])){
            
            $nome_usuario = addslashes($_POST['nome_usuario']);
            $senha_usuario = addslashes($_POST['senha_usuario']);
            $email_usuario = addslashes($_POST['email_usuario']);
            $tel_usuario = addslashes($_POST['tel_usuario']);
            
            if(!empty($nome_usuario) && !empty($senha_usuario)
             && !empty($email_usuario) && !empty($tel_usuario)){

                if(!$usuario->cadastrarUsuario($nome_usuario, $senha_usuario,
                $email_usuario,  $tel_usuario)){
                    echo "Email ja esta Cadastrado";
                }

            }else{
                echo "Prencha todos os campos";
            }
        }
    ?>
    <form method="POST">
        <label>Nome:</label>
        <input type="text" name="nome_usuario">
        <br>

        <label>Senha:</label>
        <input type="password" name="senha_usuario">
        <br>

        <label>Email:</label>
        <input type="text" name="email_usuario">
        <br>

        <label>Telefone:</label>
        <input type="text" name="tel_usuario">
        <br>


        <input type="submit" name="Enviar">
    </form>
    <a href="login.php">Login</a>
    <?php
        
        // $dados = $usuario->buscarDados();
        // //var_dump($dados);

        // if(count($dados) > 0){
        //     for($i=0; $i<count($dados);$i++){
              
        //         foreach ($dados[$i] as $k => $v) {
        //             if($k != "id_usuario" && $k != "cod_tipo_us"){
        //                 echo "<pre>".$v."<pre>";
        //             }
        //         }
                
        //     }
        // }else{
        //     echo "Ainda não há pessoas cadastradas";
        // }

        


        
    ?>
</body>
</html>   
  