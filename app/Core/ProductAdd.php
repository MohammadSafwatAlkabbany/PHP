<?php

class ProductAdd
{
    public static function filterProduct($data)
    {
            
            $DVDdata=[$data[1]['sku'],$data[1]['name'],$data[1]['price'],$data[1]['size']];
            $bookdata=[$data[1]['sku'],$data[1]['name'],$data[1]['price'],$data[1]['weight']];
            $furniturdata=[$data[1]['sku'],$data[1]['name'],$data[1]['price'],$data[1]['height'],$data[1]['length'],$data[1]['width']];
            
            //require_once('InsertProductAll.php');
            //$insertProductAll= new InsertProductAll();
            
            (count( array_keys( $DVDdata, "success" ))==4)?( ProductAdd::insertDVD($data)):'';
            
            (count( array_keys( $bookdata, "success" ))==4)?(ProductAdd::insertBook($data)):''; 

            (count( array_keys( $furniturdata, "success" ))==6)?(ProductAdd::insertFurniture($data)):'';
    
        }

    Public static function insertDVD($data)
    {
      $db = new Product();
      $db->setSku($data[0]['sku']);
      $db->setName($data[0]['name']);
      $db->setPrice($data[0]['price']);
      $db->setSize($data[0]['size']);
      $db->insertData();
      $data['products'] = $db->fetchAll();
      View::load('product/index',$data);
    }

    Public static function insertBook($data)
    {
        $db = new Product();
        $db->setSku($data[0]['sku']);
        $db->setName($data[0]['name']);
        $db->setPrice($data[0]['price']);
        $db->setWeight($data[0]['weight']);
        $db->insertData();
        $data['products'] = $db->fetchAll();
        View::load('product/index',$data);;

    }

    Public static function insertFurniture($data)
    {
        $db = new Product();
        $db->setSku($data[0]['sku']);
        $db->setName($data[0]['name']);
        $db->setPrice($data[0]['price']);
        $db->setHeight($data[0]['height']);
        $db->setLength($data[0]['length']);
        $db->setWidth($data[0]['width']);
        $db->insertData();
        $data['products'] = $db->fetchAll();
        View::load('product/index',$data);
    }
}