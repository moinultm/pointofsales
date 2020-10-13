<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pages', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('page_slug');
            $table->longText('description');
            $table->string('image');
            `video_url` varchar(100) DEFAULT NULL,
  `publishar_id` int(11) DEFAULT NULL,
  `seo_keyword` text,
  `seo_description` text,
  `publish_date` datetime DEFAULT NULL,
  `reader_view` int(11) DEFAULT NULL,
  `releted_id` varchar(255) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT '1'
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pages');
    }
}
