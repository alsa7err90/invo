<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInvitationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('invitations', function (Blueprint $table) {
            $table->id();
            $table->integer('meet_id')->unsigned(); 
            $table->string('name');
            $table->string('email');
            $table->string('email2')->nullable();
            $table->string('side')->nullable();
            $table->string('mobile')->nullable();
            $table->string('position')->nullable();
            $table->text('group')->nullable();
            $table->string('surname')->nullable();
            $table->string('surname2')->nullable();
            $table->enum('send_email',[0,1])->default(0);
            $table->enum('send_whatsapp',[0,1])->default(0);
            $table->enum('attend_confirm',[0,1])->default(0);
            $table->enum('is_out',[0,1])->default(0);
            $table->enum('lang',["ar","en"]); 
            $table->enum('status',[0,1])->default(0);
            $table->string('status_text');
            $table->string('qrcode');
            $table->string('note')->nullable();
            $table->timestamps();
            
            $table->foreign('meet_id')->references('id')->on('meets')
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
        Schema::dropIfExists('invitations');
    }
}
