<?php
use MVC\Controller;

class UserController extends Controller {


    public function index(){
        
        $model = $this->model('User');
        $result = $model->AllUsers();

        $data = ['data' => $result];
        $this->response->sendStatus(200);
        $this->response->setContent($data);
    }

    public function ByUser($userId){
        $model = $this->model('User');
        $result = $model->getUser($userId);

        $data = ['data' => $result];
        $this->response->sendStatus(200);
        $this->response->setContent($data);
    }

    public function create($request){
        
    }
}