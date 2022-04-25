<?php 
use MVC\Model;

class Section extends Model {
    


    public function AllSections($getParmas){
         
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

    public function sectionByUser($user){
        $sql = "SELECT * FROM section WHERE `user_id` = " . "'" . $user . "'";
        return $this->db->query($sql);
    }
    public function addSection($getParmas){
         
        // var_dump($getParmas);
        $name = $getParmas['name'];
        $color = $getParmas['color'];
        $userId = $getParmas['userId'];
        $sql = "INSERT INTO `section` (`name`, `color`, `user_id`) VALUES('" . $name . "'" . ",'" . $color . "'" . ",'" . $userId . "');";

        $this->db->query($sql);
    }

    public function deleteSection($getParmas){
        
        // $sql = "DELETE FROM tasks where task_id IN (" . implode(",", $getParmas['tasks_id']) . ");";
        $this->db->query("DELETE FROM tasks where section_id IN (" . $getParmas['sectionId'] . ");");
        $sql = "DELETE FROM section where section_id IN (" . $getParmas['sectionId'] . ");";
        var_dump($sql);
        $this->db->query($sql);
        
    }


    public function updateSection($getParmas){

        

        $sectionId = htmlspecialchars($getParmas['sectionId']) ;
        $name = htmlspecialchars( $getParmas['name']);
        $color = htmlspecialchars($getParmas['color']);
        // $userId = $getParmas['userId'];

        $sql = "UPDATE  `section` SET  `name` = '$name' , `color` = '$color' WHERE `section_id`='$sectionId' ;";

        $this->db->query($sql);
        // return $getParmas;
    }
}