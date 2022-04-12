<?php
use MVC\Controller;

class TaskController extends Controller {
    
    public function index($userId = null){

        $model = $this->model('Task');

        $userId = isset($userId['userId']) ?  $userId['userId'] : null ;

        $users = $model->getAllTasks();
        
        
        $data = ['data' => $users];
        $this->response->sendStatus(200);
        $this->response->setContent($data);
        
    }

    public function getByUser($userId){

        $model = $this->model('Task');
        
        $result =  $model->getTasksByUser($userId);
        
        $data = ['data' => $result];

        $this->response->sendStatus(200);
        $this->response->setContent($data);
    }
    
    
    public function delete(){

        $model = $this->model('Task');
        $model->deleteTask();
        $this->response->sendStatus(200);
        $this->response->setContent(['message' => 'the tasks has been deleted']);

    }

    public function add(){

        $model = $this->model('Task');
        $model->addTask();
        $this->response->sendStatus(200);
        // $this->response->setContent(['message' => 'the tasks has been added']);
    }
}
