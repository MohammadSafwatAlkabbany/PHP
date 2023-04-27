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
        <br>
        <input type="text" id="size"  name="size" placeholder="Enter size"
           value="<?php echo $value["size"]; ?>"/>
           <?php if($error && $errors['size']!='success'){echo $errors['size'];} ?><br>
        <br> 
         
        <input type="submit" class="cancel1" value="Update" name="Update"/>
        <a class="cancel1" href="<?php url('product/index')  ?>"> cancel </a>
            
    

    </div>
    <br>
 </body>



<?php include(VIEW.'inc/footer.php'); ?>