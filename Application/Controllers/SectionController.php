<?php
use MVC\Controller;

class SectionController extends Controller {


    public function index(){
        
        $model = $this->model('Section');
        $result = $model->AllSections();

        $data = ['data' => $result];
        $this->response->sendStatus(200);
        $this->response->setContent($data);
    }
}