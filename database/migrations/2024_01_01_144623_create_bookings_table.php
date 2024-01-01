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
        Schema::create('bookings', function (Blueprint $table) {
            $table->id();

            //table relations
            $table->foreignId('user_id')->constrained('users');
            $table->foreignId('item_id')->constrained('items');

            // table columns
            $table->string('name')->nullable();

            $table->date('start_date')->nullable();
            $table->date('end_date')->nullable();

            $table->text('address')->nullable();
            $table->string('city')->nullable();
            $table->string('zip')->nullable();

            $table->string('status')->default('pending');

            $table->string('payment_method')->default('midtrans');
            $table->string('payment_status')->default('pending');
            $table->text('payment_url')->nullable();

            $table->integer('total_price')->default(0);

            // default
            $table->softDeletes();
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
        Schema::dropIfExists('bookings');
    }
};
