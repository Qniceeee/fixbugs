<?php namespace Acme\StArticles\Components;

use Acme\StArticles\Models\Articles;
use Acme\StArticles\Models\Category;
use Acme\StArticles\Models\Tags;
use Cms\Classes\ComponentBase;
use Illuminate\Pagination\Paginator;

class PaginArticlesPage extends ComponentBase
{
    public $cat;
    public $articles;
    public function componentDetails()
    {
        return [
            'name'        => 'PaginArticlesPage Component',
            'description' => 'Отображает 3 последние новые статьи'
        ];
    }

    public function defineProperties()
    {
        return [];
    }
    public function onRun()
    {
        $articlesFirstNew = Articles::all()->where('show_content', "=", 1)->sortByDesc('id');
        $paginated = new Paginator($articlesFirstNew, 3);
        $this->articles = $paginated;
    }
}
