<?php

namespace App\Repositories\Projects;

use App\Repositories\Projects\ProjectInterface as ProjectInterface;
use App\Project;

class ProjectRepository implements ProjectInterface
{
    public $project;

    public function __construct(Project $project)
    {
        $this->project = $project;
    }

    public function findProject($id)
    {
        return $this->project->findProject($id);
    }

    public function findProjectCategories()
    {
        return $this->project->findProjectCategories();
    } 
    
}
