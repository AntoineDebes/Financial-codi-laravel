<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFixedIncomesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fixed_incomes', function (Blueprint $table) {
            $table->id();
            $table->string('title',30);
            $table->text('description');
            $table->integer('quantity');
            $table->string('currency',10);
            $table->foreignId('category_id')->constrained('category');
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
        Schema::dropIfExists('fixed_incomes');
    }
}
