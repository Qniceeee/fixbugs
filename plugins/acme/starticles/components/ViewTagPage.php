<?php namespace Acme\StArticles\Components;

use Cms\Classes\ComponentBase;
use Acme\StArticles\Models\Tags;

class ViewTagPage extends ComponentBase
{
    public $articlesTags;
    public function componentDetails()
    {
        return [
            'name'        => 'ViewTagPage Component',
            'description' => 'Отображает статьи конкретного тега /tags/name'
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
         * метод для вывода тега по slug
        сначала получаем id тега и дальше через связи выводим конкретные статьи
        */
        $tagsArray = Tags::where('slug', '=', $slugName)
            ->get();
        foreach ($tagsArray as $item) {
            $articleId = $item['id'];
        }
        if (isset($articleId)) {
            $this->articlesTags = Tags::find($articleId)
                ->article()
                ->orderBy('id')
                ->get()
                ->whereIn('show_content', 1);
        }else {
            $this->articlesTags = null;
        }
    }
}
