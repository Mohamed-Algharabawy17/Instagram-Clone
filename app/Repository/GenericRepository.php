<?php

use Illuminate\Database\Eloquent\Model;
class GenericRepository implements RepositoryInterface
{
    protected $model;

    public function __construct(Model $model){
        $this->model = $model;
    }
    public function find(){
        return $this->model->all();
    }

}