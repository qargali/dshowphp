<?php

namespace App\Controllers;

use Core;

/**
 * Sample Controller
 */
class SampleController extends Core\Controller
{
    public function firstPage(){
        $this->render("firstpage.html");
    }
}
