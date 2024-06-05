@extends('layouts.app')
@section('content')
<section class="container">
    <h1>{{ $project->title }}</h1>
    <p>{{ $project->description }}</p>
    <div >
        <img class="w-75" src="{{asset('storage/' . $project->screenshot)}}" alt="">
    </div>    
</section>
@endsection