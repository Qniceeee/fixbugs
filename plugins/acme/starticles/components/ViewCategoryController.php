<?php namespace Acme\StArticles\Components;

use Cms\Classes\ComponentBase;
use Acme\StArticles\Models\Category;

class ViewCategoryController extends ComponentBase
{
    public $category;
    public function componentDetails()
    {
        return [
            'name'        => 'ViewCategoryController Component',
            'description' => 'Отображает категории'
        ];
    }

    public function defineProperties()
    {
        return [];
    }
    public function onRun()
    {
        $this->category = Category::all()->where('show_content', "=", 1)->sortBy('sort_order');
    }
}
