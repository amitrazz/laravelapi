<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

use App\Product;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('description',10000);
            $table->integer('quantity');
            $table->string('status')->default(product::AVAILABLE_PRODUCT);
            $table->string('image');
            $table->integer('seller_id')->unsigned();
            $table->timestamps();
            $table->softDeletes();   // add deleted_at column in database tabele for soft delete functionality            
    
            $table->foreign('seller_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
}
