<?php
    require_once "menu.php";
    use Source\Model\Usuario;
   $usuario = new Usuario();
 
?>

     <?php

        if(isset($_GET['i'])){
            $usuario = $usuario->buscarDados("id_usuario = {$_GET['i']}")[0];
             
        }

        if(isset($_POST['nome_usuario'])){
            
            $id_usuario = (int)$_POST['id_usuario'];
            $nome_usuario = addslashes($_POST['nome_usuario']);
            $senha_usuario = hash("sha256",addslashes($_POST['senha_usuario']));
            $email_usuario = addslashes($_POST['email_usuario']);
			$id_doc = addslashes($_POST['id_doc']);
			$tipo_usuario = (int)$_POST['tipos'];
            //$tel_usuario = addslashes($_POST['tel_usuario']);
            
            if(!empty($nome_usuario) && !empty($senha_usuario)
             && !empty($email_usuario) && !empty($data_usuario) && !empty($tipo_usuario)){

                if(!$id_usuario && count($usuario->buscarDados("email_usuario = '$email_usuario'"))> 0){
                    echo "Deu Erro";
                }else{

                    $usuario->nome_usuario = $nome_usuario;
                    $usuario->senha_usuario = $senha_usuario;
                    //$usuario->tel_usuario = ;
                    $usuario->email_usuario = $email_usuario;
                    //$usuario->url_foto_usuario;
                    //$usuario->cod_status_tipo_us;
                    $usuario->cod_tipo_us = $tipo_usuario;
                    $usuario->id_doc = $id_doc;
                    $usuario->salvarDados();
                    $_SESSION['id_usuario'] = $usuario->id_usuario;

                    echo"<script>";
                    echo "alert('Cadastrado com Sucesso')";
                    echo"</script>";
                }  

            }else{
                echo "Prencha todos os campos";
            }
        }
    ?>
     <head>
 <title>Cadastro</title>
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
       
          <form method ="post" class="form-campos">
            <div class="tipos">
                <span onClick="toggleRegister(this)"><input type="radio" name="tipos" value="1"> EMPRESA</span>
                <span onClick="toggleRegister(this)"><input type="radio" name="tipos" value="2" checked> PESSOA</span>
            </div> 
            <input type="hidden" name="id_usuario" value ="<?php echo $usuario->id_usuario;?>" >
       
       <div id="empresa" class="hidden"> 
       
                <label>Nome</label>
                <input class="input" type="text" name="nome_usuario" value="<?php echo $usuario->nome_usuario;?>">

                


                <label>E-mail</label>
                <input class="input" type="text" name="email_usuario" value="<?php echo $usuario->email_usuario;?>">

                

                <label>Senha</label>
                <input class="input" type="password" name="senha_usuario" >

               
                              
                <label>CNPJ</label>
                <input class="input" type="text" name="id_doc">

                
                <input type="Submit" name="Enviar" value="Enviar">
                 
            
               
            
       </div>
       <div id="pessoa">
        
                <label>Nome</label>
                <input class="input" type="text" name="nome_usuario" value="<?php echo $usuario->nome_usuario;?>">

                


                <label>E-mail</label>
                <input class="input" type="text" name="email_usuario" value="<?php echo $usuario->email_usuario;?>">

                

                <label>Senha</label>
                <input class="input" type="password" name="senha_usuario" >

                <label>CPF</label>
                <input class="input" type="text" name="id_doc">
                
                

                <input type="Submit" name="Enviar" value="Enviar">
               
            
            
       </div>
       </form>
<?php
    require_once "footer.php";
?>
        <script>

        function toggleRegister(el){
            var input = el.firstElementChild;
            if(input.value != 1 && document.getElementById("empresa").classList.contains('hidden'))
                return;
            if(input.value != 2 && document.getElementById("pessoa").classList.contains('hidden'))
                return;
            input.checked = true;
            document.getElementById("empresa").classList.toggle("hidden");
            document.getElementById("pessoa").classList.toggle("hidden");
        }

        </script>
        <!--fim box home-->



        
        

        
        <!--fim dos botoes cadastro e login-->


         <!--Formulario de cadastro padrão -->
         <!-- <form action="" method="post" id="formulario_cad">
         <div class="botoes">
             <input class="ongs" type="radio" name="tipos" value="1"> ONGs
             <input class="empresa" type="radio" name="tipos" value="2"> EMPRESA
             <input class="pessoa" type="radio" name="tipos" value="3"> PESSOA
         </div> -->
        

         <!-- <label>Nome:</label>
         <input class="input" type="text" name="nome_usuario" class="botao_form">
         

         <label>E-mail</label>
         <input class="input" type="text" name="email_usuario" class="botao_form">
         

         <label>Senha:</label>
         <input type="password" name="senha_usuario" class="botao_form">
         

         <label>Data de nascimento:</label>
         <input type="date" name="data_usuario" value="data" class="botao_form">
         

         <input type="submit" name="enviar" value="Enviar" id="enviar">
     </form> -->
