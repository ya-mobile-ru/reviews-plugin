<?php namespace Yamobile\Reviews;

use Backend;
use System\Classes\PluginBase;

/**
 * Reviews Plugin Information File
 */
class Plugin extends PluginBase {
   public $require = [
      'Inetis.ListSwitch',
   ];

   /**
    * Returns information about this plugin.
    *
    * @return array
    */
   public function pluginDetails() {
      return [
         'name'        => 'yamobile.reviews::lang.plugin.details.name',
         'description' => 'yamobile.reviews::lang.plugin.details.description',
         'author'      => 'Yamobile',
         'icon'        => 'icon-comments'
      ];
   }

   /**
    * Register method, called when the plugin is first registered.
    *
    * @return void
    */
   public function register() {}

   /**
    * Boot method, called right before the request route.
    *
    * @return array
    */
   public function boot() {}

   /**
    * Registers any front-end components implemented in this plugin.
    *
    * @return array
    */
   public function registerComponents() {
      return [
         'Yamobile\Reviews\Components\ReviewForm' => 'ReviewForm',
         'Yamobile\Reviews\Components\ReviewList' => 'ReviewList'
      ];
   }

   /**
    * Registers any back-end permissions used by this plugin.
    *
    * @return array
    */
   public function registerPermissions() {
    return [
        'yamobile.gallery.access_reviews' => [
            'label' => 'yamobile.reviews::lang.permissions.reviews',
            'tab' => 'Reviews',
            'order' => 200,
            'roles' => [
                'developer',
                'publisher',
            ],
        ],
    ];
   }

   /**
    * Registers back-end navigation items for this plugin.
    *
    * @return array
    */
   public function registerNavigation() {
      return [
         'reviews' => [
               'label'       => 'yamobile.reviews::lang.plugin.menu.name',
               'url'         => Backend::url('yamobile/reviews/Reviews'),
               'icon'        => 'icon-comments',
               'permissions' => ['yamobile.reviews.*'],
               'order'       => 500,
         ],
      ];
   }
}
