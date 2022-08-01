<?php

namespace App\Http\Controllers\API\V1;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Transformers\ArticleTransformer;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use League\Fractal\Pagination\IlluminatePaginatorAdapter;

class ArticleController extends Controller
{
    /**
     * @return JsonResponse
     */
    public function index(Request $request): JsonResponse
    {


        $article=Article::with(['author','menu'])
            ->select(['id','user_id','menu_id', 'title','summary', 'slug','content','featured_image','created_at'])
            ->latest()
            ->paginate();

        return fractal()
            ->collection($article,new ArticleTransformer(),'data')
            ->parseIncludes(request('include'))
            ->paginateWith(new IlluminatePaginatorAdapter($article))
            ->respond(200, [], JSON_PRETTY_PRINT);
    }

    /**
     * @param Request $request
     * @return JsonResponse
     */
    public function details(Request $request): JsonResponse
    {
        $request->validate([
            'article' => 'required|integer',
        ]);

        $article=Article::with(['author','menu'])
            ->findOrFail($request->article);

        return response()->json([
            'data' => $article,
        ], 200);

    }
}
