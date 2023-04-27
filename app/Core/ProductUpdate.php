<?php

class ProductUpdate
{
    public static function filterProduct($data)
    {
            
            
            echo " filter";
            echo $data[0]['sku'];
            $DVDdata=[$data[1]['sku'],$data[1]['name'],$data[1]['price'],$data[1]['size']];
            $bookdata=[$data[1]['sku'],$data[1]['name'],$data[1]['price'],$data[1]['weight']];
            $furniturdata=[$data[1]['sku'],$data[1]['name'],$data[1]['price'],$data[1]['height'],$data[1]['length'],$data[1]['width']];
            
            //require_once('InsertProductAll.php');
            //$insertProductAll= new InsertProductAll();
            
            (count( array_keys( $DVDdata, "success" ))==4)?( ProductUpdate::updateDVD($data)):'';
            
            (count( array_keys( $bookdata, "success" ))==4)?(ProductUpdate::updateBook($data)):''; 

            (count( array_keys( $furniturdata, "success" ))==6)?(ProductUpdate::updateFurniture($data)):'';
    
        }

    Public static function updateDVD($data)
    {
      $db = new Product();
      $db->setId($data[0]['id']);
      $db->setSku($data[0]['sku']);
      $db->setName($data[0]['name']);
      $db->setPrice($data[0]['price']);
      $db->setSize($data[0]['size']);
      $db->updateOne();
      $data['products'] = $db->fetchAll();
      View::load('product/index',$data);
    }

    Public static function updateBook($data)
    {
        echo " update";
        echo $data[0]['name'];
        echo $data[0]['id'];
        var_dump($data);
        $db = new Product();
        $db->setId($data[0]['id']);
        $db->setSku($data[0]['sku']);
        $db->setName($data[0]['name']);
        $db->setPrice($data[0]['price']);
        $db->setWeight($data[0]['weight']);
        $db->updateOne();
        $data['products'] = $db->fetchAll();
        View::load('product/index',$data);;

    }

    Public static function updateFurniture($data)
    {
        $db = new Product();
        $db->setId($data[0]['id']);
        $db->setSku($data[0]['sku']);
        $db->setName($data[0]['name']);
        $db->setPrice($data[0]['price']);
        $db->setHeight($data[0]['height']);
        $db->setLength($data[0]['length']);
        $db->setWidth($data[0]['width']);
        $db->updateOne();
        $data['products'] = $db->fetchAll();
        View::load('product/index',$data);
    }
}