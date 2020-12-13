<?php
session_start();
if(isset($_GET['action'])){
	session_destroy(); //destroy the session
	?>
	<script>
		window.location.href = "connexion.php";
	</script>
<?php
}

if(!isset($_SESSION['users'])){
?>
	<script>
			window.location.href = "connexion.php";
	</script>
<?php
}
?>
<!DOCTYPE HTML>
<html>
	<head>
		<title>Mon compte - Alpha by HTML5 UP</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<?php
			require "./template/link.php";
		?>
	</head>
	<body class="is-preload">
		<div id="page-wrapper">

			<?php
				require "./template/header.php";
			?>
		
				<section id="main" class="container">
			<!-- Main -->
					<header>
					<h2>Mon compte</h2>
					<?php
					  

						if($sessionLogin->valideAdmin === '0'){
							?>
							<div class='alert-danger'>
								Vous n'ete pas encore valide par l'admin , en attendant que vos information soit valider sous 24h maximun vous ne pouvez pas etre en relation 
							</div>
							<?php
						}else if($sessionLogin->valideAdmin === '1'){
							?>
							<div class='alert-success'>
								Vous ete valide par l'admin.
							</div>
							<?php
						}else if($sessionLogin->valideAdmin === '2'){
							?>
							<div class='alert-danger'>
								Vous ete pas valider par l'admin verifier vos informations s'il sont coherente  .
							</div>
							<?php
						}else if($sessionLogin->valideAdmin === '3' && $sessionLogin->type === 'acheteur'){
							?>
								<div class='alert-danger'>
									Vous ete classe dans les client pas serieux concter l'admin .
								</div>
							<?php

						}else if($sessionLogin->valideAdmin === '3' && $sessionLogin->type === 'vendeur'){
							?>
								<div class='alert-danger'>
									Vous ete classe dans les vendeurs  pas serieux ou intermidiaire .
								</div>
							<?php
							
						}
					?>
					</header>
					<div class="box">
					<div class='row'>
						<div class='col-4'>
						<a href='mon-compte.php' class='button special' style='display:block'>Mur offre</a> 
						</div>
						<div class='col-4'>
							<a href='ajouter.php'  class='button special'style='display:block'>Ajouter</a>
						</div>
						<div class='col-4'>
							<a href='mon-compte.php?action=deconnection' 
							class='button special' 
							style='display:block'>deconnection</a>
						</div>
					</div>
					<br/>
						<form method="post" action="#">
							<div class="row gtr-50 gtr-uniform">
								<?php
									if($sessionLogin->type === 'vendeur'){

										$statement= "SELECT 
										acheteur.a_quantite,
										vente_diponible.v_quantite,
										vente_diponible.id_vendeur,
										vente_diponible.categorie,
										acheteur.categorie  
										
										FROM 

										vente_diponible	  INNER JOIN   acheteur
										
										ON
										
										 acheteur.a_quantite = vente_diponible.v_quantite AND 
										 vente_diponible.categorie = acheteur.categorie AND  
										 vente_diponible.id_vendeur= '".$sessionLogin->id."' "

										;

										$relation = $pdo->query($statement);
										$relation= $relation->fetchAll(PDO::FETCH_OBJ);

									?>
									<div class='container'>
									<h3 class='text-center'>
										<b><?= count($relation); ?></b>Acheteur Serieux est  dispobible Pour  vous on <br/>vous contacter par telephone
									</h3>
									</div>
									<?php
							
									}else{

    									$statement= "SELECT 
										acheteur.a_quantite,
										vente_diponible.v_quantite,
										vente_diponible.id_vendeur,
										acheteur.id_acheteur,
										vente_diponible.categorie,
										acheteur.categorie,
										vente_diponible.id_vendeur 
										
										FROM 

										acheteur  INNER JOIN vente_diponible  
										
										ON
										
										 acheteur.a_quantite = vente_diponible.v_quantite AND 
										 vente_diponible.categorie =acheteur.categorie AND  
										 acheteur.id_acheteur='".$sessionLogin->id."' "
										;

										$relation = $pdo->query($statement);
										$relation= $relation->fetchAll(PDO::FETCH_OBJ);

									?>
									<div class='container'>
									<h3 class='text-center'>
										<b><?= count($relation); ?> </b>VENDEUR  Serieux est  dispobible Pour  vous on <br/>vous contacter par telephone
									</h3>
									</div>
								 
								 </div>
								<?php
									}
								 ?>
							</div>
						</form>
					</div>
			
			<?php
				require "./template/footer.php";
			?>
	</body>
</html>