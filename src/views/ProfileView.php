<?php

namespace undefined\views;

use undefined\views\GlobaleView;

class ProfileView {

 	public function __construct() {}

	public function render() {
		$it = GlobaleView::header(['css1' => 'formulaire.css', 'css2' => 'item.css']);
                $app = \Slim\Slim::getInstance();
                $it = $it . <<<END
                <form action="{$app->urlFor('Profile_valid')}" method="POST" enctype="multipart/form-data">
                <label for="username">Pseudo :</label>
                <input type="text" name="username" value="
END;
                $it .= unserialize($_SESSION['user'])->nom;
                $it .= <<<END
                " readonly /><br />

                <label for="password">Mot de passe <em>(laissez vide pour ne pas changer)</em> :</label>
                <input type="password" name="password" />

                <label for="avatar">Changer mon avatar ?</label>
                <input type="file" name="avatar" /><br />

                <input type="submit" value="Modifier" />
                </form>
END;

		$it = $it.GlobaleView::footer();
		return $it;
	}

}