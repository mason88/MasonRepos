@extends('layouts.app')

@section('title', 'Popular PHP Repositories on GitHub')

@section('content')

    @if (session('error'))
        <div class="error">
            {{ session('error') }}
        </div>
    @endif

    <div>
        <a type="button" class="button" href="/repo/refresh">Refresh List</a>
    </div>

    <table id="repoTable" class="table-fill">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>URL</th>
                <th>Description</th>
                <th>Stars</th>
                <th>Created</th>
                <th>Last Pushed</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($repoData as $repo)
                <tr>
                    <td>{{ $repo->gh_repo_id }}</td>
                    <td><a href="/repo/show/{{ $repo->id }}">{{ $repo->name }}</a></td>
                    <td>{{ $repo->url }}</td>
                    <td>{{ $repo->description }}</td>
                    <td>{{ $repo->stars_num }}</td>
                    <td>{{ $repo->repo_created }}</td>
                    <td>{{ $repo->repo_last_pushed }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

@endsection