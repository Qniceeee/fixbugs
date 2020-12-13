<?php namespace Acme\StArticles\Components;

use Acme\StArticles\Models\Articles;
use Acme\StTags\Models\Tags;
use Cms\Classes\ComponentBase;
use Acme\StArticles\Components\ArticlesBuilder;

class ArticlePage extends ComponentBase
{
    public $article;

    public function componentDetails()
    {
        return [
            'name' => 'ArticlePage Component',
            'description' => 'Показывает отдельную страницу с категорией'
        ];
    }

    public function defineProperties()
    {
        return [];
    }

    public function onRun()
    {
        $slugName = $this->param('slug');
        /*
         * метод для вывода категории по slug
        сначала получаем id статьи и дальше через связи выводим конкретные статьи
        */
        $getArticleId = Articles::where('slug', '=', $slugName)
            ->get();
        foreach ($getArticleId as $item) {
            //нашли id статьи что бы валидировать ошибку
            $articleId = $item['id'];
        }
        if (isset($articleId)) {
            // получаем статью, ее категорию и теги
            $this->article = Articles::all()
                ->where('slug', "=", $slugName)
                ->whereIn('show_content', '1');
        } else {
            $this->article = null;
        }
    }
}

