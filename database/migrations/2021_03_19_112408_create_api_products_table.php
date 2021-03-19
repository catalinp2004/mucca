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
            $table->string('label');
            $table->text('description');
            $table->string('descspec');
            $table->string('specification_name');
            $table->string('img_a');
            $table->string('img_b');
            $table->string('img_c');
            $table->string('img_d');
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
