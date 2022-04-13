<?php 
use MVC\Model;

class User extends Model {
    


    public function AllUsers(){


        $getParmas = $GLOBALS['request']->get();
        $sql = 'SELECT * FROM users';
        if(!empty($getParmas)){
            foreach($getParmas as $key => $value){
                $sql .= ' WHERE ' . $key . "=" . "'" . $value . "'" ;
            }
            return $this->db->query($sql);
        }

        return $this->db->query($sql);
    }

    public function getUser($userId){
        $sql = 'SELECT `userId`, `username`, `fullName` , `email` FROM users WHERE `userId` =' . "'" .  $userId['userId'] . "'";
        return $this->db->query($sql);
    }
}