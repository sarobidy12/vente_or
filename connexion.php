<?php
session_start();

require "./config/form/connexion.php";

if(isset($_SESSION['users'])){
?>
    <script>
        window.location.href = "mon-compte.php";
    </script>
<?php
}
?>
<!DOCTYPE HTML>
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
				<h2>Se connecter</h2>
            </header>
          
            <div class='connexion'>
			<?php
                    if(isset($error)){
						foreach($error AS $a):
			?>
				<div class='alert-danger'><?= $a; ?></div>
			<?php
						endforeach;
					}
            ?>
						<form method="post" action="#">
                                <input type="email" name="email" id="email" value="" placeholder="entre votre addresse email" />
                                <input type="password" name="mpd" id="mpd" value="" placeholder="entre votre mot de passe" />
								<div class="g-recaptcha" data-sitekey="6Lf-cqkZAAAAAAduY05mwN9pNLbyd8p2LGvQ_33Z"></div>
								<!--
									<div class="g-recaptcha" data-sitekey="6LepPswZAAAAAM6WyMEpon_N-ozGq0BY0y7PrX_d"></div>
								-->
								<p>mot de passe </a href='mot-de-passe-oublier.php'>oublier</a></p>
                                <input type="submit" value="Se connection" style='width:100%' name='connection'/></li>

						</form>
						</div>
						</div>
						</div>
			<?php
				require "./template/footer.php";
			?>
	</body>
</html>