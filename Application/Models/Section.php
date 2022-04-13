<?php 
use MVC\Model;

class Section extends Model {
    


    public function AllSections(){
        $getParmas = $GLOBALS['request']->get();
        $sql = 'SELECT * FROM section';
        if(!empty($getParmas)){
            // var_dump($getParmas);
            foreach($getParmas as $key => $value){
                $sql .= ' WHERE ' . $key . "=" . "'" . $value . "'" ;
            }
            return $this->db->query($sql);
        }

        return $this->db->query($sql);
    }

    public function addSection(){
        $getParmas = $GLOBALS['request']->post();

        return $getParmas;
    }
}