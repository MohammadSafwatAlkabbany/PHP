<?php



class DB 
{
    protected $db;

    public function connect()
    {
        $dbCnx = new PDO(DB_TYPE.":host=".DB_HOST.";dbname=".DB_NAME, DB_USER, DB_PWD,[ PDO::ATTR_DEFAULT_FETCH_MODE => PDO:: FETCH_ASSOC]);
        if($dbCnx)
        {
         //   echo "connected";
          //  $this->$db = $dbCnx;
            return $dbCnx;
        } 
        else
        {
            echo "connect error";
        }
    
    }

    
}