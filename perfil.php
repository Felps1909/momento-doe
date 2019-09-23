<?php
    
    if(!isset($_SESSION['id_usuario'])){
        header("location:index.php");
        exit;
    }


?>
<h2>Benvindo Putao</h2>
