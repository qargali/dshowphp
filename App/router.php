<?php

    $Route = new Core\Router();

    $Route->get('tema',function(){
        echo('It is Working');
    });

    $Route->get('users',"getUsers@AppController");

    $Route->get('haqqimizda',function(){
        \Core\View::render('info.html');
    });

    $Route->defAction("firstPage@AppController");
