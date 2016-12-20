<?php

use Illuminate\Database\Migrations\Migration;

class ShopCreateAttributeTables extends Migration
{
    public function __construct()
    {
        // Get the prefix
        $this->prefix = config('cms.shop.config.table-prefix', 'shop_');
    }

    /**
     * Run the migrations.
     */
    public function up()
    {
        $prefix = $this->prefix;

        Schema::create($prefix.'attribute_sets', function ($table) {
            $table->increments('id')->unsigned();

            $table->string('name', 45);
            $table->text('description')->default(null);

            $table->timestamps();
        });

        Schema::create($prefix.'attribute_types', function ($table) {
            $table->increments('id')->unsigned();

            $table->string('name', 45);
            $table->string('data_type', 45)->default('string');
            $table->integer('order')->default(0);
            $table->boolean('is_frontend')->default(0);
            $table->boolean('is_required')->default(0);
            $table->boolean('price_calc')->default(0);

            $table->timestamps();
        });

        Schema::create($prefix.'attribute_set_type', function ($table) {

            $table->integer('attribute_set_id')->unsigned();
            $table->integer('attribute_type_id')->unsigned();

            $table->primary(['attribute_set_id', 'attribute_type_id'], 'shop_attribute_set_type');
        });

        Schema::create($prefix.'product_attributes', function ($table) {

            $table->integer('attribute_type_id')->unsigned();
            $table->integer('product_id')->unsigned();
            $table->string('value')->nullable()->default(0);

            $table->primary(['product_id', 'attribute_type_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        $prefix = $this->prefix;

        Schema::drop($prefix.'product_attributes');
        Schema::drop($prefix.'attribute_types');
        Schema::drop($prefix.'attribute_sets');
    }
}
