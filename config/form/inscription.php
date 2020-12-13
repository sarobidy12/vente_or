<?php
require "./config/bd.config.php";

if(!empty($_POST['type_vendeur']) || !empty($_POST['type_acheteur'])){

    if(
        !empty($_POST['nom']) AND 
        !empty($_POST['prenom']) AND 
        !empty($_POST['telephone']) AND 
        !empty($_POST['email']) AND 
        !empty($_POST['message']) AND 
        !empty($_POST['mpd1']) AND 
        !empty($_POST['mpd2']) AND 
        !empty($_POST['daplacement']) AND 
        !empty($_FILES['verso']) AND 
        !empty($_FILES['recto']) AND
        !empty($_FILES['profil']) 
    ){
        
        if(!empty($_POST['type_vendeur']) && empty($_POST['intermidiaire'])){
            $error[]="Veuillez comfirmer que vous n'ete pas un intermidiaire";
        }

        if(!empty($_POST['type_vendeur'])){ 
            $type='vendeur';
        }else{
            $type='acheteur';
        }


        if(!empty($_POST['g-recaptcha-response'])){


        $retour_total = $pdo->query("SELECT COUNT(*) AS total FROM utilisateur");
        $donnees_total = $retour_total->fetch();
        $nbr = $donnees_total['total'] +1;

        if(htmlspecialchars($_POST['mpd2']) === htmlspecialchars($_POST['mpd1'])){

        if (filter_var(htmlspecialchars($_POST['email']), FILTER_VALIDATE_EMAIL)) {

            if (strlen($_POST['mpd1']) <= 8){
                $error[]="Vos mot de passe est trop courte ! ";
            }
            
            if (!preg_match('#^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*\W)#', $_POST['mpd1'])) {
                $error[]="Vos mot de passe doit contenir des chiffres et des lettres  ajouter des caractere speciaux ex :#).. ! ";
            }
    
            $requette1 = $pdo->prepare("SELECT * FROM utilisateur WHERE telephone=?");
            $requette1->execute(array(htmlspecialchars($_POST['telephone'])));
            
            if($requette1->rowCount() != 0){
                $error[]="Cette téléphone est deja utiliser ! ";
            } 

            $requette2 = $pdo->prepare("SELECT * FROM utilisateur WHERE mail=?");
            $requette2->execute(array(htmlspecialchars($_POST['email'])));
            
            if($requette2->rowCount() != 0){
                $error[]="Cette addresse e-mail est deja utiliser ! ";
            }

            if(getimagesize($_FILES['verso']['tmp_name'])){
                
                if ($_FILES["verso"]["size"] > 500000000 ) {
                     $error[]="L'image de verso est trop lourd ! ";
                }

            }else{
                $error[]="L'image de verso n'est pas une image ! ";
            }

            if(getimagesize($_FILES['recto']['tmp_name'])){

                if ($_FILES["recto"]["size"] > 500000000 ) {
                   $error[]="L'image de recto est trop lourd ! ";
                }

           }else{
               $error[]="L'image de recto n'est pas une image ! ";
           }

           if(getimagesize($_FILES['profil']['tmp_name'])){

            if ($_FILES["profil"]["size"] > 500000000 ) {
               $error[]="L'image de profil est trop lourd ! ";
            }

            }else{
                $error[]="L'image de profil n'est pas une image ! ";
            }

           if(!isset($error)){

                if (move_uploaded_file($_FILES["recto"]["tmp_name"], './images/photoidentiter_venduer/recto/'.$nbr.'.jpg') ) {
                    $recto= $url_site."/images/photoidentiter_venduer/recto/".$nbr.'.jpg';
                }  

                if (move_uploaded_file($_FILES["verso"]["tmp_name"], './images/photoidentiter_venduer/verso/'.$nbr.'.jpg') ) {
                    $verso= $url_site."/images/photoidentiter_venduer/verso/".$nbr.'.jpg';
                }  

                if (move_uploaded_file($_FILES["profil"]["tmp_name"], './images/photoidentiter_venduer/profil/'.$nbr.'.jpg') ) {
                    $profil= $url_site."/images/photoidentiter_venduer/profil/".$nbr.'.jpg';
                }  


               $pdo->exec("INSERT INTO utilisateur(
                   nom,
                   prenom,
                   telephone,
                   mail,
                   mot_de_passe,
                   img_reacto,
                   img_verso,
                   img_profil,
                   lieu_de_roncontre,
                   deplacement ,
                   date_enregistrement,
                   type
                   
                   ) VALUE(
                       '".htmlspecialchars($_POST['nom'])."', 
                       '".htmlspecialchars($_POST['prenom'])."', 
                       '".htmlspecialchars($_POST['telephone'])."', 
                       '".htmlspecialchars($_POST['email'])."', 
                       '".sha1(md5($_POST['mpd1']))."', 
                       '".htmlspecialchars($recto)."', 
                       '".htmlspecialchars($verso)."', 
                       '".htmlspecialchars($profil)."', 
                       '".nl2br(htmlspecialchars($_POST['message']))."', 
                       '".htmlspecialchars($_POST['daplacement'])."',
                       NOW(),
                       '".htmlspecialchars($type)."'

               )");


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
                    $error[]="Utilisez un address email valide ";
                }

            }else{
                $error[]="Votre mot de passe ne sont pas identique .";
            }
            
        }else{
            $error[]="comfimer que vous n'ete pas un robot";
        }
        
    }else{
        $error[]="Veuillez remplir a tout les champs";
    }

}


?>