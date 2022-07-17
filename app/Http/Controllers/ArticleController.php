<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Inertia\Response;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index(): Response
    {
        return Inertia::render('Articles/Index',[
                'articles'=>clock(Article::with(['author','menu'])
                    ->when(request('phrase'),function($query){
                        return $query->where('title','like','%'.request('phrase').'%');
                    })
                    ->orderBy('id','desc')
                    ->paginate(10)
                    ->through(function($article){
                        return [
                            'id'=>$article->id,
                            'title'=>$article->title,
                            'slug'=>$article->slug,
                            'status'=>$article->status,
                            'menu'=>$article->menu->name,
                            'created_at'=>$article->created_at->DiffForHumans(),
                            'updated_at'=>$article->updated_at,
                        ];
                    })),
            ]

        );



    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Article  $article
     * @return Response
     */
    public function show(Article $article)
    {
        return Inertia::render('Articles/Show',[
            'article'=>[
                'id'=>$article->id,
                'title'=>$article->title,
                'slug'=>$article->slug,
                'status'=>$article->status,
                'summary'=>$article->summary,
                'content'=>$article->content,
                'featured_image'=>$article->featured_image,
                'menu'=>$article->menu->name,
                'author'=>$article->author->name,
                'created_at'=>$article->created_at->DiffForHumans(),
                'updated_at'=>$article->updated_at,
            ],
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function edit(Article $article)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Article $article)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Article $article)
    {
        $article->delete();
        return redirect()->route('article.index');
    }
}
