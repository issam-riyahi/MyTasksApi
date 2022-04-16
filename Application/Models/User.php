<?php 
use MVC\Model;

class User extends Model {
    


    public function AllUsers(){


        $getParmas = $GLOBALS['request']->get();
        $sql = 'SELECT * FROM users';
        if(!empty($getParmas)){
            $sql .= ' WHERE ' ; 
            foreach($getParmas as $key => $value){
                $sql .=  $key . "=" . "'" . $value . "' and " ;
            }
            $sql = substr($sql,0 , -4);
            
            return $this->db->query($sql);
        }

        return $this->db->query($sql);
    }

    public function getUser($userId){
        $sql = 'SELECT `userId`, `username`, `fullName` , `email` FROM users WHERE `userId` =' . "'" .  $userId['userId'] . "'";
        return $this->db->query($sql);
    }
}