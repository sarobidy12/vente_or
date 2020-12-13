<?php
require "./config/bd.config.php";

if(!empty($_POST['connection'])){

    if(
        !empty($_POST['email']) AND 
        !empty($_POST['mpd']) 
    ){

        if(!empty($_POST['g-recaptcha-response'])){

            $requette2 = $pdo->prepare("SELECT * FROM utilisateur WHERE mail=?");
            $requette2->execute(array(htmlspecialchars($_POST['email'])));
            
            if($requette2->rowCount() === 1){

                $data = $requette2->fetch(PDO::FETCH_OBJ);



                    if(sha1(md5($_POST['mpd'])) === $data->mot_de_passe){
                        if($data->valide*1 === 1){
                        $_SESSION['users']=json_encode([$data->id,$data->prenom,$data->mail,$data->valideAdmin,$data->type]);

                    ?>
                            <script>
                                window.location.href = "mon-compte.php";
                            </script>
                        <?php
                        
                        }else{

                                    $_POST['prenom']=$data->prenom;
                                    $a= rand(10000, 99999);
                                    
                                    if(!empty($_POST['type_vendeur'])){ 
                                    require "./template/mail/sign-vendeur.php";

                                    }else{
                                        $type='acheteur';
                                    }
                        
                                    $_SESSION['mail']=$_POST['email'];
                                    $_SESSION['code']=$a;
                                    
                                    ?>
                                        <script>
                                            localStorage.setItem('_cssiiddd',<?= $a ?> );
                                            window.location.href = "comfirmation-compte.php";
                                        </script>
                                    <?php

                        }
                    }else{

                        $error[]="Mot de passe incorrect ! ";

                    }

            }else{

                    $error[]="Cette addresse e-mail n'existe pas  ! ";

            }

        }else{
            $error[]="comfimer que vous n'ete pas un robot";
        }

    }else{
        $error[]="Veuillez remplir a tout les champs";
    }

}
 
?>