<?php

use Authentication\Auth;
use MVC\Model;

class User extends Model {
    
    use Auth;

    public function AllUsers(){


        $getParmas = $GLOBALS['request']->get();
        $sql = 'SELECT * FROM users';
        if(!empty($getParmas)){
            $sql .= ' WHERE ' ; 
            foreach($getParmas as $key => $value){
                if(!in_array($key, ['password', 'pwd']))
                $sql .=  $key . "=" . "'" . $value . "' or " ;
            }
            $sql = substr($sql,0 , -4);
            
            return $this->db->query($sql);
        }

        return $this->db->query($sql);
    }

    public function UserLogin(){
        $getParmas = $GLOBALS['request']->get();
        $pwd = htmlspecialchars($getParmas['password']) ;
        $username = htmlspecialchars($getParmas['username']) ;
        $sql = 'SELECT `userId`, `username`, `fullName` , `email`, `password` FROM users WHERE `username` =' . "'" . $username  . "'";
        $data = $this->db->query($sql);
        
        if(isset($data->row)){
            if(password_verify($pwd, $data->row['password'])){
                
                $data = array('username' => $data->row['username'], 'email' => $data->row['email'], 'userId' => $data->row['userId'] );
            }
            else {
                $data = [];
            }
        }
        else {
            $data = [];
        }
        return $data ;
    }


    public function validateLogin($postParmas){
        
        $pwd = htmlspecialchars($postParmas['password']) ;
        $username = htmlspecialchars($postParmas['username']) ;
        $sql = 'SELECT `userId`, `username`, `fullName` , `email`, `password` FROM users WHERE `username` =' . "'" . $username  . "'";
        $data = $this->db->query($sql);
        
        if(!empty($data->row)){
            if(password_verify($pwd, $data->row['password'])){
                
                $data = array('username' => $data->row['username'], 'email' => $data->row['email'], 'userId' => $data->row['userId'] );
            }
            else {
                $data = [];
            }
        }
        else {
            $data = [];
        }
        return $data ;
    }
    public function userRegister($postParams ){
        
        

        




        $userId = htmlspecialchars($postParams['userId']) ;
        $fullName = htmlspecialchars($postParams['fullName']) ;
        $username = htmlspecialchars($postParams['username']) ;
        $email = htmlspecialchars($postParams['email']) ;
        $pwd = htmlspecialchars($postParams['password']) ;

        $sql = 'SELECT `userId` FROM users WHERE `username` =' . "'" . $username  . "'" . ' or `email` = ' .  "'" . $email  . "'"  ;
        $data = $this->db->query($sql);
        
        if(empty($data->row)){

            $hashedPassword = password_hash($pwd, PASSWORD_DEFAULT);
            $sql = "INSERT INTO users(`userId`, `username`, `fullName`, `email`, `password`) VALUES ('$userId', '$username', '$fullName', '$email' , '$hashedPassword')";
            $this->db->query($sql);
            return true;
        }
        else {
            return false;
        }
        
    }

    public function userById($userId){
        $sql = 'SELECT `userId`, `username`, `fullName` , `email` FROM users WHERE `userId` =' . "'" . $userId  . "'" ;
        $data = $this->db->query($sql);
        return $data;
    }
}