<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('settings', function (Blueprint $table) {
            $table->increments('id');
            $table->string('site_name');
            $table->string('site_description')->nullable();
            $table->string('slogan')->nullable();
            $table->string('address');
            $table->string('email', 100)->nullable();
            $table->string('phone')->nullable();
            $table->string('owner_name')->nullable();
            $table->text('site_logo')->nullable();
            $table->text('site_favicon')->nullable();
            $table->text('social_link')->nullable();
            $table->text('social_sharing')->nullable();
            $table->text('contact_page')->nullable();
            $table->text('lang_settings')->nullable();
            $table->text('analytics_code')->nullable();
            $table->text('alexa_code')->nullable();
            $table->text('footer_text')->nullable();
            $table->text('footer_logo')->nullable();
            $table->string('theme')->default("bg-default");
            $table->string('vat_no')->nullable();
            $table->string('currency_code')->nullable();
            $table->integer('alert_quantity')->nullable();
            $table->boolean('enable_purchaser')->default(1);
            $table->boolean('enable_customer')->default(1);
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
        Schema::dropIfExists('settings');
    }
}
