<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Repositories\Categories\CategorieInterface as CategorieInterface;
use App\Repositories\Projects\ProjectInterface as ProjectInterface;

class CategorieController extends Controller
{
    protected $categorie;
    protected $project;

    /**
     * Constructor
     */
    public function __construct(CategorieInterface $categorie, ProjectInterface $project)
    {
        $this->middleware('auth');
        $this->categorie = $categorie;
        $this->project = $project;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('categories.noproject');
    }

    public function projectCategories($projectId)
    {
        $currentProject = $this->project->findProject($projectId);
        $categories = $currentProject->findProjectCategories();
        return view('categories.index', ['project' => $currentProject, 'categories' => $categories]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    public function createProjectCategorie($id)
    {
        $project = $this->project->findProject($id);
        return view('categories.create', ['project' => $project]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $categorie = new \App\Categorie($request->all());
        $categorieProject = $this->project->findProject($request->project_id);
        $categorieProject->categories()->save($categorie);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
