<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
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
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->foreignId('design_id')->constrained()->onDelete('cascade');
            $table->enum('design_type', ['ready', 'upon_request']);
            $table->text('design_name');
            $table->text('lang');
            $table->text('background')->nullable();
            $table->text('color')->nullable();
            $table->text('font')->nullable();
            $table->text('imgs')->nullable();
            $table->text('details');
            $table->enum('status', [ 'pending', 'accepted' , 'completed', 'canceled']);
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
}
