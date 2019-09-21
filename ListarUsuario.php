<?php
     require_once "vendor/autoload.php";
     use Source\Model\Usuario;
     require_once "menu.php";
    $usuario = new Usuario();
?>
<style>
        body{
            background-color: #E2C0FF;
        }
    </style>

<table> 
    <thead>
        <tr>
            <td>Nome</td>
            <td>Email</td>
            <td>Tipo Usuario</td>
            <td>Açoes</td>
        </tr>
    </thead>        
</table>
