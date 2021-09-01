<?php 
class inventoryDB {
    
    private $servername = "localhost";
    private $username = "root";
    private $password = "";
    private $dbname = "trucks";

    private $table = "inventory";
    private $row_limit = 9;

    public $dbh = false;

    function __construct()
    {
        $this->setDbh();
        return $this->dbh;
    }

    function setDbh(){
        try {
            $this->dbh = new PDO('mysql:host='.$this->servername.';dbname='.$this->dbname, $this->username, $this->password,
                array(
                    PDO::ATTR_PERSISTENT => true
                )
            );

        // var_export($dbh);
        } catch (PDOException $e) {
            print "Error!: " . $e->getMessage() . "<br/>";
            die();
        }
    }

    function getDbh(){
        return $this->dbh;
    }

    function getTable(){
        return $this->table;
    }

    function setTable($tableName){
        $this->table = $tableName;
    }

    function getRowLimit(){
        return $this->row_limit;
    }

    function setRowLimit($limit){
        $this->row_limit = $limit;
    }

}


?>