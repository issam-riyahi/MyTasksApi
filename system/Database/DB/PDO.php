<?php 
namespace Database\DB;


final class PDO {

    /**
     *  @var
     */
    private $pdo = null;
    

    private $statment = null;


    public function __construct($hostname, $username, $password, $database)
    {   
        try {

            $this->pdo = new  \PDO('mysql:host=' . $hostname . ';dbname=' . $database , $username , $password );
        }
        catch(\PDOException $ex){
            trigger_error('Error , could not make database link (' . $ex->getMessage() . 'Error code '  . $ex->getCode() . '</br>');
            exit();
        }
        
        
    }

    public function query($sql)
    {
        $this->statment = $this->pdo->prepare($sql);
        $result = false;

        try{
            if($this->statment && $this->statment->execute()){

                $data = array();
                while($row = $this->statment->fetch(\PDO::FETCH_ASSOC)){
                    $data[] = $row;
                }

                $result = new  \stdClass ; 
                $result->row = isset($data[0]) ? $data[0] : array();
                $result->rows = $data;
                $result->numRows = $this->statment->rowCount();

                if($result){
                   return  $result ;
                }
                else {
                    $result = new  \stdClass ; 
                    $result->row = array();
                    $result->rows = array();
                    $result->numRows = 0;
                    return $result;
                }
            }
        }
        catch(\PDOException $ex){
            trigger_error('Error , could not make database link (' . $ex->getMessage() . 'Error code '  . $ex->getCode() . $sql);
        }
    }

    public function getLastId(){
       return $this->pdo->lastInsertId();
    }

    public function __destruct() {
        $this->pdo = null;
    }

}