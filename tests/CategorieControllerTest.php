<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class CategorieControllerTest extends TestCase
{
    use DatabaseMigrations;
    protected $user;

    public function testIndexWithNoCategories()
    {
        $this->initAuth();
        $projectId = 1;
        $this->visit('/categories/' . $projectId)
            ->see('Projects')
            ->see('Project Categories')
            ->see('not have any categories');
    }

    public function testIndexWithoutProject()
    {
        $this->initAuth();
        $this->visit('/categories')
            ->see('Projects')
            ->see('Project Categories')
            ->see('You have not selected a project');
    }

    public function testIndexWithAtLeastOneCategorie()
    {
        $this->initAuth();

        $project = factory(App\Project::class)->create([
            'user_id' => $this->user->id
        ]);
        $categorie = factory(App\Categorie::class)->create([
            'project_id' => $project->id
        ]);
        $response = $this->visit('/categories/' . $project->id)
            ->see($categorie->name);
    }

    private function initAuth()
    {
        Session::start();
        $this->user = factory(App\User::class)->create();
        $this->be($this->user); //You are now authenticated
    }
}
