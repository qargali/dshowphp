<?php

namespace App\Controllers;

use Core;

/**
 * Sample Controller
 */
class AppController extends Core\Controller
{
    private $api;
    private $request;

    function __construct()
    {
        $this->api = new \Dailymotion();
        $this->request['fields'] = array('id', 'title', 'views_total','embed_url','description','thumbnail_120_url','tags');
        $this->request['tags']="koffie";
    }

    public function firstPage(){
        $results = $this->api->get(
            '/videos',
            $this->request
        );
        Core\View::render("main.html",array('videos'=>$results));
    }
    

    public function getUsers(){
        $users = new User();
        $users = $users->getAll();
        Core\View::render('users.html',array('users'=>$users));
    }
}
