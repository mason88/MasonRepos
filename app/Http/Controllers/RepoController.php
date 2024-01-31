<?php

namespace App\Http\Controllers;

use App\Models\Repo;
use Illuminate\Http\Request;

class RepoController extends Controller
{
    /**
     * Display a listing of all repos.
     */
    public function index()
    {
        return view('index', ['repoData' => Repo::all()]);
    }

    /**
     * Refresh all repos in storage.
     */
    public function refresh(Request $request)
    {
        if (Repo::populate() === false) {
            return back()->with('error', 'Error encountered while downloading data from Github.');
        }

        return redirect('/');
    }

    /**
     * Display a specified repo.
     */
    public function show(int $id)
    {
        $repo = Repo::findOrFail($id);

        return view('show', ['repo' => $repo]);
    }
}
