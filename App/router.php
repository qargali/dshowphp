<?php

    $Route = new Core\Router();

    $Route->get('tema',function(){
        echo('It is Working');
    });

    $Route->get('users',"getUsers@SampleController");

    $Route->defAction("firstPage@SampleController");
