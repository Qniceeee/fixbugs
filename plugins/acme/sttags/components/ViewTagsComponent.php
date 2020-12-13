<?php namespace Acme\StTags\Components;

use Acme\StTags\Models\Tags;
use Cms\Classes\ComponentBase;


class ViewTagsComponent extends ComponentBase
{
    public $tags;
    public function componentDetails()
    {
        return [
            'name'        => 'ViewTagsComponent Component',
            'description' => 'Выводит список тегов для статей'
        ];
    }

    public function defineProperties()
    {
        return [];
    }
        //при старте страницы отображает все теги
    public function onRun()
    {
        $this->tags = Tags::all()
            ->whereIn('show_content', 1);
    }
}
