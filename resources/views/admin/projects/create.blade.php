@extends('layouts.app')
@section('content')

<section class="container">

<form action="{{route('admin.projects.store')}}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="title" class="form-label">Inserisci un titolo</label>
            <input type="text" class="form-control @error('title') is-invalid @enderror " id="title" aria-describedby="titleHelp" name="title" value="{{ old(' title') }}" >
            @error('title')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
          </div>

          <div class="mb-3">
            <label for="description" class="form-label">Inserisci una descrizione</label>
            <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description" rows="3">{{ old('description') }}</textarea>
            @error('description')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
          </div>

          <div class="mb-3">
            <label for="screenshot" class="form-label">Inserisci un screenshot</label>
            <input type="image" class="form-control @error('screenshot') is-invalid @enderror " id="screenshot" aria-describedby="screenshotHelp" name="screenshot" value="{{ old('screenshot') }}" >
            @error('screenshot')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
          </div>

          <div class="mb-3">
            <label for="link_github" class="form-label">Inserisci un link github</label>
            <input type="text" class="form-control @error('link_github') is-invalid @enderror " id="link_github" aria-describedby="link_githubHelp" name="link_github" value="{{ old('link_github') }}" >
            @error('link_github')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror   
          </div>

          <div class="mb-3">
            <label for="link_website" class="form-label @error('link_website') is-invalid @enderror" id="link_website" aria-describedby="link_websiteHelp">Inserisci un link website</label>
            <input type="text" class="form-control" id="link_website" aria-describedby="link_websiteHelp" name="link_website" value="{{ old('link_website') }}" >
            @error('link_website')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
          </div>

          <button type="submit" class="btn btn-primary">Crea</button>
          <button type="reset" class="btn btn-secondary">Cancella</button>
</form>
            


</section>
@endsection