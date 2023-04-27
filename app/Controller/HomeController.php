<?php

class HomeController
{
    public function index()
    {
        $db = new Product();
        $data['products'] = $db->fetchAll();
        View::load('product/index',$data);
      
      
      //View::load('home');

    }
}