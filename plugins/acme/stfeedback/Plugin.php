<?php namespace Acme\StFeedback;

use Backend;
use System\Classes\PluginBase;

/**
 * stFeedback Plugin Information File
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
            'name'        => 'stFeedback',
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
            'Acme\StFeedback\Components\FeedbackComponent' => 'FeedbackComponentList',
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
            'acme.stfeedback.some_permission' => [
                'tab' => 'stFeedback',
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
            'stfeedback' => [
                'label'       => 'stFeedback',
                'url'         => Backend::url('acme/stfeedback/feedback'),
                'icon'        => 'icon-leaf',
                'permissions' => ['acme.stfeedback.*'],
                'order'       => 500,
            ],
        ];
    }
}
