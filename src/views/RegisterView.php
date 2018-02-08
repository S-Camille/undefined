<?php

namespace undefined\views;

use undefined\views\GlobaleView;

class RegisterView {

 	public function __construct() {}

	public function render() {
		$it = GlobaleView::header(['css1' => 'formulaire.css', 'css2' => 'item.css']);
                $app = \Slim\Slim::getInstance();
                $it = $it . <<<END
                <form action="{$app->urlFor('Register_valid')}" method="POST">
                <label for="username">Pseudo :</label>
                <input type="text" name="username" /><br />

                <label for="password">Mot de passe :</label>
                <input type="password" name="password" /><br />


                <label for="password">Confirmez le mdp :</label>
                <input type="password" name="password_confirm" /><br />

                <input type="submit" value="Inscription" />
                </form>
END;
		$it = $it.GlobaleView::footer();
		return $it;
	}

}