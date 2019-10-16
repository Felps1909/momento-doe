<?php
    
    if(isset($_SESSION['logado'])){
        header("location:index.php");
        exit;
    
?>
<?php } else { ?>
    <h2>Benvindo Putao</h2>
<?php } ?>
