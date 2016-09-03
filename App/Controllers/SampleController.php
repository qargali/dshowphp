<?php

namespace App\Controllers;

use App\Models\User;
use Core;

/**
 * Sample Controller
 */
class SampleController extends Core\Controller
{
    public function firstPage(){
        Core\View::render("firstpage.html");
    }

    public function getUsers(){
        $users = new User();
        $users = $users->getAll();
        Core\View::render('users.html',array('users'=>$users));
    }
}
