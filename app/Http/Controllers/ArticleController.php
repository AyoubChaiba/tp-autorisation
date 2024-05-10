<?php

namespace App\Http\Controllers;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Policies\ArticlePolicy;
use Illuminate\Support\Facades\Auth;

class ArticleController extends Controller
{
    use AuthorizesRequests;

    public function index()
{
    $this->authorize('viewAny', Article::class);
    echo 'ALL data available';
}
    public function show(Article $article)
    {
        $this->authorize('view', $article);
        echo 'show any data available';
    }

    public function create()
    {
        $this->authorize('create', Article::class);
        echo 'create data';
    }

    public function edit(Request $request, Article $article)
    {
        $this->authorize('update', $article);
        if(Gate::allows('edit-article', $article)) {
            abort(403);
        }
        echo"update data" ;
    }

    public function update(Request $request, Article $article)
    {
        $this->authorize('update', $article);
        echo"update data" ;
    }

    public function delete(Article $article)
    {
        $this->authorize('delete', $article);
        echo "delete data";
    }
}
