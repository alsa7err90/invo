<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHistTablesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hist_tables', function (Blueprint $table) {
            $table->id();
            $table->integer('table_id')->unsigned();
            $table->string('code');
            $table->string('invitation')->nullable();
            $table->string('type');
            $table->enum('status',[0,1]);
            $table->timestamps();

            $table->foreign('table_id')->references('id')->on('tables')
            ->onDelete('cascade'); 
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('hist_tables');
    }
}
