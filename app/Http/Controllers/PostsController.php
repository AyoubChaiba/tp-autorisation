<?php

namespace App\Http\Controllers;
use App\Models\posts;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class PostsController extends Controller
{
    use AuthorizesRequests;

    public function index()
    {
        $posts = posts::all();
        $this->authorize('viewAny', posts::class);
        return view('posts',compact('posts'));
    }
    public function show(posts $posts)
    {
        $this->authorize('view', $posts);
        echo 'show any data available';
    }

    public function create()
    {
        $this->authorize('create', posts::class);
        echo 'create data';
    }

    public function edit(Request $request, posts $posts)
    {
        $this->authorize('update', $posts);
        if(Gate::allows('edit-posts', $posts)) {
            abort(403);
        }
        echo"update data" ;
    }

    public function update(Request $request, posts $posts)
    {
        $this->authorize('update', $posts);
        echo"update data" ;
    }

    public function delete(posts $posts)
    {
        $this->authorize('delete', $posts);
        echo "delete data";
    }
}
