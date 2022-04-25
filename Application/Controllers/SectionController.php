<?php
use MVC\Controller;

class SectionController extends Controller {


    public function index($request){
        
        $model = $this->model('Section');
        if(isset($request['userId'])){
            $result = $model->sectionByUser($request['userId']);
        }
        else{

            $result = $model->AllSections($request);
        }

        $data = ['data' => $result];
        $this->response->sendStatus(200);
        $this->response->setContent($data);
    }

    
    public function create($request){
        $model = $this->model('Section');
        $model->addSection($request);
        $this->response->sendStatus(200);
       
        $this->response->setContent(['message' => 'ok']);
    }


    public function delete($request){

        $model = $this->model('Section');
        $model->deleteSection($request);
        $this->response->sendStatus(200);
    }

    public function update($request){

        $model = $this->model('Section');
        $result = $model->updateSection($request);
        $this->response->sendStatus(200);
        $this->response->setContent(['data' => $result]);
    }
}