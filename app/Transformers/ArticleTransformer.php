<?php

namespace App\Transformers;

use App\Models\Article;
use Illuminate\Support\Str;
use League\Fractal\Resource\Item;
use League\Fractal\TransformerAbstract;

class ArticleTransformer extends TransformerAbstract
{

    /**
     * List of resources possible to include
     *
     * @var array
     */
    protected array $availableIncludes = ['author','menu'];

    /**
     * A Fractal transformer.
     *
     * @return array
     */
    public function transform(Article $article)
    {
        return [
            'id' => $article->id,
            'title' => $article->title,
            'slug' => $article->slug,
            'summary' => Str::words($article->summary, 15),
            'content' => $article->content,
            'featured_image' => $article->featured_image,
            'ago' => $article->created_at->DiffForHumans(),
        ];
    }

    /**
     * @param Article $article
     * @return Item
     */
    public function includeAuthor(Article $article): Item
    {
        return $this->item($article->author,function ($user){
            return [
                'id' => $user->id,
                'name' => $user->name,
                'email' => $user->email,
            ];
        },'include');
    }

    public function includeMenu(Article $article): Item
    {
        return $this->item($article->menu,function ($menu){
            return [
                'id' => $menu->id,
                'name' => $menu->name,
                'slug' => $menu->slug,
                'icon' => $menu->icon,
            ];
        },'include');
    }
}


