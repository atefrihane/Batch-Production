<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBatchCategoryPivot extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('batch_category', function (Blueprint $table) {
            $table->foreignId('batch_id')->constrained();
            $table->foreignId('category_id')->constrained();
            $table->unique(['batch_id', 'category_id']);
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
        Schema::dropIfExists('batch_category');
    }
}
