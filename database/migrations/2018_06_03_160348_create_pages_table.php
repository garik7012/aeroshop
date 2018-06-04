<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->increments('id');
            $table->string('url')->unique();
            $table->string('images')->nullable();
        });

        Schema::create('page_lang', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('page_id');
            $table->string('locale');
            $table->string('title')->default('');
            $table->text('description');
            $table->string('seo_title')->default('');
            $table->string('seo_description')->default('');
            $table->string('keywords', 750)->default('');

            $table->foreign('page_id')
                ->references('id')
                ->on('pages')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('page_lang');
        Schema::dropIfExists('pages');
    }
}
