<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class PostController extends Controller
{
    use AuthorizesRequests;

    public function index()
    {
        $posts = Post::all();
        $this->authorize('viewAny', Post::class);
        return view('posts',compact('posts'));
    }
    public function show(Post $post)
    {
        $this->authorize('view', $post);
        echo 'show any data available';
    }

    public function create()
    {
        $this->authorize('create', Post::class);
        echo 'create data';
    }

    public function edit(Request $request, Post $post)
    {
        $this->authorize('update', $post);
        // if(Gate::allows('edit-post', $post)) {
        //     abort(403);
        // }
        echo"update data" ;
    }

    public function update(Request $request, Post $post)
    {
        $this->authorize('update', $post);
        echo"update data" ;
    }

    public function delete(Post $post)
    {
        $this->authorize('delete', $post);
        echo "delete data";
    }
}
