<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Project;

class MainController extends Controller
{
    public function home(){
        $projects = Project::all();
        return view('pages.index', compact('projects'));
    }

    public function goEdit(){
        $projects = Project::all();
        return view('pages.editor', compact('projects'));
    }

    public function goUpdate(){
        $projects = Project::all();
        return view('pages.update', compact('projects'));
    }

    public function goDelete(Project $project){
        $project->delete();
        return redirect()->route('admin.editor');
    }

    public function goCreate(){
        $projects = Project::all();
        return view('pages.create', compact('projects'));
    }

    public function store(Request $request){
        $data=$request->validate([
            'name'=> 'required|string|max:64',
            'description'=> 'string|max:300',
            'main_image'=> 'required|string|max:250',
            'release_date'=> 'date|required|before:today',
            'repo_link'=> 'string|required|max:250',
        ]);

        $project = Project::make($data);

        $project->save();

        return redirect()->route('admin.editor');
    }
}
