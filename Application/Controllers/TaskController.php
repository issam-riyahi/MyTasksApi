<?php
use MVC\Controller;

class TaskController extends Controller {
    
    public function index($request){

        $model = $this->model('Task');

        // $userId = isset($userId['userId']) ?  $userId['userId'] : null ;

        $users = $model->getAllTasks($request);
        
        
        $data = ['data' => $users];
        $this->response->sendStatus(200);
        $this->response->setContent($data);
        
    }

    public function getByUser($request){

        $model = $this->model('Task');
        
        $result =  $model->getTasksByUser($request);
        
        $data = ['data' => $result];

        $this->response->sendStatus(200);
        $this->response->setContent($data);
    }
    
    
    public function delete($request){

        $model = $this->model('Task');
        $model->deleteTask($request);
        $this->response->sendStatus(200);
        $this->response->setContent(['message' => 'the tasks has been deleted']);

    }

    public function add($request){

        $model = $this->model('Task');
        $data =  $model->addTask($request);
        // $this->response->sendStatus(200);
        // $this->response->setHeader('Content-Type: application/json; charset=UTF-8');
        // $this->response->setContent(['data' => $data ]);
    }

    public function create($request){
        $model = $this->model('Task');
        $model->addTask($request);
        $this->response->sendStatus(200);
    }

    public function update($request){
        $model = $this->model('Task');
        $model->UpdateTask($request);
        $this->response->sendStatus(200);
        $this->response->setContent(['message' => 'ok']);
    }
}
