<?php
/** this class to check the existence of particular sku in DB. 
 * It just recieve sku and return TRUE or FALSE */
class SearchBySku
{

    public static function fetchBySku($newSku)
    { 
        $db = new Product();
        $all = $db->fetchAll();
        
        /*require_once("ProductBackendWithMysql.php");
        $data = new ProductBackendWithMysql();
        $all = $data->fetchAll();*/
       // var_dump($all); 
      //  echo $newSku;
        $sku_exist=FALSE;
        foreach($all as $key => $value)
            {
                (  $value["sku"]===$newSku)? ($sku_exist=TRUE):'';
            }
      //      echo $sku_exist;
        return $sku_exist;
    }
}
?>