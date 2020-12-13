<?php namespace Acme\StTags;

use Backend;
use System\Classes\PluginBase;

/**
 * stTags Plugin Information File
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
            'name'        => 'stTags',
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
            'Acme\StTags\Components\ViewTagsComponent' => 'ViewTagsComponentList',
            'Acme\StTags\Components\ViewTagPage' => 'ViewTagPageList',
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
            'acme.sttags.some_permission' => [
                'tab' => 'stTags',
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
            'sttags' => [
                'label'       => 'stTags',
                'url'         => Backend::url('acme/sttags/tags'),
                'icon'        => 'icon-leaf',
                'permissions' => ['acme.sttags.*'],
                'order'       => 500,
            ],
        ];
    }
}
