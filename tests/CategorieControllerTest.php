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
        $project = factory(App\Project::class)->create([
            'user_id' => $this->user->id
        ]);
        $this->visit('/categories/' . $project->id)
            ->see('Projects')
            ->see('Categories for ' . $project->name)
            ->see('not have any categories')
            ->click('add categorie')
            ->seePageIs('/categories/create/'.$project->id);
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

    public function testCreateCategorie()
    {
        $this->initAuth();
        $project = factory(App\Project::class)->create([
            'user_id' => $this->user->id
        ]);
        $this->visit('/categories/create/' . $project->id)
            ->see('Create a Categorie')
            ->see('Create Categorie')
            ->see('project_id')
            ->see($project->id)
            ->see('name')
            ->see('description')
            ->see('color');
    }

    public function testCreatingCategorie()
    {
        $this->initAuth();
        $project = factory(App\Project::class)->create([
            'user_id' => $this->user->id
        ]);
        $categorie = factory(App\Categorie::class)->make([
            'project_id' => $project->id
        ]);
        $this->post('/categories', $categorie->toArray());
        $this->seeInDatabase('categories', $categorie->toArray());
    }

    private function initAuth()
    {
        Session::start();
        $this->user = factory(App\User::class)->create();
        $this->be($this->user); //You are now authenticated
    }
}
