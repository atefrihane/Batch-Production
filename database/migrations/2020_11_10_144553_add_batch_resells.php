<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddBatchResells extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('batch_resells', function (Blueprint $table) {
            $table->id();
            $table->text('description');
            $table->decimal('price');
            $table->foreignId('batch_id')->constrained();

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
        Schema::dropIfExists('batch_resells');
    }
}
