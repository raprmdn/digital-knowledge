<?php

namespace App\Repositories;

interface BaseRepositoryInterface {

    public function findAll();
    public function findById($id);
    public function saveData($attribute);
    public function updateData($model, $attribute);
    public function deleteData($model);

}