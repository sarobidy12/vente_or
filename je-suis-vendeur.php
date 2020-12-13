<?php
	session_start();
	require "./config/form/inscription.php";

	if(isset($_SESSION['users'])){
		?>
			<script>
				window.location.href = "mon-compte.php";
			</script>
		<?php
		}
		?>
?>
<!DOCTYPE HTML>
<!--
	Alpha by HTML5 UP
	html5up.net | @ajlkn
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html>
	<head>
		<title>Contact - Alpha by HTML5 UP</title>
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
				<h2>Je suis un vendeu</h2>
				<p>Complete votre profil pour être valide par l'admin  .</p>
			</header>

			<?php
					if(isset($error)){
						foreach($error AS $a):
			?>
							<div class='alert-danger'>
									<?= $a; ?>
							</div>
			<?php
						endforeach;
					}
			?>
					<div class="box">
						<form method="POST" enctype="multipart/form-data">
							<div class="row gtr-50 gtr-uniform">

                                <div class="col-6 col-12-mobilep">
									<input type="text" name="nom" id="name" value="<?php  if(isset($_POST['nom'])){ echo $_POST['nom']; } ?>" placeholder="entre votre nom" />
								</div>

								<div class="col-6 col-12-mobilep">
									<input type="text" name="prenom" id="prenom" value="<?php  if(isset($_POST['prenom'])){ echo $_POST['prenom']; } ?>" placeholder="entre votre prenon" />
                                </div>
                                
								<div class="col-6 col-12-mobilep">
									<input type="text" name="telephone" id="telephone" value="<?php  if(isset($_POST['telephone'])){ echo $_POST['telephone']; } ?>" placeholder="entre votre numero telephone" />
								</div>

								<div class="col-6 col-12-mobilep">
									<input type="email" name="email" id="email" value="<?php  if(isset($_POST['email'])){ echo $_POST['email']; } ?>" placeholder="entre votre addresse email" />
								</div>

								<div class="col-6 col-12-mobilep">
									<input type="password" name="mpd1" id="mpd1" placeholder="entre votre mot de passe " />
								</div>
								
								<div class="col-6 col-12-mobilep">
									<input type="password" name="mpd2" id="mpd2" placeholder="Comfirme votre mot de passe " />
								</div>


                                
								<div class="col-6 col-12-mobilep">
									<label>
										Entre votre photo carte identite recto
									</label>
									<input type="file" name="recto" id="recto"   value="" placeholder="Subject" />
								</div>

								<div class="col-6 col-12-mobilep">
									<label>
										Entre votre photo carte identite verso
									</label>
									<input type="file" name="verso" id="verso"   value=""   placeholder="Subject" />
								</div>
								
								<div class="col-12">
									<label>
										Presiser ou vous souhaite le lieu de rencontre
									</label>
									<textarea name="message" id="message" placeholder="Lieux de recontre souhaite" rows="6"><?php  if(isset($_POST['message'])){ echo $_POST['message']; } ?>
									</textarea>
								</div>
									<div class="col-12"> 
												<div>
													<label>
														Est-ce que vous pouvez vous deplacez ?
													</label>
														<input type="radio" id="oui" name="daplacement" value="1" 
														<?php  if(isset($_POST['daplacement']) && $_POST['daplacement'] === "1"){ 
																	echo 'checked'; 
																} ?>
														>
														<label for="oui">Oui , je peux me deplacez</label>
												</div>

												<div>
														<input type="radio" id="non" name="daplacement" value="2" 
														<?php  if(isset($_POST['daplacement']) && $_POST['daplacement'] === "2"){ 
																	echo 'checked'; 
																} ?>
														>
														<label for="non">Non , je  peux pas me deplacez</label>
												</div>

									</div>

									<div class="col-12"> 
												<div>
													<label>
														Vous comfirmez que vous n'ête pas un intermidiaire ?
													</label>
														<input type="checkbox" id="intermidiaire" name="intermidiaire" value="oui" 
														<?php  if(isset($_POST['intermidiaire']) && $_POST['intermidiaire'] === "oui"){ 
																	echo 'checked'; 
																} ?>
														>
														<label for="intermidiaire">Oui , je suis  pas un intermidiaire</label>
												</div>
									</div>
								</div>	

								<div class="col-6 col-12-mobilep">
									<label>
										Veuilliez ajouter un photo de profil 
									</label>
									<input type="file" name="profil" id="profil"   value=""   placeholder="profil" />
								</div>
							
								<div class="g-recaptcha" data-sitekey="6Lf-cqkZAAAAAAduY05mwN9pNLbyd8p2LGvQ_33Z"></div>
								<!--
									<div class="g-recaptcha" data-sitekey="6LepPswZAAAAAM6WyMEpon_N-ozGq0BY0y7PrX_d"></div>
								-->
								<div class="col-12">
									<input type="submit" value="S'enregistre"  name="type_vendeur"/>
								</div>
							</div>
						</form>
					</div>
			
			<?php
				require "./template/footer.php";
			?>
	</body>
</html>