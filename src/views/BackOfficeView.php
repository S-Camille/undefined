<?php
/**
 * Created by PhpStorm.
 * User: Luc
 * Date: 08/02/2018
 * Time: 14:44
 */

namespace undefined\views;


class BackOfficeView
{
    private $autorise;

    public function __construct($autorise)
    {
        $this->autorise = $autorise;
    }

    public function render(){
        if ($this->autorise){
            $html = <<<END
            <h1>Back-office</h1>
END;
        }
        else {
            $html = <<<END
            <h1>Accès interdit</h1>
            <p>Page réservée aux administrateurs</p>
END;
        }
        echo $html;
    }
}