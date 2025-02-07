<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cities', function (Blueprint $table) {
            $table->id(); 
            $table->unsignedBigInteger('province_id'); 
            
            $table->foreign('province_id')
                ->references('id')->on('provinces')
                ->onDelete('restrict')  
                ->onUpdate('restrict');

            $table->string('name');  
            $table->string('code')->nullable(); 
            $table->unsignedBigInteger('population')->default(0); 
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
        Schema::dropIfExists('cities');
    }
}
