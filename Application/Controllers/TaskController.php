<?php
use MVC\Controller;

class TaskController extends Controller {

    public function index($userId = null){

        $model = $this->model('Task');

        $userId = isset($userId['userId']) ?  $userId['userId'] : null ;

        $users = $model->getAllTasks($userId);
        
        
        $data = ['data' => $users];

        $this->response->sendStatus(200);
        $this->response->setContent($data);
        
    }

    public function getTasksBySectionId($sectionId){
        $model = $this->model('Task');

        $model->db->query('SELECT * FROM tasks where section_id=' . "'" . $sectionId . ";");
    } 
}
