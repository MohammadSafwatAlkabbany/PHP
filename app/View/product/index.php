<?php include(VIEW.'inc/header.php'); 
$Unchecked=False;

?>
<link href="<?php echo BURL;  ?> assets/css/style.css" rel="stylesheet">
<body>
<div class="nav">
<div class="items-right">
    <a class="ADD" href="<?php url('product/add')  ?>"> ADD </a>
    <form action="<?php  url('product/massDelete')  ?>" method="POST">
    <button type='submit' value='mass_delete' name='mass_delete' class="mass-prod"> MASS DELETE</button>
    <div class="mass-delete">
        <br><br><br>
<?php
        if(isset($_POST['mass_delete']))
      {
         if(empty($_POST['mass_delete_id']))
         {
            $Unchecked=TRUE;
          echo ($Unchecked)?"<h4> kindly select a product to delete<h4>" : ""; 
         }
        }
?>
    </div>
    <br><br><br>
</div>


<div class="list_view_test">
    <?php foreach($products as $value): ?>
        <div class="list_view">
            <ul>
                <li><input type='checkbox' class="delete-checkbox" name='mass_delete_id[]' value="<?=$value['id'];?>" ></li>
                <li><p><span><?= $value['sku']?></span></p></li>
                <li><p><span><?= $value['name']?><span></p></li>
                <li><p><?= $value['price']?> $</p></li>
                <li><p><?php if($value['weight']!=0){echo "Weight: ". $value['weight']. " kg";}?></p></li>
                <li><p><?php if($value['size']!=0){echo "Size: ".$value['size']. " MB";}?></p></li>
                <li><p><?php if($value['height']!=0){echo "Dimension: ". $value['height']. " * " . $value['length']. " * " .$value['width'] ;}?></p></li>
                <li><p><a href="<?php url('product/delete/'.$value['id'])?>" class="button">DELETE</a><p></li>
                <!--<li><p><a href="<?php url('product/edit/'.$value['id'])?>" class="button">EDIT</a><p></li>-->
            </ul>
        </div>
    
    <?php endforeach ?>

    </div>

    </body>
<?php include(VIEW.'inc/footer.php'); ?>


