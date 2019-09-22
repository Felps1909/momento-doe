<?php
    require_once "vendor/autoload.php";
    use Source\Model\Usuario;
   $usuario = new Usuario();
 require_once "menu.php";
?>

     <?php

        if(isset($_GET['i'])){
            $usuario = $usuario->buscarDados("id_usuario = {$_GET['i']}")[0];
             
        }

        if(isset($_POST['nome_usuario'])){
            
            $nome_usuario = addslashes($_POST['nome_usuario']);
            $senha_usuario = addslashes($_POST['senha_usuario']);
            $email_usuario = addslashes($_POST['email_usuario']);
			$data_usuario = addslashes($_POST['data_usuario']);
			$tipo_usuario = (int)$_POST['tipos'];
            //$tel_usuario = addslashes($_POST['tel_usuario']);
            
            if(!empty($nome_usuario) && !empty($senha_usuario)
             && !empty($email_usuario) && !empty($data_usuario) && !empty($tipo_usuario)){

                if(!$usuario->cadastrarUsuario($nome_usuario, $senha_usuario,
                $email_usuario,  $data_usuario, $tipo_usuario)){
                    echo "Email ja esta Cadastrado";
                }

            }else{
                echo "Prencha todos os campos";
            }
        }
    ?>
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
       
       
       <div id="empresa" class="hidden">
            
                <label>Razão Social</label>
                
                <input class="input" type="text" name="nome_empresa">

                

                <label>CNPJ</label>
                
                <input class="input" type="text" name="cnpj_empresa">
                
                 
            
                <label>Cidade</label>
                
                <input class="input" type="text" name="cidade_empresa">

                
            
                <label>Endereço</label>
                
                <input class="input" type="text" name="endereco_empresa">

                

                <label>E-mail</label>
                
                <input class="input" type="text" name="email_empresa">

                

                <label>Senha</label>
                
                <input class="input" type="password" name="senha_empresa">
                

                <input type="Submit" name="Enviar" value="Enviar">
               
            
       </div>
       <div id="pessoa">
        
                <label>Nome</label>
                <input class="input" type="text" name="nome_usuario" value="<?php echo $usuario->nome_usuario;?>">

                


                <label>E-mail</label>
                <input class="input" type="text" name="email_usuario" value="<?php echo $usuario->email_usuario;?>">

                

                <label>Senha</label>
                <input class="input" type="password" name="senha_usuario" value="<?php echo $usuario->senha_usuario;?>">

                 <label>Data Nascimento</label>
                <input class="input" type="date" name="data_usuario" value="<?php echo $usuario->data_nascimento;?>">
                

                <input type="Submit" name="Enviar" value="Enviar">
               
            
            
       </div>
       </form>

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
