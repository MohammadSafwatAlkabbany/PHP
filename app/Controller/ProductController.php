<?php

class ProductController
{
    public function index()
    {
       $db = new Product();
       $data['products'] = $db->fetchAll();
       View::load('product/index',$data);

    }


    public function add()
    {
       View::load('product/add');

    }

    public function store()
    {
      $error = FALSE;
      $result = PreValidation::prepareForValidation();
      $data=[$result[0]['sku'],$result[0]['name'],$result[0]['price'],$result[0]['size'],$result[0]['height'],$result[0]['length'],$result[0]['width'],$result[0]['weight']];
      //$errors['errors']=[$result[1]['sku'],$result[1]['name'],$result[1]['price'],$result[1]['size'],$result[1]['height'],$result[1]['length'],$result[1]['width'],$result[1]['weight']];
      $errors['errors'] = array(
         "sku" => $result[1]['sku'], 
         "name" =>  $result[1]['name'],
         "price" => $result[1]['price'],
         "size" => $result[1]['size'],
         "weight" => $result[1]['weight'],
         "height" => $result[1]['height'],
         "length" => $result[1]['length'],
         "width" => $result[1]['width']
         );
      //echo $result[1]['sku'];
      (count( array_keys( $result[1], "success" ))>=4)?(ProductAdd::filterProduct($result)):$error = TRUE;
      if($error)
      {
         View::load('product/add',$errors);
      }
      
     
    }

    

    public function delete($id)
    {
      $db = new Product();
      $db ->setId($id);
      $db ->delete();
      $data['products'] = $db->fetchAll();
      View::load('product/index',$data);

    }

    public function edit($id)
    {
      $db = new Product();
      $editedProduct["row"] = $db->fetchOne($id);
      $editedProduct1 = $db->fetchOne($id);
      //$db ->fetchOne($id);
      //var_dump($data);
     // var_dump($editedProduct );
     foreach($editedProduct1 as $value){
     if($value['size']!="0"){
     View::load('product/editdvd',$editedProduct);
     }
     if($value['weight']!="0"){
      View::load('product/editbook',$editedProduct);
      }
      if($value['height']!="0"){
         View::load('product/editfurniture',$editedProduct);
      }
    }
   }
    public  function massDelete()
    {
      
      if(isset($_POST['mass_delete']))
      {
         if(isset($_POST['mass_delete_id']))
         {
            $db = new Product();
            foreach($_POST['mass_delete_id'] as $id)
            {
               $db->setId($id);      
               $db->delete();
            }
            $data['products'] = $db->fetchAll();
            View::load('product/index',$data);
         } else 
         {
            $db = new Product();
            $data['products'] = $db->fetchAll();
            View::load('product/index',$data);
         }
      }
      
      }

      public function update($id)
    {
      $error = FALSE;
      $result = PreValidation::prepareForValidation();
     // $data=[$id,$result[0]['sku'],$result[0]['name'],$result[0]['price'],$result[0]['size'],$result[0]['height'],$result[0]['length'],$result[0]['width'],$result[0]['weight']];
      //$errors['errors']=[$result[1]['sku'],$result[1]['name'],$result[1]['price'],$result[1]['size'],$result[1]['height'],$result[1]['length'],$result[1]['width'],$result[1]['weight']];
      $data = array(
         "id" => intval($id),
         "sku" => $result[0]['sku'], 
         "name" =>  $result[0]['name'],
         "price" => $result[0]['price'],
         "size" => $result[0]['size'],
         "weight" => $result[0]['weight'],
         "height" => $result[0]['height'],
         "length" => $result[0]['length'],
         "width" => $result[0]['width']
         );
      $errors = array(
         "id" => intval($id),
         "sku" => "success", 
         "name" =>  $result[1]['name'],
         "price" => $result[1]['price'],
         "size" => $result[1]['size'],
         "weight" => $result[1]['weight'],
         "height" => $result[1]['height'],
         "length" => $result[1]['length'],
         "width" => $result[1]['width']
         );
         $resultWitId  = array($data,$errors);
         //var_dump($resultWitId);
      echo "controller";
      (count( array_keys( $resultWitId[1], "success" ))>=4)?(ProductUpdate::filterProduct($resultWitId)):$error = TRUE;
      if($error)
      {
         View::load('product/add',$errors);
      }
      
     
    }
}