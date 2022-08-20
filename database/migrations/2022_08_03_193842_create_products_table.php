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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string("name");
            $table->decimal("buying_price", $precision = 8, $scale = 2)->default(0.00);
            $table->decimal("selling_price", $precision = 8, $scale = 2)->default(0.00);
            $table->text("description")->nullable();

            $table->integer("category_id");
            $table->integer("unit_id");
            $table->integer("company_id");
            $table->integer("store_id");
            
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
        Schema::dropIfExists('products');
    }
};
