<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableCustomer extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Customer', function (Blueprint $table) {
            $table->id();
            $table->string('name',50);
            $table->string('email',50);
            $table->string('address1',50);
            $table->string('address2',50);
            $table->string('pinCode',50);
            $table->string('city',50);
            $table->string('state',50);
            $table->string('electricityUsage',50);
            $table->string('phone',50);
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
        Schema::dropIfExists('Customer');
    }
}
