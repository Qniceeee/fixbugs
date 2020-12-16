<?php namespace Acme\StArticles\Components;

use Cms\Classes\ComponentBase;
use Acme\StArticles\Models\Tags;

class ViewTagsComponent extends ComponentBase
{
    public $tags;
    public function componentDetails()
    {
        return [
            'name'        => 'ViewTagsComponent Component',
            'description' => 'отображает теги /tags'
        ];
    }

    public function defineProperties()
    {
        return [];
    }
    public function onRun()
    {
        $this->tags = Tags::all()
            ->whereIn('show_content', 1)
            ->sortBy('sort_order');
    }
}
