<?php
namespace MVC ;

class Model {



    public $db ;


    public function __construct()
    {
        $this->db = new \Database\DatabaseAdapter(
            DATABASE['Driver'],
            DATABASE['Host'],
            DATABASE['Username'],
            DATABASE['password'],
            DATABASE['Name'],
        );
        
    }
}