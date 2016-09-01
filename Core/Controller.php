<?php

namespace Core;

class Controller{
    protected $twig;

    public function __construct(){
        //Install Twig
        $loader = new \Twig_Loader_Filesystem("../view");
        $this->twig = new \Twig_Environment($loader);
    }

    public function render($place,$array=array()){
        echo $this->twig->render($place,$array);
    }
}
