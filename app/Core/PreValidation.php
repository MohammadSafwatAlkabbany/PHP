<?php

class PreValidation
{

    public static function prepareForValidation()
    {
        echo "valid";
      //  ($id?$idToBeValidated = $id : $idToBeValidated='');
        $skuToBeValidated = filter_input(INPUT_POST, 'sku');
        $nameToBeValidated = filter_input(INPUT_POST, 'name');
        $priceToBeValidated = filter_input(INPUT_POST, 'price');
        $sizeToBeValidated = filter_input(INPUT_POST, 'size');
        $weightToBeValidated = filter_input(INPUT_POST, 'weight');
        $lengthToBeValidated = filter_input(INPUT_POST, 'length');
        $heightToBeValidated = filter_input(INPUT_POST, 'height');
        $widthToBeValidated = filter_input(INPUT_POST, 'width');
        echo "$nameToBeValidated";
        $validators = array(
            "sku" => $skuToBeValidated, 
            "name" =>  $nameToBeValidated,
            "price" => floatval($priceToBeValidated),
            "size" => floatval($sizeToBeValidated),
            "weight" => floatval($weightToBeValidated),
            "height" => floatval($heightToBeValidated),
            "length" => floatval($lengthToBeValidated),
            "width" => floatval($widthToBeValidated)
            );
        
        //require_once('ProductValidator.php');
        $errors=ProductValidator::validate($validators);
       // $productValidator = new ProductValidator();
        //$errors=$productValidator->validate($validators);
        
        $all = array($validators,$errors);
        //var_dump($all);

        return $all;

    }
}