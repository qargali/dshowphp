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
        $this->render("firstpage.html");
    }

    public function getUsers(){
        $users = new User();
        $users = $users->getAll();
        $this->render('users.html',array('users'=>$users));
    }
}
