<?php

/**
 * 
 * front end contrller
 */

 class App 
 {
    protected $controller = "HomeController";
    protected $action = "index";

    protected $param = [];


    public function __construct()
    {
       $this->prepareURL();
       $this->render();

    }
 /*
 * extract the controller, methods and parametrs
 * return $void
 */
    private function prepareURL()
    {
        $url = $_SERVER['QUERY_STRING'];
        if(!empty($url))
        {
            $url = trim($url."/");
            $url = explode("/",$url);

            // define the controller
            $this->controller = isset($url[0]) ? ucwords($url[0])."Controller" : "HomeController";

            //echo $this->controller;

            // define the action
            $this->action = isset($url[1]) ? $url[1] : "index";
           // echo $this->action;
            // define the parameters
            unset($url[0],$url[1]);
            $this->param = !empty($url) ? array_values($url): [];
           // var_dump($this-> param);
    }


      //  var_dump($url);
        //echo $url[2];
    }


    private function render()
    {
      if(class_exists($this->controller))
      {
         $controller = new $this->controller;

         if(method_exists($controller,$this->action))
         {
            call_user_func_array([$controller,$this->action],$this->param);
         }
         else
         {
            echo "This method not exist";
         }


      }
      else
      {
       echo "This controller : ".$this->controller . " not exists" ;
      }
    }
 }