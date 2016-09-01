<?php

    $Route = new Core\Router();

    $Route->get('tema',function(){
        echo('Does This Work');
    });

    $Route->defAction("firstPage@SampleController");
