<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->increments('id');
            $table->string('code')->default('');
            $table->string('url')->unique();
            $table->string('ru_title');
            $table->string('en_title');
            $table->string('uk_title');
            $table->string('youtube')->nullable();
            $table->integer('price');
            $table->integer('old_price')->nullable();
            $table->string('currency')->default('UAH');
            $table->integer('brand_id')->nullable();
            $table->integer('category_id')->default(1);
            $table->integer('country_id')->nullable();
            $table->integer('unit_id')->default(1);
            $table->integer('availability_id')->default(1);
            $table->boolean('is_active')->default(1);
            $table->boolean('is_featured')->default(0);
        });

        Schema::create('product_lang_properties', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('product_id');
            $table->string('key_id');
            $table->string('unit_id')->default('');
            $table->string('ru_value')->default('');
            $table->string('en_value')->default('');
            $table->string('uk_value')->default('');

            $table->foreign('product_id')
                ->references('id')
                ->on('products')
                ->onDelete('cascade');
        });

        Schema::create('product_page_lang', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('product_id');
            $table->string('locale');
            $table->text('description');
            $table->string('title')->default('');
            $table->string('keywords', 750)->default('');
            $table->string('seo_description')->default('');

            $table->foreign('product_id')
                ->references('id')
                ->on('products')
                ->onDelete('cascade');
        });

        Schema::create('product_images', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('product_id');
            $table->string('url');
            $table->boolean('is_main')->default(0);

            $table->foreign('product_id')
                ->references('id')
                ->on('products')
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
        Schema::dropIfExists('product_lang_properties');
        Schema::dropIfExists('product_page_lang');
        Schema::dropIfExists('product_images');
        Schema::dropIfExists('products');
    }
}
