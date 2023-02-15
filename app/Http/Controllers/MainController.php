<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

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

    public function goUpdate(Project $project){
        return view('pages.update', compact('project'));
    }

    public function goDelete(Project $project){
        $project->delete();
        return redirect()->route('admin.editor');
    }

    public function goCreate(){
        return view('pages.create');
    }

    public function store(Request $request){
        $data=$request->validate([
            'name'=> 'required|string|max:64',
            'description'=> 'string|max:300',
            'main_image'=> 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
            'release_date'=> 'date|required|before:today',
            'repo_link'=> 'string|required|max:250',
        ]);

        $img_path = Storage::put('uploads', $data['main_image']);
        $data['main_image'] = $img_path;

        $project = Project::make($data);

        $project->save();

        return redirect()->route('admin.editor');
    }

    public function save(Request $request, Project $project){
        $data=$request->validate([
            'name'=> 'required|string|max:64',
            'description'=> 'string|max:300',
            'main_image'=> 'image|mimes:jpg,png,jpeg,gif,svg|max:2048',
            'release_date'=> 'date|required|before:today',
            'repo_link'=> 'string|required|max:250',
        ]);
        
        $img_path = Storage::put('uploads', $data['main_image']);
        $data['main_image'] = $img_path;

        $project->update($data);

        $project->save();

        return redirect()->route('admin.editor');
    }
}
