@extends('layouts.main_layout')

@section('content')
    @foreach ($projects as $project)
        <section class="px-5">
            <h2>{{$project->name}}</h2>
            <img src="{{$project->main_image}}" alt="">
            <p>{{$project->description}}</p>
            <div>Release date: {{$project->release_date}}</div>
            <h5>Repository link: <a href="{{$project->repo_link}}">link</a></h5>
        </section>
    @endforeach
@endsection