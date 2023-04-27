<?php include(VIEW.'inc/header.php'); 
$error = FALSE;
if(isset($_POST["Save"]))
{
   if (count( array_keys( $errors, "success" ))<4)
   {
    $error = TRUE;
   }
}


?>
<head>
<link href="<?php echo BURL.'assets/css/style.css'  ?>" rel="stylesheet">

    <title>Add Product</title>

    <style type = "text/css">
        .dvdcss {
            display: none;
        }
        .bookcss {
            display: none;
        }
        .furniturecss {
            display: none;
        }
    </style>
</head>
<body>

<div class="under_head">
    
    <h1>Edit product</h1>
</div>

<div class="container">
    <?php foreach($row as $value){}?>
        <form class="form-test" id='product_form' action="<?= url('product/update/'.$value['id']);?>" method="POST">
        <input type="text" id="sku" name="sku" placeholder="Enter sku"
         value="<?php echo $value["sku"]; ?>"/>
         <?php if($error && $errors['sku']!='success'){echo $errors['sku'];} ?><br>
        
        
       
     <input type="text" id="name" name="name" placeholder="Enter name"
        value="<?php echo $value["name"]; ?>"/>
        <?php if($error && $errors['name']!='success'){echo $errors['name'];} ?><br>

        
       <input type="text" id="price" name="price" placeholder="Enter price"
        value="<?php echo $value["price"]; ?>"/>
        <?php if($error && $errors['price']!='success'){echo $errors['price'];} ?><br>
        
        
      
        <input type="text" id="height"  name="height" placeholder="Enter height"
        value="<?php echo $value["height"]; ?>"/>
        <?php if($error && $errors['height']!='success'){echo $errors['height'];} ?><br>
        
        
     <input type="text" id="length"  name="length" placeholder="Enter length"
        value="<?php echo $value["length"]; ?>"/>
        <?php if($error && $errors['length']!='success'){echo $errors['length'];} ?><br>
        
      <input type="text" id="width"  name="width" placeholder="Enter width"
        value="<?php echo $value["width"]; ?>"/>
        <?php if($error && $errors['width']!='success'){echo $errors['width'];} ?><br>
        
        <input type="submit" class="cancel1" value="Update" name="Update"/>
        <a class="cancel1" href="<?php url('product/index')  ?>"> cancel </a>
    
        </div>
        
        
        
            
            
        </form>

    </div>
    <br>
 </body>



<?php include(VIEW.'inc/footer.php'); ?>