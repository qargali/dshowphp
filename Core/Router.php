<?php

    namespace Core;

    class Router
    {
        private $ok=1;


        public function post($curl,$action){
            if($this->check($curl) && $_POST){
                $this->start($action,$_POST);
            }
        }

        public function get($curl,$action){
              if($this->check($curl)){
                  $this->start($action);
              }
        }

        public function getjson($curl,$action){
            $postdata = trim(file_get_contents("php://input"));
            if($postdata && $this->check($curl)){
                $postdata = json_decode($postdata,true);
                $this->start($action,$postdata);
            }
        }

        public function defAction($action){
            if($this->ok){
                global $url;
                if($url){
                    $this->route('/');
                }
                else{
                    $this->start($action);
                }

            }
        }

        public function route($url){
            header("location: $url");
        }

        private function start($action,$data=false){

            if (is_callable($action)) {
                $action($data);
                $this->ok = 0;
            }
            else {
              $parts = explode("@",$action);
              $controller = "App\Controllers\\".$parts[1];
              $method = $parts[0];

              if(class_exists($controller)){
                  $obj = new $controller();
                  $obj->$method($data);
                  $this->ok = 0;
              }
              else {
                echo "$controller Class Does Not Exist";
              }

            }



        }

        private function check($curl){
            global $url;
            $curl = preg_replace("/\//",'\/',$curl);
            if (preg_match("/^$curl$/",$url) && $this->ok)
                return true;
            else
                return false;
        }

    }
