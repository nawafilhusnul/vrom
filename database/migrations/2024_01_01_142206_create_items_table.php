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
        Schema::create('items', function (Blueprint $table) {
            $table->id();

            // table relation
            $table->foreignId('type_id')->constrained('types');
            $table->foreignId('brand_id')->constrained('brands');

            // table columns
            $table->string('name');
            $table->string('slug')->unique();
            $table->text('photos')->nullable();
            $table->text('features')->nullable();
            $table->integer('price')->default(0);
            $table->double('star')->default(0);
            $table->integer('review')->default(0);

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
        Schema::dropIfExists('items');
    }
};
