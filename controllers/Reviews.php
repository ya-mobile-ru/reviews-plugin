<?php namespace Yamobile\Reviews\Controllers;

use BackendMenu;
use Backend\Classes\Controller;
use Yamobile\Reviews\Models\Review;

/**
 * Reviews Back-end Controller
 */
class Reviews extends Controller
{
   public $implement = [
      'Backend.Behaviors.FormController',
      'Backend.Behaviors.ListController'
   ];

   public $formConfig = 'config_form.yaml';
   public $listConfig = 'config_list.yaml';

   public function __construct() {
      parent::__construct();
      BackendMenu::setContext('Yamobile.Reviews', 'reviews', 'reviews');
   }

   public function update($recordId) {
        $record = Review::find($recordId);
        $record->unread = false;
        $record->save();
        $this->vars['record'] = $record;
        return $this->asExtension('FormController')->update($recordId);
   }

   public $requiredPermissions = ['yamobile.reviews.access_reviews'];
}