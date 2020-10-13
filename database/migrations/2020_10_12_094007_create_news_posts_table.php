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
            $table->string('sub_title');
            $table->text('content');
            $table->string('image');
            $table->string('img_caption');
            $table->string('video_url');
            $table->string('video_caption');
            $table->string('reporter_name');
            $table->integer('is_latest')->default(0);
            $table->string('post_by')->nullable();
            $table->string('update_by')->nullable();
            $table->integer('view_count')->default(0);
            $table->timestamp('published_at')->index();
            $table->timestamp('updated_at')->index();
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
    {
        Schema::dropIfExists('news_posts');
    }
}
