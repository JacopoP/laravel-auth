@extends('layouts.main_layout')

@section('content')
    <form action="{{route('admin.project.store')}}" method="POST" enctype="multipart/form-data">
        @csrf
        <label class="label-control" for="name">Name</label>
        <input type="text" class="form-control" name="name">

        <label class="label-control" for="description">Description</label>
        <textarea name="description" class="form-control" cols="30" rows="10"></textarea>

        <label class="label-control" for="main_image">Image</label>
        <input type="file" class="form-control" name="main_image">

        <label class="label-control" for="release_date">Release date</label>
        <input type="date" class="form-control" name="release_date">

        <label class="label-control" for="repo_link">Repository link</label>
        <input type="text" class="form-control" name="repo_link">

        <input type="submit" value="SAVE NEW PROJECT">
    </form>
@endsection