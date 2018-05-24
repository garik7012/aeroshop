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
            $table->string('images', 750);
            $table->string('price');
            $table->string('currency')->default('UAH');
            $table->integer('brand_id')->nullable();
            $table->integer('category_id')->default(1);
            $table->integer('country_id')->nullable();
            $table->integer('unit_id')->default(1);
            $table->integer('availability_id')->default(1);
            $table->boolean('is_active')->default(1);
            $table->boolean('is_featured')->default(0);
            $table->timestamps();
        });

        Schema::create('product_lang_properties', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('product_id');
            $table->string('locale');
            $table->string('key');
            $table->string('unit')->default('');
            $table->string('value')->default('');

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
        Schema::dropIfExists('products');
    }
}
