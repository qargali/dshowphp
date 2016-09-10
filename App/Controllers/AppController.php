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

    public function axtar($data){
        $this->request['search']=$data['key'];
        $results = $this->api->get(
            '/videos',
            $this->request
        );
        Core\View::render("main.html",array('videos'=>$results['list'],'pages'=> ceil($results['total']/10),'key'=>$data['key']));
    }

    public function axtarS(){
        global $url;
        $ur = explode('/',$url);
        $key = $ur[0];
        $page = $ur[1];
        $this->request['search']=$key;
        $this->request['page']=$page;
        $results = $this->api->get(
            '/videos',
            $this->request
        );
        Core\View::render("main.html",array(
            'videos'=>$results['list'],
            'pages'=> ceil($results['total']/10),
            'key'=>$key
        ));
    }

    public function firstPage(){
        $results = $this->api->get(
            '/videos',
            $this->request
        );
        /*
            $this->show($results);
        */
        Core\View::render("main.html",array('videos'=>$results['list'],'pages'=> ceil($results['total']/10)));
    }

    public function sehifele(){
        global $url;
        $ur = explode('/',$url);
        $page = $ur[1];
        $this->request['page']=$page;
        $results = $this->api->get(
            '/videos',
            $this->request
        );
        Core\View::render("main.html",array('videos'=>$results['list'],'pages'=> ceil($results['total']/10)));
    }

    function show($res){
        echo "<pre>";
        print_r($res);
        echo "</pre>";
    }

    public function bax(){
        global $url;
        unset($this->request['tags']);
        $ur = explode('/',$url);
        $id = $ur[1];
        $this->request['ids']=$id;
        $results= $this->api->get(
            '/videos',
            $this->request
        );
        //$this->show($results['list'][0]);
        Core\View::render('watch.html',array('video'=>$results['list'][0]));

    }
    

    public function getUsers(){
        $users = new User();
        $users = $users->getAll();
        Core\View::render('users.html',array('users'=>$users));
    }
}
