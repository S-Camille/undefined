<?php

namespace undefined\views;

class GlobaleView {

	public static function header($tabcss) {
		$app = \Slim\Slim::getInstance();
		$rootUI = $app->request->getRootUri();
		$rootUI = str_replace('index.php','',$rootUI);
		$urlAccueil = $app->urlFor('Accueil');
		$urlConnexion = $app->urlFor('Connect');
		$urlInscription = $app->urlFor('Register');
		$urlProf = $app->urlFor('Profile');
		$urlDeconnexion = $app->urlFor('Deco');
		$html = <<<END
<!DOCTYPE html>
<html>
<head>
		<title>Garage Week Planner</title>
        <meta charset="UTF-8">
		<link rel="shortcut icon" type="image/x-icon" href="$rootUI/web/img/siteicone.ico" />
		<link rel="stylesheet" href="$rootUI/web/css/header_footer.css" />
		<link rel="stylesheet" href="$rootUI/web/css/all.css" />
END;
		foreach ($tabcss as $css) {
			$html = $html.'<link rel="stylesheet" href="'.$rootUI.'/web/css/'.$css.'" />';
		}
		$html = $html.<<<END
</head>
<body>
<div>
	<header>
		<label id="titre"><a href="$urlAccueil">Garage Week Planner</a></label>
<nav>
		<div id="menu">
END;
		if (isset($_SESSION['user'])) {
			$html = $html.<<<END
			<div id="menucenter" class="li"><a href="$urlProf">Mon profil</a></div><div class="li"><a href="$urlDeconnexion">Déconnexion</a></div>
END;
		}
		else {
			$html = $html.<<<END
			<div id="menucenter" class="li"><a href="$urlConnexion">Connexion</a></div>
			<div class="li"><a href="$urlInscription">Inscription</a></div>
END;
		}
		$html = $html.<<<END
		</div>
	</nav>
	</header>

</div>
	<div id="content">
END;
		return $html;
	}
	
	public static function footer() {
		$html=<<<END
		</div>
		<footer>
 			<ul id="auteur">
				<li>Camille SCHWARZ</li>
				<li>Luc CHENG</li>
				<li>Aymerik DIEBOLD</li>
				<li>Quentin MILLARDET</li>
				<li>Loïc OBERLÉ</li>
				<li>Guillaume TOUSSAINT</li>
			</ul>
		</footer>
</body>
</html>
END;
		return $html;
	}
	
}