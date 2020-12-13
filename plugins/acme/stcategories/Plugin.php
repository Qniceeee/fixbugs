<?php namespace Acme\StCategories;

use Backend;
use System\Classes\PluginBase;

/**
 * stCategories Plugin Information File
 */
class Plugin extends PluginBase
{
    /**
     * Returns information about this plugin.
     *
     * @return array
     */
    public function pluginDetails()
    {
        return [
            'name'        => 'stCategories',
            'description' => 'No description provided yet...',
            'author'      => 'Acme',
            'icon'        => 'icon-leaf'
        ];
    }

    /**
     * Register method, called when the plugin is first registered.
     *
     * @return void
     */
    public function register()
    {

    }

    /**
     * Boot method, called right before the request route.
     *
     * @return array
     */
    public function boot()
    {

    }

    /**
     * Registers any front-end components implemented in this plugin.
     *
     * @return array
     */
    public function registerComponents()
    {

        return [
            'Acme\StCategories\Components\ViewCategoryController' => 'ViewCategoryControllerList',
            'Acme\StCategories\Components\CategoryNavigationPage' => 'CategoryNavigationPageList',
        ];
    }

    /**
     * Registers any back-end permissions used by this plugin.
     *
     * @return array
     */
    public function registerPermissions()
    {
        return []; // Remove this line to activate

        return [
            'acme.stcategories.some_permission' => [
                'tab' => 'stCategories',
                'label' => 'Some permission'
            ],
        ];
    }

    /**
     * Registers back-end navigation items for this plugin.
     *
     * @return array
     */
    public function registerNavigation()
    {


        return [
            'stcategories' => [
                'label'       => 'stCategories',
                'url'         => Backend::url('acme/stcategories/categories'),
                'icon'        => 'icon-leaf',
                'permissions' => ['acme.stcategories.*'],
                'order'       => 500,
            ],
        ];
    }
}
