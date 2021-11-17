<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRentalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rentals', function (Blueprint $table) {
            $table->id();
            $table->string('CustomerName')->nullable();
            $table->string('Address')->nullable();
            $table->bigInteger('Contact')->nullable();
            $table->string('CarType')->nullable();
            $table->integer('RentDays')->nullable();
            $table->date('DateRented')->nullable();
            $table->date("DateReturned")->nullable();
            $table->decimal('RentAmount', 10, 2)->nullable();
            $table->decimal('RentPaid', 10, 2)->nullable();
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
        Schema::dropIfExists('rentals');
    }
}
