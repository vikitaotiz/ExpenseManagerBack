<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('entries', function (Blueprint $table) {
            $table->id();
            $table->integer('product_id');
            $table->string('units');
            $table->string('parts');
            $table->decimal('unit_price');
            $table->decimal("selling_price", $precision = 8, $scale = 2)->default(0.00);
            $table->integer('opening_stock');
            $table->integer('closing_stock');
            $table->integer('purchases');
            $table->decimal('purchases_cost');
            $table->decimal('closing_stock_cost');
            $table->integer('usage');
            $table->decimal('usage_cost');
            $table->integer('system_usage');
            $table->integer('stock_shortage');
            $table->decimal('stock_shortage_cost');

            $table->integer('user_id');
            $table->integer('company_id');
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
        Schema::dropIfExists('entries');
    }
};
