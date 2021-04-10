<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDesignsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('designs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('cat_id')->constrained()->onDelete('cascade');
            $table->text('name');
            $table->enum('slider',['used','unused'])->default('unused');
            $table->string('main_img', 255)->nullable();
            $table->text('desc');
            $table->decimal('price', 10,2);
            $table->decimal('discount', 5,2)->default(0.00);
            $table->string('lang', 255);
            $table->string('background', 255)->nullable();
            $table->string('font', 255)->nullable();
            $table->string('color', 255)->nullable();
            $table->text('details');
            $table->float('rate', 3,1);
            $table->boolean('type');
            $table->boolean('active')->default(true);
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
        Schema::dropIfExists('designs');
    }
}
