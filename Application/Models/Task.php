<?php

use MVC\Model;

class Task extends Model {



    public function getAllTasks(){
        $getParmas = $GLOBALS['request']->get();
        $sql ='SELECT * FROM tasks ';
        if(!empty($getParmas)){
            // var_dump($getParmas);
            foreach($getParmas as $key => $value){
                $sql .= 'WHERE ' . $key . '=' . "'" . $value . "'" ;
            }
            return $this->db->query($sql);
        }
        return $this->db->query($sql);
        
    }


    public function getTasksByUser($userId){
        $getParmas = $GLOBALS['request']->get();
        $sql ='SELECT * FROM tasks  WHERE user_id=' . "'" . $userId['userId'] . "'"  ;
        if(!empty($getParmas)){
            // var_dump($getParmas);
            foreach($getParmas as $key => $value){
                $sql .= 'and ' . $key . '=' . "'" . $value . "'" ;
            }
            return $this->db->query($sql);
        }
        return $this->db->query($sql);


    }

    public function deleteTask(){
        $getParmas = $GLOBALS['request']->get();
        // $sql = "DELETE FROM tasks where task_id IN (" . implode(",", $getParmas['tasks_id']) . ");";
        $sql = "DELETE FROM tasks where task_id IN (" . $getParmas['tasks_id'] . ");";
        $this->db->query($sql);
        
    }

    public function addTask(){

        // $postParm = $GLOBALS['request']->post();
        // foreach($postParm as $key => $value ){
        //     if(in_array($key, ['id', 'taskId', 'task_id']))
        //     $task_id = $value ;
        //     if(in_array($key, ['sectionId', 'section' , 'section_id']))
        //     $section_id = $value ;
        //     if(in_array($key, ['date', 'doDate']))
        //     $doDate = $value;
        //     if(in_array($key, ['userId', 'user', 'user_id']))
        //     $user_id = $value;
            

        // }
        
        
        //     $done = $postParm['done'];
        //     $title = $postParm['title'];
        
        // // // $result = [];
        // // list('task_id' => $task_id ,'title' => $title, 'doDate' => $doDate, 'done' =>  $done, 'section_id' => $section_id, 'user_id' => $user_id) = $postParm;
        // // var_dump($task_id, $section_id);
        // $sql = "INSERT INTO `tasks`(`title`, `doDate`, `done`, `section_id`, `user_id`) VALUES ('"  . $title . '\',\'' . $doDate . '\',\'' . $done . '\',\'' . $section_id . '\',\'' . $user_id . "')" ;

        // $this->db->query($sql);
        // return $postParm;
    }

}