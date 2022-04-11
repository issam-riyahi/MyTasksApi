<?php

use MVC\Model;

class Task extends Model {



    public function getAllTasks($userId = null){
        $getParmas = $GLOBALS['request']->get();
        if(isset($getParmas)){
            var_dump($getParmas);
        }
        // $getParmas = isset($GLOBALS['request']->get()) ? $GLOBALS['request']->get() : '';
        // echo 'SELECT * FROM tasks ' .( isset($userId) ?  ' WHERE user_id=' . "'" . $userId . "'"  : 'WHERE 1');
       return $this->db->query('SELECT * FROM tasks ' .( isset($userId) ?  ' WHERE user_id=' . "'" . $userId . "'"  : 'WHERE 1'));
    //    return '1';
    }


    public function getTasksBySectionId($sectionId){
        return $this->db->query('SELECT * FROM tasks where section_id=' . "'" . $sectionId . ";");
    }

}