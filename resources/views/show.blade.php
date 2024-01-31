@extends('layouts.app')

@section('title', 'Detail for ' . $repo->name)

@section('content')
    <div>
        <a type="button" class="button" href="/">Back</a>
    </div>

    <div class="field">
        <div class="field-name">ID</div>
        <div class="field-value">{{ $repo->gh_repo_id }}</div>
    </div>
    <div class="field">
        <div class="field-name">Name</div>
        <div class="field-value">{{ $repo->name }}</div>
    </div>
    <div class="field">
        <div class="field-name">URL</div>
        <div class="field-value">{{ $repo->url }}</div>
    </div>
    <div class="field">
        <div class="field-name">Description</div>
        <div class="field-value">{{ $repo->description }}</div>
    </div>
    <div class="field">
        <div class="field-name">Stars</div>
        <div class="field-value">{{ $repo->stars_num }}</div>
    </div>
    <div class="field">
        <div class="field-name">Created On</div>
        <div class="field-value">{{ $repo->repo_created }}</div>
    </div>
    <div class="field">
        <div class="field-name">Last Pushed On</div>
        <div class="field-value">{{ $repo->repo_last_pushed }}</div>
    </div>
@endsection