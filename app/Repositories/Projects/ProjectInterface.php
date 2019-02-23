<?php

namespace App\Repositories\Projects;

interface ProjectInterface 
{
    public function findProjectWithCategories($id);
}