<?php
session_start();

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
		<title>Ajouter - Alpha by HTML5 UP</title>
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
require "./config/form/ajouter.php";

			?>
		
				<section id="main" class="container">

			<!-- Main -->
			<header>
				<h2>Ajouter </h2>
				<p>Ajouter vos marchandise et nous trouverons client pour vous .</p>
				<?php
							if(isset($error)){

							foreach($error AS $a):
				?>
								<div class='alert-danger'>
										<?= $a; ?>
								</div>
				<?php
							endforeach;

							}else if(isset($success)){

							foreach($success AS $a):
				?>
								<div class='alert-success'>
										<?= $a; ?>
								</div>
				<?php
							endforeach;
							
							}
			
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
						<form method="POST" enctype="multipart/form-data">
							<div class="row gtr-50 gtr-uniform">
								<div class="col-12 col-12-mobilep">
								<div class='form-group'>
                                    <label>Indique le quantite de votre
									<?php
										if($sessionLogin->type === 'vendeur'){
									?>
										 marchandise
									<?php
										}else{
									?>
										 commande
									<?php
										}
									?>
									
									 </label>
									<input 
										type="text" 
										name="quantite" 
										id="quantite" 
										value="" 
										class='form-control'
										placeholder="kilo Gramme" 
									/>
									</div>
								</div>

								<div class="col-12 col-12-mobilep">
                                <label>Selectioner la categorie</label>
                                <select name="categorie">
                                    <?php
                                        foreach($categorie AS $a):
                                            echo "<option value=".$a->id.">".$a->name."</option>";
                                        endforeach;
                                    ?>
                                </select>
								</div>

								<div class="col-12">
									
                                <div class='form-group'>
                                    <div id='form'>
                        
                                    </div>
                                </div>
									<?php
										if($sessionLogin->type === 'vendeur'){
									?>
										<div class='button special'  onclick='add()' >
											Ajouter des images
										</div>
									<?php
										}
									?>
                            
                        
                        <script>
                        
                            function add(){
                                var input = document.createElement("input");
                                input.type = "file";
                                input.className = "form-control";
                                input.placeholder = "intervenant ";
                                input.name="image[]"
                                document.getElementById("form").append(input);
                            }
                        
                        </script>
                                </div>
								<div class="col-12">
									<label>
										Ajouter une description
									</label>
									<textarea 
									name="message" 
									id="message" 
									rows="6"></textarea>
								</div>
								<div class="col-12">
									<?php
									if($sessionLogin->type === 'vendeur'){
									?>
                                        <input type="submit" value="Proposer" name="Proposer" /></li>
									<?php
									}else{
									?>
                                        <input type="submit" value="commander" name="commander" /></li>
									<?php
									}
									?>
								
								</div>
							</div>
						</form>
						</div>
						</div>
			
			<?php
				require "./template/footer.php";
			?>
	</body>
</html>