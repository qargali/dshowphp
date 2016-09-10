<?php

namespace App\Controllers;

use App\Models\User;
use Core;

/**
 * Sample Controller
 */
class AppController extends Core\Controller
{
    public function firstPage(){
        Core\View::render("index.html");
    }
    

    public function getUsers(){
        $users = new User();
        $users = $users->getAll();
        Core\View::render('users.html',array('users'=>$users));
    }
}
