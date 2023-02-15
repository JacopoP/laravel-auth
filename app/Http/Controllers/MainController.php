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
}
