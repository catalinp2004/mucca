<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateApiProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('api_products', function (Blueprint $table) {
            $table->id();
            $table->string('id_commodity');
            $table->string('id_category');
            $table->string('name');
            $table->string('subname');
            $table->string('label')->nullable();
            $table->text('description')->nullable();
            $table->text('descspec')->nullable();
            $table->string('specification_name')->nullable();
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
        Schema::dropIfExists('api_products');
    }
}
