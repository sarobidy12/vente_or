<?php
session_start();

require "./config/form/comfirmation.php";

if(!isset($_SESSION['mail'])){
?>
    <script>
        window.location.href = "index.php";
    </script>
<?php
}
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
						<h2>Comfirmation de l'inscription</h2>
                        <p>Un code de comfirmation a  été envoyer à <b><?= $_SESSION['mail'] ?></b> .<br/>
                            Vérifié les spams ou promotion dans Gmail.
                        </p>
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
						<form method="post" action="#">
									<ul class="actions special">
                                        <li>
                                            <input type="text" name="code" id="code" value="" placeholder="Code de comfirmation" />
                                        </li>
										<li><input type="submit" value="valide" name='valide'/></li>
									</ul>
							</div>
						</form>
			
			<?php
				require "./template/footer.php";
			?>
	</body>
</html>