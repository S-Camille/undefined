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
		$urlUti = $app->urlFor('Uti');
		$urlRes =$app->urlFor('affichageReservations');
		$urlAdmin = $app->urlFor('AffichagePasgeAdmin');
		$html = <<<END
<!DOCTYPE html>
<html>
<head>
		<title>Garage Week Planner</title>
        <meta charset="UTF-8">
		<link rel="shortcut icon" type="image/x-icon" href="$rootUI/web/img/siteicone.ico" />
		<link rel="stylesheet" href="$rootUI/web/css/header_footer.css" />
		<link rel="stylesheet" href="$rootUI/web/css/all.css" />
		<link rel="stylesheet" href="$rootUI/web/css/formu.css" />
		<link rel="stylesheet" href="$rootUI/web/css/planning.css" />
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
		if (isset($_SESSION['user'])) { //<a href="$urlRes">Liste Réservations</a>
            $admin = unserialize($_SESSION['user'])->niveau;
            if($admin < 12){
                $html = $html . '<div class="li"><a href="'.$urlRes.'">Liste Réservations</a></div>';
            }
            else{
                $html = $html . '<div class="li"><a href="'.$urlAdmin.'">Réservations Admins</a></div>';
            }
			$html = $html.<<<END
			<div class="li"><a href="$urlUti">Liste Utilisateurs</a></div><div id="menucenter" class="li"><a href="$urlProf">Mon profil</a></div><div class="li"><a href="$urlDeconnexion">Déconnexion</a></div>
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
 			<p id="auteur">© Garage Week Planner - 2018 | Camille SCHWARZ, Luc CHENG, Aymerik DIEBOLD, Quentin MILLARDET, Loïc OBERLÉ, Guillaume TOUSSAINT</p>
		</footer>
</body>
</html>
END;
		return $html;
	}
	
}