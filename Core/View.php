<?php
/**
 * Created by PhpStorm.
 * User: Murad
 * Date: 9/3/2016
 * Time: 01:35 PM
 */

namespace Core;


class View
{
    static function render($place,$array=array()){
        $loader = new \Twig_Loader_Filesystem("../view");
        $twig = new \Twig_Environment($loader);
        echo $twig->render($place,$array);
    }
}