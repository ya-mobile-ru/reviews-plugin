<?php namespace Yamobile\Reviews\Updates;

use Schema;
use October\Rain\Database\Schema\Blueprint;
use October\Rain\Database\Updates\Migration;

class CreateReviewsTable extends Migration {
   public function up() {
      Schema::create('yamobile_reviews_list', function (Blueprint $table) {
         $table->engine = 'InnoDB';
         $table->increments('id');
         $table->string('name');
         $table->string('contacts')->nullable();
         $table->string('rating');
         $table->string('date')->nullable();
         $table->text('text');
         $table->text('reply')->nullable();
         $table->boolean('unread')->nullable();
         $table->boolean('spam')->default(0);
         $table->boolean('publish')->nullable();
         $table->timestamps();
      });
   }

   public function down() {
      Schema::dropIfExists('yamobile_reviews_list');
   }
}
