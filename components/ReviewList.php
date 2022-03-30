<?php namespace Yamobile\Reviews\Components;

use Cms\Classes\ComponentBase;

class ReviewList extends ComponentBase {
   public function componentDetails() {
      return [
         'name'        => 'yamobile.reviews::lang.review_list.info.name',
         'description' => 'yamobile.reviews::lang.review_list.info.description'
      ];
   }

   public function defineProperties() {
      return [
         'items' => [
               'title'         => 'yamobile.reviews::lang.review_list.items.title',
               'description'   => 'yamobile.reviews::lang.review_list.items.description',
               'default'       => '30',
         ],
         'SortOrder' => [
               'title'         => 'yamobile.reviews::lang.review_list.sortorder.title',
               'description'   => 'yamobile.reviews::lang.review_list.sortorder.description',
               'type'          => 'dropdown',
               'options'       => [
                  'new'    => 'yamobile.reviews::lang.review_list.sortlist.new',
                  'old'    => 'yamobile.reviews::lang.review_list.sortlist.old'
               ],
               'default'       => 'new',
         ],
         'reviewstyle' => [
               'title'         => 'yamobile.reviews::lang.review_list.reviewstyle.title',
               'description'   => 'yamobile.reviews::lang.review_list.reviewstyle.description',
               'type'          => 'checkbox',
               'default'       => 1,
         ],
         'itemwidth' => [
               'title'         => 'yamobile.reviews::lang.review_list.itemwidth.title',
               'description'   => 'yamobile.reviews::lang.review_list.itemwidth.description',
               'type'          => 'checkbox',
               'default'       => 0,
         ]
      ];
   }

   public $reviews;
   public $width100;

   public function onRun() {
      if ($this->property('itemwidth')) {
         $this->width100 = true;
      }
      if ($this->property('reviewstyle')) {
         $this->addCss('assets/css/reviews-list.css');
      }
      $this->addCss('assets/css/lightzoom.css');
      if ($this->property('SortOrder') == 'new') {
         $this->reviews = \Yamobile\Reviews\Models\Review::
            where('spam', 0)
            ->where('publish', 1)
            ->orderBy('date', 'desc')
            ->paginate($this->property('items'));
      } elseif ($this->property('SortOrder') == 'old') {
         $this->reviews = \Yamobile\Reviews\Models\Review::
         where('spam', 0)
         ->where('publish', 1)
         ->orderBy('date', 'asc')
         ->paginate($this->property('items'));
      }
   }
}