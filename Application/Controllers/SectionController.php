<?php
use MVC\Controller;

class SectionController extends Controller {


    public function index($userId = null){

        $model = $this->model('Section');
        if(isset($userId['userId'])){
            $result = $model->sectionByUser($userId['userId']);
        }
        else{

            $result = $model->AllSections();
        }

        $data = ['data' => $result];
        $this->response->sendStatus(200);
        $this->response->setContent($data);
    }

    
    public function create(){
        $model = $this->model('Section');
        $model->addSection();
        $this->response->sendStatus(200);
       
        $this->response->setContent(['message' => 'ok']);
    }


    public function delete(){

        $model = $this->model('Section');
        $model->deleteSection();
        $this->response->sendStatus(200);
    }

    public function update(){

        $model = $this->model('Section');
        $result = $model->updateSection();
        $this->response->sendStatus(200);
        $this->response->setContent(['data' => $result]);
    }
}