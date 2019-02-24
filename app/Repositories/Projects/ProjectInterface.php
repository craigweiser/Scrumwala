<?php

namespace App\Repositories\Projects;

interface ProjectInterface 
{
    public function findProject($id);
    public function findProjectCategories();
}