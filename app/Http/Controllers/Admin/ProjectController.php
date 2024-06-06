<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Project;
use App\Http\Requests\Auth\StoreProjectRequest;
use Illuminate\Support\Facades\Storage;
use App\Models\Admin\Type;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $projects = Project::all();
        return view('admin.projects.index', compact('projects'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $types = Type::all();
        return view('admin.projects.create', compact('types'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProjectRequest $request, Project $project)
    {
        $form_data = $request->validated();
        $form_data['slug'] = Project::generateSlug(Project::class, $form_data['title']);
        if ($request->hasFile('image')) {
            //dd($request->image);
            //in realtà in questo caso la if non servirebbe perchè il campo screenshot è required, però la scrivo per fare la funzione nel caso generale
            $name = $request->image->getClientOriginalName();
            $path = Storage::putFileAs('project_screenshots', $request->image, $name);
            //il metodo putFileAs crea una cartella 'project_screenshots' in storage e salva l'immagine
            //il metodo poi ritorna il path, che andremo a salvare sul db, tabella projects nel campo image
            $form_data['screenshot'] = $path;
            //dd($form_data);
        }

        $project->create($form_data);
             return redirect()->route('admin.projects.index')->with('message', 'Nuovo progetto creato');

    }

    /**
     * Display the specified resource.
     */
    public function show(Project $project)
    {
        return view('admin.projects.show', compact('project'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Project $project)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreProjectRequest $request, Project $project)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Project $project)
    {
        //
    }
}
