<?php

use MVC\Controller;

class ValidateAuthenticat extends Controller {

    public function validateAuth(){
        $model = $this->model('user');
        $valide = $model->validateToken();

        return $valide;
    }
}