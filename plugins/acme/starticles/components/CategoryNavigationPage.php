<?php namespace Acme\StArticles\Components;

use Cms\Classes\ComponentBase;
use Acme\StArticles\Models\Category;

class CategoryNavigationPage extends ComponentBase
{
    public $articlesSlug;
    public $getCategoryId;
    public $tags;
    public function componentDetails()
    {
        return [
            'name'        => 'CategoryNavigationPage Component',
            'description' => 'выводит все статьи категории'
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
        сначала получаем id категории и дальше через связи выводим конкретные статьи
        */
        $this->getCategoryId = Category::where('slug', '=', $slugName)->get();
        $categoryArray = $this->getCategoryId;
        foreach ($categoryArray as $item) {
            $categoryId = $item['id'];
        }
        if (isset($categoryId)) {
            $this->articlesSlug = Category::find($categoryId)
                ->articles
                ->whereIn('show_content', 1);

        }else {
            $this->articlesSlug = [$errors =['error'=>'Категория ' . $slugName . ' не найдена']];
        }
    }
}
