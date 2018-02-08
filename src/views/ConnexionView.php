<?php

namespace undefined\views;


class ConnexionView {

	private $app;

 	public function __construct() {
 		$this->app = \Slim\Slim::getInstance();
	}

	public function render($msgErr = null) {
		$it = GlobaleView::header(['css1' => 'formulaire.css', 'css2' => 'item.css']);
            if ($msgErr != null){
                $it = $it . '<div class="msgError"> <p>'. $msgErr .'</p></div>';
            }
                $it = $it . <<<END
                <form action="{$this->app->urlFor('Connect_valid')}" method="POST">
                <label for="username">Pseudo :</label>
                <input type="text" name="username" /><br />
                <label for="password">Mot de passe :</label>
                <input type="password" name="password" />

                <input type="submit" value="Connexion" />
                </form>
END;
		$it = $it.GlobaleView::footer();
		return $it;
	}

}