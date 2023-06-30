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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->date('date')->nullable(false);
            $table->unsignedDecimal('total')->nullable(false);
            $table->string('guest_name', 50)->nullable(false);
            $table->string('adress', 50)->nullable(false);
            $table->string('email', 50)->nullable(false);
            $table->string('phone', 13)->nullable(false);
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
        Schema::dropIfExists('orders');
    }
};
