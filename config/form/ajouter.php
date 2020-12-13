<?php
require "./config/bd.config.php";

$categorie = $pdo->query("SELECT * FROM categorie");
$categorie = $categorie->fetchAll(PDO::FETCH_OBJ);
    

$retour_total = $pdo->query("SELECT COUNT(*) AS total FROM vente_diponible");
$donnees_total = $retour_total->fetch();
$nbr = $donnees_total['total'] +1;

if(!empty($_POST['Proposer']) || !empty($_POST['commander']) ){
    
  if($sessionLogin->valideAdmin === '1'){

    if(
        !empty($_POST['quantite']) AND 
        !empty($_POST['message']) AND 
        !empty($_POST['categorie']) 
    ){
    
        if(!empty($_POST['Proposer']) ){

           if(!empty($_FILES['image'])){

            for($i=0;$i <  count($_FILES['image']['name']);$i++ ){

                if(getimagesize($_FILES['image']['tmp_name'][$i])){
                            
                    if ($_FILES['image']['tmp_name'][$i] > 500000000 ) {
                        $error[]="L'image de verso est trop lourd ! ";
                    }

                }else{
                    $error[]="L'image doit etre png gif jpeg jpg ";
                }

                if(!isset($error) || !empty($error)){

                    if (move_uploaded_file($_FILES['image']['tmp_name'][$i], "./images/marchandise/".$nbr."_".$i.".jpg") ) {
                        $images[]= $url_site."/images/marchandise/".$nbr."_".$i.".jpg";
                    }  

                }else{

                    break;

                }

            }
           }else{

            $error[]="inserer des images pour vous valider  ! ";
               
           }
                    
                    $pdo->exec("INSERT INTO vente_diponible
                        (
                            id_vendeur ,
                            categorie,
                            v_quantite,
                            image,
                            description,
                            date_ajouter
                        ) 
                        VALUE
                        (
                            '".htmlspecialchars(json_decode($sessionLogin->id))."', 
                            '".htmlspecialchars($_POST['categorie'])."',
                            '".htmlspecialchars($_POST['quantite'])."', 
                            '".htmlspecialchars(json_encode($images))."',
                            '".nl2br(htmlspecialchars($_POST['message']))."', 
                            NOW()
                        )
                    ");

                         $success[]="Votre demande a ete prise en compte en vous contactera pour vous metre en relation ";

        }else{
            
            $pdo->exec("INSERT INTO acheteur
            (
                id_acheteur ,
                a_quantite,
                categorie,
                dateTime,
                description 
            ) 
            VALUE
            (
                '".htmlspecialchars(json_decode($sessionLogin->id))."', 
                '".htmlspecialchars($_POST['quantite'])."', 
                '".htmlspecialchars($_POST['categorie'])."',
                NOW(),
                '".nl2br(htmlspecialchars($_POST['message']))."' 
            )
        ");

             $success[]="Votre demande a ete prise en compte en vous contactera pour vous metre en relation ";

        }
            

         
        }else{

            $error[]="Veuillez remplir a tout les champs";

        }
    }else{
        $error[]="une fois que vos information est valider vous ete mis en contacte avec un achetwue potentielle";

    }

} 

?>