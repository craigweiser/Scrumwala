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

    public function findProjectWithCategories($id)
    {
        return $this->project->findProjectWithCategories($id);
    } 
    
}
