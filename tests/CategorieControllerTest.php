<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class CategorieControllerTest extends TestCase
{
    use DatabaseMigrations;
    /**
     * Test for CategorieController
     *
     * @return void
     */
    public function testIndexWithNoCategories()
    {
        $this->initAuth();
        $this->visit('/categories')
            ->see('Projects')
            ->see('Project Categories')
            ->see('not have any categories');
    }

    public function testIndexWithAtLeastOneCategorie()
    {
        $this->initAuth();
        $response = $this->call('GET', '/categories');
        $this->assertViewHas('categories');
        $categories = $response->getOriginalContent()->getData()['categories'];
        $this->assertInstanceOf('Illuminate\Database\Eloquent\Collection', $categories);    
    }

    private function initAuth()
    {
        Session::start();
        $user = new \App\User(['name' => 'Craig']);
        $this->be($user); //You are now authenticated
    }
}
