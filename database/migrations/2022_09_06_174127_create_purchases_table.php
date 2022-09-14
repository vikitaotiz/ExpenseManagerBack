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
        Schema::create('purchases', function (Blueprint $table) {
            $table->id();
            $table->string('product');
            $table->integer('quantity')->default(0);
            $table->integer('issued')->default(0);
            $table->integer('opening_stock')->default(0);
            $table->integer('closing_stock')->default(0);
            $table->string('measurement');
            $table->decimal("total_amount", $precision = 8, $scale = 2)->default(0.00);
            $table->decimal("unit_price", $precision = 8, $scale = 2)->default(0.00);
            $table->decimal("balance", $precision = 8, $scale = 2)->default(0.00);

            $table->unsignedBigInteger("user_id");
            $table->unsignedBigInteger("company_id");

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('company_id')->references('id')->on('companies')->onDelete('cascade');

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
        Schema::dropIfExists('purchases');
    }
};
