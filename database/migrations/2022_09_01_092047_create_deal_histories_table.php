<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDealHistoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('deal_histories', function (Blueprint $table) {
            $table->id();
            $table->string('Deal')->nullable();
            $table->string('Ids')->nullable();
            $table->string('Orders')->nullable();
            $table->string('Position')->nullable();
            $table->bigInteger('Login')->nullable();
            $table->string('Name')->nullable();
            $table->string('Time')->nullable();
            $table->string('Type')->nullable();
            $table->string('Entry')->nullable();
            $table->string('Symbol')->nullable();
            $table->bigInteger('Volume')->nullable();
            $table->bigInteger('Price')->nullable();
            $table->string('SL')->nullable();
            $table->string('TP')->nullable();
            $table->string('Reason')->nullable();
            $table->string('Commission')->nullable();
            $table->string('Fee')->nullable();
            $table->string('Swap')->nullable();
            $table->string('Profit')->nullable();
            $table->string('Dealer')->nullable();
            $table->string('Currency')->nullable();
            $table->string('Comment')->nullable();
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
        Schema::dropIfExists('deal_histories');
    }
}
