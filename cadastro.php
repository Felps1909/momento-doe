<?php
    require_once "menu.php";
    use Source\Model\Usuario;
    use  Source\Model\UploadImage;
    use Source\Model\TipoUsuario;
  
 
?>

     <?php
         $usuario = new Usuario();
        if(isset($_GET['i'])){
            $usuario = $usuario->buscarDados("id_usuario = {$_GET['i']}")[0];
             
        }

        if(isset($_POST['nome_usuario'])){
           
            $id_usuario = (int)$_POST['id_usuario'];
            $nome_usuario = addslashes($_POST['nome_usuario']);
            $senha_usuario = hash("sha256",addslashes($_POST['senha_usuario']));
            $email_usuario = addslashes($_POST['email_usuario']);
            $tipo_usuario = (int)$_POST['tipos'];
            $cnpj = preg_replace("/[^0-9]/","",$_POST['cnpj']);
            $cpf = preg_replace("/[^0-9]/","",$_POST['cpf']);
            $id_doc = $tipo_usuario == TipoUsuario::ONG ? $cnpj : $cpf;
            $url_foto_usuario = $_FILES;

        //    echo "<pre>";
        //    print_r($_FILES);
          
            
            $upload = new UploadImage(@$_FILES['url_foto_usuario'],  "imagens/perfil/");
            $response = $upload->salvar();
            
            if(!empty($nome_usuario) && !empty($senha_usuario)
             && !empty($email_usuario) && !empty($tipo_usuario) && $response['success']){

               
                if(!$id_usuario && count($usuario->buscarDados("email_usuario = '$email_usuario'"))> 0){
                    // echo "<pre>";
                    // print_r($query);
                    // die();
                    echo "Email Ja cadastrado";
                }else{
                    
                    $usuario->nome_usuario = $nome_usuario;
                    $usuario->senha_usuario = $senha_usuario;
                    $usuario->email_usuario = $email_usuario;
                    $usuario->id_tipo_us = $tipo_usuario;
                    $usuario->url_foto_usuario = $response['url'];
                    $usuario->id_doc = $id_doc;
                    
                   
                    $response = $usuario->salvarDados();
                    
                    if($response['success']){

                    
                    $_SESSION['id_usuario'] = $usuario->id_usuario;
                    $_SESSION['id_tipo_us'] = $usuario->id_tipo_us;
                    

                    echo"<script>";
                    echo "alert('Cadastrado com Sucesso')";
                    echo"</script>";
                    header("location:login.php");
                    }else{
                        echo"<script>";
                        echo "alert('".$response['message']."')";
                        echo"</script>" ; 
                    }
                }  

            }else{
                echo"<script>";
                echo "alert('Preencha todos os Campos!')";
                echo"</script>" ; 
            }
        }
    ?>
     <head>
 <title>Cadastro</title>
        <script type="text/javascript" src="js/jquery-3.2.1.min.js"></script>
        <script type="text/javascript" src="js/jquery.mask.min.js"></script>
        <script type="text/javascript">
             $(document).ready(function(){
                $('#cpf').mask('000.000.000-00');
                $('#cnpj').mask('00.000.000/0000-00');
            });
           
        </script>
 </head>
    <style>
        body{
            background-color: #E2C0FF;
        }
    </style>
    <main>
       <!--botoes cadastro e login-->
       <div class="btn">
            <a href="cadastro.php" class="btn-cadastro">Cadastro</a>
            <a href="login.php" class="btn-cadastro">Login</a>
       </div>
       
          <form method ="post" class="form-campos" enctype="multipart/form-data">
            <div class="tipos">
                <span onClick="toggleRegister(this)"><input type="radio" name="tipos" value="1"> ONGS</span>
                <span onClick="toggleRegister(this)"><input type="radio" name="tipos" value="2" checked> PESSOA</span>
                <!-- <span onClick="toggleRegister(this)"><input type="radio" name="tipos" value="3"> EMPRESA</span> -->
            </div> 
            <input type="hidden" name="id_usuario" value ="<?php echo $usuario->id_usuario;?>" >
       
       <div>
                 <label class="btn-foto" for='selecao-arquivo'>
                    <img src="imagens/editperf.png"  class = "edtft-btn">
                </label>
                <input id='selecao-arquivo' type='file' name="url_foto_usuario">
               
                <label>Nome</label>
                <input class="input" type="text" name="nome_usuario" value="<?php echo $usuario->nome_usuario;?>">

                


                <label>E-mail</label>
                <input class="input" type="text"  name="email_usuario" value="<?php echo $usuario->email_usuario;?>">

                

                <label>Senha</label>
                <input class="input" type="password" name="senha_usuario" >
                <div id="empresa" class="hidden">
                    <label>CNPJ</label>
                    <input class="input" type="text" id="cnpj" name="cnpj"  value="<?php echo $usuario->id_doc;?>">
                </div>
                <div id="pessoa">
                    <label>CPF</label>
                    <input class="input" type="text" id="cpf" name="cpf" value="<?php echo $usuario->id_doc;?>">
                </div>

                <input type="Submit" name="Enviar" value="Enviar">
               
            
            
       </div>
       
       </form>
    
    </main>  
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
