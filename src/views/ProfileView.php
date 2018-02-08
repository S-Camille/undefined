<?php

namespace undefined\views;


class ProfileView {

	private $app;

 	public function __construct() {
 		$this->app = \Slim\Slim::getInstance();
	}

	public function render() {
		$it = GlobaleView::header(['css1' => 'formulaire.css', 'css2' => 'item.css']);
                $it = $it . <<<END
                <form action="{$this->app->urlFor('Profile_valid')}" method="POST">
                <label for="username">Pseudo :</label>
                <input type="text" name="username" value="
END;
                $it .= unserialize($_SESSION['user'])->nom;
                $it .= <<<END
                " readonly /><br />

                <label for="password">Mot de passe <em>(laissez vide pour ne pas changer)</em> :</label>
                <input type="password" name="password" />

                <input type="submit" value="Modifier" />
                </form>
END;
		$it = $it.GlobaleView::footer();
		return $it;
	}

}