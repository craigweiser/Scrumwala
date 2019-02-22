<?php

namespace App\Repositories\Categories;

interface CategorieInterface {
    public function getAll();
    public function find($id);
    public function delete($id);
}