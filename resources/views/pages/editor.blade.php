@extends('layouts.main_layout')

@section('content')
    <a class="px-5" href="{{route('admin.project.create')}}">Create new project</a>
    <ul>
        @foreach ($projects as $project)
            <li>
                {{$project->name}} &nbsp; 
                <a href="{{route('admin.project.delete', $project)}}">X</a> &nbsp; 
                <a href="{{route('admin.project.edit', $project)}}">Edit</a>
            </li>
        @endforeach
    </ul>
@endsection