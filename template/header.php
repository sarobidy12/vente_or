<?php
require "./config/bd.config.php";
?>
	<!-- Header -->
    <header id="header" class="alt">
					<h1><a href="index.php">Alpha</a> by HTML5 UP</h1>
					<nav id="nav">
						<ul>
							<li><a href="index.php">Acceuille</a></li>
							<li><a href="a-propos.php">à propos</a></li>
							<li><a href="contact.php">Contact</a></li>
							<?php

								if(isset($_SESSION['users'])){

										$sessionLogin= json_decode($_SESSION['users']);

										$sessionLogin = $pdo->query("SELECT * FROM utilisateur WHERE id='".$sessionLogin[0]."' ");
										$sessionLogin= $sessionLogin->fetch(PDO::FETCH_OBJ);

									echo '<li><a href="mon-compte.php" class="button">'.$sessionLogin->prenom.'</a></li>';
								}else{
									echo '<li><a href="connexion.php" class="button">Connexion</a></li>';
								}
							?>
						
						</ul>
					</nav>
				</header>