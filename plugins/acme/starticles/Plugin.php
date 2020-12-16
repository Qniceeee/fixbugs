<?php namespace Acme\StArticles;

use Backend;
use System\Classes\PluginBase;

/**
 * stArticles Plugin Information File
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
            'name'        => 'stArticles',
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
            'Acme\StArticles\Components\ArticlesBuilder' => 'ArticlesBuilderList',
            'Acme\StArticles\Components\ArticlePage' => 'ArticlePageList',
            'Acme\StArticles\Components\PaginArticlesPage' => 'PaginArticlesPageList',
            'Acme\StArticles\Components\ViewTagsComponent' => 'ViewTagsComponentList',
            'Acme\StArticles\Components\ViewTagPage' => 'ViewTagPageList',
            'Acme\StArticles\Components\ViewCategoryController' => 'ViewCategoryControllerList',
            'Acme\StArticles\Components\CategoryNavigationPage' => 'CategoryNavigationPageList',
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
            'acme.starticles.some_permission' => [
                'tab' => 'stArticles',
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
            'starticles' => [
                'label'       => 'stArticles',
                'url'         => Backend::url('acme/starticles/articles'),
                'icon'        => 'icon-leaf',
                'permissions' => ['acme.starticles.*'],
                'order'       => 500,
            ],

        ];
    }
}
