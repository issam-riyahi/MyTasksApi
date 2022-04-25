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

    // public function login(){
    //     $model = $this->model('User');
    //     $result = $model->userLogin();

    //     if(empty($result)){
    //         $this->response->sendStatus(404);
    //     }
    //     else{

    //         $data = ['data' => $result];
    //         $this->response->sendStatus(200);
    //         $this->response->setContent($data);
    //     }
    // }

    public function create($request){
        $model = $this->model('User');
        $status = $model->userRegister($request);
        if($status){
            $this->response->sendStatus(200);
            $this->response->setContent(['message' => 'the User has been added']);
        }
        else {
            // $this->response->sendStatus(404);
            header("HTTP/1.1 209 user Alredy exist");
            $this->response->setContent(['message' => 'the User already exist']);
        }
    }


    // public function auth(){
    //     $model = $this->model('User');
    //     return  $model->authenticat();

        
    // }


    public function getUserById($userId){
        $model = $this->model('User');

        return $model->userById($userId);
    }
}