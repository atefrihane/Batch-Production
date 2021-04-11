<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBatchesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('batches', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('description');
            $table->float('weight');
            $table->integer('status')->default(1);
            $table->integer('step');
            $table->timestamp('last_scan')->nullable();
            $table->foreignId('season_id')->nullable()->constrained()->onDelete('cascade');
            $table->foreignId('country_id')->nullable()->constrained()->onDelete('cascade');
            $table->foreignId('quality_id')->nullable()->constrained()->onDelete('cascade');
            $table->foreignId('pricing_id')->nullable()->onDelete('cascade');
            $table->foreignId('parent_id')->nullable()->constrained('batches')->onDelete('cascade');
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
        Schema::dropIfExists('batches');
    }
}
