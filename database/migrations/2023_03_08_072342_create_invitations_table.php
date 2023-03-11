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
            $table->string('group_id')->nullable();
            $table->string('surname')->nullable();
            $table->string('surname2')->nullable();
            $table->enum('send_email',[0,1])->default(0)->comment('0=no , 1=yes');;
            $table->enum('send_whatsapp',[0,1])->default(0)->comment('0=no , 1=yes');;
            $table->enum('attend_confirm',[0,1])->default(0)->comment('0=no , 1=yes');;
            $table->enum('attend',[0,1])->default(0)->comment('0=no , 1=yes');;
            $table->enum('is_out',[0,1])->default(0)->comment('0=no , 1=yes');
            $table->enum('lang',[1,0])->default(0)->comment("0=en , 1=ar");
            $table->enum('status',[1,2,3])->default(1)->comment('1=pending , 2=confirmed , 3 = rejected');
            $table->enum('is_attentions',[0,1])->default(0)->comment('0=no , 1=yes');
            $table->string('status_text')->nullable();
            $table->string('qrcode')->nullable();
            $table->string('seatcode')->nullable(); 
            $table->string('seattype')->default('empty');  
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
