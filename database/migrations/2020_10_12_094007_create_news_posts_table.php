<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNewsPostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('news_posts', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->string('title');
            $table->string('title_color')->nullable();
            $table->string('sub_title')->nullable();
            $table->text('content');
            $table->string('image');
            $table->string('img_caption')->nullable();
            $table->string('video_url')->nullable();
            $table->string('video_caption')->nullable();
            $table->string('reporter_name')->nullable()->nullable();
            $table->integer('is_latest')->default(0);
            $table->string('post_by')->nullable();
            $table->string('update_by')->nullable();
            $table->integer('view_count')->default(0);

            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {        Schema::dropIfExists('news_posts');
    }
}
