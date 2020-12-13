<?php namespace Acme\StCategories\Components;

use Cms\Classes\ComponentBase;
use Acme\StCategories\Models\Category;
use Acme\StArticles\Models\Articles;

class ViewCategoryController extends ComponentBase
{
    public $articles;
    public $category;
    public function componentDetails()
    {
        return [
            'name'        => 'viewCategoryController Component',
            'description' => 'Показыват список категорий'
        ];
    }

    public function defineProperties()
    {
        return [];
    }

    public function onRun()
    {
        $this->category = Category::all()->where('show_content', "=", 1);
    }
}
