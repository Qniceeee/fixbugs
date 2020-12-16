<?php namespace Acme\StArticles\Components;

use Acme\StArticles\Models\Articles;
use Acme\StArticles\Models\Category;
use Acme\StArticles\Models\Tags;
use Cms\Classes\ComponentBase;

class ArticlesBuilder extends ComponentBase
{
    //public $tags;
    public $articles;
    public $categories;
    public function componentDetails()
    {
        return [
            'name'        => 'ArticlesBuilder Component',
            'description' => 'Показывает список статей'
        ];
    }

    public function defineProperties()
    {
        return [];
    }

    public function onRun()
    {
        $this->articles = Articles::all()->sortByDesc('id')->where('show_content', "=", 1);
    }
}
