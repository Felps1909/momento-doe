<?php
     require_once "vendor/autoload.php";
     use Source\Model\Usuario;
     require_once "menu.php";
    $usuario = new Usuario();
    $dados = $usuario->buscarDados("cod_status_usuario = 1");
?>
<style>
     body{
            background-color: #E2C0FF;
        }
    table{
        border: 1px solid black;
  
    }
    table td{
        padding: 5px;
    }
    table .dados{
        padding:0;
    }
</style>
<?php
    if(isset($_GET['i'])){
            $usuario = $usuario->buscarDados("id_usuario = {$_GET['i']}")[0];
            $usuario->cod_status_usuario = 0;
            $usuario->salvarDados();
        }


?>
<table>
    <thead>
        <h3>Usuarios:</h3>
        <tr>
            <td>Nome</td>
            <td>Email</td>
            <td>Tipo Usuario</td>
            <td>Açoes</td>
        </tr>
    </thead> 
    <tbody>
         <?php
            if(count($dados) > 0){
        
                foreach ($dados as $i => $usuario) {
                    
                    echo "
                    <tr>
                        <td>" . $usuario->nome_usuario . "</td>
                        <td>" . $usuario->email_usuario . "</td>
                        <td>" . $usuario->getTipoUsuario()->desc_tipo_us . "</td>
                        <td><a href='cadastro.php?i=". $usuario->id_usuario."'>Editar</a></td>
                        <td><a href='listarUsuario.php?i=".$usuario->id_usuario."'>Eliminar</a></td>
                    </tr>"; 
                }
            } else {
    ?>
            <tr>
                <td colspan="4">Nenhum usuário encontrado</td>
            </tr>
    <?php
            }
    ?> 


    </tbody>       
</table>
