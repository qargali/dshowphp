<?php

    $Route = new Core\Router();

    $Route->get('tema',function(){
        echo('It is Working');
    });

    $Route->get('users',"getUsers@AppController");

    $Route->get('haqqimizda',function(){
        \Core\View::render('info.html');
    });

    $Route->get('bax/\w+','bax@AppController');

    $Route->post('axtar','axtar@AppController');

    $Route->get('sehife/\d+','sehifele@AppController');

    $Route->get("\w+/\d+",'axtarS@AppController');

    $Route->defAction("firstPage@AppController");
