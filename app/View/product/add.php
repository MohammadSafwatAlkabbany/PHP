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
    
    <h1>Fill out the information</h1>
</div>

<div class="container">
        <form class="form-test" id='product_form' action="<?= url('product/store')?>" method="POST">
        <input type="text" id="sku" name="sku" placeholder="Enter sku"
         value="<?php echo isset($_POST["sku"]) ? htmlentities($_POST["sku"]) : ''; ?>"/>
         <?php if($error && $errors['sku']!='success'){echo $errors['sku'];} ?><br>
        
       
       
     <input type="text" id="name" name="name" placeholder="Enter name"
        value="<?php echo isset($_POST["name"]) ? htmlentities($_POST["name"]) : ''; ?>"/>
        <?php if($error && $errors['name']!='success'){echo $errors['name'];} ?><br>
        <br>

        
       <input type="text" id="price" name="price" placeholder="Enter price"
        value="<?php echo isset($_POST["price"]) ? htmlentities($_POST["price"]) : ''; ?>"/>
        <?php if($error && $errors['price']!='success'){echo $errors['price'];} ?><br>
        <br>

         
     <select id="productType" onchange="selectProduct(this)">
                <option value="choose product">choose product</option>
                <option value="DVD" >DVD</option>
                <option value="Book">Book</option>
                <option value="Furniture">Furniture</option>
            </select>
            <br>
        <div class ="dvdcss" id="dvd">
            
       <input type="text" id="size"  name="size" placeholder="Enter size"
           value="<?php echo isset($_POST["size"]) ? htmlentities($_POST["size"]) : ''; ?>"/>
           <?php if($error && $errors['size']!='success'){echo $errors['size'];} ?><br>
           <br>
        </div>
        
        
      <div class ="furniturecss" id="furniture">
        <input type="text" id="height"  name="height" placeholder="Enter height"
        value="<?php echo isset($_POST["height"]) ? htmlentities($_POST["height"]) : ''; ?>"/>
        <?php if($error && $errors['height']!='success'){echo $errors['height'];} ?><br>
        <br>
        
        
     <input type="text" id="length"  name="length" placeholder="Enter length"
        value="<?php echo isset($_POST["length"]) ? htmlentities($_POST["length"]) : ''; ?>"/>
        <?php if($error && $errors['length']!='success'){echo $errors['length'];} ?><br>
        <br>
        
      <input type="text" id="width"  name="width" placeholder="Enter width"
        value="<?php echo isset($_POST["width"]) ? htmlentities($_POST["width"]) : ''; ?>"/>
        <?php if($error && $errors['width']!='success'){echo $errors['width'];} ?><br>
        <br>
        </div>

    <div class ="bookcss" id="book" >
       <input type="text" id="weight"  name="weight" placeholder="Enter weight"
        value="<?php echo isset($_POST["weight"]) ? htmlentities($_POST["weight"]) : ''; ?>"/>
        <?php if($error && $errors['weight']!='success'){echo $errors['weight'];} ?><br>
        <br>
        </div>
        <input type="submit" class="cancel1" value="Save" name="Save"/>
        <a class="cancel1" href="<?php url('product/index')  ?>"> cancel </a>
        
        
            
            <script type="text/javascript">
               function selectProduct(answer){
                //console.log(answer.value)
                if(answer.value == "choose product" ){
                    document.getElementById('dvd').classList.add('dvdcss');
                    document.getElementById('book').classList.add('bookcss');
                    document.getElementById('furniture').classList.add('furniturecss');
                    
                } 
                if(answer.value == "DVD"){
                    document.getElementById('dvd').classList.remove('dvdcss');
                    document.getElementById('book').classList.add('bookcss');
                    document.getElementById('furniture').classList.add('furniturecss');
                    
                } 
                if(answer.value == "Book"){
                    document.getElementById('book').classList.remove('bookcss');
                    document.getElementById('dvd').classList.add('dvdcss');
                    document.getElementById('furniture').classList.add('furniturecss');
                }
                if(answer.value == "Furniture"){
                    document.getElementById('furniture').classList.remove('furniturecss');
                    document.getElementById('dvd').classList.add('dvdcss');
                    document.getElementById('book').classList.add('bookcss');
                }
               }
            </script>
            </form>

    </div>
    <br>
 </body>



<?php include(VIEW.'inc/footer.php'); ?>