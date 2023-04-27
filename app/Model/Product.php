<?php

class product extends DB
{
    private $table = "products";
    private $conn;
    private $sku;
    private $name;
    private $price;
    private $size;
    private $height;
    private $length;
    private $width;
    private $weight;

    public function __construct( $id=0, $sku="",$name="",$price=0, $size=0, $height=0, $length=0, $width=0, $weight=0)
    {
        $this-> id = $id;
         $this-> sku = $sku;
         $this-> name = $name;
         $this-> price = $price;
         $this-> size = $size;
         $this-> height = $height;
         $this-> length = $length;
         $this-> width = $width;
         $this-> weight = $weight;
        $this->conn = $this->connect();
    }

    public function setId($id)
    {
        $this->id = $id;
   }

    public function getId()
    {
        return $this-> id;
    }
    
    public function setSku($sku)
    {
        $this->sku = $sku;
    }

    public function getSku()
    {
        return $this-> sku;
    }

    public function setName($name)
    {
        $this->name = $name;
    }

    public function getName()
    {
        return $this-> name;
    }
    public function setPrice($price)
    {
        $this->price = $price;
    }

    public function getPrice()
    {
        return $this-> price;
    }
    public function setSize($size)
    {
        $this->size = $size;
    }

    public function getSize()
    {
        return $this-> size;
    }
    public function setHeight($height)
    {
        $this->height = $height;
    }

    public function getHeight()
    {
        return $this-> height;
    }
    public function setLength($length)
    {
        $this->length = $length;
    }

    public function getLength()
    {
        return $this-> length;
    }
    public function setWidth($width)
    {
        $this->width = $width;
    }

    public function getWidth()
    {
        return $this-> width;
    }

    public function setWeight($weight)
    {
        $this->weight = $weight;
    }

    public function getWeight()
    {
        return $this-> weight;
    }

    
    public function fetchAll()
    {
        try{
            $stm = $this->conn->prepare("SELECT * FROM products");
            $stm->execute();
            return $stm->fetchAll();
        }catch(Exception $e){
            die("error in db fetch");
           // return $e->getMessage();
        }
    }


    public function insertData()
    {
        
        try{
            
            $stm = $this->conn->prepare("INSERT INTO products (sku,name,price,size,height,length,width,weight) VALUES (?,?,?,?,?,?,?,?)");
            $stm->execute([$this->sku,$this->name,$this->price,$this->size,$this->height,$this->length,$this->width,$this->weight]);
          //  echo "<script> alert('data saved successfully'); document.location='index.php'</script>";
          //  header("location: index.php" );
        }catch(Exception $e){
            die("error in db insert");
           // return $e->getMessage();
        }   
    }

    public function delete()
    {
        try{
            $stm = $this->conn->prepare("DELETE FROM products where id=?");
            $stm->execute([$this->id]);
            return $stm->fetchAll();
     //       echo "<script> alert('data deleted successfully'); document.location='index.php'</script>";

        }catch(Exception $e)
        {
            die("error in db delete with id");
           // return $e->getMessage();
        }
    }

    public function fetchOne($id){
       /* $stm = $this->conn->where ("id",$id);
        return $stm->getOne($this->table);*/

        
        try{


           /* $stm = $this->conn->prepare("SELECT FROM products WHERE id=?");   
           $stm->execute([$this->id]);
            $data=$stm->fetchAll();
            return $data;*/

            $stm = $this->conn->prepare("SELECT * FROM products");
            $stm->execute();
            $data=$stm->fetchAll();
           // var_dump($data);

            foreach($data as  $value){
                //echo $value["id"] . $id;
                if($value["id"]== $id){
                   $editedProduct[] = array(
                      "id" => $value["id"],
                      "sku" => $value["sku"], 
                      "name" =>  $value['name'],
                      "price" => $value['price'],
                      "size" => $value['size'],
                      "weight" => $value['weight'],
                      "height" => $value['height'],
                      "length" => $value['length'],
                      "width" => $value['width']
                      );
                    
                }
             }
            return $editedProduct;


          /*  $stm = $this->conn->query("SELECT * FROM products ");
            while ($row = $stm->fetch()) {
                echo $row['id'];
           
             $stm = $this->conn->prepare("SELECT FROM products WHERE id=?");
             $stm->execute([$this->id]);
             return $stm->fetchAll();*/


        }catch(Exception $e){
            die("error in db fetch with id");
           // return $e->getMessage();
        }
    }
    
    public function updateOne(){
        try{
          //  $stm = $this->conn->prepare("DELETE FROM products where id=?");
         //   $stm->execute([$this->id]);
         //   $stm = $this->conn->prepare("INSERT INTO products (sku,name,price,size,height,length,width,weight) VALUES (?,?,?,?,?,?,?,?)");
        //    $stm->execute([$this->sku,$this->name,$this->price,$this->size,$this->height,$this->length,$this->width,$this->weight]);


        
        
        
               $stm = $this->conn->prepare("UPDATE products SET sku =?, name=?, price=?, size=?, height=?, length=?, width=?, weight=? WHERE id=?");
           $stm->execute([$this->sku,$this->name,$this->price,$this->size,$this->height,$this->length,$this->width,$this->weight,$this->id]);
        //    $stm = $this->conn->prepare("UPDATE products SET sku =?, name=?, price=?, size=?, height=?, length=?, width=?, weight=? WHERE id = :id");
        //    $stm->bindParam(':id', $id, PDO::PARAM_INT);
        //    $stm->execute([$this->sku,$this->name,$this->price,$this->size,$this->height,$this->length,$this->width,$this->weight]);
     
        
            //echo "done";
        
            //    echo "<script> alert('data update successfully'); document.location='productlist.php'</script>";

        }catch(Exception $e){
            die("error in db update with id");
           // return $e->getMessage();
        }
    }

}