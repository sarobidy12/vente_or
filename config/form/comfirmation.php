<?php

require "./config/bd.config.php";

if(!empty($_POST['valide'])){

    if($_POST['code']*1  === $_SESSION['code']*1 ){

        $pdo->exec("UPDATE utilisateur SET valide=1 WHERE mail ='".htmlspecialchars($_SESSION['mail'])."'");
        unset($error);
        ?>
        <script>
            window.location.href = "connexion.php";
            localStorage.removeItem('_cssiiddd');
        </script>
         <?php
    }else{

        $error[]="Code incorrecte ." ;
        
    }


}

?>