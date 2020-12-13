<?php namespace Acme\StCategories\FormWidgets;

use Backend\Classes\FormWidgetBase;

/**
 * Tagbox Form Widget
 */
class Tagbox extends FormWidgetBase
{
    /**
     * @inheritDoc
     */
    protected $defaultAlias = 'acme_stcategories_tagbox';

    /**
     * @inheritDoc
     */
    public function init()
    {
    }

    /**
     * @inheritDoc
     */
    public function render()
    {
        $this->prepareVars();
        return $this->makePartial('tagbox');
    }

    /**
     * Prepares the form widget view data
     */
    public function prepareVars()
    {
        $this->vars['name'] = $this->formField->getName();
        $this->vars['value'] = $this->getLoadValue();
        $this->vars['model'] = $this->model;
    }

    /**
     * @inheritDoc
     */
    public function loadAssets()
    {
        $this->addCss('css/tagbox.css', 'Acme.StCategories');
        $this->addJs('js/tagbox.js', 'Acme.StCategories');
    }

    /**
     * @inheritDoc
     */
    public function getSaveValue($value)
    {
        return $value;
    }
}
