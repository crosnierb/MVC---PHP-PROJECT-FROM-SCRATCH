<?php

class ArticlesController extends AppController {

    $params = array();

    public function __construct($params) {

        $this->params = $params;
    }

    public function view() {

        if (isset($this->params['id']))
            $articles = $this->model->new($this->params['id']);
        else
            $articles = $this->model->new();
    }
}