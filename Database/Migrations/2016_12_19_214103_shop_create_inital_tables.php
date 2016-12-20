<?php

use Illuminate\Database\Migrations\Migration;

class ShopCreateInitalTables extends Migration
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

        Schema::create($prefix.'categories', function ($table) {
            $table->increments('id')->unsigned();

            $table->string('name', 45)->nullable();
            $table->string('slug', 255)->unique();
            $table->integer('order')->nullable();
            $table->boolean('visible')->default(true);

            $table->timestamps();
        });

        Schema::create($prefix.'products', function ($table) {
            $table->increments('id')->unsigned();

            $table->string('name', 255)->unique();
            $table->string('slug', 255)->unique();
            $table->string('sku', 255)->unique()->nullable();

            $table->boolean('published')->default(0);
            //$table->float('rating_cache', 2, 1)->default('3.0');
            //$table->integer('rating_count')->default(0);
            $table->string('short_description', 255)->nullable();
            $table->text('long_description')->nullable();

            $table->float('base_value', 8, 2)->default('00.00');
            $table->float('cost', 8, 2)->default('00.00');
            $table->float('profit', 8, 2)->default('00.00');
            $table->string('special_value', 50)->default('0');
            $table->enum('special_type', array('value', 'deduct', 'percentage'))->default('value');
            $table->integer('tax_id')->default('0')->unsigned();
            $table->integer('stock_quantity')->default(0);
            $table->boolean('in_stock')->default(true);

            $table->timestamps();
        });

        Schema::create($prefix.'category_product', function ($table) {
            $table->integer('category_id')->unsigned();
            $table->integer('product_id')->unsigned();

            $table->primary(['product_id', 'category_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        $prefix = $this->prefix;

        Schema::drop($prefix.'category_product');
        Schema::drop($prefix.'products');
        Schema::drop($prefix.'categories');
    }
}
